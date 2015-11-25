@extends('front.masterPageServicios')

@section('step1')

<?php
$id_usuario_op = NULL;
$nombre_empresa_operador = NULL;
$direccion_empresa_operador = NULL;
$nombre_contacto_operador_1 = NULL;
$telf_contacto_operador_1 = NULL;
$email_contacto_operador = NULL;
?>
@foreach ($operador as $operadorData)
<?php
$id_usuario_op = $operadorData->id_usuario_op;
$nombre_empresa_operador = $operadorData->nombre_empresa_operador;
$direccion_empresa_operador = $operadorData->direccion_empresa_operador;
$nombre_contacto_operador_1 = $operadorData->nombre_contacto_operador_1;
$telf_contacto_operador_1 = $operadorData->telf_contacto_operador_1;
$email_contacto_operador = $operadorData->email_contacto_operador;
?>
@endforeach     

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
    {!! Form::open(['url' => route('upload-postoperador'),  'id'=>'registro_step1']) !!}

    <div class="wrapper uwa-font-aa">
        <div class="form-group-step2">
            <input type="hidden" value="{!!$data['tipoOperador']!!}" name="id_tipo_operador" id="id_tipo_operador">
            <input type="hidden" value="{!!Session::get('user_id')!!}" name="id_usuario" id="id_usuario">
            <input type="hidden" value="{!!$id_usuario_op!!}" name="id_usuario_op" id="id_usuario_op">
            {!!Form::label('company', 'Compania Nombre', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::text('nombre_empresa_operador', $nombre_empresa_operador, array('class'=>'inputtext-step2','placeholder'=>'Ingrese Nombre Compania'))!!}
        </div>
        <div class="form-group-step2">
            {!!Form::label('direccion_1', 'Direccion Compania', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::text('direccion_empresa_operador', $direccion_empresa_operador, array('class'=>'inputtext-step2','placeholder'=>'Ingrese direccion compania'))!!}
        </div>
        <div class="form-group-step2">
            {!!Form::label('nombre_1', 'Contacto Nombre 1', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::text('nombre_contacto_operador_1', $nombre_contacto_operador_1, array('class'=>'inputtext-step2','placeholder'=>'Ingrese Nombre contacto'))!!}
        </div>
        <div class="form-group-step2">
            {!!Form::label('telefono_1', 'Telefono Contacto 1', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::text('telf_contacto_operador_1', $telf_contacto_operador_1, array('class'=>'inputtext-step2','placeholder'=>'Ingrese telefono contacto'))!!}
        </div>
        <div class="form-group-step2">
            {!!Form::label('email_1', 'Email Contacto', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::text('email_contacto_operador', $email_contacto_operador, array('class'=>'inputtext-step2','placeholder'=>'Ingrese email contacto'))!!}
        </div>
        <div class="form-group-step2">
            <div class="box-content-button-step2">
                <a class="button" onclick="AjaxContainerRegistro('registro_step1')" href="#">Siguiente</a>
            </div>
        </div>    

    </div>
    {!! Form::close() !!}

</div>

@stop