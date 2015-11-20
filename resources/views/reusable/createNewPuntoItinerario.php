{!! HTML::style('css/table.css') !!} 
<div id="testboxForm" class="testboxForm">
    <h1>Agregar Punto para Itinerario </h1>
    
    {!! Form::open(['url' => route('postItinerario'),  'id'=>'puntoitinerario']) !!}
    <hr>

    <table>
        <tr>
            <td><label class='labelmodal' for="username">Nombre:</label></td>

            <td><input class="text" id="nombre_itinerario" name="nombre_itinerario" placeholder="{{trans('front/register.pseudo')}}"></td>
        </tr>
        
        
        <tr>
            <td><label class='labelmodal' for="username">Detalle:</label></td>

            <td><textarea name="descripcion_itinerario" rows="4" cols="29">Descripción</textarea></td>
        </tr>
    </table>
    <div id="renderPartial">
         @section('contentPanel')
        
            @show
        
    </div>        
    <input type="hidden"  class="id_usuario_servicio" name="id_usuario_servicio">
    
        <button class="button" type="button"  onclick="AjaxContainerRegistroWithLoad('itinerario','testboxForm')">Siguiente</button>
{!! Form::close() !!}

</div>

    
<script>
$( document ).ready(function() {
    
    GetDataAjax("/IguanaTrip/public/getTipoDificultad");
});
</script>





@extends('front.masterPageServicios')

@section('step1')




    
    
 <?php $counter = 0;?>
    @foreach ($listServiciosUnicos as $servicios)
 <?php $counter = $counter+1;?>

    {!! Form::open(['url' => route('upload-postDetalleOperador'),  'id'=>$servicios->id_catalogo_servicios]) !!}
    

<div class="testboxFormulario" class="testboxForm">
    <div id="table_{!!$servicios->id!!}" class="table-editable">

  
        <div class="section"><span>{!!$counter!!}</span>{!!$servicios->nombre_servicio!!}</div>

        <span  class="table-add glyphicon glyphicon-plus" onclick="RenderPartial('reusable.createNewServicio',{!!$servicios->id_catalogo_servicios!!},{!!$servicios->id_usuario_operador!!})"></span>


<a class="button" onclick="RenderPartialGeneric('reusable.createNewItinerario',{!!$servicios->id!!})" href="#">Siguiente</a>
        <div class="inner-wrap">
        
    
        <table class="table">
            <tr>
                <th>Nombre</th>
                <th>Estado</th>
                <th></th>
                <th></th>
            </tr>

            @foreach ($listServiciosAll as $servicio)
            @if($servicio->id_catalogo_servicios==$servicios->id_catalogo_servicios)
            <?php $check = '';?>
            @if($servicio->estado_servicio_usuario==1)
              <?php $check = 'checked';
              
              ?>
            @endif
            <!-- modal content -->
           

            <tr>
                @if($servicio->nombre_servicio=="")
                <td>
                {!! link_to_route('details.show', 'Ingresar Nombre', [$servicio->id,$servicio->id_catalogo_servicios]) !!}
                </td>
                @else
                <td>
                {!! link_to_route('details.show',$servicio->nombre_servicio, [$servicio->id,$servicio->id_catalogo_servicios]) !!}
                
                </td>
                @endif

                <td> 
                    <label class="switch switch-green">
                        <input type="checkbox" id='estado_servicio_usuario_{!!$servicio->id!!}' {!!$check!!} name ='estado_servicio_usuario_{!!$servicio->id!!}' class="switch-input" onchange="AjaxContainerRetrunMessage({!!$servicios->id_catalogo_servicios!!},{!!$servicio->id!!})">
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                        
                    </label>
                </td>

            <input type="hidden" value="{!!$servicio->id!!}" name="usuario_servicio">
            <td>
                <span class="table-remove glyphicon glyphicon-remove"></span>
            </td>
            <td>
                {!! link_to_route('details.show','Detalle', [$servicio->id,$servicio->id_catalogo_servicios]) !!}
                
 </td>
                  <td id='basic-modal' contenteditable="true">
</td>

           

            </tr>
            @endif
            @endforeach 

            <!-- This is our clonable table line -->
            <tr class="hide">
                <td contenteditable="true">Untitled</td>
                <td contenteditable="true">undefined</td>
                <td>
                    <span class="table-remove glyphicon glyphicon-remove"></span>
                </td>
                <td>
                    {!! link_to_route('details.show', 'Details', [0,$servicios->id_catalogo_servicios]) !!}
                </td>
            </tr>
        </table>
          
    </div>
        <br>
    </div>
    </div>
    
    
    
    {!! Form::close() !!}
    @endforeach 








    
@section('scripts')
{!! HTML::script('/js/tabla_dinamica.js') !!}
{!! HTML::script('/js/jsModal/jquery.simplemodal.js') !!}
{!! HTML::script('/js/jsModal/basic.js') !!}

@stop

@stop