@section('contentPanelItinerarios')	
{!! HTML::style('css/table.css') !!} 
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
                <a class="button-1 white" onclick="RenderPartialGenericMapUpdate('reusable.createNewPuntoItinerario', {!!$id_itinerario!!}, {!!$detalle->id!!})" href="#">{!!$detalle->lugar_punto!!}</a>
            </td>
            <td>
            <a class="button-1 white" onclick="RenderPartialGenericMapUpdate('reusable.createNewPuntoItinerario', {!!$id_itinerario!!}, {!!$detalle->id!!})" href="#">{!!$detalle->diahora_punto!!}</a>    
            </td>
            <td> 
                @if($detalle->estado_punto==1)
                  <label class="switch switch-green">
                        <input type="checkbox" id='estado_itinerario_{!!$detalle->id!!}' checked name ='estado_itinerario_{!!$detalle->id!!}' class="switch-input" onchange="AjaxContainerRetrunBurnURL('/IguanaTrip/public/estadoItinerario/',{!!$detalle->id!!},{!!$detalle->id!!},'itinerario-detalle')">
                        <span class="switch-label" data-on="Si" data-off="No"></span>
                        <span class="switch-handle"></span>
                        
                    </label>
                @else
                
                <label class="switch switch-green">
                        <input type="checkbox" id='estado_itinerario_{!!$detalle->id!!}'  name ='estado_itinerario_{!!$detalle->id!!}' class="switch-input" onchange="AjaxContainerRetrunBurnURL({!!$detalle->id!!},{!!$detalle->id!!})">
                        <span class="switch-label" data-on="Si" data-off="No"></span>
                        <span class="switch-handle"></span>
                        
                    </label>
                @endif
            </td>
        </tr>
        @endforeach 

    </table>

</div>
<br>
@section('scripts')
{!! HTML::script('/js/tabla_dinamica.js') !!}
{!! HTML::script('/js/jsModal/jquery.simplemodal.js') !!}
{!! HTML::script('/js/jsModal/basic.js') !!}

@stop
@endsection