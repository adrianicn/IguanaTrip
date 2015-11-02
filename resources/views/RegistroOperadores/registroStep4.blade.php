@extends('front.masterPageRegistro')
@section('step3')

	{!! Form::open(['url' => 'registro/step1', 'method' => 'post', 'role' => 'form', 'id'=>'registro_step1'] ) !!}

		<div class="row setup-content" id="step-4">
			<div class="col-xs-6 col-md-offset-3">
				<div class="col-md-12">
					<h3> {{ trans('registro/registrosteps.step3') }}</h3>
					<div class="form-group">
		            			
					</div>
					<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Siguiente</button>
				</div>
			</div>
		</div>

	{!! Form::close() !!}


@stop