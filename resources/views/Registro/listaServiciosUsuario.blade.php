@extends('front.masterPageServicios')

@section('step1')

{!! HTML::style('css/table.css') !!} 


  

<!-- Contact Form CSS files //@include('reusable.promocion')-->



            <div style='display:none'>
                <img src="{!! asset('img/x.png')!!}" alt='' />
            </div>
<style>

    #simplemodal-container a.modalCloseImg {
        background:url("{!! asset('img/x.png')!!}") no-repeat;
        width:25px; height:29px; display:inline; z-index:1200; position:absolute; top:-15px; right:-16px; cursor:pointer;}
    </style>

    
    
      <div id="basic-modal-content" class="cls loadModal">
  
  
       </div>
    
    <div class="wrapper uwa-font-aa">

    <div class="left-head box-content box-content-team ">
        <h2 class="head-title box-content-title ">
            I'm an                <strong>Agency</strong>
        </h2>

    </div>
    <div class="box-content-individual-head box-content  right">
        <h3 class="box-content-head"> {{ trans('registro/registrosteps.step2') }}
            Explicacion de que es lo que hace todo este proceso para que pueda ver el usuario que hacer
            sin necesidad de llamar a nadie
        </h3>

    </div>
</div>
 <?php $counter = 0;?>
    @foreach ($listServiciosUnicos as $servicios)
 <?php $counter = $counter+1;?>

    {!! Form::open(['url' => route('upload-postDetalleOperador'),  'id'=>$servicios->id_catalogo_servicios]) !!}
    

<div class="testboxFormulario">
    <div id="table_{!!$servicios->id!!}" class="table-editable">

  
        <div class="section"><span>{!!$counter!!}</span>{!!$servicios->nombre_servicio!!}</div>

        <span  class="table-add glyphicon glyphicon-plus" onclick="RenderPartial('reusable.createNewServicio',{!!$servicios->id_catalogo_servicios!!},{!!$servicios->id_usuario_operador!!})"></span>


<a class="button" onclick="RenderPartialGeneric('reusable.createNewItinerario',{!!$servicios->id_usuario_operador!!})" href="#">Siguiente</a>
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