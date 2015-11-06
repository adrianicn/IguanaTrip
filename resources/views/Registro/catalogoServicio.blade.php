@extends('front.masterPageServicios')

@section('step1')

{!! HTML::style('css/jquery-labelauty.css') !!} 
{!!HTML::script('js/jquery-labelauty.js') !!}
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700|Electrolize' rel='stylesheet' type='text/css' />

<div class="rowerror">

</div>
<div class="row">
    {!! Form::open(['url' => route('upload-postServicioOperador'),  'id'=>'registro_stepoperador']) !!}

    <input type="hidden" value="{!!$data['id_usuario_op']!!}" name="id_usuario_op" id="id_usuario_op">
    <div id="overlay">
        <div id="screen"></div>
        <div id="dialog-star" class="dialog">
            <div class="label-dialog"><i ><img src="{!! asset('images/foto.png')!!}" alt="" /></i></div>
            <div class="body-dialog">
                <p>The Star dialog is <span>modeless</span>. You can click on the check mark or anywhere outside of the dialog's body to clear it.</p>
            </div>
            <div class="ok-dialog"><i class="icon-ok-sign"></i></div>
        </div>
        <div id="dialog-anchor" class="dialog modal">
            <div class="label-dialog"><i class="icon-anchor"></i></div>
            <div class="body-dialog">
                <p>The Anchor dialog is <span>modal</span>. You must click on the check mark to acknowledge and clear it.</p>
            </div>
            <div class="ok-dialog"><i class="icon-ok-sign"></i></div>
        </div>
        <div id="dialog-beaker" class="dialog">
            <div class="label-dialog"><i class="icon-beaker"></i></div>
            <div class="body-dialog">
                <p>The Beaker dialog is <span>modeless</span>. You can click on the check mark or anywhere outside of the dialog's body to clear it.</p>
            </div>
            <div class="ok-dialog"><i class="icon-ok-sign"></i></div>
        </div>
        <div id="dialog-bug" class="dialog modal">
            <div class="label-dialog"><i class="icon-bug"></i></div>
            <div class="body-dialog">
                <p>The Bug dialog is <span>modal</span>. You must click on the check mark to acknowledge and clear it.</p>
            </div>
            <div class="ok-dialog"><i class="icon-ok-sign"></i></div>
        </div>
    </div>

    <div class="datagrid"><table>
            <thead><tr><th>Tipo</th><th>Descripcion</th><th>Seleccion</th></tr></thead>

            <tbody><tr>
                    <td> <img src="{!! asset('images/eat.png')!!}" alt="" /></td>
                    <td>ejemplo(Restaurante,pizzeria)</td>
                    <td><input class="demo labelauty" name="id_catalogo_servicio1" id="checkbox-1" value="1" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio" checked/></td>
                </tr>
                <tr class="alt">  <td> <img src="{!! asset('images/hotel.png')!!}" alt="" /></td>
                    <td>ejemplo(Hotel,hostal, home state)</td>
                    <td><input class="demo labelauty" name="id_catalogo_servicio2" id="checkbox-2" value="2" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio" checked/></td>
                </tr>
                <tr>  <td> <img src="{!! asset('images/trip.png')!!}" alt="" /></td>
                    <td>ejemplo(Agencia de viajes,guía independiente, exploración)</td>
                    <td><input class="demo labelauty" name="id_catalogo_servicio3" id="checkbox-3" value="3" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio" checked/></td></tr>
                <tr class="alt"><td> 
                        <div id="star" class="dialog-open">
                            <img src="{!! asset('images/foto.png')!!}" alt="" />
                        </div>
                    </td>
                    <td>ejemplo(Museo,parque nacional, zoologico)</td>
                    <td><input class="demo labelauty" name="id_catalogo_servicio4" id="checkbox-4" value="4" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio" checked/></td></tr>
                <tr><td> <img src="{!! asset('images/dance.png')!!}" alt="" /></td>
                    <td>ejemplo(Discoteca,bar,casino)</td>
                    <td><input class="demo labelauty" name="id_catalogo_servicio5" id="checkbox-5" value="5" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio" checked/></td></tr>
            
                <tr class="alt"><td> <div id="anchor" class="button dialog-open">
            <i class="icon-anchor"></i>
        </div></td>
                    <td>ejemplo(otros)</td>
                    <td><input class="demo labelauty" name="id_catalogo_servicio6" id="checkbox-6" value="6" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio" checked/></td></tr>
            
            </tbody>
        </table>

    </div>
    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"  onclick="AjaxContainerRegistro('registro_stepoperador')">Siguiente</button>


    {!! Form::close() !!}
</div>
@section('scripts')
{!! HTML::script('/js/registro/registroajax_serviciooperador.js') !!}

@stop
@stop