{!! HTML::style('css/registerForm.css') !!} 
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
{!! HTML::style('css/jquery-labelauty.css') !!} 
<div id="testboxForm" class="testboxForm">
    <h1>Agregar Itinerario </h1>
    
    {!! Form::open(['url' => route('postItinerario'),  'id'=>'itinerario']) !!}
    <hr>

    <table>
        <tr>
            <td><label class='labelmodal' for="username">Nombre:</label></td>

            <td><input class="text" id="nombre_promocion" name="nombre_itinerario" placeholder="{{trans('front/register.pseudo')}}"></td>
        </tr>
        
        
        <tr>
            <td><label class='labelmodal' for="username">Detalle:</label></td>

            <td><textarea name="descripcion_itinerario" rows="4" cols="29">Descripción</textarea></td>
        </tr>
    </table>
    <div id="renderPartial">
         @section('contentPanel')
        
            @show
        
    </div>        
    <input type="hidden"  class="id_usuario_operador" name="id_usuario_operador">
    
        <button class="button" type="button"  onclick="AjaxContainerRegistroWithLoad('newServicio','testboxForm')">Siguiente</button>
{!! Form::close() !!}

</div>

    
<script>
$( document ).ready(function() {
    
    GetDataAjax("/IguanaTrip/public/getTipoDificultad");
});
</script>