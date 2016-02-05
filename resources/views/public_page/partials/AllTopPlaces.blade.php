@section('topPlaces')	
<div id="x1">
    @if($topPlacesEcuador->currentPage()==1)
       <div class="shortcode-banner style-animated iso-item TopPlace  filter-all " >
                                    <article class="post">
                                   <figure ><img src="{{ asset('img/events.jpg')}}" alt=""></figure>
                                     @if(session('device')!='mobile')
                                        <div class="shortcode-banner-inside" style=" width: 108%;">
                                            @else
                                            <div class="shortcode-banner-inside" style=" width: 112%;">
                                            @endif
                                    <div class="shortcode-banner-content">
                                        <h3 class="banner-title">Upcomming Events</h3>
                                        <div class="details">
                                            <p>Son los eventos más destacados y recientes de cada región del país</p>
                                        </div>
                                    </div>
                                </div>
                                 
                                    </article>
                                </div>
                                     @endif
@foreach ($topPlacesEcuador as $region)
                                @if($region->id_region==1)
                                <div class="shortcode-banner style-animated iso-item TopPlace filter-all filter-costa" >
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

                                @if($region->id_region==2)
                                <div class="shortcode-banner style-animated TopPlace iso-item filter-all filter-sierra" >
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
                                @if($region->id_region==3)
                                <div class="shortcode-banner style-animated TopPlace iso-item filter-all filter-oriente ">
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
                                @if($region->id_region==4)
                                <div class=" shortcode-banner style-animated TopPlace iso-item filter-all filter-galapagos">
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
                                    
                                @endsection
                                