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

        <link rel="stylesheet" href="{{ asset('public_components/css/letras.css')}}">
{!! HTML::style('css/jquery-labelauty.css') !!} 
        <link rel="stylesheet" href="{{ asset('public_components/css/animate.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public_components/components/owl-carousel/owl.carousel.css')}}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('public_components/components/owl-carousel/owl.transitions.css')}}" media="screen" />
        <!-- Magnific Popup core CSS file -->
        <link rel="stylesheet" href="{{ asset('public_components/components/magnific-popup/magnific-popup.css')}}"> 
        {!!HTML::script('js/sliderTop/jssor.slider.mini.js') !!}

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

        <style>

            a.morelink {
                text-decoration:none;
                outline: none;
            }
            .morecontent span {
                display: none;
            }

        </style>
        <style>
            .ui-menu {
    box-shadow: 0 -1px 3px rgba(0, 0, 0, 0.11);
    background:rgba(255, 255, 255, 0.9) none repeat scroll 0 0;
    width: 240px;
            }
        </style>
    </head>
    <body class="woocommerce">
        <div id="page-wrapper">

            <header id="header"  class="header-color-white" >
                @include('public_page.reusable.header')
            </header>
                                       @if(session('locale') == 'es' )
                                          <?php $titlUp=$catalogo->nombre_servicio?>
                                            @else
                                           
                                           <?php $titlUp=$catalogo->nombre_servicio_eng?>
                                            @endif

      @include('public_page.reusable.banner', ['titulo' =>$titlUp])  
<ul class="breadcrumbs">
                <li><a href="{!!asset('/')!!}"  onclick="$('.woocommerce').LoadingOverlay('show')">{{ trans('publico/labels.label1')}}</a></li>
              
                
             
                <li class="active">{!!$titlUp!!}</li>
            </ul>
        </div>
        <?php
        
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        
          try {
            $ipUser = $_SERVER['REMOTE_ADDR'];
            
            //$location = json_decode(file_get_contents("http://ipinfo.io/".$ipUser));
            $location = json_decode(file_get_contents("http://ipinfo.io/186.47.240.232"));
        } catch (Exception $e) {
            $location = "";
        }
        ?>
        
        <section id="content">
            <div class="container">
                <div class="row">
                    {!! Form::open(['url' => route('filtersCategoria'),  'id'=>'filter_Category']) !!}
                    <div class="sidebar col-sm-4 col-md-3">
                        <div class="widget box">
                            <h4>{{ trans('publico/labels.label66')}}</h4>
                            <input type="hidden"  class="id_usuario_servicio" name="catalogo" value="{!!$catalogo->id_catalogo_servicios!!}">
                             
                        <div class="main-mini-search-form full-width box">
                            
                                <div class="search-box">
                                    <input type="text" placeholder="Search" name="searchCity" value="{!!$location->city!!}" class="searchCity">
                                                                        <span><i class="fa fa-map-marker" onclick="AjaxContainerRegistroWithLoadFilter('filter_Category','Searchcategorias')" title="Search location" style="cursor: pointer"></i></span>
                                </div>
                            
                        </div>
                            
                            @if(count($servicios>1))
                            <ul class="filter-categories panel-group">
                                
                              
                               
                                 <li class="category-has-children">
                                    <a href="#cat-sweaters-jacketsserv" data-toggle="collapse">{{ trans('publico/labels.label54')}}</a>
                                    <ul id="cat-sweaters-jacketsserv" class="collapse">
                                        
                                            @foreach ($servicios as $serv)
                                               @if(session('locale') == 'es' )
                                                <li><a href="{!!asset('/tokenDz$rip')!!}/{!!$serv->id_catalogo_servicios!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$serv->nombre_servicio!!}</a></li>
                                            @else
                                            <li><a href="{!!asset('/tokenDz$rip')!!}/{!!$serv->id_catalogo_servicios!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$serv->nombre_servicio_eng!!}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                             
                                
                             
                            </ul>
                            @endif
                        </div>
                        
                        <div class="widget box">
                            <input type="hidden"  class="max_price_i" name="max_price_i" value="{!!$precio_max!!}">
                            <input type="hidden"  class="min_price_i" name="min_price_i" value="{!!$precio_minimo!!}">
                            <h4>{{ trans('publico/labels.label69')}}</h4>
                            <div class="price-filter-box clearfix">
                                <span id="min_price" class="min-price-label">{!!$precio_minimo!!}</span>
                                <div class="price-range">
                                    <div id="price-range-bar"></div>
                                </div>
                                <span id="max_price" class="max-price-label">{!!$precio_max!!}</span>
                            </div>
                        </div>
                        
                         <div class="widget box">
                            
                            <h4>{{ trans('publico/labels.label76')}}</h4>
                            
                            <ul class="filter-categories panel-group">
                                
                                
                                <li class="category-has-children">
                                    <a href="#cat-sweaters-jackets" data-toggle="collapse">{{ trans('publico/labels.label68')}}</a>
                                    <ul id="cat-sweaters-jackets" class="collapse">
                                        
                                            @if(isset($actividades) && count($actividades)>0)
                                            
                                        
                                            @foreach ($actividades as $explor)
                                            <li><input id="checkbox1" name="act_{!!$explor->id!!}" type="checkbox"  /> {!!$explor->nombre_servicio_est!!}
                                            </li>
                                            @endforeach
                                        
                                    
                                    @endif
                                        
                                    </ul>
                                </li>
                                
                                
                            </ul>
                         
                        </div>
                        <div class="post-pagination">
                            <div class="text-center">
                                <a  class="btn style4 hover-blue load-more filter" onclick="AjaxContainerRegistroWithLoadFilter('filter_Category','Searchcategorias')">{{ trans('publico/labels.label67')}}</a>
                                
                            </div>
                        </div>
                            

                         @if(session('device')!='mobile')
                        <div class="widget banner-slider box">
                            <div class="owl-carousel" data-itemsPerDisplayWidth="[[0, 1], [480, 2], [768, 1], [992, 1], [1200, 1]]" data-items="1">
                                <a href="#">
                                    <img src="{{ asset('img/rsz_00kwwk8s.jpg')}}" alt="">
                                </a>
                              
                            </div>
                        
                        </div>
                           
                   
                      
                        <div class="widget box">
                            <h4>{{ trans('publico/labels.label121')}}</h4>
                            <ul class="product-list-widget">
                                <li>
                                    <div class="product-image">
                                        <a href="{!!asset('/detalle')!!}/ESTACION-CHARLES-DARWIN/228">
                                            <img src="{{ asset('images/icon/228estacion6.jpg')}}" alt="Charles Darwin">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <h6 class="product-title"><a href="{!!asset('/detalle')!!}/ESTACION-CHARLES-DARWIN/228">EstaciÃ³n Charles Darwin</a></h6>
                                        <span class="product-price">{{ trans('publico/labels.label128')}}</span>
                                        <span class="star-rating" title="4" data-toggle="tooltip">
                                            <span data-stars="4"></span>
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    
                                    <div class="product-image">
                                        <a href="{!!asset('/detalle')!!}/Centro-HistÃ³rico-de-Quito/127">
                                            <img src="{{ asset('images/icon/127centrohistoricociclovia.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <h6 class="product-title"><a href="{!!asset('/detalle')!!}/Centro-HistÃ³rico-de-Quito/127">Centro HistÃ³rico de Quito</a></h6>
                                        <span class="product-price">{{ trans('publico/labels.label128')}}</span>
                                        <span class="star-rating" title="4" data-toggle="tooltip">
                                            <span data-stars="4"></span>
                                        </span>
                                    </div>
                                </li>
                                
                                <li>
                                    
                                    
                                    <div class="product-image">
                                        <a href="{!!asset('/detalle')!!}/MontaÃ±ita/148">
                                            <img src="{{ asset('images/icon/148103677257361922164010645062755965301191111n.jpg')}}" alt="MontaÃ±ita">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <h6 class="product-title"><a href="{!!asset('/detalle')!!}/MontaÃ±ita/148">MontaÃ±ita</a></h6>
                                        <span class="product-price">{{ trans('publico/labels.label128')}}</span>
                                        <span class="star-rating" title="4" data-toggle="tooltip">
                                            <span data-stars="4"></span>
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                           @endif
                    </div>
                    {!! Form::close() !!}
                    <div id="main" class="col-sm-8 col-md-9">
                        @if(session('device')!='mobile')
                        <div class="image-banner box">
                            <div class="image-container">
                                @if($catalogo->id_catalogo_servicios==1)
                                <img src="{{ asset('img/serr/eat.jpg')}}" alt="eat_iWaNaTrip">
                                @elseif($catalogo->id_catalogo_servicios==2)
                                <img src="{{ asset('img/serr/sleep.jpg')}}" alt="sleep_iWaNaTrip">
                                @elseif($catalogo->id_catalogo_servicios==3)
                                <img src="{{ asset('img/serr/trip.jpg')}}" alt="trip_iWaNaTrip">
                                @elseif($catalogo->id_catalogo_servicios==4)
                                <img src="{{ asset('img/serr/tour.jpg')}}" alt="tour_iWaNaTrip">
                                @elseif($catalogo->id_catalogo_servicios==5)
                                <img src="{{ asset('img/serr/night.jpg')}}" alt="night_iWaNaTrip">
                                @elseif($catalogo->id_catalogo_servicios==8)
                                <img src="{{ asset('img/serr/culture.jpg')}}" alt="culture_iWaNaTrip">
                                @elseif($catalogo->id_catalogo_servicios==6)
                                <img src="{{ asset('img/serr/night.jpg')}}" alt="activities_iWaNaTrip">
                                @endif
                            </div>
                            <div class="caption-wrapper position-left">
                                <div class="captions">
                                       @if(session('locale') == 'es' )
                                          <h2>{!!$catalogo->nombre_servicio!!}</h2>
                                            @else
                                           <h2>{!!$catalogo->nombre_servicio_eng!!}</h2>
                                            @endif
                                       
                                            
                                    
                                </div>
                            </div>
                        </div>
                        @endif
                      <!--  <form method="get" class="woocommerce-ordering box">
                            <select class="orderby selector" name="orderby" id="orderby">
                                <option value="satisfaction">Sort by satsifaction</option>
                                <option value="rating">Sort by average rating</option>
                                <option selected="selected" value="popularity">Sort by popularity</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                            </select>
                        </form>-->
                      
                      
                      <div class="post-wrapper">
                     <!--     <div class="post-filters">
                            <a href="#" class="btn btn-sm style4 hover-blue active" data-filter="filter-all">All</a>
                            <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-logo">Logo</a>
                            <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-business">Business</a>
                            <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-website">Website</a>
                        </div> -->
                        <div class="iso-container iso-col-3 style-masonry has-column-width Searchcategorias1 ">
                            
                            
                              @section('Searchcategorias')
                                @show
                                
                        </div>
                     
                    </div>
                        <!--     <ul class="products row add-clearfix catagorias">
                               <ul class="products row add-clearfix Searchcategorias">
                                  
                            @section('Searchcategorias')
                                @show
                        </ul>  -->
                        <div class="post-pagination">
                            <div class="text-center">
                                <a  class="btn style4 hover-blue load-more moreImg">{{ trans('publico/labels.label31')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

          <footer id="footer" class="style4">
            <div class="callout-box style2">
                <div class="container">
                    <div class="callout-content">
                        <div class="callout-text">
                            <h4>{{ trans('publico/labels.label26')}}</h4>
                        </div>
                        <div class="callout-action">
                            <a onclick="$('.woocommerce').LoadingOverlay('show');" class="btn style4">{{ trans('publico/labels.label27')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            @include('public_page.reusable.footer')
        </footer>
    </div>

    <!-- Javascript -->
    
    {!! HTML::script('js/jquery.js') !!}
    {!!HTML::script('js/js_public/Compartido.js') !!}
    {!!HTML::script('js/loadingScreen/loadingoverlay.min.js') !!}
        {!!HTML::script('js/jquery.autocomplet.js') !!}
        {!!HTML::script('js/Compartido.js') !!}

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

    <!-- plugins -->
    <script type="text/javascript" src="{{ asset('public_components/js/jquery.plugins.js')}}"></script>

<script type="text/javascript" src="{{ asset('public_components/js/lugares_ecuador.js')}}"></script>

    <script>
                                sjq(document).ready(function ($) {
                                    // Configure/customize these variables.
                                    var showChar = 100; // How many characters are shown by default
                                    var ellipsestext = "...";
                                    var moretext = "Show more >";
                                    var lesstext = "Show less";
                                    $('.more').each(function () {
                                        var content = $(this).html();
                                        if (content.length > showChar) {

                                            var c = content.substr(0, showChar);
                                            var h = content.substr(showChar, content.length - showChar);
                                            var html = c + '<span class="moreellipses">' + ellipsestext + '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
                                            $(this).html(html);
                                        }

                                    });
                                    $(".morelink").click(function () {
                                        if ($(this).hasClass("less")) {
                                            $(this).removeClass("less");
                                            $(this).html(moretext);
                                        } else {
                                            $(this).addClass("less");
                                            $(this).html(lesstext);
                                        }
                                        $(this).parent().prev().toggle();
                                        $(this).prev().toggle();
                                        return false;
                                    });
                                });</script>
    <script>
        sjq(document).ready(function ($) {
            var sync1 = $("#sync1");
            var sync2 = $("#sync2");
            sync1.owlCarousel({
                singleItem: true,
                slideSpeed: 1000,
                navigation: false,
                pagination: false,
                afterAction: syncPosition,
                responsiveRefreshRate: 200,
            });
            sync2.owlCarousel({
                items: 3,
                itemsDesktop: [1199, 2],
                itemsDesktopSmall: [991, 1],
                itemsTablet: [767, 2],
                itemsMobile: [479, 2],
                navigation: true,
                navigationText: false,
                pagination: false,
                responsiveRefreshRate: 100,
                afterInit: function (el) {
                    el.find(".owl-item").eq(0).addClass("synced");
                    el.find(".owl-wrapper").equalHeights();
                },
                afterUpdate: function (el) {
                    el.find(".owl-wrapper").equalHeights();
                }
            });
            function syncPosition(el) {
                var current = this.currentItem;
                $("#sync2")
                        .find(".owl-item")
                        .removeClass("synced")
                        .eq(current)
                        .addClass("synced")
                if ($("#sync2").data("owlCarousel") !== undefined) {
                    center(current)
                }
            }

            $("#sync2").on("click", ".owl-item", function (e) {
                e.preventDefault();
                var number = $(this).data("owlItem");
                sync1.trigger("owl.goTo", number);
            });
            function center(number) {
                var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
                var num = number;
                var found = false;
                for (var i in sync2visible) {
                    if (num === sync2visible[i]) {
                        var found = true;
                    }
                }

                if (found === false) {
                    if (num > sync2visible[sync2visible.length - 1]) {
                        sync2.trigger("owl.goTo", num - sync2visible.length + 2)
                    } else {
                        if (num - 1 === -1) {
                            num = 0;
                        }
                        sync2.trigger("owl.goTo", num);
                    }
                } else if (num === sync2visible[sync2visible.length - 1]) {
                    sync2.trigger("owl.goTo", sync2visible[1])
                } else if (num === sync2visible[0]) {
                    sync2.trigger("owl.goTo", num - 1)
                }
            }
            var $easyzoom = $('.product-images .easyzoom').easyZoom();
            var $easyzoomApi = $easyzoom.data('easyZoom');
        });</script>

    @if(session('device')!='mobile')
      

    <script>
        jQuery(document).ready(function ($) {

            var jssor_1_SlideshowTransitions = [
                {$Duration: 1800, $Opacity: 2}
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
        });</script>

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
@else
  <script>


jQuery(document).ready(function ($) {
   $(".page-title-container.style3").css('backgroundImage','url({!!asset("img/serr/eat.jpg")!!})');
     @if($catalogo->id_catalogo_servicios==1)
                                
                                @elseif($catalogo->id_catalogo_servicios==2)
                                    $(".page-title-container.style3").css('backgroundImage','url({!!asset("img/serr/sleep.jpg")!!})');
                                @elseif($catalogo->id_catalogo_servicios==3)
                                   $(".page-title-container.style3").css('backgroundImage','url({!!asset("img/serr/trip.jpg")!!})');
                                @elseif($catalogo->id_catalogo_servicios==4)
                                  $(".page-title-container.style3").css('backgroundImage','url({!!asset("img/serr/tour.jpg")!!})');
                                @elseif($catalogo->id_catalogo_servicios==5)
                                   $(".page-title-container.style3").css('backgroundImage','url({!!asset("img/serr/night.jpg")!!})');
                                @elseif($catalogo->id_catalogo_servicios==8)
                                            $(".page-title-container.style3").css('backgroundImage','url({!!asset("img/serr/culture.jpg")!!})');
                                @endif    
});
  

</script>
    @endif
    
    

     <script>
            $(document).ready(function () {
                var valor=$(".searchCity ").val();
                GetDataAjaxSearchCatogories("{!!asset('/getSearchCatalogosServicios')!!}/{!!$catalogo->id_catalogo_servicios!!}/"+valor);
            });
            
              
            $(".fa-search").click(function () {
                window.current_pageSeCat=0;
                var valor=$(".searchCity ").val();
                GetDataAjaxSearchCatogories("{!!asset('/getSearchCatalogosServicios')!!}/{!!$catalogo->id_catalogo_servicios!!}/"+valor);
            });
            
                    $( ".searchCity" ).change(function() {
                        window.current_pageSeCat=0;
                var valor=$(".searchCity ").val();
                GetDataAjaxSearchCatogories("{!!asset('/getSearchCatalogosServicios')!!}/{!!$catalogo->id_catalogo_servicios!!}/"+valor);

});

$('.searchCity').keypress(function (e) {
 var key = e.which;
 if(key == 13)  // the enter key code
  {
      window.current_pageSeCat=0;
      var valor=$(".searchCity ").val();
                GetDataAjaxSearchCatogories("{!!asset('/getSearchCatalogosServicios')!!}/{!!$catalogo->id_catalogo_servicios!!}/"+valor);
  }
}); 


     $(document).on("keypress", "form", function(event) { 
    return event.keyCode != 13;
});
            </script>
<script>
   $(".moreImg").click(function () {
                var valor=$(".searchCity ").val();
                GetDataAjaxSearchCatogoriesApp("{!!asset('/getSearchCatalogosServicios')!!}/{!!$catalogo->id_catalogo_servicios!!}/"+valor);
            });

          

            
            
              $(function() {

    

    $( ".searchCity" ).autocomplete({

      source: availableTags

    });

  });
            
</script>
 <script type="text/javascript">
        sjq("#price-range-bar").slider({
            range: true,
            min: parseFloat("{!!$precio_minimo!!}"),
            max: parseFloat("{!!$precio_max!!}"),
            values: [ "{!!$precio_minimo!!}", parseFloat("{!!$precio_max!!}")-100 ],
            slide: function( event, ui ) {
                sjq(".min-price-label").html( "$" + ui.values[ 0 ]);
                sjq(".max-price-label").html( "$" + ui.values[ 1 ]);
                sjq(".min_price_i").val(  ui.values[ 0 ]);
                sjq(".max_price_i").val(  ui.values[ 1 ]);
            }
        });
        sjq(".min-price-label").html( "$" + sjq("#price-range-bar").slider( "values", 0 ));
        sjq(".max-price-label").html( "$" + sjq("#price-range-bar").slider( "values", 1 ));
    

            
 </script>
    
    
    
    <!-- load page Javascript -->
    <script type="text/javascript" src="{{ asset('public_components/js/main.js')}}"></script>


</body>
</html>