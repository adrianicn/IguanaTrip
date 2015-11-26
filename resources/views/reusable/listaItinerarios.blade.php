@section('contentPanel')	
<div id="itinerario-detalle">
    <h2>Detalle Itinerario <strong class="add-registro" onclick="RenderPartialGenericMap('reusable.createNewPuntoItinerario', {!!$id_itinerario!!})">+</strong> (agregar registro) </h2>
    <input type="hidden" value="xxx" name="usuario_servicio">
    <table class="tabla-itinerario-detalle">
        <tr>
            <th>Punto de Encuentro</th>
            <th>Dia/Hora</th>
            <th>Confirmado</th>
        </tr>
        @foreach ($listItinerarios as $detalle)
        <tr>
            <td>
                <a class="button-1" onclick="RenderPartialGenericMapUpdate('reusable.createNewPuntoItinerario', {!!$id_itinerario!!}, {!!$detalle->id!!})" href="#">{!!$detalle->lugar_punto!!}</a>
            </td>
            <td> 
            </td>
            <td> 
            </td>
        </tr>
        @endforeach 
        <!-- This is our clonable table line -->
        <tr class="">
            <td contenteditable="true">Untitled</td>
            <td contenteditable="true">undefined</td>
            <td>
            </td>
        </tr>
    </table>

</div>
<br>
@section('scripts')
{!! HTML::script('/js/tabla_dinamica.js') !!}
{!! HTML::script('/js/jsModal/jquery.simplemodal.js') !!}
{!! HTML::script('/js/jsModal/basic.js') !!}

@stop
@endsection