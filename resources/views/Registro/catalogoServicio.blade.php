@extends('front.masterPageServicios')
@section('step1')

{!! HTML::style('css/jquery-labelauty.css') !!} 

<div class="rowerror">

</div>

<?php
$servicio_1 = '';
$servicio_2 = '';
$servicio_3 = '';
$servicio_4 = '';
$servicio_5 = '';
$servicio_6 = '';
?>
@foreach ($listServicios as $servicio)
<?php
switch ($servicio->id_catalogo_servicio) {
    case 1:
        $servicio_1 = 'checked';
        break;
    case 2:
        $servicio_2 = 'checked';
        break;
    case 3:
        $servicio_3 = 'checked';
        break;
    case 4:
        $servicio_4 = 'checked';
        break;
    case 5:
        $servicio_5 = 'checked';
        break;
    case 6:
        $servicio_6 = 'checked';
        break;
}
?>
@endforeach     


{!! Form::open(['url' => route('upload-postServicioOperador'),  'id'=>'registro_stepoperador']) !!}


<div class="wrapper uwa-font-aa">

    <div class="left-head box-content box-content-team ">
        <h2 class="head-title box-content-title ">
            I'm an                <strong>Agency</strong>
        </h2>

    </div>
    <div class="box-content-individual-head box-content  right">
        <h3 class="box-content-head"> {{ trans('registro/registrosteps.step2') }}
            Explicacion de que es lo que hace todo este proceso para que pueda ver el usuario que hacer
            sin necesidad de llamar a nadie
        </h3>

    </div>
</div>

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

<div class="testboxFormulario">
    <div class="datagrid">

        <table>
            <thead><tr><th>Tipo</th><th>Descripcion</th><th>Seleccion</th></tr></thead>

            <tbody><tr>
                    <td> <img src="{!! asset('images/eat.png')!!}" alt="" /></td>
                    <td>


                        <h2 class='titletable'>
                            Lugares de comida
                        </h2>
                        Restaurante, pizzeria, kioscos de comida, comida rápida, etc</td>
                    <td><input class="demo labelauty" name="id_catalogo_servicio1" id="checkbox-1" value="1" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio"{!!$servicio_1!!}/></td>
                </tr>
                <tr class="alt">  <td> <img src="{!! asset('images/hotel.png')!!}" alt="" /></td>
                    <td>
                        <h2 class='titletable'>
                            Hospedajes
                        </h2>
                        Hotel, hostal, home state, coachsurfing, etc</td>
                    <td><input class="demo labelauty" name="id_catalogo_servicio2" id="checkbox-2" value="2" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio" {!!$servicio_2!!}/></td>
                </tr>
                <tr>  <td> <img src="{!! asset('images/trip.png')!!}" alt="" /></td>
                    <td>
                        <h2 class='titletable'>
                            Agencias de viajes
                        </h2>
                        Agencia de viajes, guía independiente, exploración, etc</td>
                    <td><input class="demo labelauty" name="id_catalogo_servicio3" id="checkbox-3" value="3" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio" {!!$servicio_3!!}/></td></tr>
                <tr class="alt"><td> 
                        <div id="star" class="dialog-open">
                            <img src="{!! asset('images/foto.png')!!}" alt="" />
                        </div>
                    </td>
                    <td>
                        <h2 class='titletable'>
                            Centros turísticos
                        </h2>
                        Museos ,parques nacionales, zoologicos, etc
                    </td>
                    <td><input class="demo labelauty" name="id_catalogo_servicio4" id="checkbox-4" value="4" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio" {!!$servicio_4!!}/></td></tr>
                <tr><td> <img src="{!! asset('images/dance.png')!!}" alt="" /></td>
                    <td>
                        <h2 class='titletable'>
                            Diversión nocturna
                        </h2>
                        Discoteca, bar, casino, etc
                    </td>
                    <td><input class="demo labelauty" name="id_catalogo_servicio5" id="checkbox-5" value="5" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio" {!!$servicio_5!!}/></td></tr>

                <tr class="alt"><td> 
                        <div id="anchor" class="button dialog-open">
                            <i class="icon-anchor"></i>
                        </div></td>
                    <td>
                        <h2 class='titletable'>
                            Reuniones sociales
                        </h2>
                        Parrilladas, viajes, caídas, after office, etc</td>
                    <td><input class="demo labelauty" name="id_catalogo_servicio6" id="checkbox-6" value="6" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio" {!!$servicio_6!!}/></td></tr>

            </tbody>
        </table>
        
      
        
    </div>
       <div class="box-content box-content-team middle">



        <div class="box-content-button form-btn">
            <a class="button" onclick="AjaxContainerRegistro('registro_stepoperador')" href="#">Siguiente</a>
        </div>

    </div>
</div>



{!! Form::close() !!}

@section('scripts')
{!! HTML::script('/js/registro/registroajax_serviciooperador.js') !!}
{!!HTML::script('js/jquery-labelauty.js') !!}
@stop
@stop