<!DOCTYPE html>
<html>
<head>
    <title>IguanaTrip App - Sign In</title>
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
            <h1>IguanaTrip</h1>
        </div><!-- /header -->
        <div id="logo_">
            <div id="logo-imagen">

                <a href="eng"><img src="{{ asset('img/index-logo.png')}}" width="270" height="258" alt="IguanaTrip" /></a> 
            </div>
            
        </div>
        <div role="main" class="ui-content">
            <h2 class="mc-text-center">Welcome!</h2>
            <p class="mc-top-margin-1-5"><b>Existing Users</b></p>
            <a href="sign-in.html" class="ui-btn ui-btn-b ui-corner-all">Sign In</a>
            <p class="mc-top-margin-1-5"><b>Don't have an account?</b></p>
            <a href="sign-up.html" class="ui-btn ui-btn-b ui-corner-all">Sign Up</a>
            <p></p>
        </div><!-- /content -->
    </div><!-- /page -->
</body>
</html>
