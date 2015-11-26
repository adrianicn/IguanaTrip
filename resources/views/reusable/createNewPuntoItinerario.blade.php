

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
    <hr>

    {!! Form::open(['url' => route('postPuntoItinerario'),  'id'=>'puntoitinerario']) !!}
    <input type="hidden"  class="id_itinerario" name="id_itinerario">
    <input type="hidden"  class="tag" name="tag">
    <input type="hidden"  class="id_detalle" name="id">

        <div class="form-group-step2-popup">
            {!!Form::label('lugar_1', 'Lugar', array('id'=>'iconFormulario-step2-popup'))!!}
            {!!Form::text('lugar_punto',NULL, array('class'=>'inputtext-step2-popup','placeholder'=>'Punto de encuentro, punto A, etc'))!!}
        </div>
        <div class="form-group-step2-popup">
                @if(isset($listItinerarios))
                @foreach ($listItinerarios as $itiner)
                @include('reusable.maps', ['longitud_servicio' => $itiner->longitud_punto,'latitud_servicio'=>$itiner->latitud_punto])  
                @endforeach
                @else
                @include('reusable.maps', ['longitud_servicio' => '-78.46783820000002','latitud_servicio'=>'-0.1806532'])   
                @endif
        </div>
        <div class="form-group-step2-popup">
            {!!Form::label('dia_hora_1', 'Día / Hora', array('id'=>'iconFormulario-step2-popup'))!!}
            {!!Form::text('diahora_punto',NULL, array('class'=>'inputtext-step2-popup','placeholder'=>'Sabado 8AM, todos los días 11 Am, etc'))!!}
        </div>
        <div class="form-group-step2-popup">
            {!!Form::label('incluye_1', 'Incluye', array('id'=>'iconFormulario-step2-popup'))!!}
            {!!Form::textarea('incluye_punto',NULL, array('class'=>'inputtextarea-step2-popup-1','placeholder'=>'Incluye equipos, incluye almuerzo, no incluye bicicletas, etc'))!!}
        </div>

        <div id="form-group-step2-popup">
            <div class="box-content-button-1">
                <a class="button-1" onclick="AjaxContainerRegistroWithLoad('')" href="#">Siguiente</a>
            </div>              
        </div>

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

        $("#map").width(550);
        $("#map").height(175);
    
        $("#btnsubm").click(function () {
            var value = $("#searchmap").val();
            var itinerario=$(".id_itinerario").val();
            var value = $("#searchmap").val();
            AjaxContainerRegistroWithLoadCharge('puntoitinerario', 'testboxForm',itinerario);
            
        });


    </script>

</div>
