@extends('front.masterPageWelcome')

@section('contentLogin')



{!! Form::open(['url' => 'auth/login', 'method' => 'post', 'role' => 'form', 'id' => 'loginform']) !!}	

<table cellspacing="0" role="presentation" id='tablelogin'>
    <tr>
        <td>
            <div id=usern''>
                <input type="text" class='logininput' id="email" name="log" placeholder="{{trans('front/login.log')}}">
            </div>
        </td>
        <td>
            <div id='inputpassword'>
                <input type="password" class='logininput' id="password" name="password" placeholder="{{trans('front/login.password')}}">
            </div>
        </td>
        <td>
            <div id='btnlogin'>
                <a href="#" class="buttonlogin" onclick="$(this).closest('form').submit()">{!! (trans('front/login.logbtn')) !!}</a>
            </div>
        </td>

    </tr>
    <tr>
        <td>
            <div id='remember'>
                {!! Form::check('memory', trans('front/login.remind'),array('class' => 'logininput')) !!}
            </div>
        </td>
        <td>

            <div class="col-lg-12" id ='forgotp'>	

                {!! link_to('password/email', trans('front/login.forget'),array('class' => 'logininput')) !!}
            </div>

        </td>

    </tr>

</table>

{!! Form::close() !!}

@stop


@section('contentRegistro')

<div class="rowerror">

    <br>
    @if(session()->has('error'))
    @include('partials/error', ['type' => 'danger', 'message' => session('error')])
    @endif

    @if(session()->has('ok'))
    @include('partials/message', ['type' => 'message', 'message' => session('ok')])
    @endif	
    @if($errors->has())

    <div>

        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    @endif


</div>

<div class="testbox">
    <h1>Registration </h1>



    {!! Form::open(['url' => 'auth/register', 'method' => 'post', 'role' => 'form','id' => 'registro']) !!}	
    <hr>


    <!-- <div class="accounttype">
        <input type="radio" value="None" id="radioOne" name="account" checked/>
        <label for="radioOne" class="radio" chec>{{trans('front/register.usertypepersona')}}</label>
        <input type="radio" value="None" id="radioTwo" name="account" />
        <label for="radioTwo" class="radio">{{trans('front/register.usertypecompany')}}</label>
    </div>
    <hr>  -->


    <label id="icon" for="username"><i class="icon-user"></i></label>

    <input type="text" id="username" name="username" placeholder="{{trans('front/register.pseudo')}}">

    <label id="icon" for="email"><i class="icon-envelope "></i></label>

    <input type="text" id="email" name="email" placeholder="Email">

    <label id="icon" for="password"><i class="icon-shield"></i></label>

    <input type="password" id="password" name="password" placeholder="{{trans('front/register.password')}}">

    <label id="icon" for="password_confirmation"><i class="icon-shield"></i></label>

    <input type="password" id="password" required="required" name="password_confirmation" placeholder="{{trans('front/register.confirm-password')}}">



    <p>By clicking Register, you agree on our <a href="#">terms and condition</a>.</p>

    <a href="#" class="button" onclick="$(this).closest('form').submit()">{!! (trans('front/form.send')) !!}</a>
</form>{!! Form::close() !!}
</div>



@stop
@section('scripts')
<script type="text/javascript">
    $('.error').html('');

    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });

    $("#registro").submit(function (event) {

        $('#target').loadingOverlay();

        event.preventDefault();
        var $form = $(this),
                data = $form.serialize(),
                url = $form.attr("action");

        var posting = $.post(url, {formData: data});
        posting.done(function (data) {
            if (data.fail) {



                var errorString = '<ul>';
                $.each(data.errors, function (key, value) {
                    errorString += '<li>' + value + '</li>';
                });
                errorString += '</ul>';
                $('#target').loadingOverlay('remove');
                //$('#error').html(errorString);
                $('.rowerror').html("@include('partials/error', ['type' => 'danger','message'=>'" + errorString + "'])");

            }
            if (data.success) {
                $('#target').loadingOverlay('remove');
                $('.register').fadeOut(); //hiding Reg form
                var successContent = '' + data.message + '';
                $('.rowerror').html("@include('partials/error', ['type' => 'danger','message'=>'" + successContent + "'])");




            } //success
        }); //done
    });
</script>
@stop
@section('scripts')

<script>
    $(function () {
        $('.badge').popover();
    });


</script>


@stop

