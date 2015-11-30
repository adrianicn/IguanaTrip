@extends('front.masterPageServicios')

@section('step1')
{!! HTML::style('css/calendar/ui-jquery.css') !!}

  
   

<div class="rowerror">
</div>

<div id="basic-modal-content" class="cls loadModal">
</div>


@foreach ($listItinerarios as $itiner)

<div class="row-step4">
    <div id="title-box-header">
        <div id="title-box-type">
            <h2 class="head-title">
                I'm an                <strong>Agency</strong>
            </h2>
        </div>
        <div id="description-box-type">
            Explicacion de que es lo que hace todo este proceso para que pueda ver el usuario que hacer
            sin necesidad de llamar a nadie
        </div>
    </div>
    <div id="space"></div>
    {!! Form::open(['url' => route('postItinerario'), 'method' => 'post', 'role' => 'form', 'id'=>'Updatepromocion']) !!}
    <input type="hidden" name="id_usuario_servicio" value="{{ $itiner->id_usuario_servicio }}">
    <input type="hidden" name="id" value="{{ $itiner->id }}">

    <div class="wrapper uwa-font-aa">
        <div id="part-1-form">
            <div id="principal-data">
                @include('reusable.modify_dificultades',['diffic' => $listDificultades,'elegido'=>$itiner->id_catalogo_dificultad])
                <div class="form-group-step2">
                    {!!Form::label('nombre_itinerario', 'Nombre Itinerario', array('id'=>'iconFormulario-step2'))!!}
                    {!!Form::text('nombre_itinerario', $itiner->nombre_itinerario, array('class'=>'inputtext-step2',"title"=>"Please provide your firstname.",'placeholder'=>'Nombre del Servicio'))!!}
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
                        <a class="button-1" onclick="AjaxContainerRegistro('Updatepromocion')" href="#">Siguiente</a>
                    </div>
                </div>
            </div>
            <div id="secondary-data">
                <div id="renderPartialItinerarios">
                    @section('contentPanelItinerarios')
                    @show
                </div>    

            </div>

        </div>
    </div>

    {!! Form::close() !!}
    <?php
    $ImgPromociones=$ImgItinerarios;
    ?>
    
            @include('reusable.imageContainer',['objetoImg' => $ImgPromociones])
    
        
        @include('reusable.uploadImage', ['tipo' => '3','objeto'=>$listItinerarios])  

     
      
</div>




@endforeach 
@section('scripts')

{!! HTML::script('/js/jsModal/jquery.simplemodal.js') !!}
{!! HTML::script('/js/jsModal/basic.js') !!}




@stop
<script>
    $(document).ready(function () {
        GetDataAjaxSectionItiner("/IguanaTrip/public/getlistaItinerarios/{!!$itiner->id!!}");
        //GetDataAjaxSection("/IguanaTrip/public/getlistaServiciosComplete/22");
    });
</script>
<script>
  $(function() {
    $('.datepicker').datepicker();
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