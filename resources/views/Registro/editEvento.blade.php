@extends('front.masterPageServicios')

@section('step1')
<div class="rowerror">
</div>

<div class="row-step4">
    <div id="title-box-header">
        <div id="title-box-type">
            <h2 class="head-title">
                I'm an                <strong>Agency</strong>
            </h2>
        </div>
        <div id="description-box-type">
            Explicacion de que es lo que hace todo este proceso para que pueda ver el usuario que hacer
            sin necesidad de llamar a nadie
        </div>
    </div>
    <div id="space"></div>


    {!! Form::open(['url' => route('postPromocion'), 'method' => 'post', 'role' => 'form', 'id'=>'UpdateEvento']) !!}
    @foreach ($listEventos as $evento)

    <input type="hidden" name="id_usuario_servicio" value="{{ $evento->id_usuario_servicio }}">
    <input type="hidden" name="id" value="{{ $evento->id }}">

    <div class="wrapper uwa-font-aa">

        <div class="form-group-step2">
            @include('reusable.imageContainer',['objetoImg' => $ImgPromociones])
            @include('reusable.uploadImage', ['tipo' => '4','objeto'=>$listEventos])  
        </div>

        <div class="form-group-step2">
            {!!Form::label('nombre_evento', 'Nombre Evento', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::text('nombre_evento', $evento->nombre_evento, array('class'=>'inputtext-step2','placeholder'=>'Nombre del evento'))!!}
        </div>

        <div class="form-group-step2">
            {!!Form::label('Fecha_inicio', 'Fecha inicio', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::text('fecha_desde', $evento->fecha_desde, array('class'=>'inputtext-step2'))!!}
        </div>

        <div class="form-group-step2">
            {!!Form::label('Fecha_fin', 'Fecha fin', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::text('fecha_hasta', $evento->fecha_hasta, array('class'=>'inputtext-step2'))!!}
        </div>

        <div class="form-group-step2">
            {!!Form::label('detalle_promocion', 'Descripción evento', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::textarea('descripcion_evento', $evento->descripcion_evento, array('class'=>'inputtext-step2'))!!}

        </div>

     <div class="form-group-step2-popup">
                @if(isset($listEventos))
                @foreach ($listEventos as $itiner)
                @include('reusable.maps', ['longitud_servicio' => $itiner->longitud_evento,'latitud_servicio'=>$itiner->latitud_evento])  
                @endforeach
                @else
                @include('reusable.maps', ['longitud_servicio' => '-78.46783820000002','latitud_servicio'=>'-0.1806532'])   
                @endif
        </div>

        <div class="form-group-step2">
            {!!Form::label('tags', 'Tags', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::text('tags', $evento->tags, array('class'=>'inputtext-step2','placeholder'=>'Tags'))!!}
        </div>
        <div id="form-group-step2-popup">
            <div class="box-content-button-1">
                <a class="button-1" onclick="AjaxContainerRegistro('UpdateEvento')" href="#">Siguiente</a>
            </div>
        </div>
    </div>
    @endforeach 

    {!! Form::close() !!}
</div>


@stop