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
        <link rel="stylesheet" href="{{ asset('public_components/search_inbox/css/default.css')}}">
        <link rel="stylesheet" href="{{ asset('public_components/search_inbox/css/component.css')}}">
        
        


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
                      
                        
                        <li data-slotamount="7" 
                            data-transition="notransition" 
                            class="tp-revslider-slidesli active-revslide current-sr-slide-visible"
                            >
                        <!-- MAIN IMAGE -->
                        <div  data-bgfit="cover"
                             
                             style="width:100%;height:100%;" 
                             class="slotholder">
                            <div style="background-color: transparent; 
                                 background-repeat: no-repeat; 
                                 background-image: url('{{ asset('img/index-fondo.jpg')}}'); 
                                 background-size: cover; 
                                 background-position: center center;
                                 width: 100%; height: 100%; opacity: 1; 
                                 visibility: inherit;" 
                                 
                                 src="{{ asset('img/index-rodelas.png')}}" 
                                  data-bgrepeat="no-repeat" 
                                 data-bgposition="center center" data-bgfit="cover" 
                                  class="tp-bgimg defaultimg">
                                     
                            </div>
                                     
                        </div>
                        <!-- LAYERS -->

                        <!-- LAYER NR. 1 -->
                        <div 
                            
                            
                            
                            
                            data-endspeed="300" data-endelementdelay="0.1" 
                             data-elementdelay="0.1" data-splitout="none" data-splitin="none"
                             data-easing="easeInCubic" data-start="500" data-speed="600" 
                             data-y="460" data-hoffset="0"   data-x="center"
                             class="tp-caption lft fadeout tp-resizeme start">
                            
                            @if(session('device')!='mobile')
                        <h2 class="caption-xl" >
                                Embarcate en una aventura en Ecuador y acompañanos a descubrirlo.
                        </h2>
                              @else
                       <h2 class="caption-xl" style="font-size: 40px;">
                                Embarcate en una aventura en Ecuador y acompañanos a descubrirlo.
                            </h2>
                                            @endif
                                            
                        </div>

                        <!-- LAYER NR. 2 -->
                        <div 
                             data-endspeed="300" data-endelementdelay="0.1"
                             data-elementdelay="0.1" data-splitout="none" 
                             data-splitin="none" data-easing="easeInOutCubic"
                             data-start="700" data-speed="600" data-y="540" 
                             data-hoffset="0" data-x="center" 
                             class="tp-caption lfl fadeout tp-resizeme start">
                            <h2 class="caption-md skin-color" > Deja de ser turista, conviertete en viajero.</h2>
                        </div>

                        @if(session('device')!='mobile')
                        <!-- LAYER NR. 3 -->
                        <div style="margin-left: 10px;"
                             data-endspeed="300" data-endelementdelay="0.1"
                             data-elementdelay="0.1" data-splitout="none"
                             data-splitin="none" data-easing="Power3.easeInOut"
                             data-start="1000" data-speed="300" data-voffset="-79" 
                             data-y="5" data-x="-280" class="tp-caption sfl fadeout start">
                             <img alt="" src="{{ asset('img/index-logo.png')}}" >
                        </div>

                        @endif
                        <!-- LAYER NR. 4 -->
                        <div style='width: 80%'
                            data-endspeed="300" data-endelementdelay="0.1" data-elementdelay="0.1" 
                            data-splitout="none" data-splitin="none" data-easing="easeOutBack"
                            data-start="1500" data-speed="600" data-y="630" data-x="center"
                            class="tp-caption sfr str start">
                   
                                        <form>
                                            @if(session('device')!='mobile')
                                            <input class="sb-search-input" placeholder="{{ trans('publico/labels.label10')}}" type="text" value="" name="search" id="search">
                                            @else
                                            <input class="sb-search-input" placeholder="{{ trans('publico/labels.label10')}}" style="font-size: 12px;" type="text" value="" name="search" id="search">
                                            @endif
                                            
                                            <input class="sb-search-submit" type="submit" value="">
                                            <span class="sb-icon-search"></span>
                                        </form>
                                    
                                
                             
                        </div>

                      
                    </li>

                     
                    </ul>
                    
          
                    

                    
                </div>
            </div>



            <section id="content">
                <div class="container">
                     <div class="heading-box col-md-10 col-lg-8">
                    <h2 class="box-title">Ecuador an <em class="skin-color">amazing </em> country waiting for you</h2>
                    <p>Find the most beautiful and featured cities, events, parties, everything that you can imagine for your enjoy.</p>
                </div>
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
                                <?php shuffle($topPlacesEcuador); ?>

                                @foreach ($topPlacesEcuador as $region)
                                <!- Costa ->
                                @if($region->id_region==1)
                                <div class="shortcode-banner style-animated iso-item filter-all filter-website filter-business filter-costa" >
                                    <article class="post">
                                   <figure ><img src="{{ asset('images/icon/'.$region->filename)}}" alt=""></figure>
                                   
                                     @if(session('device')!='mobile')
                                
                                        <div class="shortcode-banner-inside" style=" width: 108%;">
                                            @else
                                            <div class="shortcode-banner-inside" style=" width: 112%;">
                                            @endif
                                    <div class="shortcode-banner-content">
                                        <h3 class="banner-title">{!!$region->nombre_servicio!!}</h3>
                                        <div class="details">
                                            <p>{!!$region->detalle_servicio!!}</p>
                                        </div>
                                    </div>
                                </div>
                                    <div class="portfolio-hover-holder">
                                        <div class="portfolio-text">
                                            <div class="portfolio-text-inner">
                                                <h5 class="portfolio-title">{!!$region->nombre_servicio!!}</h5> - <span class="portfolio-category">{{ trans('publico/labels.label13')}}</span>
                                            </div>
                                        </div>
                                        <span class="portfolio-action">
                                            <a class="soap-mfp-popup" href="{{ asset('images/fullsize/'.$region->filename)}}">
                                                <i class="fa fa-eye has-circle"></i></a>
                                            <a onclick="$('.iso-container').LoadingOverlay('show');window.location.href = '{!!asset('/getProvinciaDescipcion')!!}/{!!$region->id_geo!!}/{!!$region->id!!}'" style="cursor:pointer"><i class="fa fa-chain has-circle"></i></a>
                                        </span>
                                    </div>
                                            
                                        
                                    </article>
                                </div>
                                
                               
                                @endif

                                <!- Sierra ->
                                @if($region->id_region==2)
                                <div class="shortcode-banner style-animated  iso-item filter-all filter-website filter-sierra" >
                                   <article class="post">
                                   <figure ><img src="{{ asset('images/icon/'.$region->filename)}}" alt=""></figure>
                                   
                                     @if(session('device')!='mobile')
                                
                                        <div class="shortcode-banner-inside" style=" width: 108%;">
                                            @else
                                            <div class="shortcode-banner-inside" style=" width: 112%;">
                                            @endif
                                    <div class="shortcode-banner-content">
                                        <h3 class="banner-title">{!!$region->nombre_servicio!!}</h3>
                                        <div class="details">
                                            <p>{!!$region->detalle_servicio!!}</p>
                                        </div>
                                    </div>
                                </div>
                                    <div class="portfolio-hover-holder">
                                        <div class="portfolio-text">
                                            <div class="portfolio-text-inner">
                                                <h5 class="portfolio-title">{!!$region->nombre_servicio!!}</h5> - <span class="portfolio-category">{{ trans('publico/labels.label14')}}</span>
                                            </div>
                                        </div>
                                        <span class="portfolio-action">
                                            <a class="soap-mfp-popup" href="{{ asset('images/fullsize/'.$region->filename)}}">
                                                <i class="fa fa-eye has-circle"></i></a>
                                            <a onclick="$('.iso-container').LoadingOverlay('show');window.location.href = '{!!asset('/getProvinciaDescipcion')!!}/{!!$region->id_geo!!}/{!!$region->id!!}'" style="cursor:pointer"><i class="fa fa-chain has-circle"></i></a>
                                        </span>
                                    </div>
                                            
                                        
                                    </article>
                                </div>
                                @endif

                                <!-Oriente ->
                                @if($region->id_region==3)
                                <div class="shortcode-banner style-animated  iso-item filter-all filter-oriente ">
                                   <article class="post">
                                   <figure ><img src="{{ asset('images/icon/'.$region->filename)}}" alt=""></figure>
                                   
                                     @if(session('device')!='mobile')
                                
                                        <div class="shortcode-banner-inside" style=" width: 108%;">
                                            @else
                                            <div class="shortcode-banner-inside" style=" width: 112%;">
                                            @endif
                                    <div class="shortcode-banner-content">
                                        <h3 class="banner-title">{!!$region->nombre_servicio!!}</h3>
                                        <div class="details">
                                            <p>{!!$region->detalle_servicio!!}</p>
                                        </div>
                                    </div>
                                </div>
                                    <div class="portfolio-hover-holder">
                                        <div class="portfolio-text">
                                            <div class="portfolio-text-inner">
                                                <h5 class="portfolio-title">{!!$region->nombre_servicio!!}</h5> - <span class="portfolio-category">{{ trans('publico/labels.label15')}}</span>
                                            </div>
                                        </div>
                                        <span class="portfolio-action">
                                            <a class="soap-mfp-popup" href="{{ asset('images/fullsize/'.$region->filename)}}">
                                                <i class="fa fa-eye has-circle"></i></a>
                                            <a onclick="$('.iso-container').LoadingOverlay('show');window.location.href = '{!!asset('/getProvinciaDescipcion')!!}/{!!$region->id_geo!!}/{!!$region->id!!}'" style="cursor:pointer"><i class="fa fa-chain has-circle"></i></a>
                                        </span>
                                    </div>
                                            
                                        
                                    </article>
                                </div>
                                @endif

                                <!-Galapagos ->

                                @if($region->id_region==4)
                                
                                
                                <div class=" shortcode-banner style-animated  iso-item filter-all filter-galapagos">
                                   <article class="post">
                                   <figure ><img src="{{ asset('images/icon/'.$region->filename)}}" alt="">
                                   
                                   </figure> 
                                   
                                @if(session('device')!='mobile')
                                
                                        <div class="shortcode-banner-inside" style=" width: 108%;">
                                            @else
                                            <div class="shortcode-banner-inside" style=" width: 112%;">
                                            @endif
                                    <div class="shortcode-banner-content">
                                        <h3 class="banner-title">{!!$region->nombre_servicio!!}</h3>
                                        <div class="details">
                                            <p>{!!$region->detalle_servicio!!}</p>
                                        </div>
                                    </div>
                                </div>
                                   
                                         <div class="portfolio-hover-holder">
                                        <div class="portfolio-text">
                                            <div class="portfolio-text-inner">
                                                <h5 class="portfolio-title">{!!$region->nombre_servicio!!}</h5> - <span class="portfolio-category">{{ trans('publico/labels.label15')}}</span>
                                            </div>
                                        </div>
                                        <span class="portfolio-action">
                                            <a class="soap-mfp-popup" href="{{ asset('images/fullsize/'.$region->filename)}}">
                                                <i class="fa fa-eye has-circle"></i></a>
                                            <a onclick="$('.iso-container').LoadingOverlay('show');window.location.href = '{!!asset('/getProvinciaDescipcion')!!}/{!!$region->id_geo!!}/{!!$region->id!!}'" style="cursor:pointer"><i class="fa fa-chain has-circle"></i></a>
                                        </span>
                                    </div>
                                            
                                        
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




    </body>


</html>