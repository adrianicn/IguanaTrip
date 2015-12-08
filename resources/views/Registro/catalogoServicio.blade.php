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
    <div id="title-box-header-navigation">
        
           <h2 class="head-title-navigation">
   <a class="button-step4" href="/"> 
       <strong><img src="{!! asset('img/flecha-1.png')!!}" height="15px" width="15px" /> Paso 1 </strong></a>
               <a class="button-step4" href="/"> 
               <strong><img src="{!! asset('img/flecha-1.png')!!}" height="15px" width="15px" /> Paso 2</strong></a>
            </h2>
    </div>
    
    
    <div id="space"></div>


    {!! Form::open(['url' => route('upload-postServicioOperador'),  'id'=>'registro_stepoperador']) !!}
    <div class="wrapper uwa-font-aa">


        <input type="hidden" value="{!!$data['id_usuario_op']!!}" name="id_usuario_op" id="id_usuario_op">
        <div id="overlay">
            <div id="screen"></div>
            
            
            <div id="dialog-star1" class="dialog">
                <div class="label-dialog"><i ><img src="{!! asset('images/register/registro1.jpg')!!}" alt="lugares de comida" /></i></div>
                <div class="body-dialog">
                    <p>Lugares de  <span>COMIDA</span>. Dentro de esta clasificación se encuentran restaurantes, comida rápida, kioskos, agachaditos, cualquier tipo de local cuya actividad principal sea la alimentación.</p>
                </div>
                <div class="ok-dialog"><i class="icon-ok-sign"></i></div>
            </div>
            
            <div id="dialog-star2" class="dialog">
                <div class="label-dialog"><i ><img src="{!! asset('images/register/registro2.jpg')!!}" alt="Hospedaje" /></i></div>
                <div class="body-dialog">
                    <p>Lugares de  <span>HOSPEDAJE</span>. Dentro de esta clasificación se encuentran hoteles, hostels, home stays, hostales, villas , cualquier tipo de local cuya actividad principal sea la de hospedaje y descanso.</p>
                </div>
                <div class="ok-dialog"><i class="icon-ok-sign"></i></div>
            </div>
            
            <div id="dialog-star3" class="dialog">
                <div class="label-dialog"><i ><img src="{!! asset('images/register/registro3.jpg')!!}" alt="Agencia de viajes" /></i></div>
                <div class="body-dialog">
                    <p>Servicio de  <span>Viajes</span>.Dentro de esta clasificación se encuentran agencias de viajes, guías independientes, servicios de viajes planificados, cuya finalidad sea la de organizar viajes planeados donde se incluya por ejemplo transporte y seguro para el cliente.</p>
                </div>
                <div class="ok-dialog"><i class="icon-ok-sign"></i></div>
            </div>
            
            
            <div id="dialog-star4" class="dialog">
                <div class="label-dialog"><i ><img src="{!! asset('images/register/registro4.jpg')!!}" alt="Centros turísticos" /></i></div>
                <div class="body-dialog">
                    <p>Para <span>visitar </span>.Dentro de esta clasificación se encuentran museos, parques nacionales, cascadas, caminatas, cualquier lugar que se considere bueno para visitar, pasear y fotografiar.</p>
                </div>
                <div class="ok-dialog"><i class="icon-ok-sign"></i></div>
            </div>
            
            <div id="dialog-star5" class="dialog">
                <div class="label-dialog"><i ><img src="{!! asset('images/register/registro5.jpg')!!}" alt="Centros turísticos" /></i></div>
                <div class="body-dialog">
                    <p>Lugares para <span>diversión nocturna </span>.Dentro de esta clasificación se encuentran bares, casinos, discotecas, cobachas, cualquier lugar que se considere bueno farrear o pasar una simplemente diversión adulta.</p>
                </div>
                <div class="ok-dialog"><i class="icon-ok-sign"></i></div>
            </div>
            
             <div id="dialog-star6" class="dialog">
                <div class="label-dialog"><i ><img src="{!! asset('images/register/registro6.jpg')!!}" alt="Centros turísticos" /></i></div>
                <div class="body-dialog">
                    <p>Reuniones  <span>sociales </span>.Dentro de esta clasificación se encuentran parrilladas, paseos en bicileta, caídas, cualquier tipo de actividad donde se quiera invitar al público en general a unirse sean nacionales o extranjeros.</p>
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
                            <td> 
                                    <div id="star1" class="dialog-open">
                                    <img src="{!! asset('images/register/registro1.jpg')!!}" alt="" />
                                </div></td>
                            <td>
                                <div id="star1" class="dialog-open">
                                    
                                <h2 class='titletable'>
                                    Lugares de comida
                                </h2>
                                      
                                
                                Restaurante, pizzeria, kioscos de comida, comida rápida, etc
                                </div>
                                </td>
                            <td><input class="demo labelauty" name="id_catalogo_servicio1" id="checkbox-1" value="1" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio"{!!$servicio_1!!}/></td>
                        </tr>
                        <tr class="alt">  <td> 
                                <div id="star2" class="dialog-open">
                                    <img src="{!! asset('images/register/registro2.jpg')!!}" alt="" />
                                </div>
                                </td>
                            <td>
                                <div id="star2" class="dialog-open">
                                <h2 class='titletable'>
                                    Hospedajes
                                </h2>
                                
                                Hotel, hostal, home state, coachsurfing, etc
                                </div>
                                </td>
                            <td><input class="demo labelauty" name="id_catalogo_servicio2" id="checkbox-2" value="2" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio" {!!$servicio_2!!}/></td>
                        </tr>
                        <tr>  <td> 
                            <div id="star3" class="dialog-open">
                                    <img src="{!! asset('images/register/registro3.jpg')!!}" alt="" />
                                </div>
                                
                            
                            </td>
                            <td>
                                <div id="star3" class="dialog-open">
                                <h2 class='titletable'>
                                    Viajes Organizados
                                </h2>
                                
                                Agencia de viajes, guía independiente, exploración, etc
                                </div>
                                </td>
                            <td><input class="demo labelauty" name="id_catalogo_servicio3" id="checkbox-3" value="3" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio" {!!$servicio_3!!}/></td></tr>
                        <tr class="alt"><td> 
                                <div id="star4" class="dialog-open">
                                    <img src="{!! asset('images/register/registro4.jpg')!!}" alt="" />
                                </div>
                            </td>
                            <td>
                                <div id="star4" class="dialog-open">
                                <h2 class='titletable'>
                                    Centros turísticos
                                </h2>
                                    
                                Museos ,parques nacionales, zoologicos, etc
                                </div>
                            </td>
                            <td><input class="demo labelauty" name="id_catalogo_servicio4" id="checkbox-4" value="4" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio" {!!$servicio_4!!}/></td></tr>
                        <tr><td> 
                                
                                <div id="star5" class="dialog-open">
                                    <img src="{!! asset('images/register/registro5.jpg')!!}" alt="" />
                                </div>
                            </td>
                            <td>
                                <div id="star5" class="dialog-open">
                                <h2 class='titletable'>
                                    Diversión nocturna
                                </h2>
                                Discoteca, bar, casino, etc
                                </div>
                                
                            </td>
                            <td><input class="demo labelauty" name="id_catalogo_servicio5" id="checkbox-5" value="5" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio" {!!$servicio_5!!}/></td></tr>

                        <tr class="alt"><td>
                                <div id="star6" class="dialog-open">
                                    <img src="{!! asset('images/register/registro6.jpg')!!}" alt="" />
                                </div>
                                
                            <td>
                                <div id="star6" class="dialog-open">
                                <h2 class='titletable'>
                                    Reuniones sociales
                                </h2>
                                Parrilladas, viajes, caídas, after office, actividades espontaneas etc
                                </div>
                                
                                </td>
                            <td><input class="demo labelauty" name="id_catalogo_servicio6" id="checkbox-6" value="6" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio" {!!$servicio_6!!}/></td></tr>

                    </tbody>
                </table>
            </div>

        </div>
        <div class="form-group-step2">
            <div class="box-content-button-step2">
                <a class="button" onclick="AjaxContainerRegistro('registro_stepoperador')" href="#">Siguiente</a>
            </div>
        </div>    

    </div>



    {!! Form::close() !!}
</div>

@section('scripts')
{!! HTML::script('/js/registro/registroajax_serviciooperador.js') !!}
{!!HTML::script('js/jquery-labelauty.js') !!}
@stop
@stop