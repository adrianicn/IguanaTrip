<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

    <head>
        <title>Registro</title>
        <meta charset='utf-8' />
        <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible' />
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <meta name="description" content="Comunity Turism, Travel Guide Ecuador">
        <meta name="keywords" content="HTML,CSS,XML,JavaScript">
        <meta name="author" content="IguanaTrip group">
        
        <link rel="shortcut icon" href="favicon.ico" />
        <link rel="apple-touch-icon" href="images/favicon.png" />        
        
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 
        
        
        
        {!! HTML::style('css/demo.css') !!} 
        {!! HTML::style('css/masterPagesRegistro.css') !!}
        {!! HTML::style('css/base/layoutBase.css') !!} 
        {!! HTML::style('css/popupModal/basic.css') !!} 
    
    </head>
    <div id='loadingScreen'>

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
                            <li>
                               <a href="{!! url('language') !!}"><img width="32" height="32" alt="en" src="{!! asset('img/' . (session('locale') == 'es' ? 'english' : 'español') . '-flag.png') !!}"></a>
                            </li>
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
        
           
        {!! HTML::script('js/jquery.js') !!}
        
        {!! HTML::script('js/bootstrap.min.js') !!}
    
    {!!HTML::script('js/loadingScreen/loadingoverlay.js') !!}

    {!!HTML::script('js/loadingScreen/loadingoverlay.min.js') !!}
    {!!HTML::script('js/Compartido.js') !!}
    
    
    
    @yield('scripts')


</body>
</div>
</html>
