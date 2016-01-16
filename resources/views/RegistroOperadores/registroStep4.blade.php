@extends('front.masterPageServicios')

@section('step1')
{!! HTML::style('css/calendar/ui-jquery.css') !!}

<div style='display:none'>
    <img src="{!! asset('img/x.png')!!}" alt='' />
</div>
<style>
    #simplemodal-container a.modalCloseImg {
        background:url("{!! asset('img/x.png')!!}") no-repeat;
        width:25px; height:29px; display:inline; z-index:1200; position:absolute; top:-15px; right:-16px; cursor:pointer;}
    </style>
    <div id="basic-modal-content" class="cls loadModal"></div>

<div class="rowerror">
</div>
<?php
$prefix = "";
$operadorName = "";
$usuarioServicio->id = 0;
$usuarioServicio->nombre_servicio = '';
$usuarioServicio->detalle_servicio = '';
$usuarioServicio->precio_desde = '';
$usuarioServicio->precio_hasta = '';
$usuarioServicio->precio_anterior = '';
$usuarioServicio->precio_actual = '';
$usuarioServicio->descuento_servico = '';
$usuarioServicio->direccion_servicio = '';
$usuarioServicio->correo_contacto = '';
$usuarioServicio->pagina_web = '';
$usuarioServicio->nombre_comercial = '';
$usuarioServicio->tags = '';
$usuarioServicio->descuento_clientes = '';
$usuarioServicio->tags_servicio = '';
$usuarioServicio->observaciones = '';
$usuarioServicio->telefono = '';
$usuarioServicio->id_provincia = '';
$usuarioServicio->id_canton = '';
$usuarioServicio->id_parroquia = '';
$usuarioServicio->latitud_servicio = -0.1806532;
$usuarioServicio->longitud_servicio = -78.46783820000002;
?>
@foreach ($usuarioServicio as $detalles)
<?php
$usuarioServicio->id = $detalles->id;
$usuarioServicio->nombre_servicio = trim($detalles->nombre_servicio);
$usuarioServicio->detalle_servicio = trim($detalles->detalle_servicio);
$usuarioServicio->precio_desde = trim($detalles->precio_desde);
$usuarioServicio->precio_hasta = trim($detalles->precio_hasta);
$usuarioServicio->precio_anterior = trim($detalles->precio_anterior);
$usuarioServicio->precio_actual = trim($detalles->precio_actual);
$usuarioServicio->descuento_servico = trim($detalles->descuento_servico);
$usuarioServicio->direccion_servicio = trim($detalles->direccion_servicio);
$usuarioServicio->correo_contacto = trim($detalles->correo_contacto);
$usuarioServicio->pagina_web = trim($detalles->pagina_web);
$usuarioServicio->nombre_comercial = trim($detalles->nombre_comercial);
$usuarioServicio->tags = trim($detalles->tags);
$usuarioServicio->descuento_clientes = $detalles->descuento_clientes;
$usuarioServicio->tags_servicio = trim($detalles->tags_servicio);
$usuarioServicio->id_provincia = $detalles->id_provincia;
$usuarioServicio->id_canton = $detalles->id_canton;
$usuarioServicio->id_parroquia = $detalles->id_parroquia;
$usuarioServicio->observaciones = trim($detalles->observaciones);
$usuarioServicio->telefono = $detalles->telefono;
$usuarioServicio->latitud_servicio = ($detalles->latitud_servicio == '') ? -0.1806532 : $detalles->latitud_servicio;
$usuarioServicio->longitud_servicio = ($detalles->longitud_servicio == '') ? -78.46783820000002 : $detalles->longitud_servicio;
?>
@endforeach
<div class="row-step4">
    <div id="title-box-header">
        <div id="title-box-type" style="cursor:pointer;"onclick="window.location.href = '{!!asset('/servicios')!!}'">

            <?php
            switch (session('tip_oper')) {
                case 1:
                    $prefix = "I'm an ";
                    $operadorName = "Agency";
                    break;
                case 2:
                    $prefix = "I'm an ";
                    $operadorName = "Enterprise";
                    break;
                case 3:
                    $prefix = "I'm just";
                    $operadorName = "Me";
                    break;
            }
            ?>
            <h2 class="head-title">
                {!!$prefix!!}             <strong>{!!$operadorName!!}</strong>
            </h2>
        </div>
        <div id="description-box-type">
            En ésta sección se detalla el servicio, se da a conocer la ubicación geográfica de donde se puede contratar el servicio, se pueden agregar fotografías, eventos, promociones e itinerarios. 
        </div>
    </div>
    <div id="space"></div>
    <div id="title-box-header-navigation">

        <h2 class="head-title-navigation">
            <a class="button-step4" onclick="window.location.href = '{!!asset('/servicios')!!}'"> 
                <strong><img src="{!! asset('img/flecha-1.png')!!}" height="15px" width="15px" /> Paso 1 </strong></a>
            <a class="button-step4" onclick="window.location.href = '{!!asset('/operador')!!}'"> 
                <strong><img src="{!! asset('img/flecha-1.png')!!}" height="15px" width="15px" /> Paso 2 </strong></a>
            <a class="button-step4" onclick="window.location.href = '{!!asset('/userservice')!!}'"> 
                <strong><img src="{!! asset('img/flecha-1.png')!!}" height="15px" width="15px" /> Paso 3 </strong></a>
            <a class="button-step4" onclick="window.location.href = '{!!asset('/detalleServicios')!!}'"> 
                <strong><img src="{!! asset('img/flecha-1.png')!!}" height="15px" width="15px" /> Paso 4 </strong></a>
            <a class="button-step4 "> 
                <div style="color:#F26803; display: block;
                     font-size: 0.9em;
                     font-weight: normal;
                     line-height: 31px;
                     text-indent: 31px;"> Paso 5 </div></a>
        </h2>
    </div>
    
    <div id="space"></div>

    <div class="wrapper uwa-font-aa">
        {!!$Servicio->nombre_servicio!!}
        {!! Form::open(['url' => route('upload-postusuarioservicios'), 'method' => 'post', 'role' => 'form', 'id'=>'registro_step1'] ) !!}
        <input type="hidden" value="{!!$usuarioServicio->id!!}" name="id" id="id">
        <input type="hidden" value="{!!$id_catalogo!!}" name="id_catalogo" id="id_catalogo">
        <div id="part-1-form">
            <div id="principal-data">
                <div class="form-group-1">
                    {!!Form::label('nombre_servicio_1', 'Nombre Servicio', array('class'=>'control-label','id'=>'iconFormulario-step4'))!!}
                    {!!Form::text('nombre_servicio', $usuarioServicio->nombre_servicio, array("title"=>"Es el nombre comercial del servicio o el nombre con el que quieres que los turistas encuentren tu servicio.",'class'=>'inputtext chng','placeholder'=>'Nombre del Servicio'))!!}
                </div>
                <div class="form-group-1">
                    {!!Form::label('precio_desde_1', 'Precio Desde', array('class'=>'control-label','id'=>'iconFormulario-step4'))!!}
                    {!!Form::text('precio_desde', $usuarioServicio->precio_desde, array("title"=>"Para realizar una segmentación adecuada de interesados, sería bueno que nos des el rango de precios de tu servicio. El valor es en dólares americanos",'class'=>'inputtext chng','placeholder'=>'Precio Desde'))!!}
                </div>
                <div class="form-group-1">
                    {!!Form::label('precio_hasta_1', 'Precio Hasta', array('class'=>'control-label','id'=>'iconFormulario-step4'))!!}
                    {!!Form::text('precio_hasta', $usuarioServicio->precio_hasta, array("title"=>"Para realizar una segmentación adecuada de interesados, sería bueno que nos des el rango de precios de tu servicio. El valor es en dólares americanos",'class'=>'inputtext chng','placeholder'=>'Precio Hasta'))!!}
                </div>
                <div class="form-group-1">
                    {!!Form::label('direccion_servicio_1', 'Direccion Servicio', array('class'=>'control-label','id'=>'iconFormulario-step4'))!!}
                    {!!Form::text('direccion_servicio', $usuarioServicio->direccion_servicio, array("title"=>"La dirección exacta de tu servicio, te brindamos la opción de señalarlo en el mapa para ubicarte geograficamente. Debido a que no todas las provincias están disponibles por Google intenta acercar lo más posible tu ubicación será más fácil para los turistas encontrarte.",'class'=>'inputtext chng','placeholder'=>'Direccion del Servicio'))!!}
                </div>
                <div id='provincias'>
                    @section('provincias')
                    @show
                </div>
                <div class="form-group-1">
                    @include('reusable.maps', ['longitud_servicio' => $usuarioServicio->longitud_servicio,'latitud_servicio'=>$usuarioServicio->latitud_servicio])  
                </div>    
            </div>
            <div id="secondary-data">
                <div class="form-group-2">
                    {!!Form::label('detalle_servicio_1', 'Detalle Servicio', array("title"=>"Ingresa un detalle corto y preciso, no más de 4 líneas procura usar un todo cortéz para invitar a los turistas. Nosotros nos encargaremos de traducirlo a diferentes idiomas.",'class'=>'control-label-1'))!!}
                    <textarea id="detalle_servicio" name="detalle_servicio" class="ptm chng" placeholder="Detalle Servicio" title="Ingresa un detalle corto y preciso, no más de 4 líneas procura usar un todo cortéz para invitar a los turistas. Nosotros nos encargaremos de traducirlo a diferentes idiomas.">{!!trim($usuarioServicio->detalle_servicio)!!}</textarea>
                </div>
                <div class="form-group-2">
                    {!!Form::label('telefono_1', 'Telefono', array('class'=>'control-label-2'))!!}
                    {!!Form::text('telefono', $usuarioServicio->telefono, array("title"=>"El turista podrá comunicarse directamente contigo si así lo deseas",'class'=>'form-control-1 chng','placeholder'=>'Telefono del Servicio'))!!}
                </div>
                <div class="form-group-2">
                    {!!Form::label('correo_contacto_1', 'Correo del contacto', array('class'=>'control-label-2'))!!}
                    {!!Form::text('correo_contacto', $usuarioServicio->correo_contacto, array("title"=>"Siempre es bueno tener un correo electrónico en el cual puedan pedirte más información sobre tu servicio",'class'=>'form-control-1 chng','placeholder'=>'Correo Contacto'))!!}
                </div>
                <div class="form-group-2">
                    {!!Form::label('pagina_web_1', 'Pagina Web', array('class'=>'control-label-2'))!!}
                    {!!Form::text('pagina_web', $usuarioServicio->pagina_web, array("title"=>"Si tienes una página web servirá mucho para tu credibilidad.",'class'=>'form-control-1 chng','placeholder'=>'URL'))!!}
                </div>
                <div class="form-group-2"> Mi servicio o establecimiento incluye:
                    <ul style="list-style: none">
                        @foreach ($catalogoServicioEstablecimiento as $catalogo)	
                        <li>
                            <input class="circulo" name="id_servicio_est[]" id="id_servicio_est[]" value="{!!$catalogo->id!!}" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio" {{($catalogo->estado_servicio_est_us <> NULL)?'checked':''}}/>
                            {!!$catalogo->nombre_servicio_est!!}
                        </li>    
                        @endforeach
                    </ul>
                </div>
            </div>
            <div id="secondary-data">
                <div id="promocion"><a class="button-step4" title="Si deseas agregar promociones de tu servicio puedes hacerlo aquí y nosotros nos encargaremos de darle la publicidad necesaria." onclick="RenderPartialGeneric('reusable.promocion', {!!$usuarioServicio->id!!})" href="#"> <h1 class="h1-agregar">+</h1> Agregar promocion</a></div>
                <div id="evento"><a class="button-step4" title="Puedes crear varios eventos para tu servicio. Ejemplo si tu servicio es una discoteca puedes agregar Jueves laydies night como evento o si eres un restaurante puedes agregar eventos como inauguraciones, etc." onclick="RenderPartialGeneric('reusable.createNewEvent', {!!$usuarioServicio->id!!})" href="#"> <h1 class="h1-agregar">+</h1> Agregar evento</a></div>
                <div id="evento"><a class="button-step4" title="Esta opción es orientada a servicios turísticos de viajes y transporte. Por ejemplo tu servicio es una agencia de viajes y tienes varios itinerarios Trip Cotopaxi, Trip Amazonía o si eres un transporte podrás especificar la ruta de tu servicio." onclick="RenderPartialGeneric('reusable.createNewItinerario', {!!$usuarioServicio->id!!})" href="#"> <h1 class="h1-agregar">+</h1> Agregar tour o itinerario</a></div>

                
                <div id="promocion"><a onclick="RenderPartialGenericFotografia('reusable.uploadImagePopUp', 1, {!!$usuarioServicio->id!!}, {!!$usuarioServicio->id!!})" href="#"><img src="{{ asset('img/fotograf.png')}}" style="width:111px"></a> </div>
                <div id="promocion"><a onclick="RenderPartialGeneric('reusable.invitar_amigo')" href="#"><img src="{{ asset('img/amigo-1.png')}}" style="width:111px"></a> </div>
            </div>
        </div>
        <div id="part-1-form">
            <div class="box-content-button-1">
                <a class="button-1" title="Antes de finalizar recuerda que puedes ingresar fotografías de tu servicio en la parte inferior." onclick="AjaxContainerRetrunMessage('registro_step1', 'optional'); window.location.href = '/IguanaTrip/public/thankyou'" href="#">Finalizar</a>
            </div>              
        </div>
        {!! Form::close() !!}

        <div id="renderPartialImagenes">
            @section('contentImagenes')
            @show
        </div>    


        <div id="renderPartialListaServicios">
            @section('contentPanelServicios')
            @show
        </div>    
    </div>
</div>


<input type="hidden" value="0" id="flag_image">

@if($usuarioServicio->id_provincia=='' )
<script>
            $(document).ready(function () {
            GetDataAjaxProvincias("{!!asset('/getProvincias')!!}/0/0/0");
    });</script>
@else
<script>
            $(document).ready(function () {
    GetDataAjaxProvincias("{!!asset('/getProvincias')!!}/{!!$usuarioServicio->id_provincia!!}/{!!$usuarioServicio->id_canton!!}/{!!$usuarioServicio->id_parroquia!!}");
    });</script>
@endif

<script>
    $(document).ready(function () {

                GetDataAjaxSectionEventos("{!!asset('/getlistaServiciosComplete')!!}/{!!$usuarioServicio->id!!}");
               // GetDataAjaxImagenes("{!!asset('/imagenesAjax')!!}/1/{!!$usuarioServicio->id!!}");
    });
    
    
    $(".chng").change(function() {
    AjaxContainerRetrunMessage('registro_step1', 'optional')
            });
            $(function() {
            var tooltips = $("[title]").tooltip({
            position: {
            my: "left top",
                    at: "right+5 top-5"
            }
            });
            });
        
    
</script>




{!!HTML::script('js/loadingScreen/loadingoverlay.js') !!}
{!!HTML::script('js/loadingScreen/loadingoverlay.min.js') !!}


@stop


@section('scripts')
{!! HTML::script('/js/jsModal/jquery.simplemodal.js') !!}
{!! HTML::script('/js/jsModal/basic.js') !!}

<script>
    $(document).ready(function () {

                
                GetDataAjaxImagenes("{!!asset('/imagenesAjax')!!}/1/{!!$usuarioServicio->id!!}");
    });
    
     ///Script para actualizar el container una vez que se hayan subido las imagenes
     setInterval( function() {
    
        if ($('#flag_image').val() == 1) {
            // Save the new value
           GetDataAjaxImagenes("{!!asset('/imagenesAjax')!!}/1/{!!$usuarioServicio->id!!}");
           $("#flag_image").val('0');

            // TODO - Handle the changed value
        }
    
}, 100);
</script>

@stop


