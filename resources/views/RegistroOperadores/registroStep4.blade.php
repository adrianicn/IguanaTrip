@extends('front.masterPageServicios')

@section('step1')
{!! HTML::style('css/serviciosOperadores.css') !!} 
<div class="rowerror">
</div>
<div class="row">

	{!! Form::open(['url' => route('upload-postusuarioservicios'), 'method' => 'post', 'role' => 'form', 'id'=>'registro_step1'] ) !!}

	<div class="wrapper uwa-font-aa">
		<input type="hidden" value="1" name="id_usuario_servicio" id="id_usuario_servicio">
	
		<div class="form-group">
        	{!!Form::label('nombre_servicio_1', 'Nombre Servicio', array('class'=>'control-label'))!!}
            {!!Form::text('nombre_servicio', NULL, array('class'=>'form-control','placeholder'=>'Nombre del Servicio'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('detalle_servicio_1', 'Detalle Servicio', array('class'=>'control-label'))!!}
            {!!Form::text('detalle_servicio', NULL, array('class'=>'form-control','placeholder'=>'Detalle Servicio'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('precio_desde_1', 'Precio Desde', array('class'=>'control-label'))!!}
            {!!Form::text('precio_desde', NULL, array('class'=>'form-control','placeholder'=>'Precio Desde'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('precio_hasta_1', 'Precio Hasta', array('class'=>'control-label'))!!}
            {!!Form::text('precio_hasta', NULL, array('class'=>'form-control','placeholder'=>'Precio Hasta'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('precio_anterior_1', 'Precio Anterior', array('class'=>'control-label'))!!}
            {!!Form::text('precio_anterior', NULL, array('class'=>'form-control','placeholder'=>'Precio Anterior'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('precio_actual_1', 'Precio Actual', array('class'=>'control-label'))!!}
            {!!Form::text('precio_actual', NULL, array('class'=>'form-control','placeholder'=>'Precio actual'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('descuento_servicio_1', 'Desuento Servicio', array('class'=>'control-label'))!!}
            {!!Form::text('descuento_servico', NULL, array('class'=>'form-control','placeholder'=>'Descuento del Servicio'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('direccion_servicio_1', 'Direccion Servicio', array('class'=>'control-label'))!!}
            {!!Form::text('direccion_servicio', NULL, array('class'=>'form-control','placeholder'=>'Direccion del Servicio'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('correo_contacto_1', 'Correo del contacto', array('class'=>'control-label'))!!}
            {!!Form::text('correo_contacto', NULL, array('class'=>'form-control','placeholder'=>'Correo Contacto'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('pagina_web_1', 'Pagina Web', array('class'=>'control-label'))!!}
            {!!Form::text('pagina_web', NULL, array('class'=>'form-control','placeholder'=>'URL'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('nombre_comercial_servicio_1', 'Nombre Comercial', array('class'=>'control-label'))!!}
            {!!Form::text('nombre_comercial', NULL, array('class'=>'form-control','placeholder'=>'Nombre Comercial'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('tags_1', 'Tags', array('class'=>'control-label'))!!}
            {!!Form::text('tags', NULL, array('class'=>'form-control','placeholder'=>'Tags'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('descuento_clientes_1', 'Descuento del Cliente', array('class'=>'control-label'))!!}
            {!!Form::text('descuento_clientes', NULL, array('class'=>'form-control','placeholder'=>'Descuento del Cliente'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('tags_servicio_1', 'Tags del Servicio', array('class'=>'control-label'))!!}
            {!!Form::text('tags_servicio', NULL, array('class'=>'form-control','placeholder'=>'Tags del Servicio'))!!}

        </div>
        <div class="datagrid">
        	<table>
            	<thead>
            		<tr>
            			<th>Tipo</th><th>Descripcion</th><th>Seleccion</th>
            		</tr>
            	</thead>
            	<tbody>
            	@foreach ($servicioEstablecimiento as $catalogo)	
            		
            		<tr>
                    	<td> <img src="{!! asset('images/eat.png')!!}" alt="" /></td>
                    	<td>{!!$catalogo->nombre_servicio_est!!}</td>
                    	<td><input class="demo labelauty" name="id_servicio_est[]" id="checkbox-1" value="{!!$catalogo->id!!}" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio"{!!$catalogo->nombre_servicio_est!!}/></td>
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