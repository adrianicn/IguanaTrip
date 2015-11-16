@extends('front.masterPageServicios')

@section('step1')

{!! HTML::style('css/table.css') !!} 
{!! HTML::style('css/popupModal/demo.css') !!} 
{!! HTML::style('css/popupModal/basic.css') !!} 
  

<!-- Contact Form CSS files -->


 <div id="basic-modal-content" class="cls">
                
                
  @include('reusable.promocion')
  
            </div>

            <div style='display:none'>
                <img src="{!! asset('img/x.png')!!}" alt='' />
            </div>

<style>

    #simplemodal-container a.modalCloseImg {
        background:url("{!! asset('img/x.png')!!}") no-repeat;
        width:25px; height:29px; display:inline; z-index:3200; position:absolute; top:-15px; right:-16px; cursor:pointer;}
    </style>

    <div class="container">

    <h1>HTML5 Editable Table</h1>
    <p>Through the powers of <strong>contenteditable</strong> and some simple jQuery you can easily create a custom editable table. No need for a robust JavaScript library anymore these days.</p>

    <ul>
        <li>An editable table that exports a hash array. Dynamically compiles rows from headers</li> 
        <li>Simple / powerful features such as add row, remove row, move row up/down.</li>
    </ul>


 <?php $counter = 0;?>
    @foreach ($listServiciosUnicos as $servicios)
 <?php $counter = $counter+1;?>

    {!! Form::open(['url' => route('upload-postDetalleOperador'),  'id'=>$servicios->id_catalogo_servicios]) !!}
<div class="wrapper uwa-font-aa">
    <div id="table_{!!$servicios->id!!}" class="table-editable">

        
        <div class="section"><span>{!!$counter!!}</span>{!!$servicios->nombre_servicio!!}</div>

        <span  class="table-add glyphicon glyphicon-plus" onclick="add({!!$servicios->id!!})"></span>
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

                  <td id='basic-modal' contenteditable="true">
                      <a href='#' onclick='callModal({!!$servicio->id!!})' class='basic'>Agregar Promocion</a></td>

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
                    {!! link_to_route('details.show', 'Details', [0]) !!}
                </td>
            </tr>
        </table>
          
    </div>
        <br>
    </div>
    </div>
    
    
    
    {!! Form::close() !!}
    @endforeach 







</div>
@section('scripts')
{!! HTML::script('/js/tabla_dinamica.js') !!}
{!! HTML::script('/js/jsModal/jquery.simplemodal.js') !!}
{!! HTML::script('/js/jsModal/basic.js') !!}

@stop

@stop