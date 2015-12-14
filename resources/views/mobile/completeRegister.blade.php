<!DOCTYPE html>
<html>
<head>
    <title>IguanaTrip App - Sign In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
     
    {!! HTML::style('public/cssMobile/themes/1/conf-room1.min.css') !!} 
    {!! HTML::style('public/cssMobile/themes/1/jquery.mobile.icons.min.css') !!} 
    {!! HTML::style('public/libMobile/jqm/1.4.4/jquery.mobile.structure-1.4.5.min.css') !!} 
    {!! HTML::style('public/cssMobile/app.css') !!} 
    {!!HTML::script('public/libMobile/jqm/1.4.4/jquery-2.1.1.min.js') !!}
    {!!HTML::script('public/libMobile/jqm/1.4.4/jquery.mobile-1.4.5.min.js') !!}
</head>

<body>
    <div data-role="page">
        <div data-role="header" data-theme="c">
            <h1>Welcome</h1>
        </div><!-- /header -->
        <br>
        <div id="logo_">
            <div id="logo-imagen" align='center'>

                <a href="eng"><img src="{{ asset('public/img/index-logo.png')}}" width="170" height="158" alt="IguanaTrip" /></a> 
            </div>
            
        </div>
        <div role="main" class="ui-content">
            <h2 class="mc-text-center">Soon!</h2>
            <p class="mc-top-margin-1-5"><b>We are in the process of registration of tour operators!</b></p>
            
            <p class="mc-top-margin-1-5"><b>{{ trans('welcome/index.pDescription') }}</b></p>
            <div href="#" class="ui-btn ui-btn-b ui-corner-all">Try our desktop version</div>
            <p></p>
        </div><!-- /content -->
    </div><!-- /page -->
</body>
</html>
