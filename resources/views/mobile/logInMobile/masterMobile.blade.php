<!DOCTYPE html>
<html>
<head>
    <title>IguanaTrip- Deja de ser turista conviertete en viajero</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
        <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible' />
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <meta name="description" content="Registra tus servicios turisticos. Nosotros haremos que lo conozcan a nivel internacional y turistas de todo el mundo vengan a visitarte. Iguana Trip surge como una alternativa turística comunitaria para defender y revalorizar los recursos culturales y naturales. Planea tu viaje y aprende sobre la historia y la cultura del país mientras te involucras en la realidad del mismo. Iguana Trip te brindara información práctica de acuerdo a tus intereses sobre el lugar específico que decidas visitar. Encuentra hoteles, day trips, museos, playas, sitios turísticos, restaurantes, bares, todo tipo de atracciones desde la más pequeña a la más grande. Y lo más importante si lo deseas, IgunaTrip te guiará en tu recorrido para que ayudes a generar ingresos complementarios a comunidades locales en busca de desarrollo. Nos encontraos en la etapa de registro de operadores turísticos">
        <meta NAME="ROBOTS" CONTENT="INDEX, FOLLOW, ARCHIVE" />
        <meta name="keywords" content="HTML,CSS,XML,JavaScript">
        <meta name="author" content="IguanaTrip group">
   
         
    
    {!!HTML::script('js/sliderTop/jquery-1.9.1.min.js') !!}
    {!!HTML::script('js/sliderTop/jssor.slider.mini.js') !!}
    {!! HTML::style('cssMobile/themes/1/conf-room1.min.css') !!} 
    {!! HTML::style('cssMobile/themes/1/jquery.mobile.icons.min.css') !!} 
    {!! HTML::style('libMobile/jqm/1.4.4/jquery.mobile.structure-1.4.5.min.css') !!} 
    {!! HTML::style('cssMobile/app.css') !!} 
    {!!HTML::script('libMobile/jqm/1.4.4/jquery-2.1.1.min.js') !!}
    {!!HTML::script('libMobile/jqm/1.4.4/jquery.mobile-1.4.5.min.js') !!}
    {!! HTML::style('css/demo.css') !!} 
    {!!HTML::script('js/loadingScreen/loadingoverlay.js') !!}

    {!!HTML::script('js/loadingScreen/loadingoverlay.min.js') !!}
</head>



    

    <body>
        
        <div data-role="page" id="page1" role="banner">
 
    <style>
        #logo_{
            margin-left: 20px;
    margin-top: 15px;
    position: absolute;
    z-index: 500;
            
        }
        
    </style>
    
    <div data-role="header" data-theme="c">
            <h1>IguanaTrip.com</h1>
        </div><!-- /header -->
       <div id="logo_" align="center">
            <div id="logo-imagen">

                <a href="#" onclick="window.location.href = '{!!asset('/')!!}'"><img src="{{ asset('img/index-logo.png')}}" width="100" height="88" alt="IguanaTrip" /></a> 
            </div>
            
        </div>
    
                    <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1360px; height: 635px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <!-- Loading Screen 
            <div style="position:absolute;display:block;background:url("{!!asset('img/internas/loading.gif')!!}") no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
            -->
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1360px; height: 635px; overflow: hidden;">
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="{{ asset('img/cotopaxi.jpg')}}" />
            </div>
          
            
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="{{ asset('img/extra-pag-1b.png')}}" />
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="{{ asset('img/index-fondo.jpg')}}" />
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="{{ asset('img/extra-pag-1c.png')}}" />
            </div>
            
            
            
            
            
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype" style="width:16px;height:16px;"></div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora12l" style="top:0px;left:0px;width:30px;height:46px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora12r" style="top:0px;right:0px;width:30px;height:46px;" data-autocenter="2"></span>
        
    </div>
        
        @yield('content')
            
        </div>
        
                
        

    </body>

</html>
@yield('scripts')
<script>

        jQuery(document).ready(function ($) {
            
            var jssor_1_SlideshowTransitions = [
              {$Duration:1800,$Opacity:2}
            ];
            
            var jssor_1_options = {
              $AutoPlay: true,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1360);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>
    
    <style>
        
        /* jssor slider bullet navigator skin 05 css */
        /*
        .jssorb05 div           (normal)
        .jssorb05 div:hover     (normal mouseover)
        .jssorb05 .av           (active)
        .jssorb05 .av:hover     (active mouseover)
        .jssorb05 .dn           (mousedown)
        */
        .jssorb05 {
            position: absolute;
        }
        .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
            position: absolute;
            /* size of bullet elment */
            width: 16px;
            height: 16px;
            background:url ("{!!asset("img/internas/b05.png")!!}") no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb05 div { background-position: -7px -7px; }
        .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
        .jssorb05 .av { background-position: -67px -7px; }
        .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }

        /* jssor slider arrow navigator skin 12 css */
        /*
        .jssora12l                  (normal)
        .jssora12r                  (normal)
        .jssora12l:hover            (normal mouseover)
        .jssora12r:hover            (normal mouseover)
        .jssora12l.jssora12ldn      (mousedown)
        .jssora12r.jssora12rdn      (mousedown)
        */
        .jssora12l, .jssora12r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 30px;
            height: 46px;
            cursor: pointer;
            background:url("{!!asset("img/internas/a12.png")!!}") no-repeat;
            overflow: hidden;
        }
        .jssora12l { background-position: -16px -37px; }
        .jssora12r { background-position: -75px -37px; }
        .jssora12l:hover { background-position: -136px -37px; }
        .jssora12r:hover { background-position: -195px -37px; }
        .jssora12l.jssora12ldn { background-position: -256px -37px; }
        .jssora12r.jssora12rdn { background-position: -315px -37px; }
    </style>
