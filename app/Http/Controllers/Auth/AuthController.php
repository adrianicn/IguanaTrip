<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Repositories\UserRepository;
use App\Jobs\SendMail;
use Validator;
use Illuminate\Support\Facades\Hash;
use Input;

class AuthController extends Controller {

    protected $validationRules = [
        'username' => 'required|max:30|alpha|unique:users',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|confirmed',
    ];

    use AuthenticatesAndRegistersUsers,
        ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Handle a login request to the application.
     *
     * @param  App\Http\Requests\LoginRequest  $request
     * @param  App\Services\MaxValueDelay  $maxValueDelay
     * @param  Guard  $auth
     * @return Response
     */
    public function postLogin(
    LoginRequest $request, Guard $auth) {
        $logValue = $request->input('log');

        $logAccess = filter_var($logValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $throttles = in_array(
                ThrottlesLogins::class, class_uses_recursive(get_class($this))
        );

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return redirect('/')
                            ->with('error', trans('front/login.maxattempt'))
                            ->withInput($request->only('log'));
        }

        $credentials = [
            $logAccess => $logValue,
            'password' => $request->input('password')
        ];

        if (!$auth->validate($credentials)) {
            if ($throttles) {
                $this->incrementLoginAttempts($request);
            }

            return redirect('/')
                            ->with('error', trans('front/login.credentials'))
                            ->withInput($request->only('log'));
        }

        $user = $auth->getLastAttempted();

        if ($user->confirmed) {
            if ($throttles) {
                $this->clearLoginAttempts($request);
            }

            $auth->login($user, $request->has('memory'));

            if ($request->session()->has('user_id')) {
                $request->session()->forget('user_id');
            }
            $request->session()->put('user_id', $user->id);

            return redirect('/userservice')->with('user', $user->id);
        }

        

        return redirect('/')->with('error', trans('front/verify.again'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  App\Http\Requests\RegisterRequest  $request
     * @param  App\Repositories\UserRepository $user_gestion
     * @return Response
     */
    public function postRegister(Request $request, UserRepository $user_gestion) {



        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        $userData = array(
            'username' => $formFields['username'],
            'email' => $formFields['email'],
            'password' => $formFields['password'],
            'password_confirmation' => $formFields['password_confirmation'],
        );
        $validator = Validator::make($userData, $this->validationRules);

        


        if ($validator->fails()) {


            return response()->json(array(
                        'fail' => true,
                        'errors' => $validator->getMessageBag()->toArray()
            ));
        } else {
            $user = $user_gestion->store(
                    $userData, $confirmation_code = str_random(30)
            );



            $this->dispatch(new SendMail($user));
            //    return redirect('/')->with('ok', trans('front/verify.message'));
            //return redirect('/auth/confirmation/'.$confirmation_code);*/

            return response()->json(array(
                        'success' => true,
                        'message' => trans('front/verify.message')
            ));
            //}
        }
    }

    /**
     * Handle a confirmation request.
     *
     * @param  App\Repositories\UserRepository $user_gestion
     * @param  string  $confirmation_code
     * @return Response
     */
    public function getConfirm(
    UserRepository $user_gestion, $confirmation_code) {
        $user = $user_gestion->confirm($confirmation_code);

        return redirect('/')->with('ok', trans('front/verify.success'));
    }

    /**
     * Handle a resend request.
     *
     * @param  App\Repositories\UserRepository $user_gestion
     * @param  Illuminate\Http\Request $request
     * @return Response
     */
    public function getResend(
    UserRepository $user_gestion, Request $request) {
        if ($request->session()->has('user_id')) {
            $user = $user_gestion->getById($request->session()->get('user_id'));

            $this->dispatch(new SendMail($user));

            return redirect('/')->with('ok', trans('front/verify.resend'));
        }

        return redirect('/');
    }

}
