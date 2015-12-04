@extends('front.masterPageServicios')

@section('step1')


{!! HTML::style('css/table.css') !!} 
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

<div class="row-step4">
    <div id="title-box-header">
        <div id="title-box-type" style="cursor:pointer;"onclick="window.location.href = '/IguanaTrip/public/servicios'">
            
          <?php switch (session('tip_oper')) {
    case 1:
        $prefix="I'm an ";
        $operadorName="Agency";
        break;
    case 2:
        $prefix="I'm an ";
        $operadorName="Enterprise";
        break;
    case 3:
        $prefix="I'm just";
        $operadorName="Me";
        break;
    
}
?>

           
            <h2 class="head-title">
    {!!$prefix!!}             <strong>{!!$operadorName!!}</strong>
            </h2>
        </div>
        <div id="description-box-type">
            Explicacion de que es lo que hace todo este proceso para que pueda ver el usuario que hacer
            sin necesidad de llamar a nadie
        </div>
    </div>
    <div id="space"></div>

    <div class="wrapper uwa-font-aa">

        <?php $counter = 0; ?>
        @foreach ($listServiciosUnicos as $servicios)
        <?php $counter = $counter + 1; ?>

        {!! Form::open(['url' => route('upload-postDetalleOperador'),  'id'=>$servicios->id_catalogo_servicios]) !!}
        <div id="table_{!!$servicios->id!!}" class="servicio-usuario-detalle">
            <h2>{!!$servicios->nombre_servicio!!} <strong class="add-registro" onclick="RenderPartial('reusable.createNewServicio', {!!$servicios -> id_catalogo_servicios!!}, {!!$servicios -> id_usuario_operador!!})">+</strong> <strong class="text-add-registro">(agregar registro)</strong> </h2>
            <table class="tabla-servicio-usuario-detalle">
                <tr>
                    <th>Nombre del Servicio</th>
                    <th>Estado</th>
                </tr>
                @foreach ($listServiciosAll as $servicio)
                @if($servicio->id_catalogo_servicios==$servicios->id_catalogo_servicios)
                <?php $check = ''; ?>
                @if($servicio->estado_servicio_usuario==1)
                <?php $check = 'checked'; ?>
                @endif
                <!-- modal content -->
                <tr>
                    @if($servicio->nombre_servicio=="")
                    <td class="vinculo-servicio">
                        {!! link_to_route('details.show', 'Ingresar Nombre', [$servicio->id,$servicio->id_catalogo_servicios]) !!}
                    </td>
                    @else
                    <td class="vinculo-servicio">
                        {!! link_to_route('details.show',$servicio->nombre_servicio, [$servicio->id,$servicio->id_catalogo_servicios]) !!}

                    </td>
                    @endif
                    <td> 
                        <label class="switch switch-green">
                            <input type="checkbox" id='estado_servicio_usuario_{!!$servicio->id!!}' {!!$check!!} name ='estado_servicio_usuario_{!!$servicio->id!!}' class="switch-input" onchange="AjaxContainerRetrunMessage({!!$servicios -> id_catalogo_servicios!!}, {!!$servicio -> id!!})">
                            <span class="switch-label" data-on="On" data-off="Off"></span>
                            <span class="switch-handle"></span>

                        </label>
                    </td>
                <input type="hidden" value="{!!$servicio->id!!}" name="usuario_servicio">
                <td id='basic-modal' contenteditable="true">
                </td>



                </tr>
                @endif
                @endforeach 

            </table>

        </div>
        <br>



        {!! Form::close() !!}
        @endforeach 
    </div>
</div>









@section('scripts')
{!! HTML::script('/js/tabla_dinamica.js') !!}
{!! HTML::script('/js/jsModal/jquery.simplemodal.js') !!}
{!! HTML::script('/js/jsModal/basic.js') !!}

@stop

@stop