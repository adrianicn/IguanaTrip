@extends('front.masterPageServicios')

@section('step1')
{!! HTML::style('css/jquery-labelauty.css') !!} 
{!!HTML::script('js/jquery-labelauty.js') !!}

<div class="rowerror">
</div>
<div class="row">
    {!! Form::open(['url' => route('upload-postTipoOperador'),  'id'=>'registro_step1']) !!}



    <div class="datagrid"><table>
            <thead><tr><th>Tipo</th><th>Descripcion</th><th>Seleccion</th></tr></thead>
            <tfoot><tr><td colspan="4"><div id="paging"><ul><li><a href="#"><span>Previous</span></a></li><li><a href="#" class="active"><span>1</span></a></li><li><a href="#"><span>2</span></a></li><li><a href="#"><span>3</span></a></li><li><a href="#"><span>4</span></a></li><li><a href="#"><span>5</span></a></li><li><a href="#"><span>Next</span></a></li></ul></div></tr></tfoot>
            <tbody><tr>
                    <td> <img src="{!! asset('images/eat.png')!!}" alt="" /></td>
                    <td>ejemplo(Restaurantes,bares,pizzerias)</td>
                    <td><input class="demo synch-icon" name="locationthemes" id="checkbox-1" value="1" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio" checked/></td>
                    </tr>
                <tr class="alt"><td>data</td><td>data</td><td>data</td></tr>
                <tr><td>data</td><td>data</td><td>data</td></tr>
                <tr class="alt"><td>data</td><td>data</td><td>data</td></tr>
                <tr><td>data</td><td>data</td><td>data</td></tr>
            </tbody>
        </table></div>

    <ul>
        <li class="header"> Labeled Check Boxes </li>
        <li>
            
        </li>
        <li>

            <input class="demo synch-icon"  name="locationthemes" id="checkbox-2" value="2" type="checkbox" data-labelauty="Don't synchronize files|Synchronize my files" checked/>
        </li>

    </ul>

    {!! Form::close() !!}
    <div id="target">
        Click here
    </div>

</div>

<script>



    $("#target").click(function () {
        $('input:checkbox').each(function ()
        {
            if ($(this).is(':checked'))
                alert($(this).val());
        });
    });
    $(document).ready(function () {



        $(".demo").labelauty({
// Development Mode
// This will activate console debug messages
            development: false,
// Trigger Class
// This class will be used to apply styles
            class: "labelauty",
// Use text label ?
// If false, then only an icon represents the input
            label: true,
// Separator between labels' messages
// If you use this separator for anything, choose a new one
            separator: "|",
// Default Checked Message
// This message will be visible when input is checked
            checked_label: "Checked",
// Default UnChecked Message
// This message will be visible when input is unchecked
            unchecked_label: "Unchecked",
// Minimum Label Width
// This value will be used to apply a minimum width to the text labels
            minimum_width: false,
// Use the greatest width between two text labels ?
// If this has a true value, then label width will be the greatest between labels
            same_width: true
        });
    });
</script>
@section('scripts')

<!-- End Dropzone Preview Template -->
{!! HTML::script('/js/registro/registroajax.js') !!}
@stop

@stop