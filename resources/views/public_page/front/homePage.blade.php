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
                                     background-image: url('{{ asset('img/index-fondo.jpg')}}'); 
                                     background-size: cover; 
                                     background-position: center center;
                                     width: 100%; height: 100%; opacity: 1; 
                                     visibility: inherit;" 
                                     data-src="{{ asset('images/backgrounds/gradient.png')}}"
                                     src="{{ asset('img/index-rodelas.png')}}" 
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
                        </h2>
                        <br>                        
                        
                     <h2>
                           <div>
                            
                                <div class="search-box">
                                        <input type="text" value="{!!$titulo!!}"  placeholder="{{ trans('publico/labels.label64')}}" name="ciudad" id="ciudad">
                                        <span><i class="fa fa-map-marker search-city" style="cursor: pointer"></i></span>
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
                                   <figure ><img src="{{ asset('img/ocio.jpg')}}" alt=""></figure>
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
                                   <figure ><img src="{{ asset('img/adventure.jpg')}}" alt=""></figure>
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
                                   <figure ><img src="{{ asset('img/rsz_quito.jpg')}}" alt=""></figure>
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
                                   <figure ><img src="{{ asset('img/tour.jpg')}}" alt=""></figure>
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
        {!! HTML::script('js/jquery.js') !!}
        {!!HTML::script('js/js_public/Compartido.js') !!}
        {!!HTML::script('js/loadingScreen/loadingoverlay.min.js') !!}
        {!!HTML::script('js/jquery.autocomplet.js') !!}

  


        <script type="text/javascript" src="{{ asset('public_components/js/jquery-2.1.3.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('public_components/js/jquery.noconflict.js')}}"></script>
        <script type="text/javascript" src="{{ asset('public_components/js/modernizr.2.8.3.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('public_components/js/jquery-migrate-1.2.1.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('public_components/js/jquery-ui.1.11.2.min.js')}}"></script>

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
'10 DE AGOSTO',
'10 NOVIEMBRE',
'11 DE NOVIEMBRE',
'11 DE OCTUBRE',
'12 DE DICIEMBRE',
'12 DE MARZO',
'16 DE AGOSTO',
'18 DE OCTUBRE',
'24 DE MAYO',
'27 DE ABRIL /LA NARANJA',
'27 DE SEPTIEMBRE',
'28 DE MAYO',
'4 DE DICIEMBRE',
'5 DE AGOSTO',
'5 DE JUNIO/HUIMBI',
'6 DE JULIO DE CUELLAJE',
'7 DE AGOSTO',
'9 DE MAYO',
'9 DE OCTUBRE',
'A.BAQUERIZO M /JUJAN',
'ABANIN',
'ABDON CALDERON / LA UNION',
'ABDON CALDERON',
'ABRAHAM CALAZACON',
'ACHUPALLAS',
'AGUARICO',
'AGUAS NEGRAS',
'AHUANO',
'ALAMOR',
'ALANGASI',
'ALAQUEZ',
'ALAUSI',
'ALAUSÍ',
'ALEJANDRO LABAKA',
'ALFREDO BAQUERIZO MORENO - JUJAN',
'ALHAJUELA /BAJO GRANDE',
'ALLURIQUIN',
'ALOAG',
'ALOASI',
'ALSHI /9 DE OCTUBRE',
'ALTO TAMBO/GUADAL',
'AMAGUAÑA',
'AMALUZA',
'AMARILLOS',
'AMAZONAS',
'AMBATILLO',
'AMBATO',
'AMBUQUI/CHOTA',
'AMERICA /LA CERA',
'ANCHAYACU',
'ANCON/PALMA REAL',
'ANCONCITO',
'ANDRADE MARIN/LOURDES',
'ANDRES DE VERA',
'ANGAMARCA',
'ANGEL PEDRO GILER',
'ANGEL POLIVIO CHAVEZ',
'ANGOCHAGUA',
'ANIBAL SAN ANDRES',
'ANTONIO ANTE-ATUNTAQUI',
'ANTONIO J. HOLGUIN',
'ANTONIO SOTOMAYOR',
'APUELA',
'ARAJUNO',
'ARAPICOS',
'ARCAPAMBA',
'ARCHIDONA',
'ARENILLAS',
'ARQ.SIXTO DURAN BALLEN',
'ASCAZUBI',
'ASUNCION',
'ATACAMES',
'ATAHUALPA /CHIPZALATA',
'ATAHUALPA /HABASPAMBA',
'ATAHUALPA',
'ATAHUALPA/CAMARONES',
'ATOCHA FICOA',
'ATUNTAQUI',
'AUGUSTO N MARTINEZ',
'AURELIO BAYAS MARTINEZ',
'AVILA',
'AYACUCHO',
'AYAPAMBA',
'AZOGUES',
'AZUAY',
'BABA',
'BABAHOYO',
'BACHILLERO',
'BAEZA',
'BAHIA DE CARAQUEZ',
'BALAO',
'BALLENITA',
'BALNEARIO JAMBELI',
'BALSAS',
'BALZAPAMBA',
'BALZAR',
'BANIFE',
'BAÑOS',
'BAQUERIZO MORENO',
'BARBONES',
'BARRAGANETE',
'BARREIRO /SANTA RITA',
'BARTOLOME RUIZ',
'BELISARIO QUEVEDO',
'BELLA VISTA',
'BELLAMARIA',
'BELLAVISTA',
'BENALCAZAR',
'BENITEZ /PACHANLICA',
'BERMEJOS',
'BIBLIAN',
'BILBAO',
'BILOVAN',
'BOCANA',
'BOLASPAMBA',
'BOLIVAR',
'BOLIVAR/SAGRARIO',
'BOLIVAR-CALCETA',
'BOMBOIZA',
'BOMBOLI',
'BORBON',
'BORRERO',
'BOYACA',
'BUENA FE',
'BUENAVISTA',
'BULAN / J. VICTOR IZQUIERDO',
'C.J.AROSEMENA',
'CACHA',
'CAHUASQUI',
'CAJABAMBA',
'CALACALI',
'CALCETA',
'CALDERON',
'CALPI',
'CALUMA',
'CALVAS-CARIAMANGA',
'CAMARONES',
'CAMILO PONCE ENRIQUEZ',
'CAMPOZANO',
'CAÑAQUEMADA',
'CAÑAR',
'CAÑARIBAMBA',
'CANCHAGUA',
'CANDILEJOS',
'CANELOS',
'CANGAHUA',
'CANGONAMA',
'CANI',
'CANOA',
'CANUTO',
'CAP. AUGUSTO RIVADENEIRA',
'CAPIRO',
'CAPZOL',
'CARACOL',
'CARANQUI',
'CARBO/CONCEPCION',
'CARCABON',
'CARCELEN',
'CARCHI',
'CARIAMANGA',
'CARLOS ESPINOZA LARREA',
'CARLOS J. AROSEMENA TOLA',
'CAROLINA /GUALLUPI',
'CARONDELET',
'CASACAY',
'CASANGA',
'CASCALES',
'CASCOL',
'CATACOCHA',
'CATAMAYO',
'CATARAMA - URDANETA',
'CATARAMA',
'CAYAMBE',
'CAZADEROS',
'CEBADAS',
'CELIANO MONGE',
'CELICA',
'CENTINELA CÓNDOR',
'CENTRAL',
'CENTRO HISTORICO',
'CEVALLOS',
'CHACARITA',
'CHACRAS',
'CHAGUARPAMBA',
'CHAMBO',
'CHANDUY',
'CHANGAIMINA /LA LIBERTAD',
'CHANTACO',
'CHANTILIN',
'CHAQUINAL',
'CHARAPOTO',
'CHAUCHA / ANGAS',
'CHAUPI',
'CHAUPICRUZ',
'CHAVEZPAMBA',
'CHECA JIDCAY',
'CHECA',
'CHIBUNGA',
'CHICAN / GUILLERMO ORTEGA',
'CHICANA',
'CHIGUAZA',
'CHIGUILPE',
'CHIGUINDA',
'CHILE',
'CHILIBULO',
'CHILLA',
'CHILLANES',
'CHILLOGALLO',
'CHIMBACALLE',
'CHIMBO',
'CHIMBORAZO',
'CHINCA',
'CHINCHIPE ZUMBA',
'CHIQUICHA',
'CHIQUINTAD',
'CHIRIJOS',
'CHITAN DE NAVARRETES',
'CHITO',
'CHOBO',
'CHONE',
'CHONTADURO',
'CHONTAMARCA',
'CHONTAPUNTA',
'CHORDELEC',
'CHORDELEG',
'CHOROCOPTE',
'CHUGA',
'CHUGCHILAN',
'CHUMBLIN',
'CHUMUNDE',
'CHUNCHI',
'CHUPIANZA',
'CHUQUIRIBAMBA',
'CHURA',
'CIANO',
'CIUDAD NUEVA',
'CLEMENTE BAQUERIZO',
'COCHAPAMBA',
'COCHAPATA',
'COJIMIES',
'COJITAMBO',
'COLAIZACA',
'COLIMES',
'COLON ELOY DE MARIA',
'COLON',
'COLONCHE',
'COLTA',
'COLUMBE',
'COMITE DEL PUEBLO',
'COMPUD',
'CONCEPCION',
'CONOCOTO',
'CONONACO',
'CONSTANTINO FERNANDEZ',
'CONVENTO',
'COPAL',
'CORDONCILLO',
'CORNEJO ASTORGA /TANDAPI',
'COSANGA',
'COTACACHI',
'COTALO',
'COTOCOLLAO',
'COTOGCHOA',
'COTOPAXI',
'COTUNDO',
'CRISTOBAL COLON',
'CRNEL. LORENZO GARAICOA',
'CRNEL.M. MARIDUEÑA',
'CRNL MARCELINO MARIDUENAS',
'CRNL.CARLOS CONCHA TORRES',
'CRUCITA',
'CRUZPAMBA/BUSTAMANTE',
'CUBE / CHANCAMA',
'CUBIJIES',
'CUCHAENTZA',
'CUENCA',
'CUMANDA',
'CUMBARATZA',
'CUMBAYA',
'CUMBE',
'CUNCHIBAMBA',
'CURARAY',
'CURTINCAPAC',
'CUSUBAMBA',
'CUTCHIL',
'CUTUGLAGUA',
'CUYABENO',
'CUYUJA',
'DANIEL CORDOVA TORAL',
'DAULE',
'DAYUMA',
'DELEG',
'DR MIGUEL EGAS/PEGUCHE',
'DR. CAMILO PONCE E.',
'DR. MIGUEL MORAN LUCIO',
'DUCUR',
'DUG-DUG',
'DURAN-ELOY ALFARO',
'DURENO',
'ECHEANDIA',
'ECUADOR',
'EL AIRO',
'EL ALTAR',
'EL ANEGADO',
'EL ANGEL',
'EL ARENAL',
'EL BATAN',
'EL CABO',
'EL CAMBIO',
'EL CARMELO/EL PUN/',
'EL CARMEN DE PIJILI',
'EL CARMEN DE PUTUMAYO',
'EL CARMEN',
'EL CHACO',
'EL CHICAL',
'EL CHORRO',
'EL CISNE',
'EL COLORADO',
'EL CONDADO',
'EL CORAZON',
'EL DORADO DE CASCALES',
'EL DORADO',
'EL EDEN',
'EL EMPALME',
'EL ENO',
'EL ESFUERZO',
'EL GOALTAL / LAS JUNTAS',
'EL GUABO',
'EL GUISMI',
'EL IDEAL',
'EL INGENIO',
'EL LAUREL',
'EL LIMO /MARIANA DE JESUS',
'EL LIMON',
'EL LUCERO',
'EL ORO',
'EL PAN',
'EL PANGUI',
'EL PARAISO DE CELEN',
'EL PARAISO',
'EL PIEDRERO',
'EL PLAYON DE SN. FRANCISCO',
'EL PORVENIR DEL CARMEN',
'EL PROGRESO',
'EL RECREO',
'EL RETIRO',
'EL REVENTADOR',
'EL ROSARIO /RUMICHACA',
'EL ROSARIO',
'EL SAGRARIO',
'EL SALTO',
'EL SALVADOR',
'EL TABLON',
'EL TAMBO',
'EL TRIUNFO',
'EL VECINO',
'ELOY ALFARO / SAN FELIPE',
'ELOY ALFARO /DURAN',
'ELOY ALFARO VALDEZ',
'ELOY ALFARO',
'EMILIANO CAICEDO MARCOS',
'EMILIO MARIA TERAN',
'ENOKANQUI',
'ESMERALDAS',
'ESPEJO / EL ANGEL',
'ESPINDOLA',
'EUGENIO ESPEJO',
'FACUNDO VELA',
'FATIMA',
'FCO. ORELLANA',
'FEBRES CORDERO',
'FERNANDEZ SALVADOR',
'FLAVIO ALFARO',
'FLORES',
'FRANCISCO PACHECO',
'FUNDOCHAMBA',
'GABRIEL I VEINTIMILLA',
'GALAPAGOS',
'GALERA',
'GARCIA MORENO / LLURIMAGUA',
'GARCIA MORENO',
'GARZAREAL',
'GENERAL ELOY ALFARO',
'GENERAL FARFAN',
'GIMA',
'GIRON',
'GONZALEZ SUAREZ',
'GONZALO DIAZ DE PINEDA',
'GONZALO PIZARRO',
'GONZANAMA',
'GONZOL',
'GRAL ANTONIO ELIZALDE - BUCAY',
'GRAL. A. E. GALLO',
'GRAL. LEONIDAS PLAZA',
'GRAL. PROAÑO',
'GRAL. VERNAZA',
'GRAL.ELIZALDE /BUCAY',
'GRAL.ELOY ALFARO',
'GRAL.MORALES / SOCARTE',
'GRAL.PEDRO MONTERO',
'GRAL.VILLAMIL / PLAYAS',
'GUACHANAMA',
'GUACHAPALA',
'GUADALUPE',
'GUALACEO',
'GUALAQUIZA',
'GUALE/STO.DOMINGO',
'GUALEA',
'GUALEL',
'GUALLETURO',
'GUAMANI',
'GUAMOTE',
'GUANANDO',
'GUANAZAN',
'GUANGAJE',
'GUANGOPOLO',
'GUANO',
'GUANUJO',
'GUAPAN',
'GUARAINAC',
'GUARANDA',
'GUARE',
'GUASAGANDA',
'GUASUNTOS',
'GUAYACAN',
'GUAYAQUIL DE ALPACHACA',
'GUAYAQUIL',
'GUAYAS / PUERTO NUEVO',
'GUAYAS',
'GUAYLLABAMBA',
'GUAYQUICHUMA',
'GUAYTACAMA',
'GUAYZIMI',
'GUEL',
'GUIZHAGUIÑA',
'HATUN SUMAKU',
'HERMANO MIGUEL',
'HONORATO VASQUEZ',
'HUACA',
'HUACHI CHICO',
'HUACHI GRANDE',
'HUACHI LORETO',
'HUALTACO',
'HUAMBALO',
'HUAMBI',
'HUAMBOYA',
'HUAQUILLAS',
'HUASAGA /WAMPUIK',
'HUAYNACAPAC',
'HUERTAS',
'HUIGRA',
'IBARRA',
'IGNACIO FLORES',
'ILAPO',
'IMANTAG',
'IMBABURA',
'IMBAYA',
'IÑAQUITO',
'INDANZA',
'INES ARANGO',
'INGAPIRCA',
'ISABELA',
'ISIDRO AYORA',
'ISINLIVI',
'ISLA DE BEJUCAL',
'ISLA SANTA MARIA',
'ITCHIMBIA',
'IZAMBA',
'JADAN',
'JAMA',
'JAMBELI',
'JARAMIJO',
'JAVIER LOYOLA / CHUQUIPATA',
'JERUSALEN',
'JESUS MARIA',
'JIJON Y CAAMAÑO',
'JIMBILLA',
'JIMBURA',
'JIPIJAPA',
'JORDAN',
'JOSE LUIS TAMAYO / MUEY',
'JOSEGUANGO BAJO',
'JUAN BAUTISTA AGUIRRE',
'JUAN BENIGNO VELA',
'JUAN DE VELASCO / PONGOR',
'JUAN GOMEZ RENDON',
'JUAN MONTALVO',
'JULCUY',
'JULIO ANDRADE',
'JULIO E MORENO',
'JUMON',
'JUNCAL',
'JUNIN',
'JUNÍN',
'JUNQUILLAL',
'KENNEDY',
'LA ARGELIA',
'LA AURORA',
'LA AVANZADA',
'LA BELLEZA',
'LA BOCANA',
'LA BONITA',
'LA CANDELARIA',
'LA CANELA',
'LA CHONTA',
'LA CONCEPCION',
'LA CONCORDIA',
'LA DOLOROSA DEL PRIORATO',
'LA ECUATORIANA',
'LA ESMERALDA',
'LA ESPERANZA',
'LA FERROVIARIA',
'LA FLORESTA',
'LA IBERIA',
'LA JOYA DE LOS SACHAS',
'LA LIBERTAD',
'LA MAGDALENA',
'LA MANA',
'LA MATRIZ',
'LA MENA',
'LA MERCED DE BUENOS AIRES',
'LA MERCED',
'LA PAZ',
'LA PEAÑA',
'LA PENINSULA',
'LA PILA',
'LA PROVIDENCIA',
'LA PUNTILLA(SATELITE)',
'LA RAMA',
'LA SOFIA',
'LA SUSAYA',
'LA TINGUE',
'LA TOLA',
'LA TRONCAL',
'LA UNION',
'LA VICENTINA',
'LA VICTORIA DE IMBANA',
'LA VICTORIA',
'LA VICTORIA/LAS LAJAS',
'LA VILLEGAS',
'LABACA',
'LAGARTO',
'LAGO SAN PEDRO',
'LAS GOLONDRINAS',
'LAS LAJAS',
'LAS LOJAS',
'LAS MERCEDES',
'LAS NAVES',
'LAS PAMPAS',
'LASCANO',
'LATACUNGA',
'LAURO GUERRERO',
'LEONIDAS PLAZA G.',
'LEONIDAS PROAÑO',
'LETAMENDI',
'LICAN',
'LICTO',
'LIMÓN INDANZA',
'LIMONAL',
'LIMONCOCHA',
'LIMONES',
'LINARES',
'LITA',
'LIZARZABURU',
'LLACAO',
'LLAGOS',
'LLANO CHICO',
'LLIGUA',
'LLOA',
'LLUZHAPA',
'LODANA',
'LOGROÑO',
'LOJA',
'LOMA DE FRANCO',
'LOMAS DE SARGENTILLO',
'LOMAS SARGENTILLO',
'LORETO',
'LOS ANDES',
'LOS ANGELES',
'LOS ENCUENTROS',
'LOS ESTEROS',
'LOS RIOS',
'LOURDES',
'LUDO',
'LUIS CORDERO VEGA',
'LUIS CORDERO',
'LUIS GALARZA O. (DELEGSOL)',
'LUIS TELLO / LAS PALMAS /',
'LUIS VARGAS TORRES',
'LUMBAQUI',
'LUZ DE AMERICA',
'MACARA',
'MACAS',
'MACHACHI',
'MACHALA',
'MACHALILLA',
'MACHANGARA',
'MACUMA',
'MADRE TIERRA',
'MAGDALENA/CHAPACOTO',
'MAGRO',
'MAJUA',
'MALACATOS/VALLADOLID',
'MALCHINGUI',
'MALDONADO',
'MALIMPIA / GUAYLLABAMBA',
'MALVAS',
'MANABI',
'MANGAHURCO',
'MANGLARALTO',
'MANTA',
'MANU',
'MANUEL INOCENCIO PARRALES',
'MANUEL J. CALLE',
'MARCABELI',
'MARCOS ESPINEL',
'MARIANO ACOSTA',
'MARIANO MORENO/CALLASAY',
'MARISCAL SUCRE',
'MARISCAL SUCRE/HUAQUES',
'MATAJE',
'MATUS',
'MEJIA-MACHACHI',
'MEMBRILLAL',
'MEMBRILLO',
'MENDEZ',
'MERA',
'MERCADILLO',
'MERCEDES MOLINA',
'MILAGRO',
'MILAGROS',
'MILTON REYES',
'MINDO',
'MIRA',
'MOCACHE',
'MOCHA',
'MOLLETURO',
'MONAY',
'MONTALVO / HORQUETA',
'MONTALVO /SABANETA',
'MONTALVO',
'MONTALVO/ANDOAS',
'MONTECRISTI',
'MONTEOLIVO',
'MONTERREY',
'MONTUFAR / SAN GABRIEL',
'MORALES',
'MORASPUNGO',
'MOROMORO',
'MORONA SANTIAGO',
'MORONA',
'MORRO',
'MUISNE',
'MULALILLO',
'MULALO',
'MULLIQUINDIL',
'MULTI / NULTI',
'MULTITUD',
'MULUNCAY GRANDE',
'NABON',
'NAMBACOLA',
'NANEGAL',
'NANEGALITO',
'NANGARITZA',
'NAPO',
'NARANJAL',
'NARANJITO',
'NARCISA DE JESUS',
'NAYON',
'NAZON',
'NICOLAS INFANTE DIAZ',
'NIEVES',
'NOBOA',
'NOBOL',
'NONO',
'NOVILLO',
'NUEVA FATIMA',
'NUEVA LOJA- L.AGRIO',
'NUEVA LOJA',
'NUEVA TARQUI',
'NUEVO PARAISO',
'NUEVO QUITO',
'NUEVO ROCAFUERTE',
'NUEVO SANTA ROSA',
'OCHOA LEON/MATRIZ',
'OCTAVIO CORDERO PALACIOS',
'OLMEDO /PUCA',
'OLMEDO',
'OLMEDO/PESILLO',
'OLMEDO/SAN ALEJO',
'OÑA',
'ORELLANA',
'ORIANGA',
'OTAVALO',
'OTON',
'OYACACHI',
'P. MONCAYO-TABACUNDO',
'PABLO ARENAS',
'PABLO SEXTO',
'PACAYACU',
'PACCHA',
'PACHICUTZA',
'PACTO',
'PADR.JUAN BAUTISTA AGUIRE',
'PAJAN',
'PALANDA',
'PALENQUE',
'PALESTINA',
'PALETILLAS',
'PALLATANGA',
'PALMA ROJA',
'PALMALES',
'PALMAS',
'PALMIRA',
'PALO QUEMADO',
'PALORA',
'PALTAS',
'PAMPANAL DE BOLIVAR',
'PAN DE AZUCAR',
'PANACOCHA',
'PANCHO NEGRO',
'PANGUA CORAZON',
'PANGUINTZA',
'PANO',
'PANZALEO',
'PAPALLACTA',
'PAQUISHA',
'PARAISO',
'PASA',
'PASAJE',
'PASCUALES',
'PASTAZA',
'PATAQUI',
'PATATE',
'PATRICIA PILAR',
'PATUCA',
'PAUTE',
'PEDERNALES',
'PEDRO CARBO',
'PEDRO PABLO GOMEZ',
'PEDRO V. MALDONADO',
'PEDRO VICENTE MALDONADO',
'PELILEO GRANDE /R. MINO',
'PELILEO',
'PEÑAHERRERA',
'PENIPE',
'PERUCHO',
'PIARTAL',
'PICAYHUA',
'PICHINCHA /GERMUD',
'PICHINCHA',
'PICOAZA',
'PIEDRAS',
'PIFO',
'PILAHUIN',
'PILALO',
'PILLARO',
'PIMAMPIRO',
'PIMOCHA',
'PIÑAS GRANDE',
'PIÑAS',
'PINDAL /FEDERICO PAEZ',
'PINDAL',
'PINDILIG',
'PINGUILI',
'PINLLOPATA',
'PINTAG',
'PIOTER',
'PISHILATA',
'PISTISHI',
'PLAN PILOTO',
'PLATANILLOS',
'PLAYAS',
'PLAZA GUTIERREZ/CALVARIO',
'POALO',
'POMASQUI',
'POMONA',
'POMPEYA',
'PONCEANO',
'PORTOVELO',
'PORTOVIEJO',
'POSORJA',
'PRESIDENTE URBINA',
'PRINCIPAL',
'PROGRESO',
'PTO. BAQUERIZO MORENO',
'PTO. FCO. DE ORELLANA',
'PUCAPAMBA',
'PUCARA',
'PUCAYACO',
'PUEBLO NUEVO',
'PUEBLO VIEJO',
'PUELA',
'PUELLARO',
'PUEMBO',
'PUENGASI',
'PUERTO AYORA',
'PUERTO BOLIVAR',
'PUERTO CAYO',
'PUERTO JELI',
'PUERTO LIBRE',
'PUERTO LIMON',
'PUERTO LOPEZ',
'PUERTO MISAHUALLI',
'PUERTO MURIALDO',
'PUERTO NAPO',
'PUERTO PECHICHE',
'PUERTO QUITO',
'PUERTO RODRIGUEZ',
'PUERTO VILLAMIL',
'PUJILI',
'PUMALLACTA',
'PUMPUENTSA',
'PUNA',
'PUNGALA',
'PUNIN',
'PURUNUMA /EGUIGUREN',
'PUTUMAYO',
'PUYANGO',
'PUYO',
'QUERO',
'QUEVEDO',
'QUIJOS-BAEZA',
'QUILANGA /LA PAZ',
'QUILANGA',
'QUIMIAG',
'QUINARA',
'QUINCHE',
'QUINCHICOTO',
'QUINGEO',
'QUINGUE',
'QUININDE',
'QUINSALOMA',
'QUIROGA',
'QUISAPINCHA',
'QUITO',
'QUITUMBE',
'RAMIREZ DAVALOS',
'RAMON CAMPAÑA',
'REGULO DE MORA',
'REMIGIO CRESPO TORAL',
'RICAURTE',
'RIO BLANCO',
'RIO BONITO',
'RIO CHICO',
'RIO CORRIENTES',
'RIO NEGRO',
'RIO TIGRE',
'RIO TOACHI',
'RIO VERDE',
'RIOBAMBA',
'RIVERA',
'ROBERTO ASTUDILLO',
'ROCA',
'ROCAFUERTE',
'ROSA FLORIDA',
'ROSA ZARATE',
'ROSARIO',
'RUMIÑAHUI-SANGOLQUÍ',
'RUMIPAMBA',
'S. MIGUEL BANCOS',
'S. MIGUEL DE LOS BANCOS',
'S.PEDRO HUACA',
'SABANILLA',
'SABIANGO',
'SACAPALCA',
'SAGRARIO',
'SALANGO',
'SALASACA',
'SALATI',
'SALCEDO',
'SALIMA',
'SALINAS',
'SALIT',
'SALITRE',
'SALVIAS',
'SAMBORONDON',
'SAMBORONDÓN',
'SAN  VICENTE',
'SAN ANDRES',
'SAN ANTONIO / DEL PELUDO',
'SAN ANTONIO DE BAYUSHIG',
'SAN ANTONIO DE CUMBE',
'SAN ANTONIO DE LAS ARADAS',
'SAN ANTONIO',
'SAN BARTOLO',
'SAN BARTOLOME',
'SAN BLAS',
'SAN BUENAVENTURA',
'SAN CAMILO',
'SAN CARLOS DE LAS MINAS',
'SAN CARLOS DE LIMON',
'SAN CARLOS',
'SAN CRISTOBAL',
'SAN FCO. DE CHINIMBIMI',
'SAN FCO. DE SAGEO',
'SAN FCO.DE NATABUELA',
'SAN FERNANDO',
'SAN FRANCISCO DE BORJA',
'SAN FRANCISCO DE ONZOLE',
'SAN FRANCISCO DE SIGSIPAMBA',
'SAN FRANCISCO DEL VERGEL',
'SAN FRANCISCO',
'SAN GABRIEL',
'SAN GERARDO / PAQUICAHUAN',
'SAN GERARDO',
'SAN GREGORIO',
'SAN ISIDRO DE PATULU',
'SAN ISIDRO DEL INCA',
'SAN ISIDRO',
'SAN JACINTO DE WAKAMBEIS',
'SAN JACINTO DEL BUA',
'SAN JACINTO',
'SAN JAVIER DE CACHABI',
'SAN JOAQUIN',
'SAN JOSE DE ANCON',
'SAN JOSE DE AYORA',
'SAN JOSE DE CAYAPAS',
'SAN JOSE DE CHALTURA',
'SAN JOSE DE CHAMANGA',
'SAN JOSE DE CHIMBO',
'SAN JOSE DE DAHUANO',
'SAN JOSE DE GUAYUSA',
'SAN JOSE DE MINAS',
'SAN JOSE DE MORONA',
'SAN JOSE DE PAYAMINO',
'SAN JOSE DE POALO',
'SAN JOSE DE QUICHINCHE',
'SAN JOSE DE RARANGA',
'SAN JOSE DE TAMBO',
'SAN JOSE DEL CHAZO',
'SAN JOSE',
'SAN JUAN BOSCO',
'SAN JUAN DE CERRO AZUL',
'SAN JUAN DE ILUMAN',
'SAN JUAN DE MUYUNA',
'SAN JUAN DE PASTOCALLE',
'SAN JUAN DE POZUL',
'SAN JUAN',
'SAN LORENZO DE JIPIJAPA',
'SAN LORENZO',
'SAN LUCAS',
'SAN LUIS DE ARMENIA',
'SAN LUIS DE PAMBIL',
'SAN LUIS DEL ACHO',
'SAN LUIS',
'SAN MARCOS',
'SAN MARTIN DE PUZHIO',
'SAN MATEO',
'SAN MIGUEL DE CONCHAY',
'SAN MIGUEL DE CUYES',
'SAN MIGUEL DE SALCEDO',
'SAN MIGUEL URCUQUI',
'SAN MIGUEL',
'SAN MIGUELITO',
'SAN PABLO DE ATENAS',
'SAN PABLO DE TENTA',
'SAN PABLO DE USHPAYACU',
'SAN PABLO',
'SAN PEDRO DE LA BENDITA',
'SAN PEDRO DE LOS COFANES',
'SAN PEDRO DE SUMA',
'SAN PEDRO DE TABOADA',
'SAN PEDRO DE VILCABAMBA',
'SAN PLACIDO',
'SAN RAFAEL DE SHARUG',
'SAN RAFAEL',
'SAN ROQUE',
'SAN SALVADOR DE CAÑARIBAMBA',
'SAN SEBASTIAN DE COCA',
'SAN SEBASTIAN DE YULOG',
'SAN SEBASTIAN',
'SAN SIMON',
'SAN VICENTE DE HUATICOCHA',
'SAN VICENTE DE PUSIR',
'SAN VICENTE',
'SANGAY',
'SANGOLQUI',
'SANGUILLIN',
'SANTA ANA',
'SANTA BARBARA',
'SANTA CECILIA',
'SANTA CLARA',
'SANTA CRUZ',
'SANTA ELENA',
'SANTA FE DE GALAN',
'SANTA FE',
'SANTA ISABEL',
'SANTA LUCIA DE LAS PEÑAS',
'SANTA LUCIA',
'SANTA MARIA DEL TOACHI',
'SANTA MARIANITA DE JESUS',
'SANTA MARIANITA',
'SANTA MARTHA DE CUBA',
'SANTA PRISCA',
'SANTA RITA',
'SANTA ROSA DE FLANDES',
'SANTA ROSA DE QUIJOS',
'SANTA ROSA DE SUCUMBIOS',
'SANTA ROSA',
'SANTA RUFINA',
'SANTA SUSANA DE CHIVIAZA',
'SANTA TERESITA',
'SANTIAGO DE PANANZA',
'SANTIAGO DE QUITO',
'SANTIAGO MENDEZ',
'SANTIAGO',
'SANTO DOMINGO DE ONZOLE',
'SANTO DOMINGO TSACHILAS',
'SANTO DOMINGO',
'SAQUISILI',
'SARACAY',
'SARAGURO',
'SARDINAS',
'SAYAUSI',
'SELVA ALEGRE',
'SEVILLA DE ORO',
'SEVILLA DON BOSCO',
'SEVILLA',
'SHAGLLI',
'SHELL',
'SHIMPIS',
'SHUSHUFINDI CENTRAL',
'SHUSHUFINDI',
'SIBAMBE',
'SICALPA',
'SIDCAY',
'SIETE DE JULIO',
'SIETE DE OCTUBRE',
'SIGCHOS',
'SIGSIG',
'SIG-SIG',
'SIMIATUG',
'SIMON BOLIVAR',
'SIMON PLATA TORRES',
'SINAI',
'SININCAY',
'SINSAO',
'SN JACINTO DE BUENA FE',
'SOLANDA',
'SOLANO',
'SOZORANGA',
'STA. MARIA DE HUIRIRIMA',
'STA.ROSA DE CUSUBAMBA',
'SUA/BOCANA',
'SUCRE',
'SUCRE-BAHIA CARÁQUEZ',
'SUCUA',
'SUCUMBIOS',
'SUCUMBIOS-BONITA',
'SUMACO',
'SUMAYPAMBA',
'SUSCAL',
'SUSUDEL',
'TABABELA',
'TABACUNDO',
'TABIAZO',
'TACAMOROS',
'TACHINA',
'TADAY',
'TAISHA',
'TALAG',
'TAMBILLO',
'TANICUCHI',
'TAQUIL /MIGUEL RIOFRIO',
'TARACOA',
'TARAPOA',
'TARIFA',
'TARQUI',
'TAURA',
'TAYUZA',
'TELEMBI',
'TELIMBELA',
'TENA',
'TENDALES',
'TENGUEL',
'TIMBARA',
'TIMBIRE',
'TINGO',
'TIPUTINI',
'TISALEO',
'TIWINTZA',
'TIXAN',
'TNTE M.RODRIGUEZ LOAYZA',
'TNTE. HUGO ORTIZ',
'TOACAZO',
'TOBAR DONOSO',
'TOCACHI',
'TOMAS DE BERLANGA',
'TOMEBAMBA',
'TONCHIGUE',
'TONSUPA',
'TORATA',
'TOSAGUA',
'TOTORACOCHA',
'TOTORAS',
'TRES CERRITOS',
'TRES DE NOVIEMBRE',
'TRIUNFO DORADO',
'TUFIÑO',
'TULCAN',
'TULULBI /RICAURTE',
'TUMBABIRO',
'TUMBACO',
'TUNDAYME',
'TUNGURAHUA',
'TUPIGACHI',
'TURI',
'TURUBAMBA',
'TURUPAMBA',
'TUTINENTZA',
'TUTUPALI',
'ULBA',
'UNAMUNCHO',
'UNION LOJANA',
'UNION MILAGREÑA',
'URBINA JADO (SALITRE)',
'URBINA',
'URCUQUI',
'URDANETA',
'URDANETA/PAQUISHAPA',
'UTUANA',
'UYUMBICHO',
'UZHCURRUMI',
'VACAS GALINDO',
'VALDEZ/LIMONES/',
'VALENCIA',
'VALLADOLID',
'VALLE DE LA VIRGEN',
'VALLE HERMOSO',
'VALLE',
'VALPARAISO',
'VELASCO IBARRA',
'VELASCO',
'VELOZ',
'VENTANAS',
'VENTURA',
'VENUS DEL RIO QUEVEDO',
'VERACRUZ',
'VICENTE PIEDRAHITA',
'VICENTE ROCAFUERTE',
'VICENTINO',
'VICHE',
'VICTORIA DEL PORTETE',
'VICTORIA',
'VILCABAMBA/VICTORIA',
'VILLA FLORA',
'VINCES',
'VIRGEN DE FATIMA',
'VIVA ALFARO',
'VUELTA LARGA',
'WILFRIDO LOOR MOREIRA',
'XIMENA',
'YACUAMBI',
'YAGUACHI NUEVO',
'YAGUACHI VIEJO/CONE',
'YAGUACHI',
'YAMANA',
'YANAYACU MOCHAPATA',
'YANGANA / ARSENIO CASTILLO',
'YANTZAZA',
'YANUNCAY',
'YANZATZA',
'YARUQUI',
'YARUQUIES',
'YASUNI',
'YAUPI',
'YUNGANZA /EL ROSARIO',
'ZAMBI',
'ZAMBIZA',
'ZAMORA CHINCHIPE',
'ZAMORA',
'ZAPALLO',
'ZAPOTAL',
'ZAPOTILLO',
'ZARACAY',
'ZARAYACU',
'ZARUMA',
'ZHIDMAD',
'ZHUD',
'ZUMBA',
'ZUMBAHUA',
'ZUMBI',
'ZUNAC',
'ZURMI',

      
    ];

    $( "#ciudad" ).autocomplete({

      source: availableTags

    });

  });

  


            
            
        </script>
    </body>
</html>