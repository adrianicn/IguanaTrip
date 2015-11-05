@extends('front.masterPageServicios')

@section('step1')
<style type="text/css">
#seleccionTipo{
	float: left;
	width: 180px;
	padding-right: 20px;
	border-color: 1px solid #000000;
}
#seleccionTipo h2{
	padding-bottom: 3px;
	border-bottom: 1px solid #CCCCCC; 
}
</style>


<div class="rowerror">
</div>
<div class="row">
    {!! Form::open(['url' => route('upload-postTipoOperador'),  'id'=>'registro_step1']) !!}
    	<input type="hidden" value="0" name="tipo_operador" id="tipo_operador">
<!--      <div class="row setup-content" id="step-1">
        <div class="col-xs-6 col-md-offset-3">-->
            <div class="col-md-121">
                <h3> {{ trans('registro/registrosteps.step1') }}</h3>
                <div class="form-group1">
					<div id="seleccionTipo">
						<h2>I'm an Agency</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec est risus, ultrices a porta quis, tristique nec orci. Nulla tincidunt fermentum facilisis. Vivamus accumsan enim tincidunt, sodales ante nec, dictum tortor. Mauris id posuere nibh, a porttitor dui. </p>
						<a class="btn1 btn-primary1 nextBtn1 btn-lg1 pull-right1" onclick="$(tipo_operador).val(1);AjaxContainerRegistro('registro_step1')" href="#">Seleccionar</a>
					</div>
					<div id="seleccionTipo">
						<h2>I'm an Enterprise</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec est risus, ultrices a porta quis, tristique nec orci. Nulla tincidunt fermentum facilisis. Vivamus accumsan enim tincidunt, sodales ante nec, dictum tortor. Mauris id posuere nibh, a porttitor dui. </p>
						<a class="btn1 btn-primary1 nextBtn1 btn-lg1 pull-right1" onclick="$(tipo_operador).val(2);AjaxContainerRegistro('registro_step1')" href="#">Seleccionar</a>
					</div>
					<div id="seleccionTipo">
						<h2>I'm just Me</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec est risus, ultrices a porta quis, tristique nec orci. Nulla tincidunt fermentum facilisis. Vivamus accumsan enim tincidunt, sodales ante nec, dictum tortor. Mauris id posuere nibh, a porttitor dui. </p>
						<a  class="btn1 btn-primary1 nextBtn1 btn-lg1 pull-right1" onclick="$(tipo_operador).val(3);AjaxContainerRegistro('registro_step1')" href="#">Seleccionar</a>
					</div>
                </div>
            </div>
<!--        </div>
    </div>-->

    {!! Form::close() !!}

</div>

@stop