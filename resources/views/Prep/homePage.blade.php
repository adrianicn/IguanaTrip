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
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <meta name="description" content="iWanaTrip.com">
        <meta name="author" content="iWanaTrip team">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Theme Styles -->
        <link rel="stylesheet" href="{{ asset('public/public_components/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('public/public_components/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{ asset('public/public_components/search_inbox/css/default.css')}}">
        <link rel="stylesheet" href="{{ asset('public/public_components/search_inbox/css/component.css')}}">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,400italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Dosis:400,300,500,600,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ asset('public/public_components/css/animate.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/public_components/components/owl-carousel/owl.carousel.css')}}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('public/public_components/components/owl-carousel/owl.transitions.css')}}" media="screen" />
        <!-- Magnific Popup core CSS file -->
        <link rel="stylesheet" href="{{ asset('public/public_components/components/magnific-popup/magnific-popup.css')}}"> 
        <link rel="stylesheet" type="text/css" href="{{ asset('public/public_components/components/revolution_slider/css/settings.css')}}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('public/public_components/components/revolution_slider/css/style.css')}}" media="screen" />

        <!-- Main Style -->
        <link id="main-style" rel="stylesheet" href="{{ asset('public/public_components/css/style.css')}}">

        <!-- Updated Styles -->
        <link rel="stylesheet" href="{{ asset('public/public_components/css/updates.css')}}">

        <!-- Custom Styles -->
        <link rel="stylesheet" href="{{ asset('public/public_components/css/custom.css')}}">

        <!-- Responsive Styles -->
        <link rel="stylesheet" href="{{ asset('public/public_components/css/responsive.css')}}">

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
        
        <style>
            .ui-menu {
    box-shadow: 0 -1px 3px rgba(0, 0, 0, 0.11);
    background:rgba(255, 255, 255, 0.9) none repeat scroll 0 0;
    width: 240px;
            }
        </style>
        <div id="page-wrapper">
            <header id="header" class="header-color-white">
                @include('public_page.reusable.header')
            </header>
            <div id="slideshow">
                <div class="revolution-slider">
                    <ul>    <!-- SLIDE  -->
                        <li data-slotamount="7" 
                            data-transition="notransition" 
                            class="tp-revslider-slidesli active-revslide current-sr-slide-visible">
                            <!-- MAIN IMAGE -->
                            <div  data-bgfit="cover" style="width:100%;height:100%;" class="slotholder">
                                <div style="background-color: transparent; 
                                     background-repeat: no-repeat; 
                                     background-image: url('{{ asset('public/img/index-fondo.jpg')}}'); 
                                     background-size: cover; 
                                     background-position: center center;
                                     width: 100%; height: 100%; opacity: 1; 
                                     visibility: inherit;" 
                                     data-src="{{ asset('public/images/backgrounds/gradient.png')}}"
                                     src="{{ asset('public/img/index-rodelas.png')}}" 
                                     data-bgrepeat="no-repeat" 
                                     data-bgposition="center center" data-bgfit="cover" 
                                     class="tp-bgimg defaultimg">
                                </div>
                            </div>
                            <!-- LAYERS -->
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
                                 data-y="35" data-x="-280" class="tp-caption sfl fadeout start">
                                <img alt="" src="{{ asset('public/img/index-logo.png')}}" >
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
              @if($location->city!="")
            <?php
            $titulo = $location->city;
            ?>
            @else
            $titulo="Ecuador";
            @endif
            <section id="content">
                <div class="container">
                    <div class="heading-box col-md-10 col-lg-8">
                        <h2 class="box-title">{{ trans('publico/labels.label61')}} <em class="skin-color">{{ trans('publico/labels.label62')}} </em> {{ trans('publico/labels.label63')}}
                            
                    
                              <h2>
                           <div >
                            
                                <div class="search-box">
                                        <input type="text" value="{!!$titulo!!}"  placeholder="{{ trans('publico/labels.label64')}}" name="ciudad" id="ciudad">
                                        <span><i class="fa fa-search search-city" style="cursor: pointer"></i></span>
                                </div>
                            
                        </div>
                          </h2>  
                    </div>
                    <div id="main">
                        <div class="post-wrapper">
                           <div class="post-filters">
                                <a href="#" class="btn btn-sm style4 hover-blue active" data-filter="filter-alls">{{ trans('publico/labels.label12')}}</a>
                                <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-atracciones">{{ trans('publico/labels.label65')}}</a>
                                <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-eventos">{{ trans('publico/labels.label32')}}</a>
                                <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-promo">{{ trans('publico/labels.label33')}}</a>
                                
                            </div>
                            <div class="iso-container iso-col-4 style-masonry eventsPromo">
                           
                                @section('eventsPromo')
                                @show
                                
                            </div>
                            <div class="text-center">
                                <a  class="btn style4 hover-blue load-more moreImagesEvents">{{ trans('publico/labels.label31')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>                   

            <div class="parallax parallax-image1" data-stellar-background-ratio="0.1">
                <div class="section text-center">
                    <div class="container">
                        <div class="heading-box">
                            <h2 class="box-title color-white">{{ trans('publico/labels.label30')}}</h2>
                        </div>
                        <div class="features-icon-slider owl-carousel box-lg" data-items="6">
                           
                                @if(session('locale') == 'es' )
                                           <a href="{!!asset('/tokenDz$rip')!!}/1"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-cutlery"></i><div style="alignment-baseline: central">Alimentación y bebidas</div></a>
                            <a href="{!!asset('/tokenDz$rip')!!}/2"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-bed"></i><div style="alignment-baseline: central">Alojamiento</div></a>
                            <a href="{!!asset('/tokenDz$rip')!!}/3"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-suitcase"></i><div style="alignment-baseline: central">Agencias de viajes</div></a>
                            <a href="{!!asset('/tokenDz$rip')!!}/4"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-map-marker"></i><div style="alignment-baseline: central">Lugares</div></a>
                            <a href="{!!asset('/tokenDz$rip')!!}/8"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-hand-scissors-o"></i><div style="alignment-baseline: central">Eventos</div></a>
                            <a href="{!!asset('/tokenDz$rip')!!}/9"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-users"></i><div style="alignment-baseline: central">Festividades</div></a>
                            

                                            @else
                            <a href="{!!asset('/tokenDz$rip')!!}/1"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-cutlery"></i><div style="alignment-baseline: central">Eat & drink</div></a>
                            <a href="{!!asset('/tokenDz$rip')!!}/2"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-bed"></i><div style="alignment-baseline: central">Sleep</div></a>
                            <a href="{!!asset('/tokenDz$rip')!!}/3"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-suitcase"></i><div style="alignment-baseline: central">Travel agency</div></a>
                            <a href="{!!asset('/tokenDz$rip')!!}/4"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-map-marker"></i><div style="alignment-baseline: central">Places</div></a>
                            <a href="{!!asset('/tokenDz$rip')!!}/8"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-hand-scissors-o"></i><div style="alignment-baseline: central">Events</div></a>
                            <a href="{!!asset('/tokenDz$rip')!!}/9"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-users"></i><div style="alignment-baseline: central">Festivities</div></a>
                            

                                            @endif
                           

                        </div>
                        <h3 class="skin-color">Fully Adaptive to All Screen Sizes</h3>
                        <p>iWanaTrip is designed in a way that it automatically adjusts to any screen which makes it a true responsive design.<br>
                            Each and every design element was created in a way that it will not look lame when seen on smaller screen size.</p>
                    </div>
                </div>
            </div>

          

            <section id="content" class="no-padding">
                <div class="section no-padding">
                    <h2 class="section-title">Discover Ecuador</h2>
                    <div class="post-wrapper">
                        <div class="iso-container iso-col-4 style-fancy">
                               <div class="shortcode-banner style-animated iso-item  filter-all " >
                                    <article class="post">
                                   <figure ><img src="{{ asset('public/img/ocio.jpg')}}" alt=""></figure>
                                     @if(session('device')!='mobile')
                                        <div class="shortcode-banner-inside" style=" width: 108%;">
                                            @else
                                            <div class="shortcode-banner-inside" style=" width: 112%;">
                                            @endif
                                    <div class="shortcode-banner-content">
                                        <h3 class="banner-title">Ocio</h3>
                                        <div class="details">
                                            <p>Son los eventos más destacados y recientes de cada región del país</p>
                                        </div>
                                    </div>
                                </div>
                                 
                                    </article>
                                </div>
                                        <div class="shortcode-banner style-animated iso-item  filter-all " >
                                    <article class="post">
                                   <figure ><img src="{{ asset('public/img/adventure.jpg')}}" alt=""></figure>
                                     @if(session('device')!='mobile')
                                        <div class="shortcode-banner-inside" style=" width: 108%;">
                                            @else
                                            <div class="shortcode-banner-inside" style=" width: 112%;">
                                            @endif
                                    <div class="shortcode-banner-content">
                                        <h3 class="banner-title">Aventura</h3>
                                        <div class="details">
                                            <p>Son los eventos más destacados y recientes de cada región del país</p>
                                        </div>
                                    </div>
                                </div>
                                 
                                    </article>
                                </div>
                                        <div class="shortcode-banner style-animated iso-item  filter-all " >
                                    <article class="post">
                                   <figure ><img src="{{ asset('public/img/rsz_quito.jpg')}}" alt=""></figure>
                                     @if(session('device')!='mobile')
                                        <div class="shortcode-banner-inside" style=" width: 108%;">
                                            @else
                                            <div class="shortcode-banner-inside" style=" width: 112%;">
                                            @endif
                                    <div class="shortcode-banner-content">
                                        <h3 class="banner-title">Cultura</h3>
                                        <div class="details">
                                            <p>Son los eventos más destacados y recientes de cada región del país</p>
                                        </div>
                                    </div>
                                </div>
                                 
                                    </article>
                                </div>
                                        <div class="shortcode-banner style-animated iso-item  filter-all " >
                                    <article class="post">
                                   <figure ><img src="{{ asset('public/img/tour.jpg')}}" alt=""></figure>
                                     @if(session('device')!='mobile')
                                        <div class="shortcode-banner-inside" style=" width: 108%;">
                                            @else
                                            <div class="shortcode-banner-inside" style=" width: 112%;">
                                            @endif
                                    <div class="shortcode-banner-content">
                                        <h3 class="banner-title">Tours</h3>
                                        <div class="details">
                                            <p>Son los eventos más destacados y recientes de cada región del país</p>
                                        </div>
                                    </div>
                                </div>
                                 
                                    </article>
                                </div>
                        </div>
                    </div>
            </section>
            
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
                            <div class="iso-container iso-col-4 style-masonry topPlaces">
                             
                                @section('topPlaces')
                                @show

                            </div>
                            <div class="text-center">
                                <a  class="btn style4 hover-blue load-more moreImagesTop">{{ trans('publico/labels.label31')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
                    
                           

            <footer id="footer" class="style4">
                @include('public_page.reusable.footer')
            </footer>
        </div>

        <!-- Javascript -->
        {!! HTML::script('public/js/jquery.js') !!}
        {!!HTML::script('public/js/js_public/Compartido.js') !!}
        {!!HTML::script('public/js/loadingScreen/loadingoverlay.min.js') !!}
        {!!HTML::script('public/js/jquery.autocomplet.js') !!}

  


        <script type="text/javascript" src="{{ asset('public/public_components/js/jquery-2.1.3.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('public/public_components/js/jquery.noconflict.js')}}"></script>
        <script type="text/javascript" src="{{ asset('public/public_components/js/modernizr.2.8.3.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('public/public_components/js/jquery-migrate-1.2.1.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('public/public_components/js/jquery-ui.1.11.2.min.js')}}"></script>

        <!-- Twitter Bootstrap -->
        <script type="text/javascript" src="{{ asset('public/public_components/js/bootstrap.min.js')}}"></script>

        <!-- Magnific Popup core JS file -->
        <script type="text/javascript" src="{{ asset('public/public_components/components/magnific-popup/jquery.magnific-popup.min.js')}}"></script> 

        <!-- parallax -->
        <script type="text/javascript" src="{{ asset('public/public_components/js/jquery.stellar.min.js')}}"></script>

        <!-- waypoint -->
        <script type="text/javascript" src="{{ asset('public/public_components/js/waypoints.min.js')}}"></script>

        <!-- Owl Carousel -->
        <script type="text/javascript" src="{{ asset('public/public_components/components/owl-carousel/owl.carousel.min.js')}}"></script>

        <!-- load revolution slider scripts -->
        <script type="text/javascript" src="{{ asset('public/public_components/components/revolution_slider/js/jquery.themepunch.tools.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('public/public_components/components/revolution_slider/js/jquery.themepunch.revolution.min.js')}}"></script>

        <!-- plugins -->
        <script type="text/javascript" src="{{ asset('public/public_components/js/jquery.plugins.js')}}"></script>

        <!-- load page Javascript -->
        <script type="text/javascript" src="{{ asset('public/public_components/js/main.js')}}"></script>
        <script type="text/javascript" src="{{ asset('public/public_components/js/revolution-slider.js')}}"></script>

        <script>
            $(document).ready(function () {
                var valor=$("#ciudad").val();
                GetDataAjaxTopPlaces("{!!asset('/getTopPlaces')!!}?page=1");
                GetDataAjaxEventsInd("{!!asset('/getEventscloseToMe')!!}/"+valor+"?page=1");
            });
            $(".moreImagesTop").click(function () {
                GetDataAjaxTopPlacesHome("{!!asset('/getTopPlaces')!!}");
            });
            
            $(".moreImagesEvents").click(function () {
            var valor=$("#ciudad").val();    
                GetDataAjaxEventsHome("{!!asset('/getEventscloseToMe')!!}/"+valor);
            });

            
            $(".search-city").click(function () {
            var valor=$("#ciudad").val();
                window.current_page_e=1;
                GetDataAjaxEventsIndbyCity("{!!asset('/getEventscloseToMe')!!}/"+valor+"?page=1");
            });


$('#ciudad').keypress(function (e) {
 var key = e.which;
 if(key == 13)  // the enter key code
  {window.current_page_e=1;
      var valor=$("#ciudad").val();
    GetDataAjaxEventsIndbyCity("{!!asset('/getEventscloseToMe')!!}/"+valor+"?page=1");
  }
}); 



  $(function() {

    var availableTags = [
        
        'ECUADOR',
'AZUAY',
'BOLIVAR',
'CAÑAR',
'CARCHI',
'COTOPAXI',
'CHIMBORAZO',
'EL ORO',
'ESMERALDAS',
'GUAYAS',
'IMBABURA',
'LOJA',
'LOS RIOS',
'MANABI',
'MORONA SANTIAGO',
'NAPO',
'PASTAZA',
'PICHINCHA',
'TUNGURAHUA',
'ZAMORA CHINCHIPE',
'GALAPAGOS',
'SUCUMBIOS',
'ORELLANA',
'SANTA ELENA',
'SANTO DOMINGO TSACHILAS',
'CUENCA',
'GIRON',
'GUALACEO',
'NABON',
'PAUTE',
'PUCARA',
'SAN FERNANDO',
'SANTA ISABEL',
'SIG-SIG',
'OÑA',
'CHORDELEC',
'EL PAN',
'SEVILLA DE ORO',
'GUACHAPALA',
'CAMILO PONCE ENRIQUEZ',
'GUARANDA',
'CHILLANES',
'CHIMBO',
'ECHEANDIA',
'SAN MIGUEL',
'CALUMA',
'LAS NAVES',
'AZOGUES',
'BIBLIAN',
'CAÑAR',
'LA TRONCAL',
'EL TAMBO',
'DELEG',
'SUSCAL',
'TULCAN',
'BOLIVAR',
'ESPEJO / EL ANGEL',
'MIRA',
'MONTUFAR / SAN GABRIEL',
'S.PEDRO HUACA',
'LATACUNGA',
'LA MANA',
'PANGUA CORAZON',
'PUJILI',
'SALCEDO',
'SAQUISILI',
'SIGCHOS',
'RIOBAMBA',
'ALAUSÍ',
'COLTA',
'CHAMBO',
'CHUNCHI',
'GUAMOTE',
'GUANO',
'PALLATANGA',
'PENIPE',
'CUMANDA',
'MACHALA',
'ARENILLAS',
'ATAHUALPA',
'BALSAS',
'CHILLA',
'EL GUABO',
'HUAQUILLAS',
'MARCABELI',
'PASAJE',
'PIÑAS',
'PORTOVELO',
'SANTA ROSA',
'ZARUMA',
'LAS LAJAS',
'ESMERALDAS',
'ELOY ALFARO VALDEZ',
'MUISNE',
'QUININDE',
'SAN LORENZO',
'ATACAMES',
'RIO VERDE',
'LA CONCORDIA',
'GUAYAQUIL',
'ALFREDO BAQUERIZO MORENO - JUJAN',
'BALAO',
'BALZAR',
'COLIMES',
'DAULE',
'DURAN-ELOY ALFARO',
'EL EMPALME',
'EL TRIUNFO',
'MILAGRO',
'NARANJAL',
'NARANJITO',
'PALESTINA',
'PEDRO CARBO',
'SALINAS',
'SAMBORONDÓN',
'SANTA ELENA',
'SANTA LUCIA',
'URBINA JADO (SALITRE)',
'YAGUACHI',
'PLAYAS',
'SIMON BOLIVAR',
'CRNEL.M. MARIDUEÑA',
'LOMAS SARGENTILLO',
'NOBOL',
'LA LIBERTAD',
'GRAL ANTONIO ELIZALDE - BUCAY',
'ISIDRO AYORA',
'SALIT',
'IBARRA',
'ANTONIO ANTE-ATUNTAQUI',
'COTACACHI',
'OTAVALO',
'PIMAMPIRO',
'SAN MIGUEL URCUQUI',
'LOJA',
'CALVAS-CARIAMANGA',
'CATAMAYO',
'CELICA',
'CHAGUARPAMBA',
'ESPINDOLA',
'GONZANAMA',
'MACARA',
'PALTAS',
'PUYANGO',
'SARAGURO',
'SOZORANGA',
'ZAPOTILLO',
'PINDAL',
'QUILANGA',
'OLMEDO',
'BABAHOYO',
'BABA',
'MONTALVO',
'PUEBLO VIEJO',
'QUEVEDO',
'CATARAMA - URDANETA',
'VENTANAS',
'VINCES',
'PALENQUE',
'BUENA FE',
'VALENCIA',
'MOCACHE',
'QUINSALOMA',
'PORTOVIEJO',
'BOLIVAR-CALCETA',
'CHONE',
'EL CARMEN',
'FLAVIO ALFARO',
'JIPIJAPA',
'JUNÍN',
'MANTA',
'MONTECRISTI',
'PAJAN',
'PICHINCHA',
'ROCAFUERTE',
'SANTA ANA',
'SUCRE-BAHIA CARÁQUEZ',
'TOSAGUA',
'24 DE MAYO',
'PEDERNALES',
'OLMEDO',
'PUERTO LOPEZ',
'JAMA',
'JARAMIJO',
'SAN  VICENTE',
'MORONA',
'GUALAQUIZA',
'LIMÓN INDANZA',
'PALORA',
'SANTIAGO MENDEZ',
'SUCUA',
'HUAMBOYA',
'SAN JUAN BOSCO',
'TAISHA',
'LOGROÑO',
'PABLO SEXTO',
'TIWINTZA',
'TENA',
'ARCHIDONA',
'EL CHACO',
'QUIJOS-BAEZA',
'C.J.AROSEMENA',
'PASTAZA',
'MERA',
'SANTA CLARA',
'ARAJUNO',
'QUITO',
'CAYAMBE',
'MEJIA-MACHACHI',
'P. MONCAYO-TABACUNDO',
'RUMIÑAHUI-SANGOLQUÍ',
'SANTO DOMINGO',
'S. MIGUEL BANCOS',
'PEDRO V. MALDONADO',
'PUERTO QUITO',
'NANEGAL',
'AMBATO',
'BAÑOS',
'CEVALLOS',
'MOCHA',
'PATATE',
'QUERO',
'PELILEO',
'PILLARO',
'TISALEO',
'ZAMORA',
'CHINCHIPE ZUMBA',
'NANGARITZA',
'YACUAMBI',
'YANTZAZA',
'EL PANGUI',
'CENTINELA CÓNDOR',
'PALANDA',
'PAQUISHA',
'SAN CRISTOBAL',
'ISABELA',
'SANTA CRUZ',
'NUEVA LOJA- L.AGRIO',
'GONZALO PIZARRO',
'PUTUMAYO',
'SHUSHUFINDI',
'SUCUMBIOS-BONITA',
'CASCALES',
'CUYABENO',
'TARAPOA',
'FCO. ORELLANA',
'AGUARICO',
'LA JOYA DE LOS SACHAS',
'LORETO',
'SANTA ELENA',
'SALINAS',
'LA LIBERTAD',
'SANTO DOMINGO',
'CHECA JIDCAY',
'CHIQUINTAD',
'CUMBE',
'EL BATAN',
'EL VECINO',
'HERMANO MIGUEL',
'HUAYNACAPAC',
'LLACAO',
'MACHANGARA',
'MOLLETURO',
'MONAY',
'MULTI / NULTI',
'OCTAVIO CORDERO PALACIOS',
'PACCHA',
'QUINGEO',
'RAMIREZ DAVALOS',
'RICAURTE',
'SAGRARIO',
'SAN BLAS',
'SAN JOAQUIN',
'SAN SEBASTIAN',
'SANTA ANA',
'SAYAUSI',
'SIDCAY',
'SININCAY',
'SUCRE',
'TARQUI',
'TOTORACOCHA',
'TURI',
'VALLE',
'VICTORIA DEL PORTETE',
'YANUNCAY',
'BAÑOS',
'BELLAVISTA',
'CAÑARIBAMBA',
'CHAUCHA / ANGAS',
'ASUNCION',
'GIRON',
'SAN GERARDO',
'GUALACEO',
'ZHIDMAD',
'DANIEL CORDOVA TORAL',
'GUALACEO',
'JADAN',
'LUIS CORDERO VEGA',
'MARIANO MORENO/CALLASAY',
'REMIGIO CRESPO TORAL',
'SAN JUAN',
'SIMON BOLIVAR',
'COCHAPATA',
'EL PROGRESO',
'NABON',
'NIEVES',
'BULAN / J. VICTOR IZQUIERDO',
'CHICAN / GUILLERMO ORTEGA',
'DUG-DUG',
'EL CABO',
'GUARAINAC',
'PAUTE',
'SAN CRISTOBAL',
'TOMEBAMBA',
'PUCARA',
'SAN RAFAEL DE SHARUG',
'CHUMBLIN',
'SAN FERNANDO',
'ABDON CALDERON / LA UNION',
'SAN SALVADOR DE CAÑARIBAMBA',
'SANTA ISABEL',
'SHAGLLI',
'CUTCHIL',
'GIMA',
'GUEL',
'LUDO',
'SAN BARTOLOME',
'SAN JOSE DE RARANGA',
'SIGSIG',
'OÑA',
'SUSUDEL',
'CHORDELEG',
'LA UNION',
'LUIS GALARZA O. (DELEGSOL)',
'PRINCIPAL',
'SAN MARTIN DE PUZHIO',
'EL PAN',
'SAN VICENTE',
'AMALUZA',
'PALMAS',
'SEVILLA DE ORO',
'GUACHAPALA',
'CAMILO PONCE ENRIQUEZ',
'EL CARMEN DE PIJILI',
'ANGEL POLIVIO CHAVEZ',
'SANTA FE',
'SIMIATUG',
'FACUNDO VELA',
'GABRIEL I VEINTIMILLA',
'GUANUJO',
'JULIO E MORENO',
'SALINAS',
'SAN LORENZO',
'SAN LUIS DE PAMBIL',
'SAN SIMON',
'CHILLANES',
'SAN JOSE DE TAMBO',
'ASUNCION',
'MAGDALENA/CHAPACOTO',
'SAN JOSE DE CHIMBO',
'SAN SEBASTIAN',
'TELIMBELA',
'ECHEANDIA',
'BALZAPAMBA',
'BILOVAN',
'REGULO DE MORA',
'SAN MIGUEL',
'SAN PABLO DE ATENAS',
'SAN VICENTE',
'SANTIAGO',
'LAS MERCEDES',
'LAS NAVES',
'AURELIO BAYAS MARTINEZ',
'SAN FRANCISCO',
'SAN MIGUEL',
'TADAY',
'AZOGUES',
'BORRERO',
'COJITAMBO',
'GUAPAN',
'JAVIER LOYOLA / CHUQUIPATA',
'LUIS CORDERO',
'PINDILIG',
'RIVERA',
'BIBLIAN',
'JERUSALEN',
'NAZON',
'SAN FCO. DE SAGEO',
'TURUPAMBA',
'CAÑAR',
'SAN ANTONIO',
'VENTURA',
'ZHUD',
'CHONTAMARCA',
'CHOROCOPTE',
'DUCUR',
'GRAL.MORALES / SOCARTE',
'GUALLETURO',
'HONORATO VASQUEZ',
'INGAPIRCA',
'JUNCAL',
'LA TRONCAL',
'MANUEL J. CALLE',
'PANCHO NEGRO',
'EL TAMBO',
'DELEG',
'SOLANO',
'SUSCAL',
'EL CARMELO/EL PUN/',
'TULCAN',
'URBINA',
'EL CHICAL',
'GONZALEZ SUAREZ',
'JULIO ANDRADE',
'MALDONADO',
'PIOTER',
'SANTA MARTHA DE CUBA',
'TOBAR DONOSO',
'TUFIÑO',
'BOLIVAR',
'GARCIA MORENO',
'LOS ANDES',
'MONTEOLIVO',
'SAN RAFAEL',
'SAN VICENTE DE PUSIR',
'27 DE SEPTIEMBRE',
'EL ANGEL',
'EL GOALTAL / LAS JUNTAS',
'LA LIBERTAD',
'SAN ISIDRO',
'JIJON Y CAAMAÑO',
'JUAN MONTALVO',
'LA CONCEPCION',
'MIRA',
'CHITAN DE NAVARRETES',
'CRISTOBAL COLON',
'FERNANDEZ SALVADOR',
'GONZALEZ SUAREZ',
'LA PAZ',
'PIARTAL',
'SAN GABRIEL',
'SAN JOSE',
'HUACA',
'MARISCAL SUCRE',
'11 DE NOVIEMBRE',
'MULALO',
'POALO',
'SAN BUENAVENTURA',
'SAN JUAN DE PASTOCALLE',
'TANICUCHI',
'TOACAZO',
'ALAQUEZ',
'BELISARIO QUEVEDO',
'ELOY ALFARO / SAN FELIPE',
'GUAYTACAMA',
'IGNACIO FLORES',
'JOSEGUANGO BAJO',
'JUAN MONTALVO',
'LA MATRIZ',
'EL CARMEN',
'EL TRIUNFO',
'GUASAGANDA',
'LA MANA',
'PUCAYACO',
'EL CORAZON',
'MORASPUNGO',
'PINLLOPATA',
'RAMON CAMPAÑA',
'ANGAMARCA',
'GUANGAJE',
'LA VICTORIA',
'PILALO',
'PUJILI',
'TINGO',
'ZUMBAHUA',
'ANTONIO J. HOLGUIN',
'CUSUBAMBA',
'MULALILLO',
'MULLIQUINDIL',
'PANZALEO',
'SAN MIGUEL DE SALCEDO',
'CANCHAGUA',
'CHANTILIN',
'COCHAPAMBA',
'SAQUISILI',
'CHUGCHILAN',
'ISINLIVI',
'LAS PAMPAS',
'PALO QUEMADO',
'SIGCHOS',
'CACHA',
'PUNIN',
'QUIMIAG',
'SAN JUAN',
'SAN LUIS',
'VELASCO',
'VELOZ',
'YARUQUIES',
'CALPI',
'CUBIJIES',
'FLORES',
'LICAN',
'LICTO',
'LIZARZABURU',
'MALDONADO',
'PUNGALA',
'ACHUPALLAS',
'TIXAN',
'ALAUSI',
'GUASUNTOS',
'HUIGRA',
'MULTITUD',
'PISTISHI',
'PUMALLACTA',
'SEVILLA',
'SIBAMBE',
'CAJABAMBA',
'CANI',
'COLUMBE',
'JUAN DE VELASCO / PONGOR',
'SANTIAGO DE QUITO',
'SICALPA',
'CHAMBO',
'CAPZOL',
'CHUNCHI',
'COMPUD',
'GONZOL',
'LLAGOS',
'CEBADAS',
'GUAMOTE',
'PALMIRA',
'EL ROSARIO',
'SANTA FE DE GALAN',
'VALPARAISO',
'GUANANDO',
'ILAPO',
'LA MATRIZ',
'LA PROVIDENCIA',
'SAN ANDRES',
'SAN GERARDO / PAQUICAHUAN',
'SAN ISIDRO DE PATULU',
'SAN JOSE DEL CHAZO',
'PALLATANGA',
'BILBAO',
'EL ALTAR',
'LA CANDELARIA',
'MATUS',
'PENIPE',
'PUELA',
'SAN ANTONIO DE BAYUSHIG',
'CUMANDA',
'9 DE MAYO',
'EL CAMBIO',
'EL RETIRO',
'LA PROVIDENCIA',
'MACHALA',
'PUERTO BOLIVAR',
'ARENILLAS',
'CARCABON',
'CHACRAS',
'PALMALES',
'AYAPAMBA',
'CORDONCILLO',
'MILAGRO',
'PACCHA',
'SAN JOSE',
'SAN JUAN DE CERRO AZUL',
'BALSAS',
'BELLAMARIA',
'CHILLA',
'BARBONES',
'EL GUABO',
'LA IBERIA',
'RIO BONITO',
'TENDALES',
'ECUADOR',
'EL PARAISO',
'HUALTACO',
'HUAQUILLAS',
'MILTON REYES',
'UNION LOJANA',
'EL INGENIO',
'MARCABELI',
'BOLIVAR',
'TRES CERRITOS',
'UZHCURRUMI',
'BUENAVISTA',
'CAÑAQUEMADA',
'CASACAY',
'LA PEAÑA',
'LOMA DE FRANCO',
'OCHOA LEON/MATRIZ',
'PASAJE',
'PROGRESO',
'CAPIRO',
'LA BOCANA',
'LA SUSAYA',
'MOROMORO',
'PIEDRAS',
'PIÑAS',
'PIÑAS GRANDE',
'SAN ROQUE',
'SARACAY',
'CURTINCAPAC',
'MORALES',
'PORTOVELO',
'SALATI',
'BALNEARIO JAMBELI',
'SANTA ROSA',
'TORATA',
'VICTORIA',
'BELLAMARIA',
'BELLAVISTA',
'JAMBELI',
'JUMON',
'LA AVANZADA',
'NUEVO SANTA ROSA',
'PUERTO JELI',
'SAN ANTONIO',
'ABANIN',
'ZARUMA',
'ARCAPAMBA',
'GUANAZAN',
'GUIZHAGUIÑA',
'HUERTAS',
'MALVAS',
'MULUNCAY GRANDE',
'SALVIAS',
'SINSAO',
'EL PARAISO',
'LA LIBERTAD',
'LA VICTORIA/LAS LAJAS',
'PLATANILLOS',
'SAN ISIDRO',
'VALLE HERMOSO',
'5 DE AGOSTO',
'SIMON PLATA TORRES',
'TABIAZO',
'TACHINA',
'VUELTA LARGA',
'BARTOLOME RUIZ',
'CAMARONES',
'CHINCA',
'CRNL.CARLOS CONCHA TORRES',
'ESMERALDAS',
'LUIS TELLO / LAS PALMAS /',
'MAJUA',
'SAN MATEO',
'ANCHAYACU',
'SAN JOSE DE CAYAPAS',
'SANTA LUCIA DE LAS PEÑAS',
'SANTO DOMINGO DE ONZOLE',
'SELVA ALEGRE',
'TELEMBI',
'TIMBIRE',
'VALDEZ/LIMONES/',
'ATAHUALPA/CAMARONES',
'BORBON',
'COLON ELOY DE MARIA',
'LA TOLA',
'LUIS VARGAS TORRES',
'MALDONADO',
'PAMPANAL DE BOLIVAR',
'SAN FRANCISCO DE ONZOLE',
'BOLIVAR',
'DAULE',
'GALERA',
'MUISNE',
'QUINGUE',
'SALIMA',
'SAN FRANCISCO',
'SAN GREGORIO',
'SAN JOSE DE CHAMANGA',
'CHURA',
'CUBE / CHANCAMA',
'LA UNION',
'MALIMPIA / GUAYLLABAMBA',
'ROSA ZARATE',
'VICHE',
'5 DE JUNIO/HUIMBI',
'SANTA RITA',
'TAMBILLO',
'TULULBI /RICAURTE',
'URBINA',
'ALTO TAMBO/GUADAL',
'ANCON/PALMA REAL',
'CALDERON',
'CARONDELET',
'CONCEPCION',
'MATAJE',
'SAN JAVIER DE CACHABI',
'SAN LORENZO',
'ATACAMES',
'LA UNION',
'SUA/BOCANA',
'TONCHIGUE',
'TONSUPA',
'CHONTADURO',
'CHUMUNDE',
'LAGARTO',
'MONTALVO / HORQUETA',
'RIO VERDE',
'ROCAFUERTE',
'LA CONCORDIA',
'LA VILLEGAS',
'MONTERREY',
'PLAN PILOTO',
'9 DE OCTUBRE',
'OLMEDO/SAN ALEJO',
'PASCUALES',
'POSORJA',
'PUNA',
'ROCA',
'ROCAFUERTE',
'SUCRE',
'TARQUI',
'TENGUEL',
'URDANETA',
'AYACUCHO',
'XIMENA',
'BOLIVAR/SAGRARIO',
'CARBO/CONCEPCION',
'FEBRES CORDERO',
'GARCIA MORENO',
'JUAN GOMEZ RENDON',
'LETAMENDI',
'MORRO',
'A.BAQUERIZO M /JUJAN',
'BALAO',
'BALZAR',
'COLIMES',
'SAN JACINTO',
'BANIFE',
'PADR.JUAN BAUTISTA AGUIRE',
'SANTA CLARA',
'VICENTE PIEDRAHITA',
'DAULE',
'EL LAUREL',
'EMILIANO CAICEDO MARCOS',
'JUAN BAUTISTA AGUIRRE',
'LA AURORA',
'LAS LOJAS',
'LIMONAL',
'MAGRO',
'EL RECREO',
'ELOY ALFARO /DURAN',
'EL ROSARIO',
'GUAYAS / PUERTO NUEVO',
'VELASCO IBARRA',
'EL TRIUNFO',
'CHOBO',
'MARISCAL SUCRE/HUAQUES',
'MILAGRO',
'ROBERTO ASTUDILLO',
'JESUS MARIA',
'NARANJAL',
'SAN CARLOS',
'SANTA ROSA DE FLANDES',
'TAURA',
'NARANJITO',
'PALESTINA',
'PEDRO CARBO',
'SABANILLA',
'VALLE DE LA VIRGEN',
'LA PUNTILLA(SATELITE)',
'SAMBORONDON',
'TARIFA',
'SANTA LUCIA',
'BOCANA',
'CANDILEJOS',
'CENTRAL',
'GRAL. VERNAZA',
'JUNQUILLAL',
'PARAISO',
'SALITRE',
'SAN MATEO',
'VICTORIA',
'GRAL.PEDRO MONTERO',
'VIRGEN DE FATIMA',
'YAGUACHI NUEVO',
'YAGUACHI VIEJO/CONE',
'GRAL.VILLAMIL / PLAYAS',
'CRNEL. LORENZO GARAICOA',
'SIMON BOLIVAR',
'CRNL MARCELINO MARIDUENAS',
'LOMAS DE SARGENTILLO',
'NARCISA DE JESUS',
'GRAL.ELIZALDE /BUCAY',
'ISIDRO AYORA',
'AMBUQUI/CHOTA',
'SALINAS',
'SAN ANTONIO',
'SAN FRANCISCO',
'ANGOCHAGUA',
'CARANQUI',
'CAROLINA /GUALLUPI',
'GUAYAQUIL DE ALPACHACA',
'LA DOLOROSA DEL PRIORATO',
'LA ESPERANZA',
'LITA',
'SAGRARIO',
'ANDRADE MARIN/LOURDES',
'ATUNTAQUI',
'IMBAYA',
'SAN FCO.DE NATABUELA',
'SAN JOSE DE CHALTURA',
'SAN ROQUE',
'6 DE JULIO DE CUELLAJE',
'SAN FRANCISCO',
'VACAS GALINDO',
'APUELA',
'COTACACHI',
'GARCIA MORENO / LLURIMAGUA',
'IMANTAG',
'PEÑAHERRERA',
'PLAZA GUTIERREZ/CALVARIO',
'QUIROGA',
'SAGRARIO',
'DR MIGUEL EGAS/PEGUCHE',
'SAN PABLO',
'SAN RAFAEL',
'SELVA ALEGRE',
'EUGENIO ESPEJO',
'GONZALEZ SUAREZ',
'JORDAN',
'OTAVALO',
'PATAQUI',
'SAN JOSE DE QUICHINCHE',
'SAN JUAN DE ILUMAN',
'SAN LUIS',
'CHUGA',
'MARIANO ACOSTA',
'PIMAMPIRO',
'SAN FRANCISCO DE SIGSIPAMBA',
'CAHUASQUI',
'LA MERCED DE BUENOS AIRES',
'PABLO ARENAS',
'SAN BLAS',
'TUMBABIRO',
'URCUQUI',
'CHANTACO',
'SAN PEDRO DE VILCABAMBA',
'SAN SEBASTIAN',
'SANTIAGO',
'SUCRE',
'TAQUIL /MIGUEL RIOFRIO',
'VALLE',
'VILCABAMBA/VICTORIA',
'YANGANA / ARSENIO CASTILLO',
'CHUQUIRIBAMBA',
'EL CISNE',
'EL SAGRARIO',
'GUALEL',
'JIMBILLA',
'MALACATOS/VALLADOLID',
'QUINARA',
'SAN LUCAS',
'CARIAMANGA',
'CHILE',
'COLAIZACA',
'EL LUCERO',
'SAN VICENTE',
'SANGUILLIN',
'UTUANA',
'CATAMAYO',
'EL TAMBO',
'GUAYQUICHUMA',
'SAN JOSE',
'SAN PEDRO DE LA BENDITA',
'ZAMBI',
'CELICA',
'CRUZPAMBA/BUSTAMANTE',
'SABANILLA',
'SAN JUAN DE POZUL',
'TNTE M.RODRIGUEZ LOAYZA',
'AMARILLOS',
'BUENAVISTA',
'CHAGUARPAMBA',
'EL ROSARIO',
'SANTA RUFINA',
'27 DE ABRIL /LA NARANJA',
'AMALUZA',
'BELLAVISTA',
'EL AIRO',
'EL INGENIO',
'JIMBURA',
'SANTA TERESITA',
'CHANGAIMINA /LA LIBERTAD',
'GONZANAMA',
'NAMBACOLA',
'PURUNUMA /EGUIGUREN',
'SACAPALCA',
'GRAL.ELOY ALFARO',
'LA RAMA',
'LA VICTORIA',
'MACARA',
'SABIANGO',
'CANGONAMA',
'CASANGA',
'CATACOCHA',
'GUACHANAMA',
'LAURO GUERRERO',
'LOURDES',
'ORIANGA',
'SAN ANTONIO',
'YAMANA',
'ALAMOR',
'CIANO',
'EL ARENAL',
'EL LIMO /MARIANA DE JESUS',
'MERCADILLO',
'VICENTINO',
'EL PARAISO DE CELEN',
'SUMAYPAMBA',
'URDANETA/PAQUISHAPA',
'EL TABLON',
'LLUZHAPA',
'MANU',
'SAN ANTONIO DE CUMBE',
'SAN PABLO DE TENTA',
'SAN SEBASTIAN DE YULOG',
'SARAGURO',
'SELVA ALEGRE',
'NUEVA FATIMA',
'SOZORANGA',
'TACAMOROS',
'BOLASPAMBA',
'CAZADEROS',
'GARZAREAL',
'LIMONES',
'MANGAHURCO',
'PALETILLAS',
'ZAPOTILLO',
'12 DE DICIEMBRE',
'CHAQUINAL',
'MILAGROS',
'PINDAL /FEDERICO PAEZ',
'FUNDOCHAMBA',
'QUILANGA /LA PAZ',
'SAN ANTONIO DE LAS ARADAS',
'LA TINGUE',
'OLMEDO',
'BARREIRO /SANTA RITA',
'CARACOL',
'CLEMENTE BAQUERIZO',
'DR. CAMILO PONCE E.',
'EL SALTO',
'FEBRES CORDERO',
'LA UNION',
'PIMOCHA',
'BABA',
'GUARE',
'ISLA DE BEJUCAL',
'LA ESMERALDA',
'MONTALVO /SABANETA',
'PUEBLO VIEJO',
'PUERTO PECHICHE',
'SAN JUAN',
'24 DE MAYO',
'VENUS DEL RIO QUEVEDO',
'VIVA ALFARO',
'GUAYACAN',
'LA ESPERANZA',
'NICOLAS INFANTE DIAZ',
'QUEVEDO',
'SAN CAMILO',
'SAN CARLOS',
'SAN CRISTOBAL',
'SIETE DE OCTUBRE',
'CATARAMA',
'RICAURTE',
'10 NOVIEMBRE',
'CHACARITA',
'LOS ANGELES',
'VENTANAS',
'ZAPOTAL',
'ANTONIO SOTOMAYOR',
'VINCES',
'PALENQUE',
'11 DE OCTUBRE',
'7 DE AGOSTO',
'PATRICIA PILAR',
'SN JACINTO DE BUENA FE',
'VALENCIA',
'MOCACHE',
'QUINSALOMA',
'12 DE MARZO',
'PICOAZA',
'PORTOVIEJO',
'PUEBLO NUEVO',
'RIO CHICO',
'SAN PABLO',
'SAN PLACIDO',
'SIMON BOLIVAR',
'18 DE OCTUBRE',
'ABDON CALDERON',
'ALHAJUELA /BAJO GRANDE',
'ANDRES DE VERA',
'CHIRIJOS',
'COLON',
'CRUCITA',
'FRANCISCO PACHECO',
'CALCETA',
'MEMBRILLO',
'QUIROGA',
'RICAURTE',
'SAN ANTONIO / DEL PELUDO',
'SANTA RITA',
'BOYACA',
'CANUTO',
'CHIBUNGA',
'CHONE',
'CONVENTO',
'ELOY ALFARO',
'4 DE DICIEMBRE',
'EL CARMEN',
'SAN PEDRO DE SUMA',
'WILFRIDO LOOR MOREIRA',
'FLAVIO ALFARO',
'NOVILLO',
'ZAPALLO',
'AMERICA /LA CERA',
'PUERTO CAYO',
'SAN LORENZO DE JIPIJAPA',
'DR. MIGUEL MORAN LUCIO',
'EL ANEGADO',
'JIPIJAPA',
'JULCUY',
'LA UNION',
'MANUEL INOCENCIO PARRALES',
'MEMBRILLAL',
'PEDRO PABLO GOMEZ',
'JUNIN',
'ELOY ALFARO',
'LOS ESTEROS',
'MANTA',
'SAN LORENZO',
'SAN MATEO',
'SANTA MARIANITA',
'TARQUI',
'ANIBAL SAN ANDRES',
'LA PILA',
'MONTECRISTI',
'CAMPOZANO',
'CASCOL',
'GUALE/STO.DOMINGO',
'LASCANO',
'PAJAN',
'BARRAGANETE',
'PICHINCHA /GERMUD',
'SAN SEBASTIAN',
'ROCAFUERTE',
'AYACUCHO',
'HONORATO VASQUEZ',
'LA UNION',
'LODANA',
'SAN PABLO',
'SANTA ANA',
'BAHIA DE CARAQUEZ',
'CHARAPOTO',
'LEONIDAS PLAZA G.',
'SAN ISIDRO',
'ANGEL PEDRO GILER',
'BACHILLERO',
'TOSAGUA',
'ARQ.SIXTO DURAN BALLEN',
'BELLAVISTA',
'NOBOA',
'SUCRE',
'10 DE AGOSTO',
'ATAHUALPA',
'COJIMIES',
'PEDERNALES',
'OLMEDO /PUCA',
'MACHALILLA',
'PUERTO LOPEZ',
'SALANGO',
'JAMA',
'JARAMIJO',
'CANOA',
'SAN VICENTE',
'ALSHI /9 DE OCTUBRE',
'CUCHAENTZA',
'GRAL. PROAÑO',
'MACAS',
'RIO BLANCO',
'SAN ISIDRO',
'SEVILLA DON BOSCO',
'SINAI',
'ZUNAC',
'AMAZONAS',
'SAN MIGUEL DE CUYES',
'BERMEJOS',
'BOMBOIZA',
'CHIGUINDA',
'EL IDEAL',
'GUALAQUIZA',
'MERCEDES MOLINA',
'NUEVA TARQUI',
'ROSARIO',
'GRAL. LEONIDAS PLAZA',
'INDANZA',
'SAN ANTONIO',
'SAN MIGUEL DE CONCHAY',
'SANTA SUSANA DE CHIVIAZA',
'YUNGANZA /EL ROSARIO',
'16 DE AGOSTO',
'ARAPICOS',
'CUMANDA',
'PALORA',
'SANGAY',
'CHUPIANZA',
'COPAL',
'MENDEZ',
'PATUCA',
'SAN FCO. DE CHINIMBIMI',
'SAN LUIS DEL ACHO',
'TAYUZA',
'ASUNCION',
'HUAMBI',
'SANTA MARIANITA DE JESUS',
'SUCUA',
'CHIGUAZA',
'HUAMBOYA',
'PAN DE AZUCAR',
'SAN CARLOS DE LIMON',
'SAN JACINTO DE WAKAMBEIS',
'SAN JUAN BOSCO',
'SANTIAGO DE PANANZA',
'HUASAGA /WAMPUIK',
'MACUMA',
'PUMPUENTSA',
'TAISHA',
'TUTINENTZA',
'LOGROÑO',
'SHIMPIS',
'YAUPI',
'PABLO SEXTO',
'SAN JOSE DE MORONA',
'SANTIAGO',
'AHUANO',
'CHONTAPUNTA',
'PANO',
'PUERTO MISAHUALLI',
'PUERTO NAPO',
'SAN JUAN DE MUYUNA',
'TALAG',
'TENA',
'ARCHIDONA',
'COTUNDO',
'HATUN SUMAKU',
'SAN PABLO DE USHPAYACU',
'EL CHACO',
'GONZALO DIAZ DE PINEDA',
'LINARES',
'OYACACHI',
'SANTA ROSA DE QUIJOS',
'SARDINAS',
'BAEZA',
'COSANGA',
'CUYUJA',
'PAPALLACTA',
'SAN FRANCISCO DE BORJA',
'SUMACO',
'CARLOS J. AROSEMENA TOLA',
'10 DE AGOSTO',
'SIMON BOLIVAR',
'TARQUI',
'TNTE. HUGO ORTIZ',
'VERACRUZ',
'ZARAYACU',
'CANELOS',
'EL TRIUNFO',
'FATIMA',
'MONTALVO/ANDOAS',
'POMONA',
'PUYO',
'RIO CORRIENTES',
'RIO TIGRE',
'MADRE TIERRA',
'MERA',
'SHELL',
'SAN JOSE',
'SANTA CLARA',
'ARAJUNO',
'CURARAY',
'ALANGASI',
'CHAUPICRUZ',
'CHAVEZPAMBA',
'CHECA',
'CHILIBULO',
'CHILLOGALLO',
'CHIMBACALLE',
'COCHAPAMBA',
'COMITE DEL PUEBLO',
'CONOCOTO',
'COTOCOLLAO',
'AMAGUAÑA',
'CUMBAYA',
'EL CONDADO',
'EL SALVADOR',
'GONZALEZ SUAREZ',
'GUALEA',
'GUAMANI',
'GUANGOPOLO',
'GUAYLLABAMBA',
'IÑAQUITO',
'ITCHIMBIA',
'ATAHUALPA /HABASPAMBA',
'JIPIJAPA',
'KENNEDY',
'LA ARGELIA',
'LA CONCEPCION',
'LA ECUATORIANA',
'LA FERROVIARIA',
'LA FLORESTA',
'LA LIBERTAD',
'LA MAGDALENA',
'LA MENA',
'BELISARIO QUEVEDO',
'LA MERCED',
'LA VICENTINA',
'LLANO CHICO',
'LLOA',
'MARISCAL SUCRE',
'NANEGAL',
'NANEGALITO',
'NAYON',
'NONO',
'PACTO',
'BENALCAZAR',
'PERUCHO',
'PIFO',
'PINTAG',
'POMASQUI',
'PONCEANO',
'PUELLARO',
'PUEMBO',
'PUENGASI',
'QUINCHE',
'QUITUMBE',
'CALACALI',
'RUMIPAMBA',
'SAN ANTONIO',
'SAN BARTOLO',
'SAN BLAS',
'SAN ISIDRO DEL INCA',
'SAN JOSE DE MINAS',
'SAN JUAN',
'SAN MARCOS',
'SAN ROQUE',
'SAN SEBASTIAN',
'CALDERON',
'SANTA BARBARA',
'SANTA PRISCA',
'SOLANDA',
'TABABELA',
'TUMBACO',
'TURUBAMBA',
'VILLA FLORA',
'YARUQUI',
'ZAMBIZA',
'CARCELEN',
'CENTRO HISTORICO',
'ASCAZUBI',
'CANGAHUA',
'CAYAMBE',
'JUAN MONTALVO',
'OLMEDO/PESILLO',
'OTON',
'SAN JOSE DE AYORA',
'STA.ROSA DE CUSUBAMBA',
'ALOAG',
'ALOASI',
'CHAUPI',
'CORNEJO ASTORGA /TANDAPI',
'CUTUGLAGUA',
'MACHACHI',
'TAMBILLO',
'UYUMBICHO',
'LA ESPERANZA',
'MALCHINGUI',
'TABACUNDO',
'TOCACHI',
'TUPIGACHI',
'COTOGCHOA',
'RUMIPAMBA',
'SAN PEDRO DE TABOADA',
'SAN RAFAEL',
'SANGOLQUI',
'MINDO',
'S. MIGUEL DE LOS BANCOS',
'PEDRO VICENTE MALDONADO',
'PUERTO QUITO',
'AMBATILLO',
'HUACHI LORETO',
'IZAMBA',
'JUAN BENIGNO VELA',
'LA MATRIZ',
'LA MERCED',
'LA PENINSULA',
'MONTALVO',
'PASA',
'PICAYHUA',
'PILAHUIN',
'ATAHUALPA /CHIPZALATA',
'PISHILATA',
'QUISAPINCHA',
'SAN BARTOLOME',
'SAN FERNANDO',
'SAN FRANCISCO',
'SANTA ROSA',
'TOTORAS',
'UNAMUNCHO',
'ATOCHA FICOA',
'AUGUSTO N MARTINEZ',
'CELIANO MONGE',
'CONSTANTINO FERNANDEZ',
'CUNCHIBAMBA',
'HUACHI CHICO',
'HUACHI GRANDE',
'BAÑOS',
'LLIGUA',
'RIO NEGRO',
'RIO VERDE',
'ULBA',
'CEVALLOS',
'MOCHA',
'PINGUILI',
'EL TRIUNFO',
'LOS ANDES',
'PATATE',
'SUCRE',
'QUERO',
'RUMIPAMBA',
'YANAYACU MOCHAPATA',
'BENITEZ /PACHANLICA',
'SALASACA',
'BOLIVAR',
'CHIQUICHA',
'COTALO',
'EL ROSARIO /RUMICHACA',
'GARCIA MORENO',
'HUAMBALO',
'PELILEO',
'PELILEO GRANDE /R. MINO',
'BAQUERIZO MORENO',
'CIUDAD NUEVA',
'EMILIO MARIA TERAN',
'MARCOS ESPINEL',
'PILLARO',
'PRESIDENTE URBINA',
'SAN ANDRES',
'SAN JOSE DE POALO',
'SAN MIGUELITO',
'QUINCHICOTO',
'TISALEO',
'CUMBARATZA',
'EL LIMON',
'GUADALUPE',
'LA VICTORIA DE IMBANA',
'SABANILLA',
'SAN CARLOS DE LAS MINAS',
'TIMBARA',
'ZAMORA',
'CHITO',
'EL CHORRO',
'LA CHONTA',
'PUCAPAMBA',
'SAN ANDRES',
'ZUMBA',
'GUAYZIMI',
'NUEVO PARAISO',
'ZURMI',
'28 DE MAYO',
'LA PAZ',
'TUTUPALI',
'CHICANA',
'LOS ENCUENTROS',
'YANZATZA',
'EL GUISMI',
'EL PANGUI',
'PACHICUTZA',
'TUNDAYME',
'PANGUINTZA',
'TRIUNFO DORADO',
'ZUMBI',
'EL PORVENIR DEL CARMEN',
'LA CANELA',
'PALANDA',
'SAN FRANCISCO DEL VERGEL',
'VALLADOLID',
'BELLAVISTA',
'NUEVO QUITO',
'PAQUISHA',
'EL PROGRESO',
'ISLA SANTA MARIA',
'PTO. BAQUERIZO MORENO',
'PUERTO VILLAMIL',
'TOMAS DE BERLANGA',
'BELLA VISTA',
'PUERTO AYORA',
'SANTA ROSA',
'10 DE AGOSTO',
'DURENO',
'EL ENO',
'GENERAL FARFAN',
'JAMBELI',
'NUEVA LOJA',
'PACAYACU',
'SANTA CECILIA',
'EL REVENTADOR',
'GONZALO PIZARRO',
'LUMBAQUI',
'PUERTO LIBRE',
'EL CARMEN DE PUTUMAYO',
'PALMA ROJA',
'PUERTO BOLIVAR',
'PUERTO RODRIGUEZ',
'SANTA ELENA',
'LIMONCOCHA',
'PANACOCHA',
'SAN PEDRO DE LOS COFANES',
'SAN ROQUE',
'SHUSHUFINDI CENTRAL',
'SIETE DE JULIO',
'EL PLAYON DE SN. FRANCISCO',
'LA BONITA',
'LA SOFIA',
'ROSA FLORIDA',
'SANTA BARBARA',
'EL DORADO DE CASCALES',
'SANTA ROSA DE SUCUMBIOS',
'SEVILLA',
'AGUAS NEGRAS',
'CUYABENO',
'TARAPOA',
'ALEJANDRO LABAKA',
'PTO. FCO. DE ORELLANA',
'SAN JOSE DE GUAYUSA',
'SAN LUIS DE ARMENIA',
'TARACOA',
'DAYUMA',
'EL DORADO',
'EL EDEN',
'GARCIA MORENO',
'INES ARANGO',
'LA BELLEZA',
'LABACA',
'NUEVO PARAISO',
'CAP. AUGUSTO RIVADENEIRA',
'CONONACO',
'NUEVO ROCAFUERTE',
'STA. MARIA DE HUIRIRIMA',
'TIPUTINI',
'YASUNI',
'ENOKANQUI',
'LA JOYA DE LOS SACHAS',
'LAGO SAN PEDRO',
'POMPEYA',
'RUMIPAMBA',
'SAN CARLOS',
'SAN SEBASTIAN DE COCA',
'TRES DE NOVIEMBRE',
'UNION MILAGREÑA',
'AVILA',
'LORETO',
'PUERTO MURIALDO',
'SAN JOSE DE DAHUANO',
'SAN JOSE DE PAYAMINO',
'SAN VICENTE DE HUATICOCHA',
'ATAHUALPA',
'BALLENITA',
'CHANDUY',
'COLONCHE',
'MANGLARALTO',
'SAN JOSE DE ANCON',
'SANTA ELENA',
'SIMON BOLIVAR',
'ANCONCITO',
'CARLOS ESPINOZA LARREA',
'GRAL. A. E. GALLO',
'JOSE LUIS TAMAYO / MUEY',
'SALINAS',
'SANTA ROSA',
'VICENTE ROCAFUERTE',
'LA LIBERTAD',
'ABRAHAM CALAZACON',
'SAN JACINTO DEL BUA',
'SANTA MARIA DEL TOACHI',
'SANTO DOMINGO',
'VALLE HERMOSO',
'ZARACAY',
'ALLURIQUIN',
'BOMBOLI',
'CHIGUILPE',
'EL ESFUERZO',
'LUZ DE AMERICA',
'PUERTO LIMON',
'RIO TOACHI',
'RIO VERDE',
'CALUMA',
'EL PIEDRERO',
'EL PIEDRERO',
'LAS GOLONDRINAS',
'LAS GOLONDRINAS',
'EL COLORADO',
'GENERAL ELOY ALFARO',
'LEONIDAS PROAÑO',



      
    ];

    $( "#ciudad" ).autocomplete({

      source: availableTags

    });

  });

  


            
            
        </script>
    </body>
</html>