@section('contentPanelServicios')	

{!! HTML::style('css/table.css') !!} 
<div>
    @if(isset($itinerarios))
    <div id='itinerarios'>
        <h1>Itinerarios</h1>
        <ul>
        @foreach ($itinerarios as $itinerario)
        
        <li><div>
                
                
                <a class="button-1 white" onclick="redirect('/IguanaTrip/public/itinerario/'+{!!$itinerario->id!!})" href="#">{!!$itinerario->nombre_itinerario!!}</a>
            </div> 
            <div>
                @if($itinerario->estado_itinerario==1)
                  <label class="switch switch-green">
                            
                        <input type="checkbox" id='estado_itinerario_{!!$itinerario->id!!}' checked name ='estado_itinerario_{!!$itinerario->id!!}' class="switch-input" onchange="AjaxContainerRetrunBurnURL('/IguanaTrip/public/estadoItinerarioPrincipal/',{!!$itinerario->id!!},{!!$itinerario->id!!},'itinerarios')">
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                        
                    </label>
                @else
                
                 <label class="switch switch-green">
                            
                        <input type="checkbox" id='estado_itinerario_{!!$itinerario->id!!}'  name ='estado_itinerario_{!!$itinerario->id!!}' class="switch-input" onchange="AjaxContainerRetrunBurnURL('/IguanaTrip/public/estadoItinerarioPrincipal/',{!!$itinerario->id!!},{!!$itinerario->id!!},'itinerarios')">
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
    <div id='eventos'>
        <h1>Eventos</h1>
        @foreach ($eventos as $evento)
        
        <li><div>
                
                
                <a class="button-1 white" onclick="redirect('/IguanaTrip/public/eventos/'+{!!$evento->id!!})" href="#">{!!$evento->nombre_evento!!}</a>
            </div> 
            <div>
                @if($evento->estado_evento==1)
                  <label class="switch switch-green">
                            
                        <input type="checkbox" id='estado_evento_{!!$evento->id!!}' checked name ='estado_evento_{!!$evento->id!!}' class="switch-input" onchange="AjaxContainerRetrunBurnURL('/IguanaTrip/public/estadoEvento/',{!!$evento->id!!},{!!$evento->id!!},'eventos')">
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                        
                    </label>
                @else
                
                 <label class="switch switch-green">
                            
                        <input type="checkbox" id='estado_evento_{!!$evento->id!!}'  name ='estado_evento_{!!$evento->id!!}' class="switch-input" onchange="AjaxContainerRetrunBurnURL('/IguanaTrip/public/estadoItinerarioPrincipal/',{!!$evento->id!!},{!!$evento->id!!},'eventos')">
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
    <div id='promociones'>
        <h1>Promociones</h1>
       <ul>
        @foreach ($promociones as $promocion)
        
        <li><div>
            <a class="button-1 white" onclick="redirect('/IguanaTrip/public/promocion/'+{!!$promocion->id!!})" href="#">{!!$promocion->nombre_promocion!!}</a>
            </div> 
            
            
            <div>
                @if($promocion->estado_promocion==1)
                
                <label class="switch switch-green">
                        
                        <input type="checkbox" id='estado_itinerario_{!!$promocion->id!!}' checked name ='estado_itinerario_{!!$promocion->id!!}' class="switch-input" onchange="AjaxContainerRetrunBurnURL('/IguanaTrip/public/estadoPromocion/',{!!$promocion->id!!},{!!$promocion->id!!},'promociones')">
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                        
                    </label>
                @else
                
                 <label class="switch switch-green">
                            
                        <input type="checkbox" id='estado_itinerario_{!!$promocion->id!!}'  name ='estado_itinerario_{!!$promocion->id!!}' class="switch-input" onchange="AjaxContainerRetrunBurnURL('/IguanaTrip/public/estadoPromocion/',{!!$promocion->id!!},{!!$promocion->id!!},'promociones')">
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