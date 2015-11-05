@extends('front.masterPageServicios')

@section('step1')
{!! HTML::style('css/serviciosOperadores.css') !!} 

<div class="rowerror">
</div>
<div class="row">
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
                    <a class="button" onclick="$(tipo_operador).val(1);AjaxContainerRegistro('registro_step1')" href="#">Get started</a>
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
                    <a class="button" onclick="$(tipo_operador).val(2);AjaxContainerRegistro('registro_step1')" href="#">Get started</a>
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
                    <a class="button" onclick="$(tipo_operador).val(3);AjaxContainerRegistro('registro_step1')" href="#">Sign up for free</a>
                </div>
            </div>
        </div>
     </div>
    {!! Form::close() !!}

</div>

@stop