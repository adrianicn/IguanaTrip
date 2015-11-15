@extends('front.masterPageServicios')

@section('step1')
{!! HTML::style('css/serviciosOperadores.css') !!} 
<div class="rowerror">
</div>
<?php 
$usuarioServicio->id = 0;
$usuarioServicio->nombre_servicio = '';
$usuarioServicio->detalle_servicio = '';
$usuarioServicio->precio_desde = '';
$usuarioServicio->precio_hasta = '';
$usuarioServicio->precio_anterior = '';
$usuarioServicio->precio_actual = '';
$usuarioServicio->descuento_servico = '';
$usuarioServicio->direccion_servicio = '';
$usuarioServicio->correo_contacto = '';
$usuarioServicio->pagina_web = '';
$usuarioServicio->nombre_comercial = '';
$usuarioServicio->tags = '';
$usuarioServicio->descuento_clientes = '';
$usuarioServicio->tags_servicio = '';
$usuarioServicio->observaciones = '';
$usuarioServicio->telefono = '';
?>
@foreach ($usuarioServicio as $detalles)
<?php
	$usuarioServicio->id = $detalles->id;
	$usuarioServicio->nombre_servicio = $detalles->nombre_servicio;
	$usuarioServicio->detalle_servicio = $detalles->detalle_servicio;
	$usuarioServicio->precio_desde = $detalles->precio_desde;
	$usuarioServicio->precio_hasta = $detalles->precio_hasta;
	$usuarioServicio->precio_anterior = $detalles->precio_anterior;
	$usuarioServicio->precio_actual = $detalles->precio_actual;
	$usuarioServicio->descuento_servico = $detalles->descuento_servico;
	$usuarioServicio->direccion_servicio = $detalles->direccion_servicio;
	$usuarioServicio->correo_contacto = $detalles->correo_contacto;
	$usuarioServicio->pagina_web = $detalles->pagina_web;
	$usuarioServicio->nombre_comercial = $detalles->nombre_comercial;
	$usuarioServicio->tags = $detalles->tags;
	$usuarioServicio->descuento_clientes = $detalles->descuento_clientes;
	$usuarioServicio->tags_servicio = $detalles->tags_servicio;
	$usuarioServicio->observaciones = $detalles->observaciones;
	$usuarioServicio->telefono = $detalles->telefono;
?>
@endforeach
<div class="row">

	{!! Form::open(['url' => route('upload-postusuarioservicios'), 'method' => 'post', 'role' => 'form', 'id'=>'registro_step1'] ) !!}

	<div class="wrapper uwa-font-aa">
		<input type="hidden" value="{!!$usuarioServicio->id!!}" name="id" id="id">
	
		<div class="form-group">
        	{!!Form::label('nombre_servicio_1', 'Nombre Servicio', array('class'=>'control-label'))!!}
            {!!Form::text('nombre_servicio', $usuarioServicio->nombre_servicio, array('class'=>'form-control','placeholder'=>'Nombre del Servicio'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('detalle_servicio_1', 'Detalle Servicio', array('class'=>'control-label'))!!}
            {!!Form::text('detalle_servicio', $usuarioServicio->detalle_servicio, array('class'=>'form-control','placeholder'=>'Detalle Servicio'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('precio_desde_1', 'Precio Desde', array('class'=>'control-label'))!!}
            {!!Form::text('precio_desde', $usuarioServicio->precio_desde, array('class'=>'form-control','placeholder'=>'Precio Desde'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('precio_hasta_1', 'Precio Hasta', array('class'=>'control-label'))!!}
            {!!Form::text('precio_hasta', $usuarioServicio->precio_hasta, array('class'=>'form-control','placeholder'=>'Precio Hasta'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('precio_anterior_1', 'Precio Anterior', array('class'=>'control-label'))!!}
            {!!Form::text('precio_anterior', $usuarioServicio->precio_anterior, array('class'=>'form-control','placeholder'=>'Precio Anterior'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('precio_actual_1', 'Precio Actual', array('class'=>'control-label'))!!}
            {!!Form::text('precio_actual', $usuarioServicio->precio_actual, array('class'=>'form-control','placeholder'=>'Precio actual'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('descuento_servicio_1', 'Desuento Servicio', array('class'=>'control-label'))!!}
            {!!Form::text('descuento_servico', $usuarioServicio->descuento_servico, array('class'=>'form-control','placeholder'=>'Descuento del Servicio'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('direccion_servicio_1', 'Direccion Servicio', array('class'=>'control-label'))!!}
            {!!Form::text('direccion_servicio', $usuarioServicio->direccion_servicio, array('class'=>'form-control','placeholder'=>'Direccion del Servicio'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('correo_contacto_1', 'Correo del contacto', array('class'=>'control-label'))!!}
            {!!Form::text('correo_contacto', $usuarioServicio->correo_contacto, array('class'=>'form-control','placeholder'=>'Correo Contacto'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('pagina_web_1', 'Pagina Web', array('class'=>'control-label'))!!}
            {!!Form::text('pagina_web', $usuarioServicio->pagina_web, array('class'=>'form-control','placeholder'=>'URL'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('nombre_comercial_servicio_1', 'Nombre Comercial', array('class'=>'control-label'))!!}
            {!!Form::text('nombre_comercial', $usuarioServicio->nombre_comercial, array('class'=>'form-control','placeholder'=>'Nombre Comercial'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('tags_1', 'Tags', array('class'=>'control-label'))!!}
            {!!Form::text('tags', $usuarioServicio->tags, array('class'=>'form-control','placeholder'=>'Tags'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('descuento_clientes_1', 'Descuento del Cliente', array('class'=>'control-label'))!!}
            {!!Form::text('descuento_clientes', $usuarioServicio->descuento_clientes, array('class'=>'form-control','placeholder'=>'Descuento del Cliente'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('tags_servicio_1', 'Tags del Servicio', array('class'=>'control-label'))!!}
            {!!Form::text('tags_servicio', $usuarioServicio->tags_servicio, array('class'=>'form-control','placeholder'=>'Tags del Servicio'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('observaciones_1', 'Observaciones del Servicio', array('class'=>'control-label'))!!}
            {!!Form::text('observaciones', $usuarioServicio->observaciones, array('class'=>'form-control','placeholder'=>'Observaciones del Servicio'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('telefono_1', 'Telefono del Servicio', array('class'=>'control-label'))!!}
            {!!Form::text('telefono', $usuarioServicio->telefono, array('class'=>'form-control','placeholder'=>'Telefono del Servicio'))!!}

        </div>
        <div class="datagrid">
        	<table>
            	<thead>
            		<tr>
            			<th>Tipo</th><th>Descripcion</th><th>Seleccion</th>
            		</tr>
            	</thead>
            	<tbody>
            	@foreach ($catalogoServicioEstablecimiento as $catalogo)	
            		
            		<tr>
                    	<td> <img src="{!! asset('images/eat.png')!!}" alt="" /></td>
                    	<td>{!!$catalogo->nombre_servicio_est!!}</td>
                    	<td><input class="demo labelauty" name="id_servicio_est[]" id="id_servicio_est[]" value="{!!$catalogo->id!!}" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio" {{($catalogo->estado_servicio_est_us <> NULL)?'checked':''}}/></td>
                	</tr>
                @endforeach 	
                </tbody>
        	</table>
        </div>
        <div class="box-content-button-1">
			<a class="button" onclick="AjaxContainerRegistro('registro_step1')" href="#">Siguiente</a>
        </div>
	{!! Form::close() !!}

</div>
@stop