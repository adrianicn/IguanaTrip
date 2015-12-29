@extends('mobile.logInMobile.masterMobile')

@section('content')
     {!! Form::open(['url' => 'auth/register', 'method' => 'post', 'role' => 'form','id' => 'registro']) !!}	
    <div role="main" class="ui-content">
        <h3>Sign Up</h3>
        <label for="txt-first-name">Username</label>
        <input type="text" id="username" name="username" placeholder="{{trans('front/register.pseudo')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <label for="txt-email">Email Address</label>
        <input type="text" id="email" name="email" placeholder="Email">
        <label for="txt-password">Password</label>
        <input type="password" id="password" name="password" placeholder="{{trans('front/register.password')}}">
        <label for="txt-password-confirm">Confirm Password</label>
        <input type="password" id="password" required="required" name="password_confirmation" placeholder="{{trans('front/register.confirm-password')}}">
        
        <a href="#" class="ui-btn ui-btn-b ui-corner-all mc-top-margin-1-5" onclick="$(this).closest('form').submit()">{!! (trans('front/form.send')) !!}</a>
     
        
     
    <div data-role="popup" id="dlg-sign-up-sent_error" data-dismissible="false" style="max-width:400px;">
            
        </div>
    
      
    
    	
        
    </div><!-- /content -->
    {!! Form::close() !!}

@stop

@section('scripts')
<script type="text/javascript">
     $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });


    $("#registro").submit(function (event) {
$("#registro").LoadingOverlay("show");
        


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
                $("#registro").LoadingOverlay("hide", true);

 setTimeout(function () {
  $('#dlg-sign-up-sent_error').popup('open');
 }, 100); // delay above zero

                $("#dlg-sign-up-sent_error").html(" <div data-role='header'> <h1>Error!</h1></div><div role='main' class='ui-content'><h3>Algunos campos no son correctos</h3><p>" + errorString + "</p><div class='mc-text-center'><a href='{!!asset('/registerMobile')!!}' class='ui-btn ui-corner-all ui-shadow ui-btn-b mc-top-margin-1-5'>OK</a></div></div>")
                
            }
            if (data.success) {
                 
                $('.register').fadeOut(); //hiding Reg form
                var successContent = '' + data.message + '';
                $("#registro").LoadingOverlay("hide", true);
 
 setTimeout(function () {
  $('#dlg-sign-up-sent_error').popup('open');
 }, 100); // delay above zero
$("#dlg-sign-up-sent_error").html(" <div data-role='header'> <h1>Almost done...</h1></div><div role='main' class='ui-content'><h3>Confirm Your Email Address</h3><p>We sent you an email with instructions on how to confirm your email address. Please check your inbox and follow the instructions in the email</p><div class='mc-text-center'><a href='{!!asset('/')!!}' class='ui-btn ui-corner-all ui-shadow ui-btn-b mc-top-margin-1-5'>OK</a></div></div>")



            } //success
        }); //done
    });
</script>

   @stop
   