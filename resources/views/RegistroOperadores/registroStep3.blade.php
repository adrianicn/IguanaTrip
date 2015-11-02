@extends('front.masterPageRegistro')
@section('step2')

	{!! Form::open(['url' => 'registro/step1', 'method' => 'post', 'role' => 'form', 'id'=>'registro_step3'] ) !!}

		<div class="row setup-content" id="step-3">
			<div class="col-xs-6 col-md-offset-3">
				<div class="col-md-12">
					<h3> {{ trans('registro/registrosteps.step2') }}</h3>
					<div class="form-group">
						<div id="servicios-col">
							<img alt="Eventos" src="img/eventos.png" id="eventos-img">
							<p>Eventos</p>
						</div>
					</div>
					<div class="form-group">
						<div id="servicios-col">
							<img alt="Servicios" src="img/servicios.png" id="servicios-img">
							<p>Servicios</p>
						</div>
					</div>
					<input type="hidden" value="0" name="servicio_evento" id="servicio_evento">
					<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Siguiente</button>
				</div>
			</div>
		</div>
	{!! Form::close() !!}


@stop