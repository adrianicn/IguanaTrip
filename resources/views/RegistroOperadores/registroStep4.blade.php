@extends('front.masterPageServicios')

@section('step1')
<div style='display:none'>
    <img src="{!! asset('img/x.png')!!}" alt='' />
</div>
<style>
    #simplemodal-container a.modalCloseImg {
        background:url("{!! asset('img/x.png')!!}") no-repeat;
        width:25px; height:29px; display:inline; z-index:1200; position:absolute; top:-15px; right:-16px; cursor:pointer;}
</style>
<div id="basic-modal-content" class="cls loadModal"></div>

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
            <div class="box-content-button-1">
                <a class="button-1" onclick="AjaxContainerRegistro('registro_step1')" href="#">Siguiente</a>
            </div>              
        </div>
        {!! Form::close() !!}
<div id="part-1-form">
            @include('reusable.imageContainer',['objetoImg' => $ImgPromociones])
        </div>
        
        @include('reusable.uploadImage', ['tipo' => '1','objeto'=>$usuarioServicio])  

        
            <div id="renderPartialListaServicios">
                    @section('contentPanelServicios')
                    @show
                </div>    
    </div>
</div>

@section('scripts')
    {!! HTML::script('/js/jsModal/jquery.simplemodal.js') !!}
    {!! HTML::script('/js/jsModal/basic.js') !!}
    
    
@stop

<script>
    $(document).ready(function () {
        
        GetDataAjaxSectionEventos("/IguanaTrip/public/getlistaServiciosComplete/62");
    });
</script>

@stop

