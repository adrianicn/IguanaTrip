@extends('front.masterPageServicios')

@section('step1')

	{!! Form::open(['url' => 'servicios/operador', 'method' => 'post', 'role' => 'form', 'id'=>'registro_step1'] ) !!}

	<div class="row setup-content" id="step-1">
		<div class="col-xs-6 col-md-offset-3">
			<div class="col-md-12">
				<h3> {{ trans('registro/registrosteps.step1') }}</h3>
				<div class="form-group">
					<label class="control-label">Compania Nombre</label>
					<input id="nombre_empresa_operador"  maxlength="100" type="text" required="required" class="form-control" placeholder="Ingrese Nombre Compania"  />
				</div>
				<div class="form-group">
					<label class="control-label">Contacto Nombre</label>
					<input id="nombre_contacto_operador_1" maxlength="100" type="text" required="required" class="form-control" placeholder="Ingrese Nombre contacto" />
				</div>
				<div class="form-group">
					<label class="control-label">Telefono</label>
					<input id="telf_contacto_operador_1" maxlength="100" type="text" required="required" class="form-control" placeholder="Ingrese telefono contacto" />
				</div>
<!--  				<button class="btn btn-primary nextBtn btn-lg pull-right" type="button"  onclick="$(this).closest('form').submit()">Siguiente</button>-->
				<a href="#" class="button" onclick="$(this).closest('form').submit()">siguiente</a>
			</div>
		</div>
	</div>

	{!! Form::close() !!}


@stop

@section('scripts')
<script type="text/javascript">
    $('.error').html('');
    

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
    $(function () {
        $('.badge').popover();
    });

              
</script>
    
    
@stop
