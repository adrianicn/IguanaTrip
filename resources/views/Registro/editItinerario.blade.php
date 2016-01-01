@extends('front.masterPageServicios')

@section('step1')
{!! HTML::style('css/calendar/ui-jquery.css') !!}

  
   

<div class="rowerror">
</div>

<div id="basic-modal-content" class="cls loadModal">
</div>


@foreach ($listItinerarios as $itiner)
<?php

$usuarioServicio=$itiner->id;
?>
<div class="row-step4">
    <div id="title-box-header">
        <div id="title-box-type" style="cursor:pointer;"onclick="window.location.href = '{!!asset('/servicios')!!}'">
            
          <?php 
          $prefix="";
        $operadorName="";
          switch (session('tip_oper')) {
    case 1:
        $prefix="I'm an ";
        $operadorName="Agency";
        break;
    case 2:
        $prefix="I'm an ";
        $operadorName="Enterprise";
        break;
    case 3:
        $prefix="I'm just";
        $operadorName="Me";
        break;
    
}
?>

           
            <h2 class="head-title">
    {!!$prefix!!}             <strong>{!!$operadorName!!}</strong>
            </h2>
        </div>
        <div id="description-box-type">
            En ésta sección podrás crear itinerarios y sus respectivas actividades detalladas para poder dar al turista la seguridad de lo que se está ofreciendo. En el caso de brindar una actividad de transporte se tratarán como rutas y sus respectivas paradas si fuese el caso.
        </div>
    </div>
    <div id="space"></div>
     <div id="title-box-header-navigation">
        
           <h2 class="head-title-navigation">
   <a class="button-step4" onclick="window.location.href = '{!!asset('/servicios/serviciooperador')!!}/{{ $itiner->id_usuario_servicio }}/{!!$servicio->id_catalogo_servicio!!}'"> 
       <strong><img src="{!! asset('img/flecha-1.png')!!}" height="15px" width="15px" /> Regresar </strong></a>
               
       
               
            </h2>
    </div>
    <div id="space"></div>
    {!! Form::open(['url' => route('postItinerario'), 'method' => 'post', 'role' => 'form', 'id'=>'Updateitinerario']) !!}
    <input type="hidden" name="id_usuario_servicio" value="{{ $itiner->id_usuario_servicio }}">
    <input type="hidden" name="id" value="{{ $itiner->id }}">

    <div class="wrapper uwa-font-aa">
        <div id="part-1-form">
            <div id="principal-data" title="Esta opción es exclusiva de los servicios turisticos donde se especifica el requerimiento físico necesario para completar el trip. Si en su caso no es relevante puede poner No aplica.">
                @include('reusable.modify_dificultades',['diffic' => $listDificultades,'elegido'=>$itiner->id_catalogo_dificultad])
                <div class="form-group-step2">
                    {!!Form::label('nombre_itinerario', 'Nombre Itinerario', array('id'=>'iconFormulario-step2'))!!}
                    {!!Form::text('nombre_itinerario', $itiner->nombre_itinerario, array('class'=>'inputtext-step2',"title"=>"Nombre del itinerario.",'placeholder'=>'Nombre del Itinerario'))!!}
                </div>
                <div class="form-group-step2">
                    {!!Form::label('Fecha_desde', 'Fecha Inicio', array('id'=>'iconFormulario-step2'))!!}
                    {!!Form::text('fecha_desde', $itiner->fecha_desde, array('class'=>'inputtext-step2 datepicker',"title"=>"La fecha en la que inicia el programa completo por ejemplo el viaje de Carchi a Loja empieza es 12 de Octubre y termina el 13 de Octubre.",))!!}
                </div>
                <div class="form-group-step2">
                    {!!Form::label('Fecha_fin', 'Fecha Hasta', array('id'=>'iconFormulario-step2'))!!}
                    {!!Form::text('fecha_hasta', $itiner->fecha_hasta, array('class'=>'inputtext-step2 datepicker'))!!}
                </div>
                <div class="form-group-step2">
                    {!!Form::label('precio_normal', 'Precio Normal', array('id'=>'iconFormulario-step2'))!!}
                    {!!Form::text('precio_normal', $itiner->precio_normal, array('class'=>'inputtext-step2','placeholder'=>'Precio Normal'))!!}
                </div>
                <div class="form-group-step2">
                    {!!Form::label('descuento', 'Descuento', array('id'=>'iconFormulario-step2'))!!}
                    {!!Form::text('descuento', $itiner->descuento, array('class'=>'inputtext-step2','placeholder'=>'Descuento'))!!}
                </div>
                <div class="form-group-step2">
                    {!!Form::label('descripcion_itinerario', 'Detalle Itinerario', array('id'=>'iconFormulario-step2'))!!}
                    {!!Form::textarea('descripcion_itinerario', $itiner->descripcion_itinerario, array('class'=>'inputtextarea-step2'))!!}
                </div>
                <div class="form-group-step2">
                    {!!Form::label('observaciones_itinerario', 'Observaciones', array('id'=>'iconFormulario-step2'))!!}
                    {!!Form::textarea('observaciones_itinerario', $itiner->observaciones_itinerario, array('class'=>'inputtextarea-step2'))!!}
                </div>
                <div class="form-group-step2">
                    {!!Form::label('tags', 'Tags', array('id'=>'iconFormulario-step2'))!!}
                    {!!Form::text('tags', $itiner->tags, array('class'=>'inputtext-step2','placeholder'=>'Tags'))!!}
                </div>
                <div id="form-group-step2-popup">
                    <div class="box-content-button-1">
                        <a class="button-1" onclick="AjaxContainerRegistro('Updateitinerario')" href="#">Guardar</a>
                        <a class="button-1" onclick="AjaxContainerRegistro('Updateitinerario'); window.location.href = '{!!asset('/servicios/serviciooperador')!!}/{{ $itiner->id_usuario_servicio }}/{!!$servicio->id_catalogo_servicio!!}'" href="#">Regresar</a>
                    </div>
                </div>
                 <div id="secondary-data">
                <div id="promocion"><a class="button-step4" title="Si deseas agregar fotografias de tu servicio puedes hacerlo aquí, nosotros nos encargaremos de darle la publicidad necesaria." onclick="RenderPartialGenericFotografia('reusable.uploadImagePopUp', 3, {!!$itiner->id_usuario_servicio!!}, {!!$itiner->id!!})" href="#"> <h1 class="h1-agregar">+</h1> Agregar foto</a></div>
            </div>
                
            </div>
            <div id="secondary-data">
                <div id="renderPartialItinerarios" title="Esta opción te permite crear el detalle de tus itinerarios al hacer click en +, irás agregando nuevos puntos dentro de tu itinerario. Ejemplo  1)Ruta Quito-Ibarra, 2)Ruta Ibarra-Tulcan">
                    @section('contentPanelItinerarios')
                    @show
                </div>    

            </div>

        </div>
    </div>

    {!! Form::close() !!}
    
     
       <div id="renderPartialImagenes">
            @section('contentImagenes')
            @show
        </div>
    
<input type="hidden" value="0" id="flag_image">

@endforeach 
</div>




@section('scripts')

{!! HTML::script('/js/jsModal/jquery.simplemodal.js') !!}
{!! HTML::script('/js/jsModal/basic.js') !!}




@stop
<script>
    $(document).ready(function () {
        GetDataAjaxSectionItiner("{!!asset('/getlistaItinerarios')!!}/{!!$itiner->id!!}");
        GetDataAjaxImagenes("{!!asset('/imagenesAjax')!!}/3/{!!$usuarioServicio!!}");
    });
    
       ///Script para actualizar el container una vez que se hayan subido las imagenes
     setInterval( function() {
    
        if ($('#flag_image').val() == 1) {
            
            // Save the new value
           GetDataAjaxImagenes("{!!asset('/imagenesAjax')!!}/3/{!!$usuarioServicio!!}");
           $("#flag_image").val('0');

            // TODO - Handle the changed value
        }
    
}, 100);
</script>
<script>
  $(function() {
    $('.datepicker').datepicker({dateFormat: 'yy/mm/dd'});
  });
  </script>
   <script>
  $(function() {
    var tooltips = $( "[title]" ).tooltip({
      position: {
        my: "left top",
        at: "right+5 top-5"
      }
    });
   
  });
  </script>

@stop