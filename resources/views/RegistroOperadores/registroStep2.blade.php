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


    {!! Form::open(['url' => route('upload-postoperador'),  'id'=>'registro_step1']) !!}

    
        <div class="wrapper uwa-font-aa">
            
            <div class="box-content box-content-team left">
            <h2 class="box-content-title">
                I'm an                <strong>Agency</strong>
            </h2>
            
        </div>
            <div class="box-content box-content-team left">
            
            <div class="box-content-text">
                <p>Design and offer your own real-time social dashboards to clients.</p>
                
            </div>
        </div>
            <div class="box-content box-content-team left">
                <h3> {{ trans('registro/registrosteps.step2') }}</h3>
                <div class="form-group">
					<input type="hidden" value="{!!$data['tipoOperador']!!}" name="id_tipo_operador" id="id_tipo_operador">
					<input type="hidden" value="{!!Session::get('user_id')!!}" name="id_usuario" id="id_usuario">
					<input type="hidden" value="{!!$id_usuario_op!!}" name="id_usuario_op" id="id_usuario_op">
                    {!!Form::label('company', 'Compania Nombre', array('class'=>'control-label'))!!}
                    {!!Form::text('nombre_empresa_operador', $nombre_empresa_operador, array('class'=>'form-control','placeholder'=>'Ingrese Nombre Compania'))!!}

                </div>
                <div class="form-group">
                    {!!Form::label('direccion_1', 'Direccion Compania', array('class'=>'control-label'))!!}
                    {!!Form::text('direccion_empresa_operador', $direccion_empresa_operador, array('class'=>'form-control','placeholder'=>'Ingrese direccion compania'))!!}

                </div>
                <div class="form-group">
                    {!!Form::label('nombre_1', 'Contacto Nombre 1', array('class'=>'control-label'))!!}
                    {!!Form::text('nombre_contacto_operador_1', $nombre_contacto_operador_1, array('class'=>'form-control','placeholder'=>'Ingrese Nombre contacto'))!!}
                    
                </div>
                <div class="form-group">
                    {!!Form::label('telefono_1', 'Telefono Contacto 1', array('class'=>'control-label'))!!}
                    {!!Form::text('telf_contacto_operador_1', $telf_contacto_operador_1, array('class'=>'form-control','placeholder'=>'Ingrese telefono contacto'))!!}

                </div>
                <div class="form-group">
                    {!!Form::label('email_1', 'Email Contacto', array('class'=>'control-label'))!!}
                    {!!Form::text('email_contacto_operador', $email_contacto_operador, array('class'=>'form-control','placeholder'=>'Ingrese email contacto'))!!}

                </div>
               	<div class="box-content-button-1">
					<a class="button" onclick="AjaxContainerRegistro('registro_step1')" href="#">Siguiente</a>
               	</div>
            </div>
    </div>

    {!! Form::close() !!}



@stop