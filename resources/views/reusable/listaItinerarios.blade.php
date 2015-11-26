@section('contentPanel')	

    <div id="itinerario-detalle">
        <h2>Detalle Itinerario <strong onclick="RenderPartialGenericMap('reusable.createNewPuntoItinerario', {!!$id_itinerario!!})">+</strong> (agregar registro) </h2>
        <span  class="" ></span>
        <a class="button-1" onclick="RenderPartialGenericMap('reusable.createNewPuntoItinerario', {!!$id_itinerario!!})" href="#">Agregar</a>
        <div class="">
            <table class="">
                <tr>
                    <th>Punto</th>
                    <th>Estado</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach ($listItinerarios as $detalle)
                <tr>
                    <td>
                        <a class="button-1" onclick="RenderPartialGenericMapUpdate('reusable.createNewPuntoItinerario', {!!$id_itinerario!!}, {!!$detalle->id!!})" href="#">{!!$detalle->lugar_punto!!}</a>
                    </td>
                    <td> 
                    </td>
                <td>
                    <input type="hidden" value="xxx" name="usuario_servicio">
                    <span class=""></span>
                </td>
                </tr>
                @endforeach 
                <!-- This is our clonable table line -->
                <tr class="">
                    <td contenteditable="true">Untitled</td>
                    <td contenteditable="true">undefined</td>
                    <td>
                        <span class=""></span>
                    </td>
                    <td>

                    </td>
                </tr>
            </table>

        </div>
        <br>
    </div>


@section('scripts')
{!! HTML::script('/js/tabla_dinamica.js') !!}
{!! HTML::script('/js/jsModal/jquery.simplemodal.js') !!}
{!! HTML::script('/js/jsModal/basic.js') !!}

@stop






@endsection