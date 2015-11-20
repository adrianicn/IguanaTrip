@section('contentPanel')	
{!! HTML::style('css/jquery-labelauty.css') !!} 

 
<div class="datagrid">

        <table>
            <thead><tr><th>Tipo</th><th>Descripcion</th><th>Opcion</th></tr></thead>

            <tbody>
                
                @foreach($diffic as $dificult)
            <tr>
                    <td> <img src="{!! asset('images/eat.png')!!}" alt="" /></td>
                    <td>


                        <h2 class='titletable'>
                            {!!$dificult->nombre_dificultad!!}
                        </h2>
                        </td>
                    <td><input class="demo labelauty" name="id" id="checkbox-1" value="1" type="checkbox" data-labelauty="No|Si "checked/></td>
                </tr>
    @endforeach
                
                

            </tbody>
        </table>
        
      
        
    </div>
@section('scripts')
{!! HTML::script('/js/registro/registroajax_serviciooperador.js') !!}
{!!HTML::script('js/jquery-labelauty.js') !!}
@stop
    
@endsection