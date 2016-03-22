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

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,400italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Dosis:400,300,500,600,700' rel='stylesheet' type='text/css'>
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
                <li><a href="{!!asset('/publico')!!}"  onclick="$('.woocommerce').LoadingOverlay('show')">{{ trans('publico/labels.label1')}}</a></li>
              
                
             
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
            $location = json_decode(file_get_contents("http://ipinfo.io/200.125.245.238"));
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
                                    <span><i class="fa fa-search"></i></span>
                                </div>
                            
                        </div>
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
                            <h4>{{ trans('publico/labels.label68')}}</h4>
                             @if(isset($actividades) && count($actividades)>0)
                                    <div class="social-wrap ">
                                        
                                        
                                        
                                        <div class="social-icons">
                                            @foreach ($actividades as $explor)
                                           
                                            <input id="checkbox1" name="act_{!!$explor->id!!}" type="checkbox"  /> {!!$explor->nombre_servicio_est!!}
                                            
                                            <br>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
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
                            <h4>Best Sellers</h4>
                            <ul class="product-list-widget">
                                <li>
                                    <div class="product-image">
                                        <a href="#">
                                            <img src="http://placehold.it/58x63" alt="">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <h6 class="product-title"><a href="#">Everyday Scoop Neck Cami</a></h6>
                                        <span class="product-price">$18.99</span>
                                        <span class="star-rating" title="4" data-toggle="tooltip">
                                            <span data-stars="4"></span>
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="product-image">
                                        <a href="#">
                                            <img src="http://placehold.it/58x63" alt="">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <h6 class="product-title"><a href="#">Easy Draped Cardigan</a></h6>
                                        <span class="product-price">$23.58</span>
                                        <span class="star-rating" title="4" data-toggle="tooltip">
                                            <span data-stars="4"></span>
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="product-image">
                                        <a href="#">
                                            <img src="http://placehold.it/58x63" alt="">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <h6 class="product-title"><a href="#">Mesh-Trimmed Dress</a></h6>
                                        <span class="product-price">$76.00</span>
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
                        <ul class="products row add-clearfix catagorias">
                               <ul class="products row add-clearfix Searchcategorias">
                                  
                            @section('Searchcategorias')
                                @show
                        </ul>  
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
            </script>
<script>
   $(".moreImg").click(function () {
                var valor=$(".searchCity ").val();
                GetDataAjaxSearchCatogoriesApp("{!!asset('/getSearchCatalogosServicios')!!}/{!!$catalogo->id_catalogo_servicios!!}/"+valor);
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
'LAS GOLONDRINAS',
'EL COLORADO',
'GENERAL ELOY ALFARO',
'LEONIDAS PROAÑO',



      
    ];

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