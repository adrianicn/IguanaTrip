{!! HTML::style('css/registerForm.css') !!} 
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">

<div class="testboxForm">
    <h1>Agregar Servicio </h1>



    
    {!! Form::open(['url' => route('upload-postusuarioserviciosmini'),  'id'=>'newServicio']) !!}
    
{{$operador}}    
{{$catalogo}}    


    
    <hr>

    <table>
        <tr>
            <td><label class='labelmodal' for="username">Nombre:</label></td>

            <td><input class="text" id="nombre_servicio" name="nombre_servicio" placeholder="{{trans('front/register.pseudo')}}"></td>
        </tr>
        
        
        <tr>
            <td><label class='labelmodal' for="username">Detalle:</label></td>

            <td><textarea name="detalle_servicio" rows="4" cols="29">Descripción</textarea></td>
        </tr>
        


    </table>
    <input type="hidden" value="2" name="id_usuario_operador">
    <input type="hidden" value="1" name="id_catalogo_servicio">
        <button class="button" type="button"  onclick="AjaxContainerRegistro('newServicio')">Siguiente</button>
</form>{!! Form::close() !!}
</div>
