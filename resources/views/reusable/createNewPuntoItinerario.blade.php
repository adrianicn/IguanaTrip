

<div style='display:none'>
    <img src="{!! asset('img/x.png')!!}" alt='' />
</div>
<style>

    #simplemodal-container a.modalCloseImg {
        background:url("{!! asset('img/x.png')!!}") no-repeat;
        width:25px; height:29px; display:inline; z-index:1200; position:absolute; top:-15px; right:-16px; cursor:pointer;}


</style>

<div id="testboxForm" class="testboxForm">
    <h1>Agregar Punto para Itinerario </h1>

    {!! Form::open(['url' => route('postPuntoItinerario'),  'id'=>'puntoitinerario']) !!}
    <hr>


    <table>
        <tr>
            <td><label class='labelmodal' for="username">Lugar:</label></td>

            <td><input class="text" id="lugar_punto" name="lugar_punto" placeholder="Punto de encuentro, punto A, etc"></td>
        </tr>

        <tr>
            <td><label class='labelmodal' for="username">Punto:</label></td>

            <td>

                @if(isset($listItinerarios))
                @foreach ($listItinerarios as $itiner)
                @include('reusable.maps', ['longitud_servicio' => $itiner->longitud_punto,'latitud_servicio'=>$itiner->latitud_punto])  
                @endforeach
                @else
                @include('reusable.maps', ['longitud_servicio' => '-78.46783820000002','latitud_servicio'=>'-0.1806532'])   
                @endif


            </td>

        </tr>

        <tr>
            <td><label class='labelmodal' for="username">Día / Hora:</label></td>

            <td><input class="text" id="diahora_punto" name="diahora_punto" placeholder="Sabado 8AM, todos los días 11 Am, etc"></td>
        </tr>
        <tr>
            <td><label class='labelmodal' for="username">Incluye:</label></td>

            <td><textarea name="incluye_punto" rows="4" cols="29">Incluye equipos, incluye almuerzo, no incluye bicicletas, etc</textarea></td>
        </tr>



    </table>

    <input type="hidden"  class="id_itinerario" name="id_itinerario">
    <input type="hidden"  class="tag" name="tag">
    <input type="hidden"  class="id_detalle" name="id">

    <button class="button" type="button" id="btnsubm" onclick="">Siguiente</button>
    {!! Form::close() !!}


    {!! HTML::script('/js/jsModal/jquery.simplemodal.js') !!}
    {!! HTML::script('/js/jsModal/basic.js') !!}
    {!!HTML::script('js/loadingScreen/loadingoverlay.js') !!}

    {!!HTML::script('js/loadingScreen/loadingoverlay.min.js') !!}


    

    @if(isset($listItinerarios))
    @foreach ($listItinerarios as $itiner)

    <script>



        $('#lugar_punto').val('{!!$itiner->lugar_punto!!}');
        $('#diahora_punto').val('{!!$itiner->diahora_punto!!}');
        $('#incluye_punto').val('{!!$itiner->incluye_punto!!}');
        $('.id_itinerario').val('{!!$itiner->id_itinerario!!}');

        $('.tag').val('{!!$itiner->tags_punto!!}');
        $('.id_detalle').val('{!!$itiner->id!!}');
        $('#latitud_servicio').val('{!!$itiner->latitud_punto!!}');
        $('#longitud_servicio').val('{!!$itiner->longitud_punto!!}');
        $('#searchmap').val('{!!$itiner->tags_punto!!}');

    </script>
    @endforeach
    @endif

    
    <script>

        $("#map").width(444);
        $("#map").height(175);
    
        $("#btnsubm").click(function () {
            var value = $("#searchmap").val();
            var itinerario=$(".id_itinerario").val();
            var value = $("#searchmap").val();
            AjaxContainerRegistroWithLoadCharge('puntoitinerario', 'testboxForm',itinerario);
            
        });


    </script>

</div>
