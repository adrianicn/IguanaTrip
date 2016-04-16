                <div class="container">
                    <div class="header-inner">
                        @if(session('device')!='mobile')
                        <div class="branding logss">
                            @else
                            <div class="branding">
                            @endif
                            <h1 class="logo">
                                <a href="#" onclick="window.location.href = '{!!asset('/')!!}'"><img src="" alt=""><span></span></a>
                            </h1>
                        </div>
                        <nav id="nav">
                            <ul class="header-top-nav">
                                <li class="mini-cart">
                                    <div id="lang">


                                        <a href="{!! url('language') !!}"><img width="32" height="32" alt="en" src="{!! asset('public/img/' . (session('locale') == 'es' ? 'english' : 'espanol') . '-flag.png') !!}"></a>
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
                                    <a>{{ trans('publico/labels.label1')}}</a>
                                    <ul class="sub-nav">
                                        <li><a href="index.html">{{ trans('publico/labels.label78')}}</a></li>
                                        <li><a href="index.html">{{ trans('publico/labels.label79')}}</a></li>
                                        <li><a href="{!!asset('/getTermsConditions')!!}" >{{ trans('publico/labels.label80')}}</a></li>
                                        
                                    </ul>
                                </li>
                                
                                <li class="menu-item-has-children ">
                                    <a href="#">Trips</a>
                                    <ul class="sub-nav">
                                        <li class="menu-item-has-children">
                                            <a href="#">{{ trans('publico/labels.label81')}}</a>
                                            <ul class="sub-nav">
                                                <li><a href="shortcode-accordion-toggles.html"><i class="fa"></i><span>{{ trans('publico/labels.label13')}}</span></a></li>
                                                <li><a href="shortcode-animations.html"><i class="fa "></i><span>{{ trans('publico/labels.label14')}}</span></a></li>
                                                <li><a href="shortcode-blog-posts.html"><i class="fa "></i><span>{{ trans('publico/labels.label15')}}</span></a></li>
                                                <li><a href="shortcode-buttons.html"><i class="fa "></i><span>{{ trans('publico/labels.label16')}}</span></a></li>
                                                
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">{{ trans('publico/labels.label82')}}</a>
                                            <ul class="sub-nav">
                                                <li><a href="shortcode-form-layouts.html"><i class="fa "></i><span>{{ trans('publico/labels.label83')}}</span></a></li>
                                                <li><a href="shortcode-galleries.html"><i class="fa "></i><span>{{ trans('publico/labels.label84')}}</span></a></li>
                                                <li><a href="shortcode-icon-styling.html"><i class="fa"></i><span>{{ trans('publico/labels.label85')}}</span></a></li>
                                                <li><a href="shortcode-interactive-banners.html"><i class="fa "></i><span>{{ trans('publico/labels.label86')}}</span></a></li>
                                                
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">{{ trans('publico/labels.label87')}}</a>
                                            <ul class="sub-nav">
                                                <li><a href="shortcode-post-sliders.html"><i class="fa "></i><span>{{ trans('publico/labels.label88')}}</span></a></li>
                                                <li><a href="shortcode-pricing-tables.html"><i class="fa "></i><span>{{ trans('publico/labels.label89')}}</span></a></li>
                                                <li><a href="shortcode-progress-bars.html"><i class="fa "></i><span>{{ trans('publico/labels.label90')}}</span></a></li>
                                                
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">{{ trans('publico/labels.label91')}}</a>
                                            <ul class="sub-nav">
                                                <li><a href="shortcode-tabs.html"><i class="fa "></i><span>{{ trans('publico/labels.label92')}}</span></a></li>
                                                <li><a href="shortcode-team.html"><i class="fa "></i><span>{{ trans('publico/labels.label93')}}</span></a></li>
                                                <li><a href="shortcode-testimonials.html"><i class="fa"></i><span>{{ trans('publico/labels.label94')}}</span></a></li>
                                                
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">{{ trans('publico/labels.label95')}}</a>
                                    <ul class="sub-nav">
                                        <li class="menu-item-has-children">
                                            <a href="#">{{ trans('publico/labels.label96')}}</a>
                                            <ul class="sub-nav">
                                                <li><a href="portfolio-fancy-grid-2columns.html">{{ trans('publico/labels.label97')}}</a></li>
                                                <li><a href="portfolio-fancy-grid-3columns.html">{{ trans('publico/labels.label98')}}</a></li>
                                                
                                            </ul>
                                        </li>
                                       
                                        
                                    </ul>
                                </li>
                                
                                 <li class="menu-item-has-children">
                                    <a href="#">{{ trans('publico/labels.label5')}}</a>
                                    <ul class="sub-nav">
                                        <li class="menu-item-has-children">
                                            <a href="#">{{ trans('publico/labels.label99')}}</a>
                                            <ul class="sub-nav">
                                                <li><a href="portfolio-fancy-grid-2columns.html">{{ trans('publico/labels.label103')}}</a></li>
                                                <li><a href="portfolio-fancy-grid-3columns.html">{{ trans('publico/labels.label100')}}</a></li>
                                                
                                            </ul>
                                        </li>
                                        
                                        <li class="menu-item-has-children">
                                            <a href="#">{{ trans('publico/labels.label101')}}</a>
                                            <ul class="sub-nav">
                                                <li><a href="portfolio-fancy-grid-2columns.html">{{ trans('publico/labels.label104')}}</a></li>
                                                <li><a href="portfolio-fancy-grid-3columns.html">{{ trans('publico/labels.label105')}}</a></li>
                                                
                                            </ul>
                                        </li>
                                        
                                        <li class="menu-item-has-children">
                                            <a href="#">{{ trans('publico/labels.label102')}}</a>
                                            <ul class="sub-nav">
                                                <li><a href="portfolio-fancy-grid-2columns.html">{{ trans('publico/labels.label106')}}</a></li>
                                                
                                                
                                            </ul>
                                        </li>
                                       
                                        
                                    </ul>
                                </li>
                                
                               
                                <li class="menu-item-has-children">
                                    <a href="#">{{ trans('publico/labels.label6')}}</a>
                                    
                                </li>
                                
                            </ul>
                        </nav>
                    </div>
                </div>
                    
                    
                    
                    <!--Mobile-->
                <div class="mobile-nav-wrapper collapse visible-mobile" id="mobile-nav-wrapper">
                    <ul class="mobile-nav">
                        <li class="menu-item-has-children">
                            <span class="open-subnav"></span>
                            <a>{{ trans('publico/labels.label1')}}</a>
                            <ul class="sub-nav">
                                <li><a href="index.html">{{ trans('publico/labels.label78')}}</a></li>
                                        <li><a href="index.html">{{ trans('publico/labels.label79')}}</a></li>
                                        <li><a href="index.html">{{ trans('publico/labels.label80')}}</a></li>
                                      
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <span class="open-subnav"></span>
                            <a href="#">{{ trans('publico/labels.label2')}}</a>
                            <ul class="sub-nav">
                                <li class="menu-item-has-children">
                                    <span class="open-subnav"></span>
                                    <a href="#">{{ trans('publico/labels.label81')}}</a>
                                    <ul class="sub-nav">
                                        <li><a href="pages-about1.html">{{ trans('publico/labels.label13')}}</a></li>
                                        <li><a href="pages-about2.html">{{ trans('publico/labels.label14')}}</a></li>
                                        <li><a href="pages-about3.html">{{ trans('publico/labels.label15')}}</a></li>
                                        <li><a href="pages-about4.html">{{ trans('publico/labels.label16')}}</a></li>
                                    </ul>
                                </li>
                                
                                
                                
                                <li class="menu-item-has-children">
                                    <span class="open-subnav"></span>
                                    <a href="#">{{ trans('publico/labels.label82')}}</a>
                                    <ul class="sub-nav">
                                        <li><a href="pages-services1.html">{{ trans('publico/labels.label83')}}</a></li>
                                        <li><a href="pages-services2.html">{{ trans('publico/labels.label84')}}</a></li>
                                        <li><a href="pages-services2.html">{{ trans('publico/labels.label85')}}</a></li>
                                        <li><a href="pages-services2.html">{{ trans('publico/labels.label86')}}</a></li>
                                        
                                    </ul>
                                </li>
                                
                                
                                
                                
                                <li class="menu-item-has-children">
                                    <span class="open-subnav"></span>
                                    <a href="#">{{ trans('publico/labels.label87')}}</a>
                                    <ul class="sub-nav">
                                        <li><a href="pages-layouts-left-sidebar.html">{{ trans('publico/labels.label88')}}</a></li>
                                        <li><a href="pages-layouts-right-sidebar.html">{{ trans('publico/labels.label89')}}</a></li>
                                        <li><a href="pages-layouts-fullwidth.html">{{ trans('publico/labels.label90')}}</a></li>
                                    </ul>
                                </li>
                                
                                
                                <li class="menu-item-has-children">
                                    <span class="open-subnav"></span>
                                    <a href="#">{{ trans('publico/labels.label91')}}</a>
                                    <ul class="sub-nav">
                                        <li><a href="pages-layouts-left-sidebar.html">{{ trans('publico/labels.label92')}}</a></li>
                                        <li><a href="pages-layouts-right-sidebar.html">{{ trans('publico/labels.label93')}}</a></li>
                                        <li><a href="pages-layouts-fullwidth.html">{{ trans('publico/labels.label94')}}</a></li>
                                    </ul>
                                </li>
                                
                                
                                
                            </ul>
                        </li>
                        
                        <li class="menu-item-has-children">
                            <span class="open-subnav"></span>
                            <a href="#">{{ trans('publico/labels.label95')}}</a>
                            <ul class="sub-nav">
                                <li class="menu-item-has-children">
                                    <span class="open-subnav"></span>
                                    <a href="#">{{ trans('publico/labels.label96')}}</a>
                                    <ul class="sub-nav">
                                        <li><a href="portfolio-fancy-grid-2columns.html">{{ trans('publico/labels.label97')}}</a></li>
                                        <li><a href="portfolio-fancy-grid-3columns.html">{{ trans('publico/labels.label98')}}</a></li>
                                        
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        
                        
                        <li class="menu-item-has-children">
                            <span class="open-subnav"></span>
                            <a href="#">{{ trans('publico/labels.label5')}}</a>
                            <ul class="sub-nav">
                                <li class="menu-item-has-children">
                                    <span class="open-subnav"></span>
                                    <a href="#">{{ trans('publico/labels.label99')}}</a>
                                    <ul class="sub-nav">
                                        <li><a href="portfolio-fancy-grid-2columns.html">{{ trans('publico/labels.label103')}}</a></li>
                                        <li><a href="portfolio-fancy-grid-3columns.html">{{ trans('publico/labels.label100')}}</a></li>
                                        
                                    </ul>
                                </li>
                                
                                    <li class="menu-item-has-children">
                                    <span class="open-subnav"></span>
                                    <a href="#">{{ trans('publico/labels.label101')}}</a>
                                    <ul class="sub-nav">
                                        <li><a href="portfolio-fancy-grid-2columns.html">{{ trans('publico/labels.label104')}}</a></li>
                                        <li><a href="portfolio-fancy-grid-3columns.html">{{ trans('publico/labels.label105')}}</a></li>
                                        
                                    </ul>
                                </li>
                                
                                
                                 <li class="menu-item-has-children">
                                    <span class="open-subnav"></span>
                                    <a href="#">{{ trans('publico/labels.label102')}}</a>
                                    <ul class="sub-nav">
                                        <li><a href="portfolio-fancy-grid-2columns.html">{{ trans('publico/labels.label106')}}</a></li>
                                        
                                        
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        
                         
                   
                        <li class="menu-item-has-children">
                            <span class="open-subnav"></span>
                            <a href="#">{{ trans('publico/labels.label6')}}</a>
                            
                        </li>
                    </ul>
                </div>
        
         
        