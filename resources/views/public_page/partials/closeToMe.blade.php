@section('eventsPromo')	

<div id="x2">
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
                        ?>

                        <a href="#"><h3 class="banner-title">{!!$event->nombre_servicio!!}</h3><h3 style="color: red">{!!date_format($date, 'j F ')!!}</h3></a>
                        <div class="details">
                            <p>{!!$event->detalle_servicio!!}</p>
                        </div>
                    </div>
                </div>

        </article>
    </div>
    @endforeach

<!--
@if(!$eventosClose->hasMorePages() && $eventosClose->currentPage()==$eventosClose->lastPage() && $eventosCloseProv==null)
    <div class="shortcode-banner style-animated iso-item eventInd filter-eventos filter-alls" >
        <article class="post">
            <figure ><img src="{{ asset('img/rsz_addevent.png')}}" alt=""></figure>
            @if(session('device')!='mobile')
            <div class="shortcode-banner-inside" style=" width: 108%;">
                @else
                <div class="shortcode-banner-inside" style=" width: 112%;">
                    @endif
                    <div class="shortcode-banner-content">
                        <a href="#"><h3 class="banner-title">Agregar evento</h3></a>
                        <div class="details">
                            <p>Haz click aquí si deseas agregar un evento</p>
                        </div>
                    </div>
                </div>

        </article>
    </div>
            @endif-->

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

                        <a href="#"><h3 class="banner-title">{!!$event->nombre_servicio!!}</h3><h3 style="color: red">{!!date_format($date1, 'j F ')!!}</h3></a>
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

                        <a href="#"><h3 class="banner-title">{!!$event->nombre_evento!!}</h3><h3 style="color: red">{!!date_format($date2, 'j F ')!!}</h3></a>
                        <div class="details">
                            <p>{!!$event->nombre_servicio!!}</p><p>{!!$event->descripcion_evento!!}</p>
                        </div>
                    </div>
                </div>

        </article>
    </div>
    @endforeach
    @endif
    
    
    @if(count($eventosDepClose)!=null)
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
                        <a href="#"><h3 class="banner-title">{!!$event->nombre_evento!!}</h3><h3 style="color: red">{!!date_format($date3, 'j F ')!!}</h3></a>
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
    
    @if(count($PromoDepClose!=null))
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
    
    

</div>

@endsection
