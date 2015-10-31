@extends('front.masterPageRegistro')

@section('step1')

	{!! Form::open(['url' => 'seleccion/step1', 'method' => 'post', 'role' => 'form', 'id'=>'registro_step1'] ) !!}

	
		<div class="row setup-content" id="step-1">
			<div class="col-xs-6 col-md-offset-3">
				<div class="col-md-12">
					<h3> {{ trans('registro/registrosteps.step1') }}</h3>
					<div class="form-group">
						{!! Form::label(trans('registro/registrosteps.step1-field1')); !!}
						{!! Form::text('nombre_empresa_operador'); !!}
					</div>
					<div class="form-group">
						{!! Form::label(trans('registro/registrosteps.step1-field2')); !!}
						{!! Form::text('nombre_contacto_operador_1'); !!}
					</div>
					<div class="form-group">
						{!! Form::label(trans('registro/registrosteps.step1-field3')); !!}
						{!! Form::text('telf_contacto_operador_1'); !!}          		
					</div>	
					<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" onclick="$(this).closest('form').submit()">Siguiente</button>
				</div>
			</div>
		</div>

	{!! Form::close() !!}


@stop

@section('scripts')
<script type="text/javascript">
    $('.error').html('');
    
      $.ajaxSetup({
                    headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
                });

                $("#registro_step1").submit(function (event) {

                    $('#container').loadingOverlay();

                    event.preventDefault();
                    var $form = $(this),
                            data = $form.serialize(),
                            url = $form.attr("action");
                    var posting = $.post(url, {formData: data});
                    posting.done(function (data) {
                        if (data.fail) {
                            var errorString = '<ul>';
                            $.each(data.errors, function (key, value) {
                                errorString += '<li>' + value + '</li>';
                            });
                            errorString += '</ul>';
                            $('#target').loadingOverlay('remove');
                            //$('#error').html(errorString);
                             $('.rowerror').html("@include('partials/error', ['type' => 'danger','message'=>'"+errorString+"'])");

                        }
                        if (data.success) {
                            $('#container').loadingOverlay('remove');
                            $('.register').fadeOut(); //hiding Reg form
                                                        var successContent = '' + data.message + '';
$('.rowerror').html("@include('partials/error', ['type' => 'danger','message'=>'"+successContent+"'])");

                             


                        } //success
                    }); //done
                });
</script>
@stop
@section('scripts')

<script>
    $(function () {
        $('.badge').popover();
    });

              
</script>
    
    
@stop
