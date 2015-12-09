@section('contentPanelServicios')	

{!! HTML::style('css/table.css') !!} 
<div id="contenedor-columnas-servicios">
    @if(isset($itinerarios))
    <div id='itinerarios-1'>
        <h1>Itinerarios</h1>
        <ul>
        @foreach ($itinerarios as $itinerario)
        
        <li><div class="listado-1">
                <a class="button-1 white" onclick="redirect('{!!asset('/itinerario')!!}/'+{!!$itinerario->id!!})" href="#">{!!$itinerario->nombre_itinerario!!}</a>
                @if($itinerario->estado_itinerario==1)
                  <label class="switch switch-green">
                            
                        <input type="checkbox" id='estado_itinerario_{!!$itinerario->id!!}' checked name ='estado_itinerario_{!!$itinerario->id!!}' class="switch-input" onchange="AjaxContainerRetrunBurnURL('{!!asset('/estadoItinerarioPrincipal')!!}/',{!!$itinerario->id!!},{!!$itinerario->id!!},'itinerarios')">
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                        
                    </label>
                @else
                
                 <label class="switch switch-green">
                            
                        <input type="checkbox" id='estado_itinerario_{!!$itinerario->id!!}'  name ='estado_itinerario_{!!$itinerario->id!!}' class="switch-input" onchange="AjaxContainerRetrunBurnURL('{!!asset('/estadoItinerarioPrincipal')!!}/',{!!$itinerario->id!!},{!!$itinerario->id!!},'itinerarios')">
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                        
                    </label>
                @endif

            </div> 
         
        </li>
        
        @endforeach
</ul>
    </div>
    @endif
    @if(isset($eventos))
    <div id='eventos-1'>
        <h1>Eventos</h1>
        @foreach ($eventos as $evento)
        
        <li><div class="listado-1">
                <a class="button-1 white" onclick="redirect('{!!asset('/eventos')!!}/'+{!!$evento->id!!})" href="#">{!!$evento->nombre_evento!!}</a>
                @if($evento->estado_evento==1)
                  <label class="switch switch-green">
                            
                        <input type="checkbox" id='estado_evento_{!!$evento->id!!}' checked name ='estado_evento_{!!$evento->id!!}' class="switch-input" onchange="AjaxContainerRetrunBurnURL('{!!asset('/estadoEvento')!!}/',{!!$evento->id!!},{!!$evento->id!!},'eventos')">
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                        
                    </label>
                @else
                
                 <label class="switch switch-green">
                            
                        <input type="checkbox" id='estado_evento_{!!$evento->id!!}'  name ='estado_evento_{!!$evento->id!!}' class="switch-input" onchange="AjaxContainerRetrunBurnURL('{!!asset('/estadoItinerarioPrincipal')!!}/',{!!$evento->id!!},{!!$evento->id!!},'eventos')">
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                        
                    </label>
                @endif
                
            </div>
         
        </li>
        
        @endforeach

    </div>
    @endif
    @if(isset($promociones))
    <div id='promociones-1'>
        <h1>Promociones</h1>
       <ul>
        @foreach ($promociones as $promocion)
        
        <li>
            <div class="listado-1">
            <a class="button-1 white" onclick="redirect('{!!asset('/promocion')!!}/'+{!!$promocion->id!!})" href="#">{!!$promocion->nombre_promocion!!}</a>
                @if($promocion->estado_promocion==1)
                
                <label class="switch switch-green">
                        
                        <input type="checkbox" id='estado_itinerario_{!!$promocion->id!!}' checked name ='estado_itinerario_{!!$promocion->id!!}' class="switch-input" onchange="AjaxContainerRetrunBurnURL('{!!asset('/estadoPromocion')!!}/',{!!$promocion->id!!},{!!$promocion->id!!},'promociones')">
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                        
                    </label>
                @else
                
                 <label class="switch switch-green">
                            
                        <input type="checkbox" id='estado_itinerario_{!!$promocion->id!!}'  name ='estado_itinerario_{!!$promocion->id!!}' class="switch-input" onchange="AjaxContainerRetrunBurnURL('{!!asset('/estadoPromocion')!!}/',{!!$promocion->id!!},{!!$promocion->id!!},'promociones')">
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                        
                    </label>
                @endif
            
            </div> 
        </li>
            
            
        
        @endforeach
</ul>

    </div>
    @endif

</div>

<script>
function redirect($url)
{
    
    window.location.href = $url;
}
</script>


@endsection