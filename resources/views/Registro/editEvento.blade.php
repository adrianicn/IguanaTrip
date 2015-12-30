@extends('front.masterPageServicios')

@section('step1')
{!! HTML::style('css/calendar/ui-jquery.css') !!}
<div class="rowerror">
</div>
@foreach ($listEventos as $evento)

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
                      IguanaTrip te da la opción de crear eventos dentro de tu servicio. Si eres un hotel por ejemplo y quieres realizar una fiesta puedes agregarla a esta opción nosotros nos encargaremos de que tu información sea leída por el segmento adecuado.
        </div>
    </div>
    <div id="space"></div>
     <div id="title-box-header-navigation">
        
           <h2 class="head-title-navigation">
   <a class="button-step4" onclick="window.location.href = '{!!asset('/servicios/serviciooperador')!!}/{{ $evento->id_usuario_servicio }}/{!!$servicio->id_catalogo_servicio!!}'"> 
   
       <strong><img src="{!! asset('img/flecha-1.png')!!}" height="15px" width="15px" /> Regresar </strong></a>
               
       
               
            </h2>
    </div>
    <div id="space"></div>


    {!! Form::open(['url' => route('postEvento'), 'method' => 'post', 'role' => 'form', 'id'=>'UpdateEvento']) !!}
    

    <input type="hidden" name="id_usuario_servicio" value="{{ $evento->id_usuario_servicio }}">
    <input type="hidden" name="id" value="{{ $evento->id }}">

    <div class="wrapper uwa-font-aa" title="Carga las imágenes que consideres describen a tu evento.">

        <div class="form-group-step2">
             @if(count($ImgPromociones)>0)
            @include('reusable.imageContainer',['objetoImg' => $ImgPromociones])
            @endif
            @include('reusable.uploadImage', ['tipo' => '4','objeto'=>$listEventos])  
        </div>

        <div class="form-group-step2">
            {!!Form::label('nombre_evento', 'Nombre Evento', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::text('nombre_evento', $evento->nombre_evento, array("title"=>"Es el nombre del evento. Recuerda ser creativo y diverido al escoger el nombre.",'class'=>'inputtext-step2','placeholder'=>'Nombre del evento'))!!}
        </div>

        <div class="form-group-step2">
            {!!Form::label('Fecha_inicio', 'Fecha inicio', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::text('fecha_desde', $evento->fecha_desde, array('class'=>'datepicker inputtext-step2'))!!}
        </div>

        <div class="form-group-step2">
            {!!Form::label('Fecha_fin', 'Fecha fin', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::text('fecha_hasta', $evento->fecha_hasta, array('class'=>'inputtext-step2 datepicker'))!!}
        </div>

        <div class="form-group-step2">
            {!!Form::label('detalle_promocion', 'Descripción evento', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::textarea('descripcion_evento', $evento->descripcion_evento, array('class'=>'inputtext-step2'))!!}

        </div>

     <div class="form-group-step2-popup">
         
                @if(isset($listEventos))
                @foreach ($listEventos as $itiner)
                @if($itiner->longitud_evento!="")
                @include('reusable.maps', ['longitud_servicio' => $itiner->longitud_evento,'latitud_servicio'=>$itiner->latitud_evento])  
                @else
                @include('reusable.maps', ['longitud_servicio' => '-78.46783820000002','latitud_servicio'=>'-0.1806532'])   
                @endif
                @endforeach
                @else
                @include('reusable.maps', ['longitud_servicio' => '-78.46783820000002','latitud_servicio'=>'-0.1806532'])   
                @endif
        </div>

        <div class="form-group-step2">
            {!!Form::label('tags', 'Tags', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::text('tags', $evento->tags, array("title"=>"Para mejorar las búsquedas ingresa palabras clave separadas por comas que describan tu servicio. Ejemplo: mar, playa, ceviche, discoteca, etc.",'class'=>'inputtext-step2','placeholder'=>'Tags'))!!}
        </div>
        <div id="form-group-step2-popup">
            <div class="box-content-button-1">
                <a class="button-1" onclick="AjaxContainerRetrunMessage('UpdateEvento','optional'); window.location.href = '{!!asset('/servicios/serviciooperador')!!}/{{ $evento->id_usuario_servicio }}/{!!$servicio->id_catalogo_servicio!!}'" href="#">Finalizar y regresar</a>
            </div>
        </div>
    </div>
    @endforeach 

    {!! Form::close() !!}
  
</div>
@section('scripts')
{!! HTML::script('js/jquery.js') !!}
  <script>
    $('.datepicker').datepicker({dateFormat: 'yy/mm/dd'});
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
@stop