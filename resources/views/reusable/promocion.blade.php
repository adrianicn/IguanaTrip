<div style='display:none'>
                <img src="{!! asset('img/x.png')!!}" alt='' />
            </div>
<style>
    #simplemodal-container a.modalCloseImg {
        background:url("{!! asset('img/x.png')!!}") no-repeat;
        width:25px; height:29px; display:inline; z-index:1200; position:absolute; top:-15px; right:-16px; cursor:pointer;}
</style>

<div class="testboxForm">
    <h1>Agregar Promoción </h1>
    {!! Form::open(['url' => route('postPromocion'),  'id'=>'promocion-popup']) !!}
        <input type="hidden" value="1" name="id_usuario_servicio">

    <hr>

       <div class="form-group-step2-popup">
            {!!Form::label('nombre_1', 'Nombre', array('id'=>'iconFormulario-step2-popup'))!!}
            {!!Form::text('nombre_promocion',NULL, array('class'=>'inputtext-step2-popup','placeholder'=>'Nombre'))!!}
       </div>
       <div class="form-group-step2-popup">
            {!!Form::label('inicio_1', 'Inicio', array('id'=>'iconFormulario-step2-popup'))!!}
            {!!Form::text('fecha_inicio',NULL, array('class'=>'inputtext-step2-popup','placeholder'=>'Fecha'))!!}
       </div>
       <div class="form-group-step2-popup">
            {!!Form::label('fin_1', 'Fin', array('id'=>'iconFormulario-step2-popup'))!!}
            {!!Form::text('fecha_fin',NULL, array('class'=>'inputtext-step2-popup','placeholder'=>'Fecha'))!!}
       </div>
       <div class="form-group-step2-popup">
            {!!Form::label('precio_normal_1', 'Precio Normal', array('id'=>'iconFormulario-step2-popup'))!!}
            {!!Form::text('precio_normal',NULL, array('class'=>'inputtext-step2-popup','placeholder'=>'$'))!!}
       </div>
       <div class="form-group-step2-popup">
            {!!Form::label('descuento_1', 'Descuento', array('id'=>'iconFormulario-step2-popup'))!!}
            {!!Form::text('descuento',NULL, array('class'=>'inputtext-step2-popup','placeholder'=>'%'))!!}
       </div>
       <div class="form-group-step2-popup">
            {!!Form::label('codigo_1', 'Codigo', array('id'=>'iconFormulario-step2-popup'))!!}
            {!!Form::text('codigo',NULL, array('class'=>'inputtext-step2-popup','placeholder'=>'Ej. IGTRCOD001'))!!}
       </div>
       <div class="form-group-step2-popup">
            {!!Form::label('detalle_1', 'Detalle', array('id'=>'iconFormulario-step2-popup'))!!}
            {!!Form::textarea('descripcion',NULL, array('class'=>'inputtextarea-step2-popup-1','placeholder'=>'descripcion'))!!}
       </div>
    
        <div id="form-group-step2-popup">
            <div class="box-content-button-1">
                <a class="button-1" onclick="AjaxContainerRegistro('promocion-popup')" href="#">Siguiente</a>
            </div>              
        </div>
{!! Form::close() !!}
</div>
