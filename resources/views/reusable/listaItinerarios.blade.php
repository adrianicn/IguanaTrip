@section('contentPanel')	

{!! HTML::style('css/table.css') !!} 


 
   
    

<div class="testboxFormulario">
    <div id="table" class="table-editable">

  
        <div class="section">Detalle Itinerario</div>

        <span  class="table-add glyphicon glyphicon-plus" onclick="RenderPartialGenericMap('reusable.createNewPuntoItinerario',{!!$id_itinerario!!})"></span>

<a class="button" onclick="RenderPartialGenericMap('reusable.createNewPuntoItinerario',{!!$id_itinerario!!})" href="#">Agregar</a>

        <div class="inner-wrap">
        
    
        <table class="table">
            <tr>
                <th>Punto</th>
                <th>Estado</th>
                <th></th>
                <th></th>
            </tr>

           
            @foreach ($listItinerarios as $detalle)

            <tr>
               
                <td>
                
                <a class="button" onclick="RenderPartialGenericMapUpdate('reusable.createNewPuntoItinerario',{!!$id_itinerario!!},{!!$detalle->id!!})" href="#">{!!$detalle->lugar_punto!!}</a>
                </td>
               

                <td> 
                
                </td>

            <input type="hidden" value="xxx" name="usuario_servicio">
            <td>
                <span class="table-remove glyphicon glyphicon-remove"></span>
            </td>
            
            
            </tr>
            
            @endforeach 

            <!-- This is our clonable table line -->
            <tr class="hide">
                <td contenteditable="true">Untitled</td>
                <td contenteditable="true">undefined</td>
                <td>
                    <span class="table-remove glyphicon glyphicon-remove"></span>
                </td>
                <td>
                  
                </td>
            </tr>
        </table>
          
    </div>
        <br>
    </div>
    </div>
    
    
@section('scripts')
{!! HTML::script('/js/tabla_dinamica.js') !!}
{!! HTML::script('/js/jsModal/jquery.simplemodal.js') !!}
{!! HTML::script('/js/jsModal/basic.js') !!}

@stop



    


@endsection