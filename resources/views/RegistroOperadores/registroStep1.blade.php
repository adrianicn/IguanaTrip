@extends('front.masterPageServicios')

@section('step1')



<?php
$label_tipo_operador_agencia = 'Get started';
$label_tipo_operador_empresa = 'Get started';
$label_tipo_operador_persona = 'Sign up for free';
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
                <p>Design and offer your own real-time social dashboards to clients.</p>
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
                <p>Connect and compare all your internal and external data, all in one place.</p>
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
                <p>Start with the award-winning, free personal dashboard and reader used by millions.</p>
                <div class="box-content-button">
                    <a class="button" onclick="$(tipo_operador).val(3);AjaxContainerRegistro('registro_step1')" href="#">{{$label_tipo_operador_persona}}</a>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>


@stop