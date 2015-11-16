@extends('front.masterPageServicios')

@section('step1')
{!! HTML::style('css/serviciosOperadores.css') !!} 
<div class="rowerror">
</div>

@include('reusable.imageContainer',['objetoImg' => $ImgPromociones])
@foreach ($listPromociones as $promo)

@include('Registro.uploadImage', ['tipo' => '2','id_usuario_servicio'=>$promo->id_usuario_servicio])  

<div class="row">

    
    {!! Form::open(['url' => route('postPromocion'), 'method' => 'post', 'role' => 'form', 'id'=>'Updatepromocion']) !!}
    <div class="wrapper uwa-font-aa">


        <div class="form-group">
            {!!Form::label('nombre_promocion', 'Nombre Promocion', array('class'=>'control-label'))!!}
          {!!Form::text('nombre_promocion', $promo->nombre_promocion, array('class'=>'form-control','placeholder'=>'Nombre del Servicio'))!!}
        </div>
        
        <div class="form-group">
        	{!!Form::label('Fecha_inicio', 'Fecha Inicio', array('class'=>'control-label'))!!}
            {!!Form::text('fecha_desde', $promo->fecha_desde, array('class'=>'form-control'))!!}
        </div>

                <div class="form-group">
        	{!!Form::label('Fecha_fin', 'Fecha Hasta', array('class'=>'control-label'))!!}
            {!!Form::text('fecha_hasta', $promo->fecha_hasta, array('class'=>'form-control'))!!}
        </div>

        <div class="form-group">
            {!!Form::label('precio_normal', 'Precio Normal', array('class'=>'control-label'))!!}
          {!!Form::text('precio_normal', $promo->precio_normal, array('class'=>'form-control','placeholder'=>'Precio Normal'))!!}
        </div>
        
        <div class="form-group">
            {!!Form::label('descuento', 'Descuento', array('class'=>'control-label'))!!}
          {!!Form::text('descuento', $promo->descuento, array('class'=>'form-control','placeholder'=>'Descuento'))!!}
        </div>
        
        <div class="form-group">
            {!!Form::label('codigo_promocion', 'Codigo ', array('class'=>'control-label'))!!}
          {!!Form::text('codigo_promocion', $promo->codigo_promocion, array('class'=>'form-control','placeholder'=>'Codigo'))!!}
        </div>
        
        
        
<div class="form-group">
        	{!!Form::label('detalle_promocion', 'Detalle Promocion', array('class'=>'control-label'))!!}
            {!!Form::textarea('descripcion_promocion', $promo->descripcion_promocion, array('class'=>'form-control'))!!}
            
            

        </div>

        
        <div class="form-group">
        	{!!Form::label('observaciones_promocion', 'Observaciones', array('class'=>'control-label'))!!}
            {!!Form::textarea('observaciones_promocion', $promo->observaciones_promocion, array('class'=>'form-control'))!!}
            
            

        </div>
        
         <div class="form-group">
            {!!Form::label('tags', 'Tags', array('class'=>'control-label'))!!}
          {!!Form::text('tags', $promo->tags, array('class'=>'form-control','placeholder'=>'Tags'))!!}
        </div>
       <input type="hidden" name="id_usuario_servicio" value="{{ $promo->id_usuario_servicio }}">
       <input type="hidden" name="id" value="{{ $promo->id }}">
       
<div class="box-content-button-1">
			<a class="button" onclick="AjaxContainerRegistro('Updatepromocion')" href="#">Siguiente</a>
        </div>
        

    </div>
    {!! Form::close() !!}
</div>




@endforeach 
@stop