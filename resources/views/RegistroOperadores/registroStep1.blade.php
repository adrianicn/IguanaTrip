@extends('front.masterPageServicios')

@section('step1')



<?php

$label_tipo_operador_agencia = 'Registro gratis';
$label_tipo_operador_empresa = 'Registro gratis';
$label_tipo_operador_persona = 'Registro gratis';
?>
@if(count($listOperadores) !=0 )
@foreach ($listOperadores as $operadores)
@if ($operadores->id_tipo_operador === 1)
<?php $label_tipo_operador_agencia = 'Actualizar' ?>
@elseif ($operadores->id_tipo_operador === 2)
<?php $label_tipo_operador_empresa = 'Actualizar' ?>
@else (count($records) === 3)
<?php $label_tipo_operador_persona = 'Actualizar' ?>
@endif
@endforeach
@endif

<div class="rowerror">
</div>
<div class="row-step41">
    <div id="space"></div>
    {!! Form::open(['url' => route('upload-postTipoOperador'),  'id'=>'registro_step1']) !!}
    <input type="hidden" value="0" name="tipo_operador" id="tipo_operador">
    <div class="wrapper uwa-font-aa">
        <div class="box-content box-content-team left">
            <h2 class="box-content-title">
                I'm an                <strong>Agency</strong>
            </h2>
            <div class="box-content-text">
                <p>Soy una pequeña empresa establecida. Quiero empezar a abrirme campo a nivel internacional. Iré creciendo paulatinamente y luego convertirme en una ENTERPRISE</p>
                <div class="box-content-button">
                    <a class="button" onclick="$(tipo_operador).val(1);AjaxContainerRegistro('registro_step1')" href="#">{{$label_tipo_operador_agencia}}</a>
                </div>
            </div>
        </div>
        <div class="box-content box-content-team middle">
            <h2 class="box-content-title">
                I'm an                <strong>Enterprise</strong>
            </h2>
            <div class="box-content-text">
                <p>Soy una empresa con prestigio con un mercado ya establecido. Deseo seguir abriendome campo y atraer nuevos clientes nacionales e internacionales</p>
                <div class="box-content-button">
                    <a class="button" onclick="$(tipo_operador).val(2);AjaxContainerRegistro('registro_step1')" href="#">{{$label_tipo_operador_empresa}}</a>
                </div>
            </div>
        </div>
        <div class="box-content box-content-individual right">
            <h2 class="box-content-title">
                I'm just                <strong>Me</strong>
            </h2>
            <div class="box-content-text">
                <p>Soy una persona natural con deseos de organizar un paseo e invitar a todo el mundo a unirse a esta aventura nacionales e internacionales.</p>
                <div class="box-content-button">
                    <a class="button" onclick="$(tipo_operador).val(3);AjaxContainerRegistro('registro_step1')" href="#">{{$label_tipo_operador_persona}}</a>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>


@stop