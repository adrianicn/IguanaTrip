<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
    <head>
        <!-- Page Title -->
        <title>IguanaTrip.com</title>

        <link rel="shortcut icon" href="images/favicon.png" />

        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta name="description" content="IguanaTrip.com">
        <meta name="author" content="IguanaTrip team">

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
        <div class="main clearfix">
				<!-- Optional columns for small components -->
				<div class="column">
					<p>Embarcate en una aventura en Ecuador y acompañanos a descubrirlo.</p>
                                        <p> Deja de ser turista, conviertete en viajero.</p>
				</div>
				<div class="column">
					<div id="sb-search" class="sb-search">
						<form>
							<input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
							<input class="sb-search-submit" type="submit" value="">
							<span class="sb-icon-search"></span>
						</form>
					</div>
				</div>
			</div>
				
        <div id="page-wrapper">
            <header id="header" class="header-color-white">
                <div class="container">
                    <div class="header-inner">
                        <div class="branding">
                            <h1 class="logo">
                                <a href="#" onclick="window.location.href = '{!!asset('/')!!}'"><img src="{{ asset('img/index-logo.png')}}" alt=""><span>IguanaTrip</span></a>
                            </h1>
                        </div>
                        <nav id="nav">
                            <ul class="header-top-nav">
                                <li class="mini-cart menu-item-has-children">
                                    <a href="#"><i class="fa fa-shopping-cart has-circle"></i></a>
                                    <!--<div class="sub-nav cart-content">
                                        <ul class="product-list">
                                            <li class="empty">No products in the cart.</li>
                                        </ul>
                                        <hr>
                                        <div class="st-table">
                                            <div class="cart-action">
                                                <a href="woocommerce-shopping-cart.html" class="btn-view-cart btn btn-sm style4"><i class="fa fa-shopping-cart"></i>View Cart</a>
                                            </div>
                                            <div class="cart-price">Total: <span class="total-price">$00.0</span></div>
                                        </div>
                                    </div>-->
                                    <div class="sub-nav cart-content">
                                        <ul class="product-list product-list-widget">
                                            <li>
                                                <div class="product-image">
                                                    <a href="#"><img alt="" src="http://placehold.it/58x63"></a>
                                                </div>
                                                <div class="product-content">
                                                    <a href="#" class="product-title">Everyday Scoop Neck Cami</a>
                                                    <span class="product-price">$18.99</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="product-image">
                                                    <a href="#"><img alt="" src="http://placehold.it/58x63"></a>
                                                </div>
                                                <div class="product-content">
                                                    <a href="#" class="product-title">Easy Draped Cardigan</a>
                                                    <span class="product-price">$23.58</span>
                                                </div>
                                            </li>
                                        </ul>
                                        <hr>
                                        <div class="st-table">
                                            <div class="cart-action">
                                                <a href="woocommerce-shopping-cart.html" class="btn-view-cart btn btn-sm style4"><i class="fa fa-shopping-cart"></i>View Cart</a>
                                            </div>
                                            <div class="cart-price">Total: <span class="total-price">$42.57</span></div>
                                        </div>
                                    </div>
                                </li>
                                <li class="mini-search">
                                    <a href="#"><i class="fa fa-search has-circle"></i></a>
                                    <div class="main-nav-search-form">
                                        <form method="get" role="search">
                                            <div class="search-box">
                                                <input type="text" id="s" name="s" value="">
                                                <button type="submit"><i class="fa fa-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                                <li class="visible-mobile">
                                    <a href="#mobile-nav-wrapper" data-toggle="collapse"><i class="fa fa-bars has-circle"></i></a>
                                </li>
                            </ul>
                            <ul id="main-nav" class="hidden-mobile">
                                <li class="menu-item-has-children">
                                    <a href="index.html">Home</a>
                                    <ul class="sub-nav">
                                        <li><a href="index.html">Homepage 1</a></li>
                                        <li><a href="homepage2.html">Homepage 2</a></li>
                                        <li><a href="homepage3.html">Homepage 3</a></li>
                                        <li><a href="homepage4.html">Homepage 4</a></li>
                                        <li><a href="homepage5.html">Homepage 5</a></li>
                                        <li><a href="homepage6.html">Homepage 6</a></li>
                                        <li><a href="homepage7.html">Homepage 7</a></li>
                                        <li><a href="homepage8.html">Homepage 8</a></li>
                                        <li><a href="homepage9.html">Homepage 9</a></li>
                                        <li><a href="homepage10.html">Homepage 10</a></li>
                                        <li><a href="homepage11.html">Homepage 11</a></li>
                                        <li><a href="homepage12.html">Homepage 12</a></li>
                                        <li><a href="homepage13.html">Homepage 13</a></li>
                                        <li><a href="homepage14.html">Homepage 14</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Pages</a>
                                    <ul class="sub-nav">
                                        <li class="menu-item-has-children">
                                            <a href="#">About US</a>
                                            <ul class="sub-nav">
                                                <li><a href="pages-about1.html">About Us 1</a></li>
                                                <li><a href="pages-about2.html">About Us 2</a></li>
                                                <li><a href="pages-about3.html">About Us 3</a></li>
                                                <li><a href="pages-about4.html">Member Details</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Services</a>
                                            <ul class="sub-nav">
                                                <li><a href="pages-services1.html">Services 1</a></li>
                                                <li><a href="pages-services2.html">Services 2</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Page Layouts</a>
                                            <ul class="sub-nav">
                                                <li><a href="pages-layouts-left-sidebar.html">Left Sidebar</a></li>
                                                <li><a href="pages-layouts-right-sidebar.html">Right Sidebar</a></li>
                                                <li><a href="pages-layouts-fullwidth.html">Full Width</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="pages-faqs.html">FAQS</a></li>
                                        <li><a href="pages-terms-conditions.html">Terms & Conditions</a></li>
                                        <li><a href="pages-404.html">404 Page</a></li>
                                        <li><a href="pages-coming-soon.html">Coming Soon</a></li>
                                        <li><a href="pages-blank.html">Blank Page</a></li>
                                        <li><a href="pages-loading.html">Loading Page</a></li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Inner Style</a>
                                            <ul class="sub-nav">
                                                <li><a href="pages-inner-style1.html">Inner Style 1</a></li>
                                                <li><a href="pages-inner-style2.html">Inner Style 2</a></li>
                                                <li><a href="pages-inner-style3.html">Inner Style 3</a></li>
                                                <li><a href="pages-inner-style4.html">Inner Style 4</a></li>
                                                <li><a href="pages-inner-style5.html">Inner Style 5</a></li>
                                                <li><a href="pages-inner-style6.html">Inner Style 6</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Footer Style</a>
                                            <ul class="sub-nav">
                                                <li><a href="pages-footer-style1.html">Footer Style 1</a></li>
                                                <li><a href="pages-footer-style2.html">Footer Style 2</a></li>
                                                <li><a href="pages-footer-style3.html">Footer Style 3</a></li>
                                                <li><a href="pages-footer-style4.html">Footer Style 4</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children mega-menu-item mega-column-4">
                                    <a href="#">Shortcodes</a>
                                    <ul class="sub-nav">
                                        <li class="menu-item-has-children">
                                            <a href="#">Miracle Elements</a>
                                            <ul class="sub-nav">
                                                <li><a href="shortcode-accordion-toggles.html"><i class="fa fa-caret-square-o-right"></i><span>Accordion & Toggles</span></a></li>
                                                <li><a href="shortcode-animations.html"><i class="fa fa-spinner"></i><span>Animations</span></a></li>
                                                <li><a href="shortcode-blog-posts.html"><i class="fa fa-file-text-o"></i><span>Blog Posts</span></a></li>
                                                <li><a href="shortcode-buttons.html"><i class="fa fa-link"></i><span>Buttons</span></a></li>
                                                <li><a href="shortcode-dropdown.html"><i class="fa fa-bars"></i><span>Dropdowns</span></a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Miracle Elements</a>
                                            <ul class="sub-nav">
                                                <li><a href="shortcode-form-layouts.html"><i class="fa fa-tasks"></i><span>Form Layouts</span></a></li>
                                                <li><a href="shortcode-galleries.html"><i class="fa fa-picture-o"></i><span>Galleries</span></a></li>
                                                <li><a href="shortcode-icon-styling.html"><i class="fa fa-adjust"></i><span>Icon Styling</span></a></li>
                                                <li><a href="shortcode-interactive-banners.html"><i class="fa fa-list-alt"></i><span>Interactive Banners</span></a></li>
                                                <li><a href="shortcode-process.html"><i class="fa fa-cog"></i><span>Process</span></a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Miracle Elements</a>
                                            <ul class="sub-nav">
                                                <li><a href="shortcode-post-sliders.html"><i class="fa fa-picture-o"></i><span>Posts Sliders</span></a></li>
                                                <li><a href="shortcode-pricing-tables.html"><i class="fa fa-table"></i><span>Pricing Tables</span></a></li>
                                                <li><a href="shortcode-progress-bars.html"><i class="fa fa-bar-chart-o"></i><span>Progress Bars</span></a></li>
                                                <li><a href="shortcode-style-changer.html"><i class="fa fa-exchange"></i><span>Style Changer</span></a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Miracle Elements</a>
                                            <ul class="sub-nav">
                                                <li><a href="shortcode-tabs.html"><i class="fa fa-list"></i><span>Tabs</span></a></li>
                                                <li><a href="shortcode-team.html"><i class="fa fa-user"></i><span>Team Members</span></a></li>
                                                <li><a href="shortcode-testimonials.html"><i class="fa fa-comment"></i><span>Testimonials</span></a></li>
                                                <li><a href="shortcode-typography.html"><i class="fa fa-print"></i><span>Typography</span></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Portfolio</a>
                                    <ul class="sub-nav">
                                        <li class="menu-item-has-children">
                                            <a href="#">Fancy Grid</a>
                                            <ul class="sub-nav">
                                                <li><a href="portfolio-fancy-grid-2columns.html">2 Columns</a></li>
                                                <li><a href="portfolio-fancy-grid-3columns.html">3 Columns</a></li>
                                                <li><a href="portfolio-fancy-grid-4columns.html">4 Columns</a></li>
                                                <li><a href="portfolio-fancy-grid-5columns.html">5 Columns</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Fancy Wide</a>
                                            <ul class="sub-nav">
                                                <li><a href="portfolio-fancy-wide-3columns.html">3 Columns</a></li>
                                                <li><a href="portfolio-fancy-wide-4columns.html">4 Columns</a></li>
                                                <li><a href="portfolio-fancy-wide-5columns.html">5 Columns</a></li>
                                                <li><a href="portfolio-fancy-wide-6columns.html">6 Columns</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Grid</a>
                                            <ul class="sub-nav">
                                                <li><a href="portfolio-grid-2columns.html">2 Columns</a></li>
                                                <li><a href="portfolio-grid-3columns.html">3 Columns</a></li>
                                                <li><a href="portfolio-grid-4columns.html">4 Columns</a></li>
                                                <li><a href="portfolio-grid-5columns.html">5 Columns</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Masonry</a>
                                            <ul class="sub-nav">
                                                <li><a href="portfolio-masonry1.html">Masonry 1</a></li>
                                                <li><a href="portfolio-masonry2.html">Masonry 2</a></li>
                                                <li><a href="portfolio-masonry3.html">Masonry Text</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Single</a>
                                            <ul class="sub-nav">
                                                <li><a href="portfolio-single1.html">Big Slider</a></li>
                                                <li><a href="portfolio-single2.html">Fullwidth Gallery</a></li>
                                                <li><a href="portfolio-single3.html">Fullwidth Project</a></li>
                                                <li><a href="portfolio-single4.html">Small Gallery</a></li>
                                                <li><a href="portfolio-single5.html">Small Slider Project</a></li>
                                                <li><a href="portfolio-single6.html">Vertical Gallery</a></li>
                                                <li><a href="portfolio-single7.html">Vertical Project</a></li>
                                                <li><a href="portfolio-single8.html">Video Project</a></li>
                                                <li><a href="portfolio-single9.html">Wide Image Project</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children mega-menu-item mega-column-6">
                                    <a href="#">Blog</a>
                                    <ul class="sub-nav">
                                        <li class="menu-item-has-children">
                                            <a href="#">Masonry</a>
                                            <ul class="sub-nav">
                                                <li><a href="blog-masonry-2columns.html">2 Column</a></li>
                                                <li><a href="blog-masonry-3columns.html">3 Column</a></li>
                                                <li><a href="blog-masonry-leftsidebar.html">Left Sidebar</a></li>
                                                <li><a href="blog-masonry-rightsidebar.html">Right Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Grid</a>
                                            <ul class="sub-nav">
                                                <li><a href="blog-grid-2columns.html">2 Column</a></li>
                                                <li><a href="blog-grid-3columns.html">3 Column</a></li>
                                                <li><a href="blog-grid-4columns.html">4 Columns</a></li>
                                                <li><a href="blog-grid-fullwidth.html">Fullwidth</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Mini</a>
                                            <ul class="sub-nav">
                                                <li><a href="blog-mini-fullwidth.html">Fullwidth</a></li>
                                                <li><a href="blog-mini-leftsidebar.html">Left Sidebar</a></li>
                                                <li><a href="blog-mini-rightsidebar.html">Right Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Classic</a>
                                            <ul class="sub-nav">
                                                <li><a href="blog-classic-fullwidth.html">Fullwidth</a></li>
                                                <li><a href="blog-classic-leftsidebar.html">Left Sidebar</a></li>
                                                <li><a href="blog-classic-rightsidebar.html">Right Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Timeline</a>
                                            <ul class="sub-nav">
                                                <li><a href="blog-timeline-fullwidth.html">Fullwidth</a></li>
                                                <li><a href="blog-timeline-leftsidebar.html">Left Sidebar</a></li>
                                                <li><a href="blog-timeline-rightsidebar.html">Right Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Single Posts</a>
                                            <ul class="sub-nav">
                                                <li><a href="blog-singlepost-standard.html">Standard</a></li>
                                                <li><a href="blog-singlepost-rightsidebar.html">Right Sidebar</a></li>
                                                <li><a href="blog-singlepost-leftsidebar.html">Left Sidebar</a></li>
                                                <li><a href="blog-singlepost-audio.html">Audio</a></li>
                                                <li><a href="blog-singlepost-blockquote.html">Blockquote</a></li>
                                                <li><a href="blog-singlepost-gallery.html">Gallery</a></li>
                                                <li><a href="blog-singlepost-video.html">Video</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Contact</a>
                                    <ul class="sub-nav">
                                        <li><a href="pages-contact1.html">Contact 1</a></li>
                                        <li><a href="pages-contact2.html">Contact 2</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Shop</a>
                                    <ul class="sub-nav">
                                        <li class="menu-item-has-children">
                                            <a href="#">Home Pages</a>
                                            <ul class="sub-nav">
                                                <li><a href="woocommerce-homepage1.html">Homepage 1</a></li>
                                                <li><a href="woocommerce-homepage2.html">Homepage 2</a></li>
                                                <li><a href="woocommerce-homepage3.html">Homepage 3</a></li>
                                                <li><a href="woocommerce-homepage4.html">Homepage 4</a></li>
                                                <li><a href="woocommerce-homepage5.html">Homepage 5</a></li>
                                                <li><a href="woocommerce-homepage6.html">Homepage 6</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Category Pages</a>
                                            <ul class="sub-nav">
                                                <li><a href="woocommerce-category-grid.html">Grid Style</a></li>
                                                <li><a href="woocommerce-category-list.html">List Style</a></li>
                                                <li><a href="woocommerce-category-banner.html">With Banner</a></li>
                                                <li><a href="woocommerce-category-big-header.html">Big Header</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Product Pages</a>
                                            <ul class="sub-nav">
                                                <li><a href="woocommerce-product-detailed.html">Product Detailed</a></li>
                                                <li><a href="woocommerce-product-sidebar.html">Product Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="woocommerce-product-quickview.html">Quick View Popup</a></li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Cart Pages</a>
                                            <ul class="sub-nav">
                                                <li><a href="woocommerce-shopping-cart.html">Shopping Cart</a></li>
                                                <li><a href="woocommerce-checkout.html">Checkout</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Page Layouts</a>
                                            <ul class="sub-nav">
                                                <li><a href="woocommerce-layout-fullwidth.html">Fullwidth</a></li>
                                                <li><a href="woocommerce-layout-sidebar.html">Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="woocommerce-dashboard.html">Dashboard</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="mobile-nav-wrapper collapse visible-mobile" id="mobile-nav-wrapper">
                    <ul class="mobile-nav">
                        <li class="menu-item-has-children">
                            <span class="open-subnav"></span>
                            <a href="index.html">Home</a>
                            <ul class="sub-nav">
                                <li><a href="index.html">Homepage 1</a></li>
                                <li><a href="homepage2.html">Homepage 2</a></li>
                                <li><a href="homepage3.html">Homepage 3</a></li>
                                <li><a href="homepage4.html">Homepage 4</a></li>
                                <li><a href="homepage5.html">Homepage 5</a></li>
                                <li><a href="homepage6.html">Homepage 6</a></li>
                                <li><a href="homepage7.html">Homepage 7</a></li>
                                <li><a href="homepage8.html">Homepage 8</a></li>
                                <li><a href="homepage9.html">Homepage 9</a></li>
                                <li><a href="homepage10.html">Homepage 10</a></li>
                                <li><a href="homepage11.html">Homepage 11</a></li>
                                <li><a href="homepage12.html">Homepage 12</a></li>
                                <li><a href="homepage13.html">Homepage 13</a></li>
                                <li><a href="homepage14.html">Homepage 14</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <span class="open-subnav"></span>
                            <a href="#">Pages</a>
                            <ul class="sub-nav">
                                <li class="menu-item-has-children">
                                    <span class="open-subnav"></span>
                                    <a href="#">About US</a>
                                    <ul class="sub-nav">
                                        <li><a href="pages-about1.html">About Us 1</a></li>
                                        <li><a href="pages-about2.html">About Us 2</a></li>
                                        <li><a href="pages-about3.html">About Us 3</a></li>
                                        <li><a href="pages-about4.html">Member Details</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <span class="open-subnav"></span>
                                    <a href="#">Services</a>
                                    <ul class="sub-nav">
                                        <li><a href="pages-services1.html">Services 1</a></li>
                                        <li><a href="pages-services2.html">Services 2</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <span class="open-subnav"></span>
                                    <a href="#">Page Layouts</a>
                                    <ul class="sub-nav">
                                        <li><a href="pages-layouts-left-sidebar.html">Left Sidebar</a></li>
                                        <li><a href="pages-layouts-right-sidebar.html">Right Sidebar</a></li>
                                        <li><a href="pages-layouts-fullwidth.html">Full Width</a></li>
                                    </ul>
                                </li>
                                <li><a href="pages-faqs.html">FAQS</a></li>
                                <li><a href="pages-terms-conditions.html">Terms & Conditions</a></li>
                                <li><a href="pages-404.html">404 Page</a></li>
                                <li><a href="pages-coming-soon.html">Coming Soon</a></li>
                                <li><a href="pages-blank.html">Blank Page</a></li>
                                <li><a href="pages-loading.html">Loading Page</a></li>
                                <li class="menu-item-has-children">
                                    <span class="open-subnav"></span>
                                    <a href="#">Inner Style</a>
                                    <ul class="sub-nav">
                                        <li><a href="pages-inner-style1.html">Inner Style 1</a></li>
                                        <li><a href="pages-inner-style2.html">Inner Style 2</a></li>
                                        <li><a href="pages-inner-style3.html">Inner Style 3</a></li>
                                        <li><a href="pages-inner-style4.html">Inner Style 4</a></li>
                                        <li><a href="pages-inner-style5.html">Inner Style 5</a></li>
                                        <li><a href="pages-inner-style6.html">Inner Style 6</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <span class="open-subnav"></span>
                                    <a href="#">Footer Style</a>
                                    <ul class="sub-nav">
                                        <li><a href="pages-footer-style1.html">Footer Style 1</a></li>
                                        <li><a href="pages-footer-style2.html">Footer Style 2</a></li>
                                        <li><a href="pages-footer-style3.html">Footer Style 3</a></li>
                                        <li><a href="pages-footer-style4.html">Footer Style 4</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <span class="open-subnav"></span>
                            <a href="#">Shortcodes</a>
                            <ul class="sub-nav">
                                <li><a href="shortcode-accordion-toggles.html"><i class="fa fa-caret-square-o-right"></i><span>Accordion & Toggles</span></a></li>
                                <li><a href="shortcode-animations.html"><i class="fa fa-spinner"></i><span>Animations</span></a></li>
                                <li><a href="shortcode-blog-posts.html"><i class="fa fa-file-text-o"></i><span>Blog Posts</span></a></li>
                                <li><a href="shortcode-buttons.html"><i class="fa fa-link"></i><span>Buttons</span></a></li>
                                <li><a href="shortcode-dropdown.html"><i class="fa fa-bars"></i><span>Dropdowns</span></a></li>
                                <li><a href="shortcode-form-layouts.html"><i class="fa fa-tasks"></i><span>Form Layouts</span></a></li>
                                <li><a href="shortcode-galleries.html"><i class="fa fa-picture-o"></i><span>Galleries</span></a></li>
                                <li><a href="shortcode-icon-styling.html"><i class="fa fa-adjust"></i><span>Icon Styling</span></a></li>
                                <li><a href="shortcode-interactive-banners.html"><i class="fa fa-list-alt"></i><span>Interactive Banners</span></a></li>
                                <li><a href="shortcode-process.html"><i class="fa fa-cog"></i><span>Process</span></a></li>
                                <li><a href="shortcode-post-sliders.html"><i class="fa fa-picture-o"></i><span>Posts Sliders</span></a></li>
                                <li><a href="shortcode-pricing-tables.html"><i class="fa fa-table"></i><span>Pricing Tables</span></a></li>
                                <li><a href="shortcode-progress-bars.html"><i class="fa fa-bar-chart-o"></i><span>Progress Bars</span></a></li>
                                <li><a href="shortcode-style-changer.html"><i class="fa fa-exchange"></i><span>Style Changer</span></a></li>
                                <li><a href="shortcode-tabs.html"><i class="fa fa-list"></i><span>Tabs</span></a></li>
                                <li><a href="shortcode-team.html"><i class="fa fa-user"></i><span>Team Members</span></a></li>
                                <li><a href="shortcode-testimonials.html"><i class="fa fa-comment"></i><span>Testimonials</span></a></li>
                                <li><a href="shortcode-typography.html"><i class="fa fa-print"></i><span>Typography</span></a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <span class="open-subnav"></span>
                            <a href="#">Portfolio</a>
                            <ul class="sub-nav">
                                <li class="menu-item-has-children">
                                    <span class="open-subnav"></span>
                                    <a href="#">Fancy Grid</a>
                                    <ul class="sub-nav">
                                        <li><a href="portfolio-fancy-grid-2columns.html">2 Columns</a></li>
                                        <li><a href="portfolio-fancy-grid-3columns.html">3 Columns</a></li>
                                        <li><a href="portfolio-fancy-grid-4columns.html">4 Columns</a></li>
                                        <li><a href="portfolio-fancy-grid-5columns.html">5 Columns</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <span class="open-subnav"></span>
                                    <a href="#">Fancy Wide</a>
                                    <ul class="sub-nav">
                                        <li><a href="portfolio-fancy-wide-3columns.html">3 Columns</a></li>
                                        <li><a href="portfolio-fancy-wide-4columns.html">4 Columns</a></li>
                                        <li><a href="portfolio-fancy-wide-5columns.html">5 Columns</a></li>
                                        <li><a href="portfolio-fancy-wide-6columns.html">6 Columns</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <span class="open-subnav"></span>
                                    <a href="#">Grid</a>
                                    <ul class="sub-nav">
                                        <li><a href="portfolio-grid-2columns.html">2 Columns</a></li>
                                        <li><a href="portfolio-grid-3columns.html">3 Columns</a></li>
                                        <li><a href="portfolio-grid-4columns.html">4 Columns</a></li>
                                        <li><a href="portfolio-grid-5columns.html">5 Columns</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <span class="open-subnav"></span>
                                    <a href="#">Masonry</a>
                                    <ul class="sub-nav">
                                        <li><a href="portfolio-masonry1.html">Masonry 1</a></li>
                                        <li><a href="portfolio-masonry2.html">Masonry 2</a></li>
                                        <li><a href="portfolio-masonry3.html">Masonry Text</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <span class="open-subnav"></span>
                                    <a href="#">Single</a>
                                    <ul class="sub-nav">
                                        <li><a href="portfolio-single1.html">Big Slider</a></li>
                                        <li><a href="portfolio-single2.html">Fullwidth Gallery</a></li>
                                        <li><a href="portfolio-single3.html">Fullwidth Project</a></li>
                                        <li><a href="portfolio-single4.html">Small Gallery</a></li>
                                        <li><a href="portfolio-single5.html">Small Slider Project</a></li>
                                        <li><a href="portfolio-single6.html">Vertical Gallery</a></li>
                                        <li><a href="portfolio-single7.html">Vertical Project</a></li>
                                        <li><a href="portfolio-single8.html">Video Project</a></li>
                                        <li><a href="portfolio-single9.html">Wide Image Project</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <span class="open-subnav"></span>
                            <a href="#">Blog</a>
                            <ul class="sub-nav">
                                <li class="menu-item-has-children">
                                    <span class="open-subnav"></span>
                                    <a href="#">Masonry</a>
                                    <ul class="sub-nav">
                                        <li><a href="blog-masonry-2columns.html">2 Column</a></li>
                                        <li><a href="blog-masonry-3columns.html">3 Column</a></li>
                                        <li><a href="blog-masonry-leftsidebar.html">Left Sidebar</a></li>
                                        <li><a href="blog-masonry-rightsidebar.html">Right Sidebar</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <span class="open-subnav"></span>
                                    <a href="#">Grid</a>
                                    <ul class="sub-nav">
                                        <li><a href="blog-grid-2columns.html">2 Column</a></li>
                                        <li><a href="blog-grid-3columns.html">3 Column</a></li>
                                        <li><a href="blog-grid-4columns.html">4 Columns</a></li>
                                        <li><a href="blog-grid-fullwidth.html">Fullwidth</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <span class="open-subnav"></span>
                                    <a href="#">Mini</a>
                                    <ul class="sub-nav">
                                        <li><a href="blog-mini-fullwidth.html">Fullwidth</a></li>
                                        <li><a href="blog-mini-leftsidebar.html">Left Sidebar</a></li>
                                        <li><a href="blog-mini-rightsidebar.html">Right Sidebar</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <span class="open-subnav"></span>
                                    <a href="#">Classic</a>
                                    <ul class="sub-nav">
                                        <li><a href="blog-classic-fullwidth.html">Fullwidth</a></li>
                                        <li><a href="blog-classic-leftsidebar.html">Left Sidebar</a></li>
                                        <li><a href="blog-classic-rightsidebar.html">Right Sidebar</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <span class="open-subnav"></span>
                                    <a href="#">Timeline</a>
                                    <ul class="sub-nav">
                                        <li><a href="blog-timeline-fullwidth.html">Fullwidth</a></li>
                                        <li><a href="blog-timeline-leftsidebar.html">Left Sidebar</a></li>
                                        <li><a href="blog-timeline-rightsidebar.html">Right Sidebar</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <span class="open-subnav"></span>
                                    <a href="#">Single Posts</a>
                                    <ul class="sub-nav">
                                        <li><a href="blog-singlepost-standard.html">Standard</a></li>
                                        <li><a href="blog-singlepost-rightsidebar.html">Right Sidebar</a></li>
                                        <li><a href="blog-singlepost-leftsidebar.html">Left Sidebar</a></li>
                                        <li><a href="blog-singlepost-audio.html">Audio</a></li>
                                        <li><a href="blog-singlepost-blockquote.html">Blockquote</a></li>
                                        <li><a href="blog-singlepost-gallery.html">Gallery</a></li>
                                        <li><a href="blog-singlepost-video.html">Video</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <span class="open-subnav"></span>
                            <a href="#">Contact</a>
                            <ul class="sub-nav">
                                <li><a href="pages-contact1.html">Contact 1</a></li>
                                <li><a href="pages-contact2.html">Contact 2</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <span class="open-subnav"></span>
                            <a href="#">Shop</a>
                            <ul class="sub-nav">
                                <li class="menu-item-has-children">
                                    <span class="open-subnav"></span>
                                    <a href="#">Home Pages</a>
                                    <ul class="sub-nav">
                                        <li><a href="woocommerce-homepage1.html">Homepage 1</a></li>
                                        <li><a href="woocommerce-homepage2.html">Homepage 2</a></li>
                                        <li><a href="woocommerce-homepage3.html">Homepage 3</a></li>
                                        <li><a href="woocommerce-homepage4.html">Homepage 4</a></li>
                                        <li><a href="woocommerce-homepage5.html">Homepage 5</a></li>
                                        <li><a href="woocommerce-homepage6.html">Homepage 6</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <span class="open-subnav"></span>
                                    <a href="#">Category Pages</a>
                                    <ul class="sub-nav">
                                        <li><a href="woocommerce-category-grid.html">Grid Style</a></li>
                                        <li><a href="woocommerce-category-list.html">List Style</a></li>
                                        <li><a href="woocommerce-category-banner.html">With Banner</a></li>
                                        <li><a href="woocommerce-category-big-header.html">Big Header</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <span class="open-subnav"></span>
                                    <a href="#">Product Pages</a>
                                    <ul class="sub-nav">
                                        <li><a href="woocommerce-product-detailed.html">Product Detailed</a></li>
                                        <li><a href="woocommerce-product-sidebar.html">Product Sidebar</a></li>
                                    </ul>
                                </li>
                                <li><a href="woocommerce-product-quickview.html">Quick View Popup</a></li>
                                <li class="menu-item-has-children">
                                    <span class="open-subnav"></span>
                                    <a href="#">Cart Pages</a>
                                    <ul class="sub-nav">
                                        <li><a href="woocommerce-shopping-cart.html">Shopping Cart</a></li>
                                        <li><a href="woocommerce-checkout.html">Checkout</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <span class="open-subnav"></span>
                                    <a href="#">Page Layouts</a>
                                    <ul class="sub-nav">
                                        <li><a href="woocommerce-layout-fullwidth.html">Fullwidth</a></li>
                                        <li><a href="woocommerce-layout-sidebar.html">Sidebar</a></li>
                                    </ul>
                                </li>
                                <li><a href="woocommerce-dashboard.html">Dashboard</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
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
                </div>
            </div>
            
        
            
            <section id="content">
            <div class="container">
                <div id="main">
                    <div class="post-wrapper">
                        <div class="post-filters">
                            <a href="#" class="btn btn-sm style4 hover-blue active" data-filter="filter-all">Todos</a>
                            <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-logo">Costa</a>
                            <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-business">Sierra</a>
                            <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-website">Oriente</a>
                            <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-website">Galápagos</a>
                        </div>
                        <div class="iso-container iso-col-4 style-masonry">
                            <div class="iso-item double-width filter-all filter-logo">
                                <article class="post">
                                    <a class="image soap-mfp-popup hover-style3" href="{{ asset('images/icon/5709-08-2015-23.jpg')}}">
                                        <img src="{{ asset('images/fullsize/5709-08-2015-23.jpg')}}" alt="">
                                        <span class="image-extras"></span>
                                    </a>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-website">
                                <article class="post">
                                    <a class="image soap-mfp-popup hover-style3" href="{{ asset('images/fullsize/5709-08-2015-25.jpg')}}">
                                        <img src="{{ asset('images/icon/5709-08-2015-25.jpg')}}" alt="">
                                        <span class="image-extras"></span>
                                    </a>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-website">
                                <article class="post">
                                    <a class="image soap-mfp-popup hover-style3" href="http://placehold.it/780x535">
                                        <img src="http://placehold.it/780x535" alt="">
                                        <span class="image-extras"></span>
                                    </a>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-website">
                                <article class="post">
                                    <a class="image soap-mfp-popup hover-style3" href="http://placehold.it/500x665">
                                        <img src="http://placehold.it/500x665" alt="">
                                        <span class="image-extras"></span>
                                    </a>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-website">
                                <article class="post">
                                    <a class="image soap-mfp-popup hover-style3" href="http://placehold.it/457x533">
                                        <img src="http://placehold.it/457x533" alt="">
                                        <span class="image-extras"></span>
                                    </a>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-website filter-business">
                                <article class="post">
                                    <a class="image soap-mfp-popup hover-style3" href="http://placehold.it/496x800">
                                        <img src="http://placehold.it/496x800" alt="">
                                        <span class="image-extras"></span>
                                    </a>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-website">
                                <article class="post">
                                    <a class="image soap-mfp-popup hover-style3" href="http://placehold.it/551x534">
                                        <img src="http://placehold.it/551x534" alt="">
                                        <span class="image-extras"></span>
                                    </a>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-website filter-business filter-logo">
                                <article class="post">
                                    <a class="image soap-mfp-popup hover-style3" href="http://placehold.it/800x569">
                                        <img src="http://placehold.it/800x569" alt="">
                                        <span class="image-extras"></span>
                                    </a>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-website">
                                <article class="post">
                                    <a class="image soap-mfp-popup hover-style3" href="http://placehold.it/510x507">
                                        <img src="http://placehold.it/510x507" alt="">
                                        <span class="image-extras"></span>
                                    </a>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-business filter-logo">
                                <article class="post">
                                    <a class="image soap-mfp-popup hover-style3" href="http://placehold.it/475x534">
                                        <img src="http://placehold.it/475x534" alt="">
                                        <span class="image-extras"></span>
                                    </a>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-website">
                                <article class="post">
                                    <a class="image soap-mfp-popup hover-style3" href="http://placehold.it/551x534">
                                        <img src="http://placehold.it/551x534" alt="">
                                        <span class="image-extras"></span>
                                    </a>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-website">
                                <article class="post">
                                    <a class="image soap-mfp-popup hover-style3" href="http://placehold.it/678x500">
                                        <img src="http://placehold.it/678x500" alt="">
                                        <span class="image-extras"></span>
                                    </a>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-website">
                                <article class="post">
                                    <a class="image soap-mfp-popup hover-style3" href="http://placehold.it/780x394">
                                        <img src="http://placehold.it/780x394" alt="">
                                        <span class="image-extras"></span>
                                    </a>
                                </article>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="#" class="btn style4 hover-blue load-more">Load More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
            
            
          <!--  <section id="content" class="no-padding">
               <div class="regiones">
                @section('regiones')
                @show
            </div>
            </section>-->
            
            
@if($location->city!="")
<?php
$titulo=$location->city;
?>
@else
$titulo="Ecuador";
@endif

@foreach ($visitados as $visitado)



            <section id="content" class="no-padding">
                <div class="section no-padding">
                    <h2 class="section-title">{{ trans('publico/labels.masvisitados')}}{!!$titulo!!} {!!$visitado->id!!}</h2>
                    <div class="post-wrapper">
                        <div class="iso-container iso-col-4 style-fancy">

                            <div class="iso-item filter-all filter-website">
                                <article class="post">
                                    <figure><img src="{{ asset('images/icon/5709-08-2015-25.jpg')}}" alt=""></figure>
                                    <div class="portfolio-hover-holder">
                                        <div class="portfolio-text">
                                            <div class="portfolio-text-inner">
                                                <h5 class="portfolio-title">Fullwidth Slideshow</h5> - <span class="portfolio-category">Fashion</span>
                                            </div>
                                        </div>
                                        <span class="portfolio-action">
                                            <a class="soap-mfp-popup" href="{{ asset('images/fullsize/5709-08-2015-25.jpg')}}"><i class="fa fa-chain has-circle"></i></a>
                                            <a href="portfolio-single1.html"><i class="fa fa-eye has-circle"></i></a>
                                        </span>
                                    </div>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-website">
                                <article class="post">
                                    <figure><img src="{{ asset('images/icon/5712-08-2015-88.jpg')}}" alt=""></figure>
                                    <div class="portfolio-hover-holder">
                                        <div class="portfolio-text">
                                            <div class="portfolio-text-inner">
                                                <h5 class="portfolio-title">Fullwidth Slideshow</h5> - <span class="portfolio-category">Fashion</span>
                                            </div>
                                        </div>
                                        <span class="portfolio-action">
                                            <a class="soap-mfp-popup" href="{{ asset('images/fullsize/5712-08-2015-88.jpg')}}"><i class="fa fa-chain has-circle"></i></a>
                                            <a href="portfolio-single1.html"><i class="fa fa-eye has-circle"></i></a>
                                        </span>
                                    </div>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-logo filter-website">
                                <article class="post">
                                    <figure><img src="{{ asset('images/icon/58dsc03020.jpg')}}" alt=""></figure>
                                    <div class="portfolio-hover-holder">
                                        <div class="portfolio-text">
                                            <div class="portfolio-text-inner">
                                                <h5 class="portfolio-title">Fullwidth Slideshow</h5> - <span class="portfolio-category">Fashion</span>
                                            </div>
                                        </div>
                                        <span class="portfolio-action">
                                            <a class="soap-mfp-popup" href="{{ asset('images/fullsize/5709-08-2015-23.jpg')}}"><i class="fa fa-chain has-circle"></i></a>
                                            <a href="portfolio-single1.html"><i class="fa fa-eye has-circle"></i></a>
                                        </span>
                                    </div>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-business">
                                <article class="post">
                                    <figure><img src="{{ asset('images/fullsize/009-08-2015-8.jpg')}}" alt=""></figure>
                                    <div class="portfolio-hover-holder">
                                        <div class="portfolio-text">
                                            <div class="portfolio-text-inner">
                                                <h5 class="portfolio-title">Fullwidth Slideshow</h5> - <span class="portfolio-category">Fashion</span>
                                            </div>
                                        </div>
                                        <span class="portfolio-action">
                                            <a class="soap-mfp-popup" href="{{ asset('images/fullsize/009-08-2015-8.jpg')}}"><i class="fa fa-chain has-circle"></i></a>
                                            <a href="portfolio-single1.html"><i class="fa fa-eye has-circle"></i></a>
                                        </span>
                                    </div>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-business">
                                <article class="post">
                                    <figure><img src="{{ asset('images/icon/58dsc03032.jpg')}}" alt=""></figure>
                                    <div class="portfolio-hover-holder">
                                        <div class="portfolio-text">
                                            <div class="portfolio-text-inner">
                                                <h5 class="portfolio-title">Fullwidth Slideshow</h5> - <span class="portfolio-category">Fashion</span>
                                            </div>
                                        </div>
                                        <span class="portfolio-action">
                                            <a class="soap-mfp-popup" href="{{ asset('images/fullsize/58dsc03032.jpg')}}"><i class="fa fa-chain has-circle"></i></a>
                                            <a href="portfolio-single1.html"><i class="fa fa-eye has-circle"></i></a>
                                        </span>
                                    </div>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-business">
                                <article class="post">
                                    <figure><img src="http://placehold.it/780x520" alt=""></figure>
                                    <div class="portfolio-hover-holder">
                                        <div class="portfolio-text">
                                            <div class="portfolio-text-inner">
                                                <h5 class="portfolio-title">Fullwidth Slideshow</h5> - <span class="portfolio-category">Fashion</span>
                                            </div>
                                        </div>
                                        <span class="portfolio-action">
                                            <a class="soap-mfp-popup" href="http://placehold.it/780x520"><i class="fa fa-chain has-circle"></i></a>
                                            <a href="portfolio-single1.html"><i class="fa fa-eye has-circle"></i></a>
                                        </span>
                                    </div>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-business">
                                <article class="post">
                                    <figure><img src="http://placehold.it/780x520" alt=""></figure>
                                    <div class="portfolio-hover-holder">
                                        <div class="portfolio-text">
                                            <div class="portfolio-text-inner">
                                                <h5 class="portfolio-title">Fullwidth Slideshow</h5> - <span class="portfolio-category">Fashion</span>
                                            </div>
                                        </div>
                                        <span class="portfolio-action">
                                            <a class="soap-mfp-popup" href="http://placehold.it/780x520"><i class="fa fa-chain has-circle"></i></a>
                                            <a href="portfolio-single1.html"><i class="fa fa-eye has-circle"></i></a>
                                        </span>
                                    </div>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-business">
                                <article class="post">
                                    <figure><img src="http://placehold.it/780x520" alt=""></figure>
                                    <div class="portfolio-hover-holder">
                                        <div class="portfolio-text">
                                            <div class="portfolio-text-inner">
                                                <h5 class="portfolio-title">Fullwidth Slideshow</h5> - <span class="portfolio-category">Fashion</span>
                                            </div>
                                        </div>
                                        <span class="portfolio-action">
                                            <a class="soap-mfp-popup" href="http://placehold.it/780x520"><i class="fa fa-chain has-circle"></i></a>
                                            <a href="portfolio-single1.html"><i class="fa fa-eye has-circle"></i></a>
                                        </span>
                                    </div>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-logo filter-website">
                                <article class="post">
                                    <figure><img src="http://placehold.it/780x520" alt=""></figure>
                                    <div class="portfolio-hover-holder">
                                        <div class="portfolio-text">
                                            <div class="portfolio-text-inner">
                                                <h5 class="portfolio-title">Fullwidth Slideshow</h5> - <span class="portfolio-category">Fashion</span>
                                            </div>
                                        </div>
                                        <span class="portfolio-action">
                                            <a class="soap-mfp-popup" href="http://placehold.it/780x520"><i class="fa fa-chain has-circle"></i></a>
                                            <a href="portfolio-single1.html"><i class="fa fa-eye has-circle"></i></a>
                                        </span>
                                    </div>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-logo filter-website">
                                <article class="post">
                                    <figure><img src="http://placehold.it/780x520" alt=""></figure>
                                    <div class="portfolio-hover-holder">
                                        <div class="portfolio-text">
                                            <div class="portfolio-text-inner">
                                                <h5 class="portfolio-title">Fullwidth Slideshow</h5> - <span class="portfolio-category">Fashion</span>
                                            </div>
                                        </div>
                                        <span class="portfolio-action">
                                            <a class="soap-mfp-popup" href="http://placehold.it/780x520"><i class="fa fa-chain has-circle"></i></a>
                                            <a href="portfolio-single1.html"><i class="fa fa-eye has-circle"></i></a>
                                        </span>
                                    </div>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-logo filter-website">
                                <article class="post">
                                    <figure><img src="http://placehold.it/780x520" alt=""></figure>
                                    <div class="portfolio-hover-holder">
                                        <div class="portfolio-text">
                                            <div class="portfolio-text-inner">
                                                <h5 class="portfolio-title">Fullwidth Slideshow</h5> - <span class="portfolio-category">Fashion</span>
                                            </div>
                                        </div>
                                        <span class="portfolio-action">
                                            <a class="soap-mfp-popup" href="http://placehold.it/780x520"><i class="fa fa-chain has-circle"></i></a>
                                            <a href="portfolio-single1.html"><i class="fa fa-eye has-circle"></i></a>
                                        </span>
                                    </div>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-logo filter-website">
                                <article class="post">
                                    <figure><img src="http://placehold.it/780x520" alt=""></figure>
                                    <div class="portfolio-hover-holder">
                                        <div class="portfolio-text">
                                            <div class="portfolio-text-inner">
                                                <h5 class="portfolio-title">Fullwidth Slideshow</h5> - <span class="portfolio-category">Fashion</span>
                                            </div>
                                        </div>
                                        <span class="portfolio-action">
                                            <a class="soap-mfp-popup" href="http://placehold.it/780x520"><i class="fa fa-chain has-circle"></i></a>
                                            <a href="portfolio-single1.html"><i class="fa fa-eye has-circle"></i></a>
                                        </span>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

@endforeach

            <footer id="footer" class="style4">
                <div class="callout-box style2">
                    <div class="container">
                        <div class="callout-content">
                            <div class="callout-text">
                                <h4>Miracle is premium hand-crafted, pixel perfect and responsive wordpress theme</h4>
                            </div>
                            <div class="callout-action">
                                <a href="#" class="btn style4">Purchase</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-wrapper">
                    <div class="container">
                        <div class="row add-clearfix same-height">
                            <div class="col-sm-6 col-md-3">
                                <h5 class="section-title box">Recent Posts</h5>
                                <ul class="recent-posts">
                                    <li>
                                        <a href="#" class="post-author-avatar"><span><img src="http://placehold.it/50x50" alt=""></span></a>
                                        <div class="post-content">
                                            <a href="#" class="post-title">Website design trends for 2014</a>
                                            <p class="post-meta">By <a href="#">Admin</a>  .  12 Nov, 2014</p>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#" class="post-author-avatar"><span><img src="http://placehold.it/50x50" alt=""></span></a>
                                        <div class="post-content">
                                            <a href="#" class="post-title">UI experts and modern designs</a>
                                            <p class="post-meta">By <a href="#">Admin</a>  .  12 Nov, 2014</p>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#" class="post-author-avatar"><span><img src="http://placehold.it/50x50" alt=""></span></a>
                                        <div class="post-content">
                                            <a href="#" class="post-title">Mircale is available in wordpress</a>
                                            <p class="post-meta">By <a href="#">Admin</a>  .  12 Nov, 2014</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <h5 class="section-title box">Popular Tags</h5>
                                <div class="tags">
                                    <a href="#" class="tag">masonry</a>
                                    <a href="#" class="tag">responsive</a>
                                    <a href="#" class="tag">Ecommerce</a>
                                    <a href="#" class="tag">web design</a>
                                    <a href="#" class="tag">wordpres</a>
                                    <a href="#" class="tag">mobile</a>
                                    <a href="#" class="tag">retina</a>
                                    <a href="#" class="tag">multi-purpose</a>
                                    <a href="#" class="tag">blog posts</a>
                                    <a href="#" class="tag">new sliders</a>
                                    <a href="#" class="tag">popular</a>
                                    <a href="#" class="tag">recent</a>
                                    <a href="#" class="tag">modern</a>
                                    <a href="#" class="tag">themeforest</a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <h5 class="section-title box">Useful Links</h5>
                                <ul class="arrow useful-links">
                                    <li><a href="#">About SoapTheme</a></li>
                                    <li><a href="#">Video Overview</a></li>
                                    <li><a href="#">Customer Support</a></li>
                                    <li><a href="#">Theme Features</a></li>
                                    <li><a href="#">Breaking News</a></li>
                                    <li><a href="#">Upcoming Updates</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <h5 class="section-title box">About Miracle</h5>
                                <p>Mircale is a Hand Crafted Pexil Perfect - Responsive - Multi-Purpose & Retina Ready Premium Wordpress Theme which sets new standards for the web design in 2014.</p>
                                <div class="social-icons">
                                    <a href="#" class="social-icon"><i class="fa fa-twitter has-circle" data-toggle="tooltip" data-placement="top" title="Twitter"></i></a>
                                    <a href="#" class="social-icon"><i class="fa fa-facebook has-circle" data-toggle="tooltip" data-placement="top" title="Facebook"></i></a>
                                    <a href="#" class="social-icon"><i class="fa fa-google-plus has-circle" data-toggle="tooltip" data-placement="top" title="GooglePlus"></i></a>
                                    <a href="#" class="social-icon"><i class="fa fa-linkedin has-circle" data-toggle="tooltip" data-placement="top" title="LinkedIn"></i></a>
                                    <a href="#" class="social-icon"><i class="fa fa-skype has-circle" data-toggle="tooltip" data-placement="top" title="Skype"></i></a>
                                    <a href="#" class="social-icon"><i class="fa fa-dribbble has-circle" data-toggle="tooltip" data-placement="top" title="Dribbble"></i></a>
                                    <a href="#" class="social-icon"><i class="fa fa-tumblr has-circle" data-toggle="tooltip" data-placement="top" title="Tumblr"></i></a>
                                </div>
                                <a href="#" class="btn btn-sm style4">Contact Us</a>
                                <a href="#" class="btn btn-sm style4">Purchase</a>
                                <a href="#" class="back-to-top"><span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom-area">
                    <div class="container">
                        <div class="copyright-area">
                            <nav class="secondary-menu">
                                <ul class="nav nav-pills">
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="#">Pages</a></li>
                                    <li><a href="#">Shortcodes</a></li>
                                    <li><a href="#">Portfolio</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Contact</a></li>
                                    <li><a href="#">Shop</a></li>
                                </ul>
                            </nav>
                            <div class="copyright">
                                &copy; 2015 IguanaTrip <em>by</em> <a href="http://www.iguanatrip.com"> IguanaTrip Group</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <!-- Javascript -->
        {!! HTML::script('js/jquery.js') !!}
        {!!HTML::script('js/js_public/Compartido.js') !!}
        {!!HTML::script('js/loadingScreen/loadingoverlay.min.js') !!}


        <script>
            $(document).ready(function () {

               // GetDataAjaxregiones("{!!asset('/getRegiones')!!}");
            });
        </script>

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


	<script src="{{ asset('public_components/search_inbox/js/classie.js')}}"></script>
		<script src="{{ asset('public_components/search_inbox/js/uisearch.js')}}"></script>
		<script>
			new UISearch( document.getElementById( 'sb-search' ) );
		</script>
	</body>

   
</html>