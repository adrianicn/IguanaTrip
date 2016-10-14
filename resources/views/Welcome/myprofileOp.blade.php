@extends('front.masterPageServicios')

@section('step1')

<?php
$operadorid1=0;
$operadorid2=0;
$operadorid3=0;
?>

@if(count($listOperadores) !=0 )
@foreach ($listOperadores as $operadores)
@if ($operadores->id_tipo_operador == 1)

    <?php $label_tipo_operador_agencia = 'Ver mi perfil';
$operadorid1=$operadores->id_usuario_op;
?>
@endif

@if ($operadores->id_tipo_operador == 2)
<?php $label_tipo_operador_empresa = 'Ver mi perfil';
$operadorid2=$operadores->id_usuario_op;?>
@endif
@if ($operadores->id_tipo_operador == 3)
<?php $label_tipo_operador_persona = 'Ver mi perfil';
$operadorid3=$operadores->id_usuario_op;?>
@endif

@endforeach
@endif

<div class="rowerror">
</div>
<div class="row-step41">
    <div id="space"></div>
    {!! Form::open(['url' => route('postTipoOperadorProfile'),  'id'=>'registro_step1']) !!}
    <input type="hidden"  name="tipo_operador" id="tipo_operador">
    
    <input type="hidden"  name="operador_id" id="operador_id">
    <div class="wrapper uwa-font-aa">
        @if(isset($label_tipo_operador_agencia))
        <div class="box-content box-content-team left">
            <h2 class="box-content-title">
                I'm an                <strong>Agency</strong>
            </h2>
            <div class="box-content-text">
                <p>Soy una pequeña empresa establecida. Quiero empezar a abrirme campo a nivel internacional. Iré creciendo paulatinamente y luego convertirme en una ENTERPRISE</p>
                <div class="box-content-button">
                    <a class="button" onclick="$('#tipo_operador').val(1);$('#operador_id').val({!!$operadorid1!!});AjaxContainerRegistro('registro_step1')" href="#">{{$label_tipo_operador_agencia}}</a>
                </div>
            </div>
        </div>
        @endif
        
        @if(isset($label_tipo_operador_empresa))
        <div class="box-content box-content-team middle">
            <h2 class="box-content-title">
                I'm an                <strong>Enterprise</strong>
            </h2>
            <div class="box-content-text">
                <p>Soy una empresa con prestigio con un mercado ya establecido. Deseo seguir abriendome campo y atraer nuevos clientes nacionales e internacionales</p>
                <div class="box-content-button">
                    <a class="button" onclick="$('#tipo_operador').val(2);$('#operador_id').val({!!$operadorid2!!});AjaxContainerRegistro('registro_step1')" href="#">{{$label_tipo_operador_empresa}}</a>
                </div>
            </div>
        </div>
        @endif
        
        @if(isset($label_tipo_operador_persona))
        <div class="box-content box-content-individual right">
            <h2 class="box-content-title">
                I'm just                <strong>Me</strong>
            </h2>
            <div class="box-content-text">
                <p>Soy una persona natural con deseos de organizar un paseo e invitar a todo el mundo a unirse a esta aventura nacionales e internacionales.</p>
                <div class="box-content-button">
                    <a class="button" onclick="$('#tipo_operador').val(3);$('#operador_id').val({!!$operadorid3!!});AjaxContainerRegistro('registro_step1')" href="#">{{$label_tipo_operador_persona}}</a>
                </div>
            </div>
        </div>
        @endif
        
        @if(!isset($label_tipo_operador_persona)&& !isset($label_tipo_operador_empresa)&& !isset($label_tipo_operador_agencia))
        
        <div class="box-content box-content-individual right">
            <h2 class="box-content-title">
                Crear<strong>Perfil</strong>
            </h2>
            <div class="box-content-text">
                <p>
                    Para crear tu perfil haz click aquí e ingresa los servicios turisticos que ofreces completamente gratis.</p>
                <div class="box-content-button">
                          <a class="button" onclick="$('#tipo_operador').val(3);$('#operador_id').val({!!$operadorid3!!});AjaxContainerRegistro('registro_step1')" href="#">{{$label_tipo_operador_persona}}</a>
            </div>
            </div>
        </div>
        @endif
    </div>
    {!! Form::close() !!}
</div>


@stop