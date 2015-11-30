@extends('front.masterPageServicios')

@section('step1')
{!! HTML::style('css/calendar/ui-jquery.css') !!}

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

<div class="form-group-step2">
            @include('reusable.imageContainer',['objetoImg' => $ImgPromociones])
            @include('reusable.uploadImage', ['tipo' => '2','objeto'=>$listPromociones])  
        </div>
    {!! Form::open(['url' => route('postPromocion'), 'method' => 'post', 'role' => 'form', 'id'=>'Updatepromocion']) !!}
    @foreach ($listPromociones as $promo)

    <input type="hidden" name="id_usuario_servicio" value="{{ $promo->id_usuario_servicio }}">
    <input type="hidden" name="id" value="{{ $promo->id }}">

    <div class="wrapper uwa-font-aa">

        

        <div class="form-group-step2">
            {!!Form::label('nombre_promocion', 'Nombre Promocion', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::text('nombre_promocion', $promo->nombre_promocion, array('class'=>'inputtext-step2','placeholder'=>'Nombre del Servicio'))!!}
        </div>

        <div class="form-group-step2">
            {!!Form::label('Fecha_inicio', 'Fecha Inicio', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::text('fecha_desde', $promo->fecha_desde, array('class'=>'inputtext-step2 datepicker'))!!}
        </div>

        <div class="form-group-step2">
            {!!Form::label('Fecha_fin', 'Fecha Hasta', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::text('fecha_hasta', $promo->fecha_hasta, array('class'=>'inputtext-step2 datepicker'))!!}
        </div>

        <div class="form-group-step2">
            {!!Form::label('precio_normal', 'Precio Normal', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::text('precio_normal', $promo->precio_normal, array('class'=>'inputtext-step2','placeholder'=>'Precio Normal'))!!}
        </div>

        <div class="form-group-step2">
            {!!Form::label('descuento', 'Descuento', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::text('descuento', $promo->descuento, array('class'=>'inputtext-step2','placeholder'=>'Descuento'))!!}
        </div>

        <div class="form-group-step2">
            {!!Form::label('codigo_promocion', 'Codigo ', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::text('codigo_promocion', $promo->codigo_promocion, array('class'=>'inputtext-step2','placeholder'=>'Codigo'))!!}
        </div>



        <div class="form-group-step2">
            {!!Form::label('detalle_promocion', 'Detalle Promocion', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::textarea('descripcion_promocion', $promo->descripcion_promocion, array('class'=>'inputtext-step2'))!!}

        </div>

        <div class="form-group-step2">
            {!!Form::label('observaciones_promocion', 'Observaciones', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::textarea('observaciones_promocion', $promo->observaciones_promocion, array('class'=>'inputtext-step2'))!!}

        </div>

        <div class="form-group-step2">
            {!!Form::label('tags', 'Tags', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::text('tags', $promo->tags, array('class'=>'inputtext-step2','placeholder'=>'Tags'))!!}
        </div>
        <div id="form-group-step2-popup">
            <div class="box-content-button-1">
                <a class="button-1" onclick="AjaxContainerRegistro('Updatepromocion')" href="#">Siguiente</a>
            </div>
        </div>
    </div>
    @endforeach 

    {!! Form::close() !!}
</div>

{!! HTML::script('js/jquery.js') !!}
  
  

<script>
  $(function() {
     $('.datepicker').datepicker({dateFormat: 'yy/mm/dd'});
  });
  </script>
@stop