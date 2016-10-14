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

        <div class="page-title-container">
            <div class="soap-google-map"></div>
        </div>

        <section id="content">
            <div class="container">
                <ul class="contact-address style2 col-md-9">
                    <li class="office-address">
                        <i class="fa fa-map-marker"></i>
                        <div class="details">
                            <h5>Office Address</h5>
                            <p>Ecuador: Quito<br>
                            <p>Ecuador: Valle de los Chillos<br>
                            <p>Galápagos: San Cristóbal</p>
                        </div>
                    </li>
                    <li class="phone">
                        <i class="fa fa-phone"></i>
                        <div class="details">
                            <h5>Phone</h5>
                            <p>
                                Local: (593)995465562
                                <br>
                                Mobile: (593)982360900
                                <br>
                                Australia: (61)468313723
                            </p>
                        </div>
                    </li>
                    <li class="email-address">
                        <i class="fa fa-envelope"></i>
                        <div class="details">
                            <h5>Office Address</h5>
                            <p>
                                info@iwanatrip.com
                                <br>
                                www.iwanatrip.com
                            </p>
                        </div>
                    </li>
                </ul>
                
                <div class="col-md-8 center-block text-center block">
                    <div class="heading-box">
                        <h2 class="box-title">Drop us a line</h2>
                        <p class="desc-lg">Feel free to write us a message</p>
                    </div>
                    <form>
                        <div class="row">
                            <div class="form-group col-sms-6 col-sm-6">
                                <input type="text" class="input-text full-width" placeholder="First name">
                            </div>
                            <div class="form-group col-sms-6 col-sm-6">
                                <input type="text" class="input-text full-width" placeholder="Last name">
                            </div>
                            <div class="form-group col-sms-6 col-sm-6">
                                <input type="text" class="input-text full-width" placeholder="Email address">
                            </div>
                            <div class="form-group col-sms-6 col-sm-6">
                                <input type="text" class="input-text full-width" placeholder="Website">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea rows="10" class="input-text full-width" placeholder="Send Message"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-md style1">Write Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
<footer id="footer" class="style4">
          <div class="callout-box style2">
                <div class="container">
                    <div class="callout-content">
                        <div class="callout-text">
                            <h4>{{ trans('publico/labels.label119')}}</h4>
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

   <script type='text/javascript' src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
    <script type="text/javascript" src="{{ asset('public/public_components/js/gmap3.js')}}"></script>
 
    <!-- load page Javascript -->
    
    <script type="text/javascript" src="{{ asset('public/public_components/js/main.js')}}"></script>

    <script type="text/javascript">
        
        
        
        
        
         sjq(".soap-google-map").gmap3({
       
  map:{
    options:{
      center:[15.7398489,25.7006525],
      zoom: 2
    }
  },
  marker:{
    values:[
      {latLng:[-27.4703874,144.0582067], data:"Australia !"},
      {latLng:[-1.776349,-82.6390343], data:"Ecuador !"},
      {latLng:[51.0781847,5.9672474], data:"Germany !"}
      
    ],
    options:{
      draggable: false,
      icon: "{!!asset("public/img/CollageIsmage_opt.png")!!}",
    }
  }
});
        


    </script>
</body>
</html>