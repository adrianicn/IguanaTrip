<!DOCTYPE html>
<html>
<head>
    <title>Iguanatrip - Sign In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
   
         
    {!! HTML::style('cssMobile/themes/1/conf-room1.min.css') !!} 
    {!! HTML::style('cssMobile/themes/1/jquery.mobile.icons.min.css') !!} 
    {!! HTML::style('libMobile/jqm/1.4.4/jquery.mobile.structure-1.4.5.min.css') !!} 
    {!! HTML::style('cssMobile/app.css') !!} 
    {!!HTML::script('libMobile/jqm/1.4.4/jquery-2.1.1.min.js') !!}
    {!!HTML::script('libMobile/jqm/1.4.4/jquery.mobile-1.4.5.min.js') !!}
</head>

<body>
    <div data-role="page">
        <div data-role="header" data-theme="c">
            <h1>IguanaTrip.com</h1>
        </div><!-- /header -->
        <br>
        <div id="logo_" align="center">
            <div id="logo-imagen">

                <a href="#" onclick="window.location.href = '{!!asset('/')!!}'"><img src="{{ asset('img/index-logo.png')}}" width="100" height="88" alt="IguanaTrip" /></a> 
            </div>
            
        </div>
        
        @if(session()->has('error'))
                
     
                <div role="main" class="ui-content">
                    <h3 class="mc-text-danger">Login Failed</h3>
                    <p>Did you enter the right credentials?</p>
                    <div class="mc-text-center"><a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-b mc-top-margin-1-5">OK</a></div>
                </div>
     
     
                @endif
        {!! Form::open(['url' => 'auth/login', 'method' => 'post', 'role' => 'form']) !!}	
        <div role="main" class="ui-content">
            <h3>{{ trans('welcome/index.labelsignin') }}</h3>
            
            
					
					
            {!! Form::control('text', 6, 'log', $errors, trans('front/login.log')) !!}
            
            {!! Form::control('password', 6, 'password', $errors, trans('front/login.password')) !!}
            <fieldset data-role="controlgroup">
                
                {!! Form::check('memory', trans('front/login.remind')) !!}
                <label for="chck-rememberme">Remember me</label>
            </fieldset>
            
            <div id='btnlogin'>
                <a id='logbtn' href="#" data-transition="pop" data-position-to="window" class="ui-btn ui-btn-b ui-corner-all mc-top-margin-1-5" onclick="$(this).closest('form').submit()">{!! (trans('front/login.logbtn')) !!}</a>
            </div>
            
           <!--  <p class="mc-top-margin-1-5"><a href="begin-password-reset.html">Can't access your account?</a></p>-->
           
        </div><!-- /content -->
        
    </div><!-- /page -->
    
    
    
    {!! Form::close() !!}
</body>
</html>
