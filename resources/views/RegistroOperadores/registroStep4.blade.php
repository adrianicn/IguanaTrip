@extends('front.masterPageServicios')

@section('step1')
<!--{!! HTML::style('css/serviciosOperadores.css') !!}--> 

<div class="rowerror">
</div>
<?php
$ImgPromociones = null; 
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
$usuarioServicio->latitud_servicio = -0.1806532;
$usuarioServicio->longitud_servicio = -78.46783820000002;
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
$usuarioServicio->latitud_servicio = ($detalles->latitud_servicio == '') ? -0.1806532 : $detalles->latitud_servicio;
$usuarioServicio->longitud_servicio = ($detalles->longitud_servicio == '') ? -78.46783820000002 : $detalles->longitud_servicio;
?>
@endforeach
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

    <div class="wrapper uwa-font-aa">
        {!! Form::open(['url' => route('upload-postusuarioservicios'), 'method' => 'post', 'role' => 'form', 'id'=>'registro_step1'] ) !!}

        <input type="hidden" value="{!!$usuarioServicio->id!!}" name="id" id="id">
        <input type="hidden" value="{!!$id_catalogo!!}" name="id_catalogo" id="id_catalogo">
        <div id="part-1-form">
            <div id="principal-data">
                <div class="form-group-1">
                    {!!Form::label('nombre_servicio_1', 'Nombre Servicio', array('class'=>'control-label','id'=>'iconFormulario-step4'))!!}
                    {!!Form::text('nombre_servicio', $usuarioServicio->nombre_servicio, array('class'=>'inputtext','placeholder'=>'Nombre del Servicio'))!!}
                </div>
                <div class="form-group-1">
                    {!!Form::label('precio_desde_1', 'Precio Desde', array('class'=>'control-label','id'=>'iconFormulario-step4'))!!}
                    {!!Form::text('precio_desde', $usuarioServicio->precio_desde, array('class'=>'inputtext','placeholder'=>'Precio Desde'))!!}
                </div>
                <div class="form-group-1">
                    {!!Form::label('precio_hasta_1', 'Precio Hasta', array('class'=>'control-label','id'=>'iconFormulario-step4'))!!}
                    {!!Form::text('precio_hasta', $usuarioServicio->precio_hasta, array('class'=>'inputtext','placeholder'=>'Precio Hasta'))!!}
                </div>
                <div class="form-group-1">
                    {!!Form::label('direccion_servicio_1', 'Direccion Servicio', array('class'=>'control-label','id'=>'iconFormulario-step4'))!!}
                    {!!Form::text('direccion_servicio', $usuarioServicio->direccion_servicio, array('class'=>'inputtext','placeholder'=>'Direccion del Servicio'))!!}
                </div>
                <div class="form-group-1">
                    @include('reusable.maps', ['longitud_servicio' => $usuarioServicio->longitud_servicio,'latitud_servicio'=>$usuarioServicio->latitud_servicio])  
                </div>    
            </div>
            <div id="secondary-data">
                <div class="form-group-2">
                    {!!Form::label('detalle_servicio_1', 'Detalle Servicio', array('class'=>'control-label-1'))!!}
                    <textarea id="detalle_servicio" name="detalle_servicio" class="ptm" placeholder="Detalle Servicio">
                        {!!$usuarioServicio->detalle_servicio!!}
                    </textarea>
                </div>
                <div class="form-group-2">
                    {!!Form::label('telefono_1', 'Telefono', array('class'=>'control-label-2'))!!}
                    {!!Form::text('telefono', $usuarioServicio->telefono, array('class'=>'form-control-1','placeholder'=>'Telefono del Servicio'))!!}
                </div>
                <div class="form-group-2">
                    {!!Form::label('correo_contacto_1', 'Correo del contacto', array('class'=>'control-label-2'))!!}
                    {!!Form::text('correo_contacto', $usuarioServicio->correo_contacto, array('class'=>'form-control-1','placeholder'=>'Correo Contacto'))!!}
                </div>
                <div class="form-group-2">
                    {!!Form::label('pagina_web_1', 'Pagina Web', array('class'=>'control-label-2'))!!}
                    {!!Form::text('pagina_web', $usuarioServicio->pagina_web, array('class'=>'form-control-1','placeholder'=>'URL'))!!}
                </div>
                <div class="form-group-2">
                    <ul style="list-style: none">
                            @foreach ($catalogoServicioEstablecimiento as $catalogo)	
                                <li>
                                    <input class="circulo" name="id_servicio_est[]" id="id_servicio_est[]" value="{!!$catalogo->id!!}" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio" {{($catalogo->estado_servicio_est_us <> NULL)?'checked':''}}/>
                                    {!!$catalogo->nombre_servicio_est!!}
                                </li>    
                            @endforeach
                    </ul>
                </div>

            </div>
            <div id="secondary-data">
                <div id="promocion"><a class="button-step4" onclick="RenderPartialGeneric('reusable.promocion',{!!$usuarioServicio->id!!})" href="#"> <h1 class="h1-agregar">+</h1> Agregar promocion</a></div>
                <div id="evento"><a class="button-step4" onclick="RenderPartialGeneric('reusable.createNewItinerario',{!!$usuarioServicio->id!!})" href="#"> <h1 class="h1-agregar">+</h1> Agregar evento</a></div>
                <div id="evento"><a class="button-step4" onclick="RenderPartialGeneric('reusable.createNewItinerario',{!!$usuarioServicio->id!!})" href="#"> <h1 class="h1-agregar">+</h1> Agregar Itinerario</a></div>
            </div>
        </div>
        <div id="part-1-form">
            wwwwwwwwwwwww
        </div>
        <div id="part-1-form">
            <div class="box-content-button-1">
                <a class="button-1" onclick="AjaxContainerRegistro('registro_step1')" href="#">Siguiente</a>
            </div>              
        </div>
<!--        

        <div class="form-group-1">
            {!!Form::label('precio_anterior_1', 'Precio Anterior', array('class'=>'control-label','id'=>'iconFormulario'))!!}
            {!!Form::text('precio_anterior', $usuarioServicio->precio_anterior, array('class'=>'inputtext','placeholder'=>'Precio Anterior'))!!}

        </div>
        <div class="form-group-1">
            {!!Form::label('precio_actual_1', 'Precio Actual', array('class'=>'control-label','id'=>'iconFormulario'))!!}
            {!!Form::text('precio_actual', $usuarioServicio->precio_actual, array('class'=>'inputtext','placeholder'=>'Precio actual'))!!}

        </div>
        <div class="form-group-1">
            {!!Form::label('descuento_servicio_1', 'Desuento Servicio', array('class'=>'control-label','id'=>'iconFormulario'))!!}
            {!!Form::text('descuento_servico', $usuarioServicio->descuento_servico, array('class'=>'inputtext','placeholder'=>'Descuento del Servicio'))!!}

        </div>
        <div class="form-group-1">
            {!!Form::label('nombre_comercial_servicio_1', 'Nombre Comercial', array('class'=>'control-label','id'=>'iconFormulario'))!!}
            {!!Form::text('nombre_comercial', $usuarioServicio->nombre_comercial, array('class'=>'inputtext','placeholder'=>'Nombre Comercial'))!!}

        </div>
        <div class="form-group-1">
            {!!Form::label('tags_1', 'Tags', array('class'=>'control-label','id'=>'iconFormulario'))!!}
            {!!Form::text('tags', $usuarioServicio->tags, array('class'=>'inputtext','placeholder'=>'Tags'))!!}

        </div>
        <div class="form-group-1">
            {!!Form::label('descuento_clientes_1', 'Descuento del Cliente', array('class'=>'control-label','id'=>'iconFormulario'))!!}
            {!!Form::text('descuento_clientes', $usuarioServicio->descuento_clientes, array('class'=>'inputtext','placeholder'=>'Descuento del Cliente'))!!}

        </div>
        <div class="form-group-1">
            {!!Form::label('tags_servicio_1', 'Tags del Servicio', array('class'=>'control-label','id'=>'iconFormulario'))!!}
            {!!Form::text('tags_servicio', $usuarioServicio->tags_servicio, array('class'=>'inputtext','placeholder'=>'Tags del Servicio'))!!}

        </div>
        <div class="form-group-1">
            {!!Form::label('observaciones_1', 'Observaciones del Servicio', array('class'=>'control-label','id'=>'iconFormulario'))!!}
            {!!Form::text('observaciones', $usuarioServicio->observaciones, array('class'=>'inputtext','placeholder'=>'Observaciones del Servicio'))!!}

        </div>
-->
        {!! Form::close() !!}

        @include('reusable.uploadImage', ['tipo' => '1','objeto'=>$usuarioServicio])  

    </div>
    <div id="basic-modal-content" class="cls loadModal">
    </div>
</div>
@section('scripts')
    {!! HTML::script('/js/jsModal/jquery.simplemodal.js') !!}
    {!! HTML::script('/js/jsModal/basic.js') !!}
@stop

@stop

