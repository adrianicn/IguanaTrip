@section('cercanos')	

<?php $flag1=0;?>
                @for ($x = 0; $x < count($parroquia); $x++)
                                
                   <?php
                        $nombre = str_replace(' ', '-', $parroquia[$x]->nombre_servicio);
                        $nombre = str_replace('/', '-', $nombre);
                        ?>
                        
                @if($flag1==0)
                
             
                            <li class="product col-sms-6 col-sm-6 col-md-4 box">
                                
                                 
                                             
                                          
                                    <a class="product-image" href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$parroquia[$x]->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show')">
                                        <div class="first-img">
                                            <img alt="{!!$parroquia[$x]->nombre_servicio!!}" src="{{ asset('images/icon/'.$parroquia[$x]->filename)}}">
                                        </div>
                                        @if(isset($parroquia[$x+1])&& $parroquia[$x+1]->id_auxiliar==$parroquia[$x]->id_auxiliar)
                                        
                                        <div class="back-img">
                                            <img alt="" src="{{ asset('images/icon/'.$parroquia[$x+1]->filename)}}">
                                        </div>
                                       <?php $flag1=1;?>
                                        @endif
                                    </a>
                                    <div class="product-content">
                                        <h5 class="product-title"><a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$parroquia[$x]->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show')">{!!$parroquia[$x]->nombre_servicio!!}</a></h5>
                                        <span class="product-price"><span class="currency-symbol"></span>{!!$parroquia[$x]->catalogo_nombre!!}</span>
                                        <span class="star-rating" title="" data-toggle="tooltip" data-original-title="4">
                                            <span data-stars="4"></span>
                                        </span>
                                        <p><a href="#">{!!$parroquia[$x]->nombre!!}</p>
                                        
                                    </div>
                              
                                </li>
                                @else
                                <?php $flag1=0;?>
                                
                                  @endif
                        @endfor
                        
                @if($evntParroquia!=null)
                        <?php $flag2=0;?>
                @for ($x = 0; $x < count($evntParroquia); $x++)
                 <?php
                        $nombre = str_replace(' ', '-', $evntParroquia[$x]->nombre_evento);
                        $nombre = str_replace('/', '-', $nombre);
                        ?>
                        
                                @if($flag2==0)
                               
                            <li class="product col-sms-6 col-sm-6 col-md-4 box">
                                    <a class="product-image" href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$evntParroquia[$x]->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show')">
                                        <div class="first-img">
                                            <img alt="{!!$evntParroquia[$x]->nombre_evento!!}" src="{{ asset('images/icon/'.$evntParroquia[$x]->filename)}}">
                                        </div>
                                        @if(isset($evntParroquia[$x+1])&& $evntParroquia[$x+1]->id_auxiliar==$evntParroquia[$x]->id_auxiliar)
                                        
                                        <div class="back-img">
                                            <img alt="" src="{{ asset('images/icon/'.$evntParroquia[$x+1]->filename)}}">
                                        </div>
                                       <?php $flag2=1;?>
                                        @endif
                                    </a>
                                    <div class="product-content">
                                        <h5 class="product-title"><a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$evntParroquia[$x]->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show')">{!!$evntParroquia[$x]->nombre_evento!!}</a></h5>
                                        <span class="product-price"><span class="currency-symbol"></span>{{ trans('publico/labels.label48')}}</span>
                                        <span class="star-rating" title="" data-toggle="tooltip" data-original-title="4">
                                            <span data-stars="4"></span>
                                        </span>
                                        <p><a href="#">{!!$evntParroquia[$x]->nombre_servicio!!}</p>
                                        
                                    </div>
                               
                                </li>
                                @else
                                <?php $flag2=0;?>
                                
                                  @endif
                        @endfor
                        @endif
                        
                        
                        @if($prmoParroquia!=null)
                        <?php $flag3=0;?>
                @for ($x = 0; $x < count($prmoParroquia); $x++)
                <?php
                        $nombre = str_replace(' ', '-', $prmoParroquia[$x]->nombre_promocion);
                        $nombre = str_replace('/', '-', $nombre);
                        ?>
                                @if($flag3==0)
                            <li class="product col-sms-6 col-sm-6 col-md-4 box">
                                
                                        
                        
                                    <a class="product-image" href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$prmoParroquia[$x]->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show')">
                                        <div class="first-img">
                                            <img alt="{!!$prmoParroquia[$x]->nombre_promocion!!}" src="{{ asset('images/icon/'.$prmoParroquia[$x]->filename)}}">
                                        </div>
                                        @if(isset($prmoParroquia[$x+1])&& $prmoParroquia[$x+1]->id_auxiliar==$prmoParroquia[$x]->id_auxiliar)
                                        
                                        <div class="back-img">
                                            <img alt="" src="{{ asset('images/icon/'.$prmoParroquia[$x+1]->filename)}}">
                                        </div>
                                       <?php $flag3=1;?>
                                        @endif
                                    </a>
                                    <div class="product-content">
                                        <h5 class="product-title"><a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$prmoParroquia[$x]->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show')">{!!$prmoParroquia[$x]->nombre_promocion!!}</a></h5>
                                        <span class="product-price"><span class="currency-symbol"></span>{{ trans('publico/labels.label49')}}</span>
                                        <span class="star-rating" title="" data-toggle="tooltip" data-original-title="4">
                                            <span data-stars="4"></span>
                                        </span>
                                        <p><a href="#">{!!$prmoParroquia[$x]->nombre_servicio!!}</p>
                                        
                                    </div>
                               
                                </li>
                                @else
                                <?php $flag3=0;?>
                                
                                  @endif
                        @endfor
                        @endif
                        
                        
                         @if($canton!=null)
                        <?php $flag4=0;?>
                @for ($x = 0; $x < count($canton); $x++)
                   <?php
                        $nombre = str_replace(' ', '-', $canton[$x]->nombre_servicio);
                        $nombre = str_replace('/', '-', $nombre);
                        ?>
                        
                                @if($flag4==0)
                            <li class="product col-sms-6 col-sm-6 col-md-4 box">
                                    <a class="product-image" href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$canton[$x]->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show')">
                                        <div class="first-img">
                                            <img alt="{!!$canton[$x]->nombre_servicio!!}" src="{{ asset('images/icon/'.$canton[$x]->filename)}}">
                                        </div>
                                        @if(isset($canton[$x+1])&& $canton[$x+1]->id_auxiliar==$canton[$x]->id_auxiliar)
                                        
                                        <div class="back-img">
                                            <img alt="" src="{{ asset('images/icon/'.$canton[$x+1]->filename)}}">
                                        </div>
                                       <?php $flag4=1;?>
                                        @endif
                                    </a>
                                   <div class="product-content">
                                        <h5 class="product-title"><a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$canton[$x]->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show')">{!!$canton[$x]->nombre_servicio!!}</a></h5>
                                        <span class="product-price"><span class="currency-symbol"></span>{!!$canton[$x]->catalogo_nombre!!}</span>
                                        <span class="star-rating" title="" data-toggle="tooltip" data-original-title="4">
                                            <span data-stars="4"></span>
                                        </span>
                                        <p><a href="#">{!!$canton[$x]->nombre!!}</p>
                                        
                                    </div>
                                 
                                </li>
                                @else
                                <?php $flag4=0;?>
                                
                                  @endif
                        @endfor
                        @endif
                        
                        
                        @if($evntCanton!=null)
                        <?php $flag6=0;?>
                @for ($x = 0; $x < count($evntCanton); $x++)
                <?php
                        $nombre = str_replace(' ', '-', $evntCanton[$x]->nombre_evento);
                        $nombre = str_replace('/', '-', $nombre);
                        ?>
                   
                                @if($flag6==0)
                            <li class="product col-sms-6 col-sm-6 col-md-4 box">
                                    <a class="product-image" href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$evntCanton[$x]->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show')">
                                        <div class="first-img">
                                            <img alt="{!!$evntCanton[$x]->nombre_evento!!}" src="{{ asset('images/icon/'.$evntCanton[$x]->filename)}}">
                                        </div>
                                        @if(isset($evntCanton[$x+1])&& $evntCanton[$x+1]->id_auxiliar==$evntCanton[$x]->id_auxiliar)
                                        
                                        <div class="back-img">
                                            <img alt="" src="{{ asset('images/icon/'.$evntCanton[$x+1]->filename)}}">
                                        </div>
                                       <?php $flag6=1;?>
                                        @endif
                                    </a>
                                    <div class="product-content">
                                        <h5 class="product-title"><a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$evntCanton[$x]->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show')">{!!$evntCanton[$x]->nombre_evento!!}</a></h5>
                                        <span class="product-price"><span class="currency-symbol"></span>{{ trans('publico/labels.label48')}}</span>
                                        <span class="star-rating" title="" data-toggle="tooltip" data-original-title="4">
                                            <span data-stars="4"></span>
                                        </span>
                                        <p><a href="#">{!!$evntCanton[$x]->nombre_servicio!!}</p>
                                        
                                    </div>
                               
                                </li>
                                @else
                                <?php $flag6=0;?>
                                
                                  @endif
                        @endfor
                        @endif
                
                           @if($prmoCanton!=null)
                        <?php $flag3=0;?>
                @for ($x = 0; $x < count($prmoCanton); $x++)
                <?php
                        $nombre = str_replace(' ', '-', $prmoCanton[$x]->nombre_promocion);
                        $nombre = str_replace('/', '-', $nombre);
                        ?>
                
                                @if($flag3==0)
                            <li class="product col-sms-6 col-sm-6 col-md-4 box">
                                    <a class="product-image" href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$prmoCanton[$x]->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show')">
                                        <div class="first-img">
                                            <img alt="{!!$prmoCanton[$x]->nombre_promocion!!}" src="{{ asset('images/icon/'.$prmoCanton[$x]->filename)}}">
                                        </div>
                                        @if(isset($prmoCanton[$x+1])&& $prmoCanton[$x+1]->id_auxiliar==$prmoCanton[$x]->id_auxiliar)
                                        
                                        <div class="back-img">
                                            <img alt="" src="{{ asset('images/icon/'.$prmoCanton[$x+1]->filename)}}">
                                        </div>
                                       <?php $flag3=1;?>
                                        @endif
                                    </a>
                                    <div class="product-content">
                                        <h5 class="product-title"><a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$prmoCanton[$x]->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show')">{!!$prmoCanton[$x]->nombre_promocion!!}</a></h5>
                                        <span class="product-price"><span class="currency-symbol"></span>{{ trans('publico/labels.label49')}}</span>
                                        <span class="star-rating" title="" data-toggle="tooltip" data-original-title="4">
                                            <span data-stars="4"></span>
                                        </span>
                                        <p><a href="#">{!!$prmoCanton[$x]->nombre_servicio!!}</p>
                                        
                                    </div>
                               
                                </li>
                                @else
                                <?php $flag3=0;?>
                                
                                  @endif
                        @endfor
                        @endif
                        
                        
                        
                        
                        @if($provincias!=null)
                        <?php $flag8=0;?>
                @for ($x = 0; $x < count($provincias); $x++)
                <?php
                        $nombre = str_replace(' ', '-', $provincias[$x]->nombre_servicio);
                        $nombre = str_replace('/', '-', $nombre);
                        ?>
                
                                @if($flag8==0)
                                
                            <li class="product col-sms-6 col-sm-6 col-md-4 box">
                                    <a class="product-image" href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$provincias[$x]->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show')">
                                        <div class="first-img">
                                            <img alt="{!!$provincias[$x]->nombre_servicio!!}" src="{{ asset('images/icon/'.$provincias[$x]->filename)}}">
                                        </div>
                                        @if(isset($provincias[$x+1])&& $provincias[$x+1]->id_auxiliar==$provincias[$x]->id_auxiliar)
                                        
                                        <div class="back-img">
                                            <img alt="" src="{{ asset('images/icon/'.$provincias[$x+1]->filename)}}">
                                        </div>
                                       <?php $flag8=1;?>
                                        @endif
                                    </a>
                                   <div class="product-content">
                                        <h5 class="product-title"><a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$provincias[$x]->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show')">{!!$provincias[$x]->nombre_servicio!!}</a></h5>
                                        <span class="product-price"><span class="currency-symbol"></span>{!!$provincias[$x]->catalogo_nombre!!}</span>
                                        <span class="star-rating" title="" data-toggle="tooltip" data-original-title="4">
                                            <span data-stars="4"></span>
                                        </span>
                                        <p><a href="#">{!!$provincias[$x]->nombre!!}</p>
                                        
                                    </div>
                                
                                </li>
                                @else
                                <?php $flag8=0;?>
                                
                                  @endif
                        @endfor
                        @endif
                        
                        
                        
                        @if($evntProvincia!=null)
                        <?php $flag9=0;?>
                @for ($x = 0; $x < count($evntProvincia); $x++)
                
                                @if($flag9==0)
                                
                                
                                
                                
                                
                                
                                
                                <div style=" margin-bottom: 0;" class="shortcode-banner style-animated iso-item eventInd filter-atracciones filter-alls" >
        <article class="post">
            <figure ><img src="{{ asset('images/icon/'.$evntProvincia[$x]->filename)}}" alt=""></figure>
            @if(session('device')!='mobile')
            <div class="shortcode-banner-inside" style=" width: 108%;">
                @else
                <div class="shortcode-banner-inside" style=" width: 112%;">
                    @endif
                    <div class="shortcode-banner-content">
                     
                        <?php
                        $nombre = str_replace(' ', '-', $evntProvincia[$x]->nombre_evento);
                        ?>
                        <a  href="#"  onclick="$('#x2').LoadingOverlay('show')"><h3 class="banner-title">{!!$evntProvincia[$x]->nombre_evento!!}</h3>
                            
                        </a>
                        <div class="details">
                            <p>detalle  </p>
                        </div>
                    </div>
                </div>

        </article>
    </div>
                                
                                
                                @else
                                <?php $flag9=0;?>
                                
                                  @endif
                        @endfor
                        @endif
                        
                        

@endsection
