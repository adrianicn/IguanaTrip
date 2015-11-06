@extends('front.masterPageServicios')

@section('step1')
{!! HTML::style('css/serviciosOperadores.css') !!} 

<div class="rowerror">
</div>

<div class="row">
    {!! Form::open(['url' => route('upload-postoperador'),  'id'=>'registro_step1']) !!}
        <div class="wrapper uwa-font-aa">
            <div class="col-md-121">
                <h3> {{ trans('registro/registrosteps.step2') }}</h3>
                <div class="form-group">
					<input type="hidden" value="{!!$tipoOperador!!}" name="id_tipo_operador" id="id_tipo_operador">
					<input type="hidden" value="{!!Session::get('user')!!}" name="id_usuario" id="id_usuario">
                    {!!Form::label('company', 'Compania Nombre', array('class'=>'control-label'))!!}
                    {!!Form::text('nombre_empresa_operador', null, array('class'=>'form-control','placeholder'=>'Ingrese Nombre Compania'))!!}

                </div>
                <div class="form-group">
                    {!!Form::label('nombre_1', 'Contacto Nombre 1', array('class'=>'control-label'))!!}
                    {!!Form::text('nombre_contacto_operador_1', null, array('class'=>'form-control','placeholder'=>'Ingrese Nombre contacto'))!!}
                    
                </div>
                <div class="form-group">
                    {!!Form::label('telefono_1', 'Telefono Contacto 1', array('class'=>'control-label'))!!}
                    {!!Form::text('telf_contacto_operador_1', null, array('class'=>'form-control','placeholder'=>'Ingrese telefono contacto'))!!}

                </div>
                <div class="form-group">
                    {!!Form::label('email_1', 'Email Contacto', array('class'=>'control-label'))!!}
                    {!!Form::text('email_contacto_operador', null, array('class'=>'form-control','placeholder'=>'Ingrese email contacto'))!!}

                </div>
                <div class="form-group">
                    {!!Form::label('direccion_1', 'Direccion Compania', array('class'=>'control-label'))!!}
                    {!!Form::text('direccion_empresa_operador', null, array('class'=>'form-control','placeholder'=>'Ingrese direccion compania'))!!}

                </div>
                <button class="btn1 btn-primary1 nextBtn1 btn-lg1 pull-right1" type="button"  onclick="AjaxContainerRegistro('registro_step1')">Siguiente</button>
                <!--<a href="#" class="button" onclick="$(this).closest('form').submit()">siguiente</a>-->
            </div>
    </div>

    {!! Form::close() !!}

</div>

@stop