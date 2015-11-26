<div style='display:none'>
                <img src="{!! asset('img/x.png')!!}" alt='' />
            </div>
<style>
    #simplemodal-container a.modalCloseImg {
        background:url("{!! asset('img/x.png')!!}") no-repeat;
        width:25px; height:29px; display:inline; z-index:1200; position:absolute; top:-15px; right:-16px; cursor:pointer;}
</style>
<div id="testboxForm" class="testboxForm">
    <h1>Agregar Itinerario </h1>
    
    {!! Form::open(['url' => route('postItinerario'),  'id'=>'itinerario-popup']) !!}
       <input type="hidden"  class="id_usuario_servicio" name="id_usuario_servicio">

    <hr>
        <div class="form-group-step2-popup">
            {!!Form::label('nombre_1', 'Nombre', array('id'=>'iconFormulario-step2-popup'))!!}
            {!!Form::text('nombre_itinerario',NULL, array('class'=>'inputtext-step2-popup','placeholder'=>'Nombre'))!!}
        </div>
        <div class="form-group-step2-popup">
            {!!Form::label('Detalle_1', 'Detalle', array('id'=>'iconFormulario-step2-popup'))!!}
            <textarea id="descripcion_itinerario" name="descripcion_itinerario" class="ptm-popup" placeholder="Detalle Servicio">
                        
            </textarea>
        </div>

        <div id="renderPartial">
            @section('dificultades')
            @show
        </div>        
        <div id="form-group-step2-popup">
            <div class="box-content-button-1">
                <a class="button-1" onclick="AjaxContainerRegistroWithLoad('itinerario-popup','testboxForm')" href="#">Siguiente</a>
            </div>              
        </div>
{!! Form::close() !!}

</div>

    
<script>
$( document ).ready(function() {
    
    GetDataAjax("/IguanaTrip/public/getTipoDificultad");
});
</script>