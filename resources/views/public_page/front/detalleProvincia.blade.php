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
        
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,400italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Dosis:400,300,500,600,700' rel='stylesheet' type='text/css'>

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



}
        </style>
    </head>
    <body class="woocommerce">
        <div id="page-wrapper">

            <header id="header"  class="header-color-white" >
                @include('public_page.reusable.header')
            </header>


            <div class="page-title-container">
               @include('public_page.reusable.banner')

                <ul class="breadcrumbs">
                    <li><a href="index.html">{{ trans('publico/labels.label1')}}</a></li>
                    @if($provincias->id_region==1) 
                    <li><a href="#">{{ trans('publico/labels.label13')}}</a></li>
                    @elseif($provincias->id_region==2)
                    <li><a href="#">{{ trans('publico/labels.label14')}}</a></li>
                    @elseif($provincias->id_region==3)
                    <li><a href="#">{{ trans('publico/labels.label15')}}</a></li>
                    @elseif($provincias->id_region==4)
                    <li><a href="#">{{ trans('publico/labels.label16')}}</a></li>

                    @endif

                    <li class="active">{!!$provincias->nombre!!}</li>
                </ul>
            </div>

            <section id="content">
                <div class="container">
                    <div class="row">
                        <div id="main" class="col-sm-8 col-md-9">
                            <div class="product type-product">
                                <div class="row single-product-details">
                                    <div class="product-images col-sm-5 box-lg">

                                        <div id="sync1" class="owl-carousel images">
                                            @foreach ($imagenes as $imagen)


                                            <div class="item easyzoom easyzoom--overlay">
                                                <a href="{{ asset('images/fullsize/'.$imagen->filename)}}"><img src="{{ asset('images/fullsize/'.$imagen->filename)}}" alt=""></a>
                                            </div>


                                            @endforeach
                                        </div>
                                        <div id="sync2" class="owl-carousel post-slider style3 thumbnails" data-items="4">

                                            @foreach ($imagenes as $imagen)



                                            <div class="item">
                                                <a href="#"><img src="{{ asset('images/icon/'.$imagen->filename)}}" alt=""></a>
                                            </div>

                                            @endforeach


                                        </div>
                                    </div>
                                    <div class="summary entry-summary col-sm-7 box-lg">
                                        <div class="clearfix">
                                            <h2 class="product-title entry-title">Provincia de </h2>
                                            <span class="star-rating" title="4" data-toggle="tooltip">
                                                <span data-stars="4"></span>
                                            </span>
                                        </div>
                                        <span class="product-price box">{!!$provincias->nombre!!}</span>
                                        
                                        <p class="more">{!!$provincias->descripcion_esp!!}</p>
                                        
                                        <dl class="product-meta">
                                            <dt class="sku-wrapper">SKU:</dt>
                                            <dd>0001</dd>
                                            <dt class="product-category">Category:</dt>
                                            <dd>Fashion</dd>
                                            <dt class="taggs">Product Tags:</dt>
                                            <dd>brightening, T-shirts</dd>
                                        </dl>
                                        <form class="variations-form cart">
                                            <div class="variations clearfix box">
                                                <div class="col-xs-12 col-lg-6">
                                                    <div class="st-td">
                                                        <label>City</label>
                                                    </div>
                                                    <div class="st-td">
                                                        <select class="selector">
                                                            <option value="">City</option>
                                                            <option value="large">Quito</option>
                                                            <option value="medium">Sangolqui</option>
                                                            <option value="small">Amaguaña</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-lg-6">
                                                    <div class="st-td">
                                                      <!--  <label>Pickup Color</label>-->
                                                      <div class="variation-action">
                                                    <a href="#" class="btn btn-medium style1"><i class="fa fa-heart"></i>Ver todas las ciudades</a>
                                                    <!--<a href="#" class="btn btn-medium style2"><i class="fa fa-shopping-cart"></i>Ver todas las ciudades</a>-->
                                                </div>
                                                    </div>
                                                    <div class="st-td">
                                                      <!--  <select class="selector">
                                                            <option value="">Select Size</option>
                                                            <option value="green">Green</option>
                                                            <option value="pink">Pink</option>
                                                        </select>-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-variation-wrap">
                                                <div class="qty-wrap">
                                                    <!--<label>Quantity</label>
                                                    <input type="text" class="input-text" value="1" name="qty">-->
                                                </div>
                                                
                                            </div>
                                        </form>
                                        
                                    </div>
                                </div>
                                <div class="woocommerce-tabs tab-container vertical-tab clearfix box">
                                    <ul class="tabs">
                                        <li><a href="#tab3-1" data-toggle="tab">Decriptions</a></li>
                                        <li><a href="#tab3-2" data-toggle="tab">Additional Details</a></li>
                                        <li class="active"><a href="#tab3-3" data-toggle="tab">Reviews</a></li>
                                        <li><a href="#tab3-4" data-toggle="tab">Product Tags</a></li>
                                    </ul>
                                    <div id="tab3-1" class="tab-content panel entry-content">
                                        <div class="tab-pane">
                                            <p>Aliquam hendrerit a augue insuscipit. Etiam aliquam massa quis mauris sollicitudin commodo venenatis ligula commodo. Sed blandi dignissim Donec vel pellentesque neque. Nulla et quam vitae sapien vestibulum molestie. Cras ac ligula vitae urna suscipit venenatis id quis urnaauris sodales lacinia mauris.Nunc id purus erat. Sed posuere risus orci, eu laoreet ligula dictum a. Mauris ut sagittis metus, sed tincidunt arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia.</p>
                                            <p>Curabitur eu tellus sit amet orci mollis blandit. Integer egestas consectetur bibendum. Nunc id purus erat. Sed posuere risus orci, eu laoreet ligula dictum a. Mauris ut sagittis metus, sed tincidunt arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum lacinia ligula eu ligula hendrerit lobortis. Proin quis bibendum libero.</p>
                                        </div>
                                    </div>
                                    <div id="tab3-2" class="tab-content panel entry-content">
                                        <div class="tab-pane">
                                            <dl class="shop_attributes">
                                                <dt>Composition:</dt>
                                                <dd>100% Polyester</dd>
                                                <dt>Washing:</dt>
                                                <dd>Please hand wash cool.</dd>
                                                <dt>Made in:</dt>
                                                <dd>Australia</dd>
                                                <dt class="note">Sizing note:</dt>
                                                <dd>Because the GFT is a feminine cut, we recommend sticking to your usual size :)</dd>
                                            </dl>
                                        </div>
                                    </div>
                                    <div id="tab3-3" class="tab-content panel entry-content in active">
                                        <div class="tab-pane">
                                            <div id="comments">
                                                <a href="#" class="btn btn-sm style1 btn-write-review"><i class="fa fa-pencil"></i>Write Review</a>
                                                <h3>2 Reviews on Geo Dream Dress</h3>
                                                <ol class="commentlist">
                                                    <li class="comment">
                                                        <div class="author-img">
                                                            <span><img src="http://placehold.it/100x100" alt=""></span>
                                                        </div>
                                                        <div class="comment-content">
                                                            <h5 class="comment-author-name"><a href="#">Anna Brown</a></h5>
                                                            <span data-toggle="tooltip" title="4" class="star-rating">
                                                                <span data-stars="4"></span>
                                                            </span>
                                                            <span class="comment-date">12 Nov, 2013</span>
                                                            <div class="description">
                                                                <p>Nulla mattis rsitmet dolor sollicitudi aliquamquae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo Lorem ipsum dolor sit amet gravida sagittis lacus. Morbi sit amet mauris mi.</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="comment">
                                                        <div class="author-img">
                                                            <span><img src="http://placehold.it/100x100" alt=""></span>
                                                        </div>
                                                        <div class="comment-content">
                                                            <h5 class="comment-author-name"><a href="#">Jessica Marvin</a></h5>
                                                            <span data-toggle="tooltip" title="4" class="star-rating">
                                                                <span data-stars="4"></span>
                                                            </span>
                                                            <span class="comment-date">12 Nov, 2013</span>
                                                            <div class="description">
                                                                <p>Nulla mattis rsitmet dolor sollicitudi aliquamquae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo Lorem ipsum dolor sit amet gravida sagittis lacus. Morbi sit amet mauris mi.</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ol>
                                            </div>
                                            <div id="review_form">
                                                <form>
                                                    <a href="#" class="btn btn-sm style4 btn-back-reviews"><i class="fa fa-long-arrow-left"></i>Back To Reviews</a>
                                                    <h3>Be the first to review “Geo Dream Dress”</h3>
                                                    <div class="row">
                                                        <div class="col-lg-10">
                                                            <div class="form-group">
                                                                <label>Name</label>
                                                                <input type="text" class="input-text full-width">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input type="text" class="input-text full-width">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Rating</label>
                                                                <input type="hidden" id="review_score" value="">
                                                                <span class="input-star-rating">
                                                                    <input type="radio" value="5" name="review_score">
                                                                    <input type="radio" value="4" name="review_score">
                                                                    <input type="radio" value="3" name="review_score">
                                                                    <input type="radio" value="2" name="review_score">
                                                                    <input type="radio" value="1" name="review_score">
                                                                </span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Your review</label>
                                                                <textarea class="input-text full-width" rows="5"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <button class="btn style1" type="submit">Submit Review</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab3-4" class="tab-content panel entry-content">
                                        <div class="tab-pane">
                                            <form class="add-product-tags">
                                                <div class="row">
                                                    <div class="col-lg-10">
                                                        <div class="form-group">
                                                            <input type="text" class="input-text full-width" placeholder="Add your tags">
                                                        </div>
                                                        <div class="form-group">
                                                            <p>Use spaces to separate tags. Use single quotes (') for phrases.</p>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-medium style1">Add Tags</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="product type-product">
                                <h4>Related Products</h4>
                                <ul class="related products row add-clearfix">
                                    <li class="product col-sms-6 col-sm-6 col-md-4 box">
                                        <a class="product-image" href="#">
                                            <div class="first-img">
                                                <img alt="" src="{{ asset('images/fullsize/68dsc03030.jpg')}}">
                                            </div>
                                            <div class="back-img">
                                                <img alt="" src="{{ asset('images/fullsize/5712-08-2015-88.jpg')}}">
                                            </div>
                                        </a>
                                        <div class="product-content">
                                            <h5 class="product-title"><a href="#">Pichincha</a></h5>
                                            <span class="product-price"><span class="currency-symbol"></span>Sierra</span>
                                            <span class="star-rating" title="" data-toggle="tooltip" data-original-title="4">
                                                <span data-stars="4"></span>
                                            </span>
                                        </div>
                                        <div class="product-action">
                                            <!--<a class="btn btn-add-to-cart" href="#"><i class="fa fa-shopping-cart"></i>Add To Cart</a>-->
                                            <a class="btn btn-add-to-wishlist" href="#"><i class="fa fa-heart"></i></a>
                                            <a href="ajax/woocommerce-product-quickview.html" class="btn btn-quick-view"><i class="fa fa-search"></i></a>
                                            <a class="btn btn-compare" href="#"><i class="fa fa-star-half-o"></i></a>
                                        </div>
                                    </li>
                                    <li class="product col-sms-6 col-sm-6 col-md-4 box">
                                        <a class="product-image" href="#">
                                            <div class="first-img">
                                                <img alt="" src="{{ asset('images/fullsize/5709-08-2015-31.jpg')}}">
                                            </div>
                                            <div class="back-img">
                                                <img alt="" src="{{ asset('images/fullsize/5709-08-2015-25.jpg')}}">
                                            </div>
                                        </a>
                                        <div class="product-content">
                                            <h5 class="product-title"><a href="#">Azuay</a></h5>
                                            <span class="product-price"><span class="currency-symbol"></span>Sierra</span>
                                            <span class="star-rating" title="" data-toggle="tooltip" data-original-title="4">
                                                <span data-stars="4"></span>
                                            </span>
                                        </div>
                                        <div class="product-action">
                                            
                                            <a class="btn btn-add-to-wishlist" href="#"><i class="fa fa-heart"></i></a>
                                            <a href="ajax/woocommerce-product-quickview.html" class="btn btn-quick-view"><i class="fa fa-search"></i></a>
                                            <a class="btn btn-compare" href="#"><i class="fa fa-star-half-o"></i></a>
                                        </div>
                                    </li>
                                    <li class="product col-sms-6 col-sm-6 col-md-4 box">
                                        <a class="product-image" href="#">
                                            <div class="first-img">
                                                <img alt="" src="{{ asset('images/fullsize/6009-08-2015-8.jpg')}}">
                                            </div>
                                            <div class="back-img">
                                                <img alt="" src="{{ asset('images/fullsize/6010-08-2015-65.jpg')}}">
                                            </div>
                                        </a>
                                        <div class="product-content">
                                            <h5 class="product-title"><a href="#">Imbabura</a></h5>
                                            <span class="product-price"><span class="currency-symbol"></span>Sierra</span>
                                            <span class="star-rating" title="" data-toggle="tooltip" data-original-title="4">
                                                <span data-stars="4"></span>
                                            </span>
                                        </div>
                                        <div class="product-action">
                                            
                                            <a class="btn btn-add-to-wishlist" href="#"><i class="fa fa-heart"></i></a>
                                            <a href="ajax/woocommerce-product-quickview.html" class="btn btn-quick-view"><i class="fa fa-search"></i></a>
                                            <a class="btn btn-compare" href="#"><i class="fa fa-star-half-o"></i></a>
                                        </div>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar col-sm-4 col-md-3">
                            <div class="main-mini-search-form full-width box">
                                <form method="get" role="search">
                                    <div class="search-box">
                                        <input type="text" placeholder="Search" name="s" value="">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="widget box">
                                <h4>{{ trans('publico/labels.label18')}}</h4>
                                <ul class="product-list-widget">
                                    <li>
                                        <div class="product-image">
                                            <a href="#">
                                                <img src="{{ asset('images/register/registro1.jpg')}}" alt="">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <h6 class="product-title"><a href="#">Alimentacion y bebidas</a></h6>
                                            <span class="product-price">desde $18.99</span>
                                            <span class="star-rating" title="4" data-toggle="tooltip">
                                                <span data-stars="4"></span>
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="product-image">
                                            <a href="#">
                                                <img src="{{ asset('images/register/registro2.jpg')}}" alt="">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <h6 class="product-title"><a href="#">Alojamiento</a></h6>
                                            <span class="product-price">desde $23.58</span>
                                            <span class="star-rating" title="4" data-toggle="tooltip">
                                                <span data-stars="4"></span>
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="product-image">
                                            <a href="#">
                                                <img src="{{ asset('images/register/registro3.jpg')}}" alt="">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <h6 class="product-title"><a href="#">Tours y actividades</a></h6>
                                            <span class="product-price">desde $76.00</span>
                                            <span class="star-rating" title="4" data-toggle="tooltip">
                                                <span data-stars="4"></span>
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="widget banner-slider box">
                                <div class="owl-carousel" data-itemsPerDisplayWidth="[[0, 1], [480, 2], [768, 1], [992, 1], [1200, 1]]" data-items="1">
                                    <a href="#">
                                        <img src="http://placehold.it/324x444" alt="">
                                    </a>
                                    <a href="#">
                                        <img src="http://placehold.it/324x444" alt="">
                                    </a>
                                </div>
                                <div class="banner-text">
                                    <h2 class="banner-title">What’s New</h2>
                                    <span class="banner-content">2014 First Arrivals</span>
                                </div>
                            </div>
                            <div class="box">
                                <h4>Popular Tags</h4>
                                <div class="tags">
                                    <a class="tag" href="#">masonry</a>
                                    <a class="tag" href="#">responsive</a>
                                    <a class="tag" href="#">Ecommerce</a>
                                    <a class="tag" href="#">retina</a>
                                    <a class="tag" href="#">multi-purpose</a>
                                    <a class="tag" href="#">blog posts</a>
                                    <a class="tag" href="#">web design</a>
                                    <a class="tag" href="#">wordpres</a>
                                    <a class="tag" href="#">mobile</a>
                                </div>
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
    var showChar = 100;  // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "Show more >";
    var lesstext = "Show less";
    

    $('.more').each(function() {
        var content = $(this).html();
 
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
 
            $(this).html(html);
        }
 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
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
});
        
        
        
        </script>
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
});
        </script>
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

        <!-- load page Javascript -->
        <script type="text/javascript" src="{{ asset('public_components/js/main.js')}}"></script>
        
      
        

    </body>
</html>