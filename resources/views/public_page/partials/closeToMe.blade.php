@section('eventsPromo')	

<div id="x2">
    
    
    
    @if($AtraccionesClose!=null)
    @foreach ($AtraccionesClose as $atracc)
    <div style=" margin-bottom: 0;" class="shortcode-banner style-animated iso-item eventInd filter-atracciones filter-alls" >
        <article class="post">
            <figure ><img src="{{ asset('images/icon/'.$atracc->filename)}}" alt=""></figure>
            @if(session('device')!='mobile')
            <div class="shortcode-banner-inside" style=" width: 108%;">
                @else
                <div class="shortcode-banner-inside" style=" width: 112%;">
                    @endif
                    <div class="shortcode-banner-content">
                     
                        <?php
                        $nombre = str_replace(' ', '-', $atracc->nombre_servicio);
                        ?>
                        <a  href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$atracc->id_usuario_serviciox!!}"  onclick="$('#x2').LoadingOverlay('show')"><h3 class="banner-title">{!!$atracc->nombre_servicio!!}</h3>
                            
                        </a>
                        <div class="details">
                            <p>{!!$atracc->detalle_servicio!!}</p>
                        </div>
                    </div>
                </div>

        </article>
    </div>
    @endforeach
    @endif

    
    @if($Inspiration!=null)
    @foreach ($Inspiration as $Inspir)
    <div style=" margin-bottom: 0;" class="shortcode-banner style-animated iso-item eventInd filter-atracciones filter-alls" >
        <article class="post">
            <figure ><img src="{{ asset('images/icon/'.$Inspir->filename)}}" alt=""></figure>
            @if(session('device')!='mobile')
            <div class="shortcode-banner-inside" style=" width: 108%;">
                @else
                <div class="shortcode-banner-inside" style=" width: 112%;">
                    @endif
                    <div class="shortcode-banner-content">
                     
                        <?php
                        $nombre = str_replace(' ', '-', $Inspir->nombre_servicio);
                        ?>
                        <a  href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$Inspir->id_usuario_serviciox!!}"  onclick="$('#x2').LoadingOverlay('show')"><h3 class="banner-title">{!!$Inspir->nombre_servicio!!}</h3>
                            
                        </a>
                        <div class="details">
                            <p>{!!$Inspir->detalle_servicio!!}</p>
                        </div>
                    </div>
                </div>

        </article>
    </div>
    @endforeach
    @endif

    
    
    @if($eventosClose!=null)
    @foreach ($eventosClose as $event)
    <div style=" margin-bottom: 0;" class="shortcode-banner style-animated iso-item eventInd filter-eventos filter-alls" >
        <article class="post">
            <figure ><img src="{{ asset('images/icon/'.$event->filename)}}" alt=""></figure>
            @if(session('device')!='mobile')
            <div class="shortcode-banner-inside" style=" width: 108%;">
                @else
                <div class="shortcode-banner-inside" style=" width: 112%;">
                    @endif
                    <div class="shortcode-banner-content">
                        <?php
                        $date = date_create($event->fecha_ingreso);
                        $nombre = str_replace(' ', '-', $atracc->nombre_servicio);
                        ?>

                        <a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$event->id_usuario_serviciox!!}"  onclick="$('.container').LoadingOverlay('show')"><h3 class="banner-title">{!!$event->nombre_servicio!!}</h3><h3 style="color: red">{!!date_format($date, 'j F ')!!}</h3></a>
                        <div class="details">
                            <p>{!!$event->detalle_servicio!!}</p>
                        </div>
                    </div>
                </div>

        </article>
    </div>
    @endforeach
    @endif



    @if($eventosCloseProv!=null)
    @foreach ($eventosCloseProv as $event)


    <div style=" margin-bottom: 0;" class="shortcode-banner style-animated iso-item eventInd filter-eventos filter-alls" >
        <article class="post">
            <figure ><img src="{{ asset('images/icon/'.$event->filename)}}" alt="{!!$event->nombre_servicio!!}"></figure>
            @if(session('device')!='mobile')
            <div class="shortcode-banner-inside" style=" width: 108%;">
                @else
                <div class="shortcode-banner-inside" style=" width: 112%;">
                    @endif
                    <div class="shortcode-banner-content">
                                                <?php
                        $date1 = date_create($event->fecha_ingreso);
                        ?>

                        
                        <a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$event->id_usuario_serviciox!!}"  onclick="$('.container').LoadingOverlay('show')"><h3 class="banner-title">{!!$event->nombre_servicio!!}</h3><h3 style="color: red">{!!date_format($date, 'j F ')!!}</h3></a>
                        <div class="details">
                            <p>{!!$event->detalle_servicio!!}</p>
                        </div>
                    </div>
                </div>

        </article>
    </div>
    @endforeach
    @endif
    
    
      @if($eventosDepCloseProv!=null)
      
    @foreach ($eventosDepCloseProv as $event)


    <div style=" margin-bottom: 0;" class="shortcode-banner style-animated iso-item eventInd filter-eventos filter-alls" >
        <article class="post">
            <figure ><img src="{{ asset('images/icon/'.$event->filename)}}" alt=""></figure>
            @if(session('device')!='mobile')
            <div class="shortcode-banner-inside" style=" width: 108%;">
                @else
                <div class="shortcode-banner-inside" style=" width: 112%;">
                    @endif
                    <div class="shortcode-banner-content">
                         <?php
                        $date2 = date_create($event->fecha_desde);
                        ?>

                        
                        <a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$event->id_usuario_serviciox!!}"  onclick="$('.container').LoadingOverlay('show')"><h3 class="banner-title">{!!$event->nombre_servicio!!}</h3><h3 style="color: red">{!!date_format($date, 'j F ')!!}</h3></a>
                        <div class="details">
                            <p>{!!$event->nombre_servicio!!}</p><p>{!!$event->descripcion_evento!!}</p>
                        </div>
                    </div>
                </div>

        </article>
    </div>
    @endforeach
    @endif
    
    @if($eventosDepClose!=null)
    @if(count($eventosDepClose)>0)
     @foreach ($eventosDepClose as $event)


    <div style=" margin-bottom: 0;" class="shortcode-banner style-animated iso-item eventInd filter-eventos filter-alls" >
        <article class="post">
            <figure ><img src="{{ asset('images/icon/'.$event->filename)}}" alt=""></figure>
            @if(session('device')!='mobile')
            <div class="shortcode-banner-inside" style=" width: 108%;">
                @else
                <div class="shortcode-banner-inside" style=" width: 112%;">
                    @endif
                    <div class="shortcode-banner-content">
                         <?php
                        $date3 = date_create($event->fecha_desde);
                        ?>
                        
                        <a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$event->id_usuario_serviciox!!}"  onclick="$('.container').LoadingOverlay('show')"><h3 class="banner-title">{!!$event->nombre_servicio!!}</h3><h3 style="color: red">{!!date_format($date, 'j F ')!!}</h3></a>
                        <div class="details">
                            <p>{{ trans('publico/labels.label34')}} {!!$event->nombre_servicio!!}</p>
                            <p>{!!$event->descripcion_evento!!}</p>
                        </div>
                    </div>
                </div>

        </article>
    </div>
    @endforeach
    @endif
    @endif
    
    @if($PromoDepClose!=null)
    @if(count($PromoDepClose)>0)
     @foreach ($PromoDepClose as $promo)


    <div style=" margin-bottom: 0;" class="shortcode-banner style-animated iso-item eventInd filter-promo filter-alls" >
        <article class="post">
            <figure ><img src="{{ asset('images/icon/'.$promo->filename)}}" alt=""></figure>
            @if(session('device')!='mobile')
            <div class="shortcode-banner-inside" style=" width: 108%;">
                @else
                <div class="shortcode-banner-inside" style=" width: 112%;">
                    @endif
                    <div class="shortcode-banner-content">
                        <a href="#"><h3 class="banner-title">{!!$promo->nombre_promocion!!}</h3></a>
                        <div class="details">
                            <p>{!!$event->nombre_servicio!!}</p><p>{!!$promo->descripcion_promocion!!}</p>
                        </div>
                    </div>
                </div>

        </article>
    </div>
    @endforeach
    @endif
    @endif
    
    

</div>

@endsection
