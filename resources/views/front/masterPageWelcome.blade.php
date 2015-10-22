@if(session('device')=='desk')
<!DOCTYPE html>
<!--[if lt IE 7]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class='no-js' lang='en'>
    <!--<![endif]-->
    <head>
        <meta charset='utf-8' />
        <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible' />
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <meta name="description" content="Comunity Turism, Travel Guide Ecuador">
        <meta name="keywords" content="HTML,CSS,XML,JavaScript">
        <meta name="author" content="IguanaTrip group">
        <title>{{ trans('welcome/index.labelComming') }}</title>	

        <link rel="shortcut icon" href="favicon.ico" />
        <link rel="apple-touch-icon" href="images/favicon.png" />


        {!! HTML::style('css/maximage.css') !!} 

        {!! HTML::style('css/styles.css') !!} 
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">

        {!! HTML::style('css/demo.css') !!} 

<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

        <!--[if IE 6]>
                <style type="text/css" media="screen">
                        .gradient {display:none;}
                </style>
        <![endif]-->
    </head>

    <body>
        <div id="target">
            <!-- Logo -->


            <div id="logo_">
                <div id="logo-imagen">

                    <a href="eng"><img src="{{ asset('img/index-logo.png')}}" width="270" height="258" alt="IguanaTrip" /></a> 
                </div>

            </div>

            <!-- Switch to full screen -->


            <!-- Site Logo <div id="logo">Iguna Trip</div> -->
            <div id="lang">


                <a href="{!! url('language') !!}"><img width="32" height="32" alt="en" src="{!! asset('img/' . (session('locale') == 'es' ? 'english' : 'español') . '-flag.png') !!}"></a>
            </div>



            <!-- Main Navigation -->
            <nav class="main-nav">
                <ul>

                    <li><a href="#home" class="active">{!! link_to('/',  trans('welcome/index.labelRegister')) !!}</a></li>
                    <li><a href="#about">{{ trans('welcome/index.labelAbout') }}</a></li>
                    <li><a href="#contact">{{ trans('welcome/index.labelContact') }}</a></li>
                    <li><a href="#contact">{!! link_to('auth/logout', trans('front/site.logout')) !!}</a></li>


                </ul>
            </nav>

            <!-- Slider Controls -->


            <!-- Home Page -->
            <div id="logindiv">
                @yield('contentLogin')
            </div>

            

            <section class="content show" id="home">
                @yield('contentRegistro')
            </section>


            <!-- About Page -->
            <section class="content hide" id="about">
                <h1>{{ trans('welcome/index.labelAbout') }}</h1>
                <h5>{{ trans('welcome/index.labelSubAbout') }}</h5>
                <p>{{ trans('welcome/index.pAboutDescription') }}
                </p>
            </section>

            <!-- Contact Page -->
            <section class="content hide" id="contact">
                <h1>{{ trans('welcome/index.labelContact') }}</h1>
                <h5>{{ trans('welcome/index.labelContact') }}</h5>
                <p>Email: <a href="#">info@iguanatrip.com</a><br />
                    {!! link_to('contact/create', trans('front/site.contact')) !!}
                    <br /></p>
                <p><br />
                </p>
            </section>        
            <!-- Background Slides -->
            <div id="maximage">
                <div>
                    <img src="{!! asset('img/index-fondo.jpg')!!}" alt="" />

                    <img class="gradient" src="{!! asset('images/backgrounds/gradient.png')!!}" alt="Galapagos" />
                </div>

            </div>

            {!!HTML::script('js/jquery_.js') !!}
            {!!HTML::script('js/jquery.easing.min.js') !!}
            {!!HTML::script('js/jquery.cycle.all.js') !!}
            {!!HTML::script('js/jquery.maximage.js') !!}
            {!!HTML::script('js/jquery.fullscreen.js') !!}
            {!!HTML::script('js/jquery.ba-hashchange.js') !!}
            {!!HTML::script('js/main.js') !!}
            {!!HTML::script('js/loading-overlay.min.js') !!}
            
            @yield('scripts')
            
            <script type="text/javascript" charset="utf-8">
                $(function () {
                    $('#maximage').maximage({
                        cycleOptions: {
                            fx: 'fade',
                            speed: 1000, // Has to match the speed for CSS transitions in jQuery.maximage.css (lines 30 - 33)
                            timeout: 9000,
                            prev: '#arrow_left',
                            next: '#arrow_right',
                            pause: 0,
                            before: function (last, current) {
                                if (!$.browser.msie) {
                                    // Start HTML5 video when you arrive
                                    if ($(current).find('video').length > 0)
                                        $(current).find('video')[0].play();
                                }
                            },
                            after: function (last, current) {
                                if (!$.browser.msie) {
                                    // Pauses HTML5 video when you leave it
                                    if ($(last).find('video').length > 0)
                                        $(last).find('video')[0].pause();
                                }
                            }
                        },
                        onFirstImageLoaded: function () {
                            jQuery('#cycle-loader').hide();
                            jQuery('#maximage').fadeIn('fast');
                        }
                    });

                    // Helper function to Fill and Center the HTML5 Video
                    jQuery('video,object').maximage('maxcover');

                });

            </script>
        </div>
    </body>

</html>

@else
<!DOCTYPE html>

@include('mobile/completeRegister')

@endif