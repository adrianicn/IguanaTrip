<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
    <head>
        <!-- Page Title -->
        <title>iWanaTrip | Vive la experiencia Ecuador</title>

        <link rel="shortcut icon" href="{{ asset('images/favicon.png')}}" />

        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta name="description" content="iWanaTrip.com">
        <meta name="author" content="iWanaTrip team">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Theme Styles -->
        <link rel="stylesheet" href="{{ asset('public_components/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('public_components/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{ asset('public_components/search_inbox/css/component.css')}}">
        <link rel="stylesheet" href="{{ asset('public_components/search_inbox/css/default.css')}}">


        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,400italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Dosis:400,300,500,600,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ asset('public_components/css/animate.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public_components/components/owl-carousel/owl.carousel.css')}}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('public_components/components/owl-carousel/owl.transitions.css')}}" media="screen" />
        <!-- Magnific Popup core CSS file -->
        <link rel="stylesheet" href="{{ asset('public_components/components/magnific-popup/magnific-popup.css')}}"> 

        <link rel="stylesheet" type="text/css" href="{{ asset('public_components/components/revolution_slider/css/settings.css')}}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('public_components/components/revolution_slider/css/style.css')}}" media="screen" />

        <!-- Main Style -->
        <link id="main-style" rel="stylesheet" href="{{ asset('public_components/css/style.css')}}">

        <!-- Updated Styles -->
        <link rel="stylesheet" href="{{ asset('public_components/css/updates.css')}}">

        <!-- Custom Styles -->
        <link rel="stylesheet" href="{{ asset('public_components/css/custom.css')}}">

        <!-- Responsive Styles -->
        <link rel="stylesheet" href="{{ asset('public_components/css/responsive.css')}}">

        <!-- CSS for IE -->
        <!--[if lte IE 9]>
            <link rel="stylesheet" type="text/css" href="{{ asset('public_components/css/ie.css')}}" />
        <![endif]-->


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
          <script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
        <![endif]-->
    </head>



    <body>


        <div id="page-wrapper">
            <header id="header" class="header-color-white">
                @include('public_page.reusable.header')
            </header>


            <div id="slideshow">
                <div class="revolution-slider">
                    <ul>    <!-- SLIDE  -->
                        <!-- Slide1 -->
                        <li data-transition="zoomin" data-slotamount="7" data-masterspeed="1500">
                            <!-- MAIN IMAGE -->
                            <img src="{{ asset('img/cotopaxi.jpg')}}" alt="">
                        </li>

                        <!-- Slide2 -->
                        <li data-transition="zoomout" data-slotamount="7" data-masterspeed="1500">
                            <!-- MAIN IMAGE -->
                            <img src="{{ asset('img/extra-pag-1b.png')}}" alt="">
                        </li>

                        <!-- Slide3 -->
                        <li data-transition="slidedown" data-slotamount="7" data-masterspeed="1500">
                            <!-- MAIN IMAGE -->
                            <img src="{{ asset('img/galapagos2.jpg')}}" alt="">
                        </li>
                    </ul>

                    <div class="tp-static-layers">
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption customin customout tp-static-layer"
                             data-x="right" data-hoffset="0"
                             data-y="bottom" data-voffset="0"
                             data-customin="x:0;y:150;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.5;scaleY:0.5;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;"
                             data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="800"
                             data-start="700"
                             data-endslide="10004"
                             data-startslide="0"
                             data-easing="Power4.easeOut"

                             data-endeasing="Power4.easeIn"
                             style="z-index: 3">
                            <div class="rs-wave ">
                                <!-- Optional columns for small components -->
                                <img src="{{ asset('img/index-logo.png')}}" alt="">
                                <div class="column">
                                    <p>Embarcate en una aventura en Ecuador y acompañanos a descubrirlo.</p>
                                    <p> Deja de ser turista, conviertete en viajero.</p>
                                </div>
                                <div class="column">
                                    <div id="sb-search" class="sb-search">
                                        <form>
                                            <input class="sb-search-input" placeholder="{{ trans('publico/labels.label10')}}" type="text" value="" name="search" id="search">
                                            <input class="sb-search-submit" type="submit" value="">
                                            <span class="sb-icon-search"></span>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>



            <section id="content">
                <div class="container">
                    <div id="main">
                        <div class="post-wrapper">
                            <div class="post-filters">
                                <a href="#" class="btn btn-sm style4 hover-blue active" data-filter="filter-all">{{ trans('publico/labels.label12')}}</a>
                                <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-costa">{{ trans('publico/labels.label13')}}</a>
                                <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-sierra">{{ trans('publico/labels.label14')}}</a>
                                <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-oriente">{{ trans('publico/labels.label15')}}</a>
                                <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-galapagos">{{ trans('publico/labels.label16')}}</a>
                            </div>
                            <div class="iso-container iso-col-4 style-masonry">
                                <?php shuffle($regiones); ?>

                                @foreach ($regiones as $region)
                                <!- Costa ->
                                @if($region->id_region==1)
                                <div class="iso-item filter-all filter-website filter-business filter-costa">
                                    <article class="post">
                                        <a class="image soap-mfp-popup hover-style3" onclick="window.location.href = '{!!asset('/getProvinciaDescipcion')!!}/{!!$region->id_geo!!}/{!!$region->id!!}'" href="#" >
                                            <img src="{{ asset('images/icon/'.$region->filename)}}" alt="">
                                            <span class="image-extras"></span>
                                        </a>
                                    </article>
                                </div>
                                @endif

                                <!- Sierra ->
                                @if($region->id_region==2)
                                <div class="iso-item filter-all filter-website filter-sierra">
                                    <article class="post">
                                        <a class="image soap-mfp-popup hover-style3" onclick="window.location.href = '{!!asset(' / getProvinciaDescipcion')!!}/{!!$region->id_geo!!}/{!!$region->id!!}'" href="#" >
                                            <img src="{{ asset('images/icon/'.$region->filename)}}" alt="">
                                            <span class="image-extras"></span>
                                        </a>
                                    </article>
                                </div>
                                @endif

                                <!-Oriente ->
                                @if($region->id_region==3)
                                <div class="iso-item filter-all filter-oriente">
                                    <article class="post">
                                        <a class="image soap-mfp-popup hover-style3" onclick="window.location.href = '{!!asset(' / getProvinciaDescipcion')!!}/{!!$region->id_geo!!}/{!!$region->id!!}'" href="#" >
                                            <img src="{{ asset('images/icon/'.$region->filename)}}" alt="">
                                            <span class="image-extras"></span>
                                        </a>
                                    </article>
                                </div>
                                @endif

                                <!-Galapagos ->

                                @if($region->id_region==4)
                                <div class="iso-item double-width filter-all filter-galapagos">
                                    <article class="post">
                                        <a class="image soap-mfp-popup hover-style3" onclick="window.location.href = '{!!asset(' / getProvinciaDescipcion')!!}/{!!$region->id_geo!!}/{!!$region->id!!}'" href="#" >
                                            <img src="{{ asset('images/icon/'.$region->filename)}}" alt="">
                                            <span class="image-extras"></span>
                                        </a>
                                    </article>
                                </div>

                                @endif
                                @endforeach

                            </div>
                            <div class="text-center">
                                <a href="#" class="btn style4 hover-blue load-more">Load More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            @if($location->city!="")
            <?php
            $titulo = $location->city;
            ?>
            @else
            $titulo="Ecuador";
            @endif


            <section id="content" class="no-padding">
                <div class="section no-padding">
                    <h2 class="section-title">{{ trans('publico/labels.masvisitados')}}{!!$titulo!!}</h2>
                    <div class="post-wrapper">
                        <div class="iso-container iso-col-4 style-fancy">
                            <?php shuffle($visitados); ?>
                            @foreach ($visitados as $visitado)
                            <?php list($width, $height) = getimagesize(asset('images/icon/' . $visitado->filename)); ?>
                            @if($height>500 && $height<600 )
                            <div class="iso-item filter-all filter-website">
                                <article class="post">
                                    <figure><img src="{{ asset('images/icon/'.$visitado->filename)}}" alt=""></figure>
                                    <div class="portfolio-hover-holder">
                                        <div class="portfolio-text">
                                            <div class="portfolio-text-inner">
                                                <h5 class="portfolio-title">{!!$visitado->nombre_servicio!!}</h5> - <span class="portfolio-category">{!!$visitado->catalogo_nombre!!}</span>
                                            </div>
                                        </div>
                                        <span class="portfolio-action">
                                            <a class="soap-mfp-popup" href="{{ asset('images/fullsize/'.$visitado->filename)}}">
                                                <i class="fa fa-eye has-circle"></i></a>
                                            <a href="portfolio-single1.html"><i class="fa fa-chain has-circle"></i></a>
                                        </span>
                                    </div>
                                </article>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
            </section>

            <footer id="footer" class="style4">
                @include('public_page.reusable.footer')
            </footer>
        </div>

        <!-- Javascript -->
        {!! HTML::script('js/jquery.js') !!}
        {!!HTML::script('js/js_public/Compartido.js') !!}
        {!!HTML::script('js/loadingScreen/loadingoverlay.min.js') !!}


        <script>
                    $(document).ready(function () {

            // GetDataAjaxregiones("{!!asset('/getRegiones')!!}");
            });        </script>

        <script type="text/javascript" src="{{ asset('public_components/js/jquery-2.1.3.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('public_components/js/jquery.noconflict.js')}}"></script>
        <script type="text/javascript" src="{{ asset('public_components/js/modernizr.2.8.3.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('public_components/js/jquery-migrate-1.2.1.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('public_components/js/jquery-ui.1.11.2.min.js')}}"></script>
        <script src="{{ asset('public_components/search_inbox/js/classie.js')}}"></script>
        <script src="{{ asset('public_components/search_inbox/js/uisearch.js')}}"></script>

        <!-- Twitter Bootstrap -->
        <script type="text/javascript" src="{{ asset('public_components/js/bootstrap.min.js')}}"></script>

        <!-- Magnific Popup core JS file -->
        <script type="text/javascript" src="{{ asset('public_components/components/magnific-popup/jquery.magnific-popup.min.js')}}"></script> 

        <!-- parallax -->
        <script type="text/javascript" src="{{ asset('public_components/js/jquery.stellar.min.js')}}"></script>

        <!-- waypoint -->
        <script type="text/javascript" src="{{ asset('public_components/js/waypoints.min.js')}}"></script>

        <!-- Owl Carousel -->
        <script type="text/javascript" src="{{ asset('public_components/components/owl-carousel/owl.carousel.min.js')}}"></script>

        <!-- load revolution slider scripts -->
        <script type="text/javascript" src="{{ asset('public_components/components/revolution_slider/js/jquery.themepunch.tools.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('public_components/components/revolution_slider/js/jquery.themepunch.revolution.min.js')}}"></script>

        <!-- plugins -->
        <script type="text/javascript" src="{{ asset('public_components/js/jquery.plugins.js')}}"></script>

        <!-- load page Javascript -->
        <script type="text/javascript" src="{{ asset('public_components/js/main.js')}}"></script>

        <script type="text/javascript" src="{{ asset('public_components/js/revolution-slider.js')}}"></script>




        <script>
                    new UISearch(document.getElementById('sb-search'));
        </script>
    </body>


</html>