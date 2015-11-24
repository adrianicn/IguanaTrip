@extends('front.masterPageServicios')

@section('step1')

<div class="rowerror">
</div>

<div id="basic-modal-content" class="cls loadModal">
</div>


@foreach ($listItinerarios as $itiner)
<div class="row">
    {!! Form::open(['url' => route('postItinerario'), 'method' => 'post', 'role' => 'form', 'id'=>'Updatepromocion']) !!}
    <div class="wrapper uwa-font-aa">
        <div id="renderPartial">
            @include('reusable.catalogo_dificultades',['diffic' => $listDificultades,'elegido'=>$itiner->id_catalogo_dificultad])
            @section('contentPanel')
            @show
        </div>    
        <div class="form-group">
            {!!Form::label('nombre_itinerario', 'Nombre Itinerario', array('class'=>'control-label'))!!}
            {!!Form::text('nombre_itinerario', $itiner->nombre_itinerario, array('class'=>'form-control','placeholder'=>'Nombre del Servicio'))!!}
        </div>



        <div class="form-group">
            {!!Form::label('Fecha_desde', 'Fecha Inicio', array('class'=>'control-label'))!!}
            {!!Form::text('fecha_desde', $itiner->fecha_desde, array('class'=>'form-control'))!!}
        </div>
        <div class="form-group">
            {!!Form::label('Fecha_fin', 'Fecha Hasta', array('class'=>'control-label'))!!}
            {!!Form::text('fecha_hasta', $itiner->fecha_hasta, array('class'=>'form-control'))!!}
        </div>
        <div class="form-group">
            {!!Form::label('precio_normal', 'Precio Normal', array('class'=>'control-label'))!!}
            {!!Form::text('precio_normal', $itiner->precio_normal, array('class'=>'form-control','placeholder'=>'Precio Normal'))!!}
        </div>
        <div class="form-group">
            {!!Form::label('descuento', 'Descuento', array('class'=>'control-label'))!!}
            {!!Form::text('descuento', $itiner->descuento, array('class'=>'form-control','placeholder'=>'Descuento'))!!}
        </div>
        <div class="form-group">
            {!!Form::label('descripcion_itinerario', 'Detalle Itinerario', array('class'=>'control-label'))!!}
            {!!Form::textarea('descripcion_itinerario', $itiner->descripcion_itinerario, array('class'=>'form-control'))!!}
        </div>
        <div class="form-group">
            {!!Form::label('observaciones_itinerario', 'Observaciones', array('class'=>'control-label'))!!}
            {!!Form::textarea('observaciones_itinerario', $itiner->observaciones_itinerario, array('class'=>'form-control'))!!}
        </div>
        <div class="form-group">
            {!!Form::label('tags', 'Tags', array('class'=>'control-label'))!!}
            {!!Form::text('tags', $itiner->tags, array('class'=>'form-control','placeholder'=>'Tags'))!!}
        </div>
        <input type="hidden" name="id_usuario_servicio" value="{{ $itiner->id_usuario_servicio }}">
        <input type="hidden" name="id" value="{{ $itiner->id }}">

        <div class="box-content-button-1">
            <a class="button" onclick="AjaxContainerRegistro('Updatepromocion')" href="#">Siguiente</a>
        </div>


    </div>
    {!! Form::close() !!}
</div>




@endforeach 
@section('scripts')

{!! HTML::script('/js/jsModal/jquery.simplemodal.js') !!}
{!! HTML::script('/js/jsModal/basic.js') !!}
<script>
    $(document).ready(function () {
        GetDataAjax("/IguanaTrip/public/getlistaItinerarios/{!!$itiner->id!!}");

    });
</script>



@stop

@stop