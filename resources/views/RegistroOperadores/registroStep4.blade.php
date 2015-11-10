@extends('front.masterPageRegistro')

@section('step1')
{!! HTML::style('css/serviciosOperadores.css') !!} 
<div class="rowerror">
</div>
<div class="row">

	{!! Form::open(['url' => 'registro/step1', 'method' => 'post', 'role' => 'form', 'id'=>'registro_step1'] ) !!}
	<div class="wrapper uwa-font-aa">

		<div class="form-group">
        	{!!Form::label('nombre_servicio_1', 'Nombre Servicio', array('class'=>'control-label'))!!}
            {!!Form::text('nombre_servicio', , array('class'=>'form-control','placeholder'=>'Nombre del Servicio'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('detalle_servicio_1', 'Detalle Servicio', array('class'=>'control-label'))!!}
            {!!Form::text('detalle_servicio', , array('class'=>'form-control','placeholder'=>'Detalle Servicio'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('precio_desde_1', 'Precio Desde', array('class'=>'control-label'))!!}
            {!!Form::text('precio_desde', , array('class'=>'form-control','placeholder'=>'Precio Desde'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('precio_hasta_1', 'Precio Hasta', array('class'=>'control-label'))!!}
            {!!Form::text('precio_hasta', , array('class'=>'form-control','placeholder'=>'Precio Hasta'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('precio_anterior_1', 'Precio Anterior', array('class'=>'control-label'))!!}
            {!!Form::text('precio_anterior', , array('class'=>'form-control','placeholder'=>'Precio Anterior'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('precio_actual_1', 'Precio Actual', array('class'=>'control-label'))!!}
            {!!Form::text('precio_actual', , array('class'=>'form-control','placeholder'=>'Precio actual'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('descuento_servicio_1', 'Desuento Servicio', array('class'=>'control-label'))!!}
            {!!Form::text('descuento_servico', , array('class'=>'form-control','placeholder'=>'Descuento del Servicio'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('direccion_servicio_1', 'Direccion Servicio', array('class'=>'control-label'))!!}
            {!!Form::text('direccion_servicio', , array('class'=>'form-control','placeholder'=>'Direccion del Servicio'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('correo_contacto_1', 'Correo del contacto', array('class'=>'control-label'))!!}
            {!!Form::text('correo_contacto', , array('class'=>'form-control','placeholder'=>'Correo Contacto'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('pagina_web_1', 'Pagina Web', array('class'=>'control-label'))!!}
            {!!Form::text('pagina_web', , array('class'=>'form-control','placeholder'=>'URL'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('nombre_comercial_servicio_1', 'Nombre Comercial', array('class'=>'control-label'))!!}
            {!!Form::text('nombre_comercial', , array('class'=>'form-control','placeholder'=>'Nombre Comercial'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('tags_1', 'Tags', array('class'=>'control-label'))!!}
            {!!Form::text('tags', , array('class'=>'form-control','placeholder'=>'Tags'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('descuento_servicio_1', 'Descuento del Servicio', array('class'=>'control-label'))!!}
            {!!Form::text('descuento_clientes', , array('class'=>'form-control','placeholder'=>'Descuento del Servicio'))!!}

        </div>
		<div class="form-group">
        	{!!Form::label('tags_servicio_1', 'Tags del Servicio', array('class'=>'control-label'))!!}
            {!!Form::text('tags_servicio', , array('class'=>'form-control','placeholder'=>'Tags del Servicio'))!!}

        </div>
        
	{!! Form::close() !!}

</div>
@stop