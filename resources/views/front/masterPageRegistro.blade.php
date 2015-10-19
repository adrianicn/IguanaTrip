<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>{{ trans('front/site.title') }}</title>
		<meta name="description" content="">	
		<meta name="viewport" content="width=device-width, initial-scale=1">

		@yield('head')

		{!! HTML::style('css/masterPagesRegistro.css') !!}
		{!! HTML::style('css/jquery.steps.css') !!}
		{!! HTML::style('css/main.css') !!}
		{!! HTML::style('css/normalize.css') !!}

		<!--[if (lt IE 9) & (!IEMobile)]>
			{!! HTML::script('js/vendor/respond.min.js') !!}
		<![endif]-->
		<!--[if lt IE 9]>
			{!! HTML::style('https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js') !!}
			{!! HTML::style('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') !!}
		<![endif]-->

		{!! HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800') !!}
		{!! HTML::style('http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic') !!}

	</head>

  <body>

	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<header role="banner">
		<div id="banner-principal">
			<div id="logo"></div>
		</div>
		@yield('header')	
	</header>
	<main role="main" class="container">
		@if(session()->has('ok'))
			@include('partials/error', ['type' => 'success', 'message' => session('ok')])
		@endif	
		@if(isset($info))
			@include('partials/error', ['type' => 'info', 'message' => $info])
		@endif
		@yield('main')
	</main>
		<div class="container">
			<div id="menu"></div>
			<div class="contenido">
				{!! Form::open(['url' => 'auth/login', 'method' => 'post', 'role' => 'form', 'id'=>'registro'] ) !!}
				<div>
        			<h3>Servicios y Eventos</h3>
			        <section>
			            <label for="userName">User name *</label>
			            <input id="userName" name="userName" type="text" class="required">
			            <label for="password">Password *</label>
			            <input id="password" name="password" type="text" class="required">
			            <label for="confirm">Confirm Password *</label>
			            <input id="confirm" name="confirm" type="text" class="required">
			            <p>(*) Mandatory</p>
			        </section>        			
        			<h3>Catalogos</h3>
			        <section>
			            <label for="name">First name *</label>
			            <input id="name" name="name" type="text" class="required">
			            <label for="surname">Last name *</label>
			            <input id="surname" name="surname" type="text" class="required">
			            <label for="email">Email *</label>
			            <input id="email" name="email" type="text" class="required email">
			            <label for="address">Address</label>
			            <input id="address" name="address" type="text">
			            <p>(*) Mandatory</p>
			        </section>        			
        			<h3>Resumen</h3>
			        <section>
			            <ul>
			                <li>Foo</li>
			                <li>Bar</li>
			                <li>Foobar</li>
			            </ul>
			        </section>
        			<h3>Finalizar</h3>
			        <section>
			            <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
			        </section>
        		</div>
    			{!! Form::close() !!}    			
			</div>
		</div>
	
	<footer role="contentinfo">
		 @yield('footer')
		<p class="text-center"><small>Copyright &copy; Adrian</small></p>
	</footer>
		
	
	{!! HTML::script('js/jquery-1.9.1.min.js') !!}
	{!! HTML::script('js/plugins.js') !!}
	{!! HTML::script('js/modernizr-2.6.2.min.js') !!}
	{!! HTML::script('js/jquery.cookie-1.3.1.js') !!}
	{!! HTML::script('js/jquery.steps.js') !!}
	{!! HTML::script('js/registro.js') !!}
<!--  	
	<script src="https://apis.google.com/_/scs/apps-static/_/js/k=oz.gapi.es_419.I2fUUel9E0s.O/m=auth/exm=plusone/rt=j/sv=1/d=1/ed=1/am=AQ/rs=AGLTcCMMtpYd3FTOpeq-jKZLL11dKGpUEg/t=zcms/cb=gapi.loaded_1" async="" />
	<script src="https://apis.google.com/_/scs/apps-static/_/js/k=oz.gapi.es_419.I2fUUel9E0s.O/m=plusone/rt=j/sv=1/d=1/ed=1/am=AQ/rs=AGLTcCMMtpYd3FTOpeq-jKZLL11dKGpUEg/t=zcms/cb=gapi.loaded_0" async="" />
	<script id="_carbonads_projs" type="text/javascript" src="//srv.carbonads.net/ads/C6AILKT.json?segment=placement:jquerystepscom&callback=_carbonads_go" />
	
	<script>
		(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
		function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
		e=o.createElement(i);r=o.getElementsByTagName(i)[0];
		e.src='//www.google-analytics.com/analytics.js';
		r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
		ga('create','UA-XXXXX-X');ga('send','pageview');		
	</script>
-->
	@yield('scripts')

  </body>
</html>