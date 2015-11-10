@extends('front.masterPageServicios')

@section('step1')
{!! HTML::style('css/table.css') !!} 


<div class="container">

    <h1>HTML5 Editable Table</h1>
    <p>Through the powers of <strong>contenteditable</strong> and some simple jQuery you can easily create a custom editable table. No need for a robust JavaScript library anymore these days.</p>

    <ul>
        <li>An editable table that exports a hash array. Dynamically compiles rows from headers</li> 
        <li>Simple / powerful features such as add row, remove row, move row up/down.</li>
    </ul>

    @foreach ($listServiciosUnicos as $servicios)


    {!! Form::open(['url' => route('upload-postDetalleOperador'),  'id'=>$servicios->id_usuario_servicio]) !!}

    <div id="table_{!!$servicios->id_usuario_servicio!!}" class="table-editable">

        <h2>{!!$servicios->nombre_servicio!!}</h2>

        <span  class="table-add glyphicon glyphicon-plus" onclick="add({!!$servicios->id_usuario_servicio!!})"></span>
        <table class="table">
            <tr>
                <th>Nombre</th>
                <th>Estado</th>
                <th></th>
                <th></th>
            </tr>

            @foreach ($listServiciosAll as $servicio)
            @if($servicio->id_catalogo_servicios==$servicios->id_catalogo_servicios)
            <tr>
                @if($servicio->nombre_servicio=="")
                <td contenteditable="true">Ingresar Nombre</td>
                <td contenteditable="true">Ingresar</td>

                @else
                <td contenteditable="true">{!!$servicio->nombre_servicio!!}</td>
                <td contenteditable="true">Activo</td>
                @endif

            <input type="hidden" value="{!!$servicios->id_usuario_servicio!!}" name="usuario_servicio">

            <td>
                <span class="table-remove glyphicon glyphicon-remove"></span>
            </td>
            <td>
                <a class="button" onclick="AjaxContainerRegistroParametro({!!$servicios->id_usuario_servicio!!}, {!!$servicio->id_usuario_servicio!!})" href="#">Details</a>

            </td>
            </tr
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
                    <a class="button" onclick="AjaxContainerRegistroParametro({!!$servicios -> id_usuario_servicio!!}, {!!$servicio -> id_usuario_servicio!!})" href="#">Details</a>
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

@stop

@stop