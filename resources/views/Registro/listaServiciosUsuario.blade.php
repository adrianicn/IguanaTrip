@extends('front.masterPageServicios')

@section('step1')

{!! HTML::style('css/table.css') !!} 
{!! HTML::style('css/popupModal/demo.css') !!} 
{!! HTML::style('css/popupModal/basic.css') !!} 

<!-- Contact Form CSS files -->

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



    @foreach ($listServiciosUnicos as $servicios)


    {!! Form::open(['url' => route('upload-postDetalleOperador'),  'id'=>$servicios->id_catalogo_servicios]) !!}

    <div id="table_{!!$servicios->id!!}" class="table-editable">

        <h2>{!!$servicios->nombre_servicio!!}</h2>

        <span  class="table-add glyphicon glyphicon-plus" onclick="add({!!$servicios->id!!})"></span>
        <table class="table">
            <tr>
                <th>Nombre</th>

                <th></th>
                <th></th>
                <th></th>
            </tr>

            @foreach ($listServiciosAll as $servicio)
            @if($servicio->id_catalogo_servicios==$servicios->id_catalogo_servicios)


            <!-- modal content -->
            <div id="basic-modal-content" class="cls_{!!$servicio->id!!}">
                <h3>Detalles</h3>
                <p>{!!$servicio->id!!}</p>

                <p><a href='http://www.ericmmartin.com/projects/simplemodal/'>Details</a></p>
            </div>

            <!-- preload the images -->
            <div style='display:none'>
                <img src="{!! asset('img/x.png')!!}" alt='' />
            </div>

            <tr>

                @if($servicio->nombre_servicio=="")
                <td id='basic-modal' contenteditable="true"><a href='#' onclick='callModal({!!$servicio->id!!})' class='basic'>Ingresar Nombre</a></td>

                @else
                <td contenteditable="true"><a href='#' class='basic'>{!!$servicio->nombre_servicio!!}</a></td>

                @endif

                <td> 
                    <label class="switch switch-green">
                        <input type="checkbox" id='estado_servicio_usuario_{!!$servicio->id!!}' name ='estado_servicio_usuario_{!!$servicio->id!!}' class="switch-input" onchange="AjaxContainerRetrunMessage({!!$servicios->id_catalogo_servicios!!},{!!$servicio->id!!})">
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                        
                    </label>
                </td>

            <input type="hidden" value="{!!$servicio->id!!}" name="usuario_servicio">
            <td>
                <span class="table-remove glyphicon glyphicon-remove"></span>
            </td>
            <td>
                <a class="button" onclick="AjaxContainerRegistroParametro({!!$servicios->id!!}, {!!$servicio->id!!})" href="#">Details</a>

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
                    <a class="button" onclick="AjaxContainerRegistroParametro({!!$servicios->id!!}, {!!$servicio->id!!})" href="#">Details</a>
                </td>
            </tr>
        </table>
        <br>
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