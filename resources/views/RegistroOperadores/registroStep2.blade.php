@extends('front.masterPageServicios')

@section('step1')

<div class="rowerror">
</div>

<div class="row">
    {!! Form::open(['url' => route('upload-postoperador'),  'id'=>'registro_step1']) !!}
<!--     <div class="row setup-content" id="step-2">
        <div class="col-xs-6 col-md-offset-3">-->
            <div class="col-md-121">
                <h3> {{ trans('registro/registrosteps.step2') }}</h3>
                <div class="form-group">
					<input type="hidden" value="{!!$tipoOperador!!}" name="id_tipo_operador" id="id_tipo_operador">

                    {!!Form::label('company', 'Compania Nombre', array('class'=>'control-label'))!!}
                    {!!Form::text('nombre_empresa_operador', null, array('class'=>'form-control','placeholder'=>'Ingrese Nombre Compania'))!!}

                </div>
                <div class="form-group1">
                    <label class="control-label">Contacto Nombre</label>
                    <input name="nombre_contacto_operador_1" id="nombre_contacto_operador_1" maxlength="100" type="text" required="required" class="form-control" placeholder="Ingrese Nombre contacto" />
                    
                    
                </div>
                <div class="form-group1">
                    <label class="control-label">Telefono</label>
                    <input name="telf_contacto_operador_1" id="telf_contacto_operador_1" maxlength="100" type="text" required="required" class="form-control" placeholder="Ingrese telefono contacto" />
                </div>
                      <button class="btn1 btn-primary1 nextBtn1 btn-lg1 pull-right1" type="button"  onclick="AjaxContainerRegistro('registro_step1')">Siguiente</button>
                <!--<a href="#" class="button" onclick="$(this).closest('form').submit()">siguiente</a>-->
            </div>
<!--         </div>
    </div>-->

    {!! Form::close() !!}

</div>

@stop