<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

    <head>
        <meta charset="utf-8">
        <title>Registro</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 
        {!! HTML::style('css/demo.css') !!} 
        {!! HTML::style('css/masterPagesRegistro.css') !!}
        {!! HTML::script('js/jquery.js') !!}
        {!! HTML::script('js/bootstrap.min.js') !!}
      
    </head>


    <body>

        <header role="banner">
            <div id="banner-principal">
            <!--      <div id="logo"></div>-->
            </div>
            <div id="menu">
	        	<div id="menu-ul">
	              <ul id="seleccionitem">
	                    <li><a href=”#”>Home</a></li>
	                    <li><a href=”#”>Gallery</a></li>
	                    <li><a href=”#”>Contact</a></li>
	                    <li>{!! link_to('auth/logout', trans('front/site.logout')) !!}</li>
	              </ul>
	            </div>
            </div>
        </header>


        <div class="container" id="target">
            <div class="content show" id="registro-step1">
                @yield('step1')
            </div>	

        </div>
    
	<div id="footers">
	        	<div id="menu-ul">
	              <ul id="seleccionitem">
	                    <li><a href=”#”>Home</a></li>
	                    <li><a href=”#”>Gallery</a></li>
	                    <li><a href=”#”>Contact</a></li>
	                    <li>{!! link_to('auth/logout', trans('front/site.logout')) !!}</li>
	              </ul>
	            </div>	
	</div>
    {!!HTML::script('js/loading-overlay.min.js') !!}
    {!!HTML::script('js/Compartido.js') !!}
    @yield('scripts')


</body>
</html>
