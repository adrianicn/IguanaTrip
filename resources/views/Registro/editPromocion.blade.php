@extends('front.masterPageServicios')

@section('step1')
{!! HTML::style('css/calendar/ui-jquery.css') !!}

<div class="rowerror">
</div>

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
@foreach ($listPromociones as $promo)
           
            <h2 class="head-title">
    {!!$prefix!!}             <strong>{!!$operadorName!!}</strong>
            </h2>
        </div>
        <div id="description-box-type">
            La idea de promoción puede asociarse a nociones como descuento u oferta. IguanaTrip te da la opción de crear promociones para tu servicio de forma gratuita y hacerlas llegar a la mayor cantidad de turistas posibles nacionales e internacionales.

        </div>
    </div>
    <div id="space"></div>
     <div id="title-box-header-navigation">
        
           <h2 class="head-title-navigation">
   <a class="button-step4" onclick="window.location.href = '{!!asset('/servicios/serviciooperador/')!!}/{{ $promo->id_usuario_servicio }}/{!!$servicio->id_catalogo_servicio!!}'"> 
       <strong><img src="{!! asset('img/flecha-1.png')!!}" height="15px" width="15px" /> Regresar </strong></a>
               
       
               
            </h2>
    </div>
    <div id="space"></div>

<div class="form-group-step2" title="Carga las imágenes que consideres describen a tu promoción.">
     @if(count($ImgPromociones)>0)        
    @include('reusable.imageContainer',['objetoImg' => $ImgPromociones])
     @endif
            @include('reusable.uploadImage', ['tipo' => '2','objeto'=>$listPromociones])  
        </div>
    {!! Form::open(['url' => route('postPromocion'), 'method' => 'post', 'role' => 'form', 'id'=>'Updatepromocion']) !!}
    

    <input type="hidden" name="id_usuario_servicio" value="{{ $promo->id_usuario_servicio }}">
    <input type="hidden" name="id" value="{{ $promo->id }}">

    <div class="wrapper uwa-font-aa">

        

        <div class="form-group-step2">
            {!!Form::label('nombre_promocion', 'Nombre Promocion', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::text('nombre_promocion', $promo->nombre_promocion, array("title"=>"Es el nombre de la promoción. Recuerda ser creativo y diverido al escoger el nombre.",'class'=>'inputtext-step2','placeholder'=>'Nombre del Servicio'))!!}
        </div>

        <div class="form-group-step2">
            {!!Form::label('Fecha_inicio', 'Fecha Inicio', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::text('fecha_desde', $promo->fecha_desde, array('class'=>'inputtext-step2 datepicker'))!!}
        </div>

        <div class="form-group-step2">
            {!!Form::label('Fecha_fin', 'Fecha Hasta', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::text('fecha_hasta', $promo->fecha_hasta, array("title"=>"IguanaTrip se encargará automáticamente de desactivar la promoción una vez que llegue la fecha de fin.",'class'=>'inputtext-step2 datepicker'))!!}
        </div>

        <div class="form-group-step2">
            {!!Form::label('precio_normal', 'Precio Normal', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::text('precio_normal', $promo->precio_normal, array('class'=>'inputtext-step2','placeholder'=>'Precio Normal'))!!}
        </div>

        <div class="form-group-step2">
            {!!Form::label('descuento', 'Descuento', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::text('descuento', $promo->descuento, array("title"=>"El descuento puedes ingresarlo como porcentaje o en dólares americanos.",'class'=>'inputtext-step2','placeholder'=>'Descuento'))!!}
        </div>

        <div class="form-group-step2">
            {!!Form::label('codigo_promocion', 'Codigo ', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::text('codigo_promocion', $promo->codigo_promocion, array("title"=>"Si deseas mantener un track de cuantas personas han usado esta promoción puedes ingresar un código para que lo uses a tu conveniencia.",'class'=>'inputtext-step2','placeholder'=>'Codigo'))!!}
        </div>



        <div class="form-group-step2">
            {!!Form::label('detalle_promocion', 'Detalle Promocion', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::textarea('descripcion_promocion', $promo->descripcion_promocion, array('class'=>'inputtext-step2'))!!}

        </div>

        <div class="form-group-step2">
            {!!Form::label('observaciones_promocion', 'Observaciones', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::textarea('observaciones_promocion', $promo->observaciones_promocion, array('class'=>'inputtext-step2' ,'placeholder'=>'Hasta agotar stock, si se aceptan mascotas ,etc'))!!}

        </div>

        <div class="form-group-step2">
            {!!Form::label('tags', 'Tags', array('id'=>'iconFormulario-step2'))!!}
            {!!Form::text('tags', $promo->tags, array("title"=>"Para mejorar las búsquedas ingresa palabras clave separadas por comas que describan tu servicio. Ejemplo: mar, playa, ceviche, discoteca, etc.",'class'=>'inputtext-step2','placeholder'=>'Tags'))!!}
        </div>
        <div id="form-group-step2-popup">
            <div class="box-content-button-1">
                <a class="button-1" onclick="AjaxContainerRetrunMessage('Updatepromocion','optional'); window.location.href = '{!!asset('/servicios/serviciooperador/')!!}/{{ $promo->id_usuario_servicio }}/{!!$servicio->id_catalogo_servicio!!}'" href="#">Finalizar y regresar</a>
                
            </div>
        </div>
    </div>
    @endforeach 

    {!! Form::close() !!}
</div>

{!! HTML::script('js/jquery.js') !!}
  
  

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