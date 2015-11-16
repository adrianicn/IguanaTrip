{!! HTML::style('css/registerForm.css') !!} 
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">

<div class="testboxForm">
    <h1>Agregar Promoción </h1>



    
    {!! Form::open(['url' => route('postPromocion'),  'id'=>'promocion']) !!}
    <hr>

    <table>
        <tr>
            <td><label class='labelmodal' for="username">Nombre:</label></td>

            <td><input class="text" id="nombre_promocion" name="nombre_promocion" placeholder="{{trans('front/register.pseudo')}}"></td>
        </tr>
        <tr><td>
                <label class="labelmodal" for="fecha">Inicio: </label>
            </td>
            <td><input class="fecha"  id="fecha_inicio" name="fecha_inicio" placeholder="Fecha"></td>
        </tr>
        <tr>
            <td><label class="labelmodal" for="fecha">Fin: </label>
            </td>
            <td><input class="fecha"  id="fecha_inicio" name="fecha_fin" placeholder="Fecha"></td>
        </tr>
        <tr>
            <td>
                <label class="labelmodal" for="password">Precio Normal: </label>
            </td>
            <td><input class="fecha"  id="precio_normal" name="precio_normal" placeholder="$">
            </td>
        </tr>
        <tr>
            <td><label class="labelmodal" for="password">Descuento: </label>
            </td>
            <td><input class="fecha"  id="descuento" name="descuento" placeholder="%">
            </td>
        </tr>
        <tr>
            <td><label class='labelmodal' for="username">Codigo:</label></td>

            <td><input class="text" id="codigo" name="codigo" placeholder="Ej. IGTRCOD001"></td>
        </tr>
        
        
        <tr>
            <td><label class='labelmodal' for="username">Detalle:</label></td>

            <td><textarea name="descripcion" rows="4" cols="29">Descripción</textarea></td>
        </tr>
        


    </table>
    
<input type="hidden" value="22" name="id_usuario_servicio">
    
        <button class="button" type="button"  onclick="AjaxContainerRegistro('promocion')">Siguiente</button>
</form>{!! Form::close() !!}
</div>
