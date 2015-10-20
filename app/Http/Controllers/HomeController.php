<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Auth\Guard;
use App\Jobs\ChangeLocale;

class HomeController extends Controller
{

	/**
	 * Display the home page.
	 *
	 * @return Response
	 */
	public function index(Guard $auth)
	{
	//	
            
            
            
            if($auth->check())
            {return view('front.masterPageRegistro');
            }
            else
            {return view('auth.completeRegister');}
	}

	/**
	 * Change language.
	 *
	 * @param  App\Jobs\ChangeLocaleCommand $changeLocaleCommand
	 * @return Response
	 */
	public function language(
		ChangeLocale $changeLocale)
	{
		$this->dispatch($changeLocale);

		return redirect()->back();
	}

}
