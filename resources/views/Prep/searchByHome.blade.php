<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
    <head>
        <!-- Page Title -->
        <title>iWanaTrip | Vive la experiencia Ecuador</title>

        <link rel="shortcut icon" href="{{ asset('public/images/favicon.png')}}" />

        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <meta name="description" content="iWanaTrip.com">
        <meta name="author" content="iWanaTrip team">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Theme Styles -->

        <link rel="stylesheet" href="{{ asset('public/public_components/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('public/public_components/css/font-awesome.min.css')}}">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,400italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Dosis:400,300,500,600,700' rel='stylesheet' type='text/css'>
{!! HTML::style('public/css/jquery-labelauty.css') !!} 
        <link rel="stylesheet" href="{{ asset('public/public_components/css/animate.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/public_components/components/owl-carousel/owl.carousel.css')}}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('public/public_components/components/owl-carousel/owl.transitions.css')}}" media="screen" />
        <!-- Magnific Popup core CSS file -->
        <link rel="stylesheet" href="{{ asset('public/public_components/components/magnific-popup/magnific-popup.css')}}"> 
        {!!HTML::script('public/js/sliderTop/jssor.slider.mini.js') !!}

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
            <link rel="stylesheet" type="text/css" href="{{ asset('public/public_components/css/ie.css')}}" />
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
                                    <span><i class="fa fa-map-marker" title="Search location" style="cursor: pointer"></i></span>
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
                                    <img src="{{ asset('public/img/rsz_00kwwk8s.jpg')}}" alt="">
                                </a>
                              
                            </div>
                        
                        </div>
                           
                   
                      

                        <div class="widget box">
                            <h4>Recommended by iWaNaTrip</h4>
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
                                <img src="{{ asset('public/img/serr/eat.jpg')}}" alt="eat_iWaNaTrip">
                                @elseif($catalogo->id_catalogo_servicios==2)
                                <img src="{{ asset('public/img/serr/sleep.jpg')}}" alt="sleep_iWaNaTrip">
                                @elseif($catalogo->id_catalogo_servicios==3)
                                <img src="{{ asset('public/img/serr/trip.jpg')}}" alt="trip_iWaNaTrip">
                                @elseif($catalogo->id_catalogo_servicios==4)
                                <img src="{{ asset('public/img/serr/tour.jpg')}}" alt="tour_iWaNaTrip">
                                @elseif($catalogo->id_catalogo_servicios==5)
                                <img src="{{ asset('public/img/serr/night.jpg')}}" alt="night_iWaNaTrip">
                                @elseif($catalogo->id_catalogo_servicios==8)
                                <img src="{{ asset('public/img/serr/culture.jpg')}}" alt="culture_iWaNaTrip">
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
    
    {!! HTML::script('public/js/jquery.js') !!}
    {!!HTML::script('public/js/js_public/Compartido.js') !!}
    {!!HTML::script('public/js/loadingScreen/loadingoverlay.min.js') !!}
        {!!HTML::script('public/js/jquery.autocomplet.js') !!}
        {!!HTML::script('public/js/Compartido.js') !!}

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

    <!-- plugins -->
    <script type="text/javascript" src="{{ asset('public/public_components/js/jquery.plugins.js')}}"></script>



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
            background:url ("{!!asset("public/img/internas/b05.png")!!}") no-repeat;
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
            background:url("{!!asset("public/img/internas/a12.png")!!}") no-repeat;
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
   $(".page-title-container.style3").css('backgroundImage','url({!!asset("public/img/serr/eat.jpg")!!})');
     @if($catalogo->id_catalogo_servicios==1)
                                
                                @elseif($catalogo->id_catalogo_servicios==2)
                                    $(".page-title-container.style3").css('backgroundImage','url({!!asset("public/img/serr/sleep.jpg")!!})');
                                @elseif($catalogo->id_catalogo_servicios==3)
                                   $(".page-title-container.style3").css('backgroundImage','url({!!asset("public/img/serr/trip.jpg")!!})');
                                @elseif($catalogo->id_catalogo_servicios==4)
                                  $(".page-title-container.style3").css('backgroundImage','url({!!asset("public/img/serr/tour.jpg")!!})');
                                @elseif($catalogo->id_catalogo_servicios==5)
                                   $(".page-title-container.style3").css('backgroundImage','url({!!asset("public/img/serr/night.jpg")!!})');
                                @elseif($catalogo->id_catalogo_servicios==8)
                                            $(".page-title-container.style3").css('backgroundImage','url({!!asset("public/img/serr/culture.jpg")!!})');
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
    <script type="text/javascript" src="{{ asset('public/public_components/js/main.js')}}"></script>


</body>
</html>