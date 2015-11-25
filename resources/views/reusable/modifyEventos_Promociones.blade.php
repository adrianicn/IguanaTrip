@section('contentPanelServicios')	

{!! HTML::style('css/table.css') !!} 
<div>
    @if(isset($itinerarios))
    <div id='itinerarios'>
        <h1>Itinerarios</h1>
        <ul>
        @foreach ($itinerarios as $itinerario)
        
        <li><div>{!!$itinerario->nombre_itinerario!!}</div> 
         <label class="switch switch-green">
                        <input type="checkbox" id='estado_itinerario_{!!$itinerario->id!!}' checked name ='estado_itinerario_{!!$itinerario->id!!}' class="switch-input" onchange="AjaxContainerRetrunMessage({!!$itinerario->id!!},{!!$itinerario->id!!})">
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                        
                    </label>
        </li>
            
            
        
        @endforeach
</ul>
    </div>
    @endif
    @if(isset($eventos))
    <div id='eventos'>
        <h1>Eventos</h1>
        @foreach ($eventos as $evento)
        @endforeach

    </div>
    @endif
    @if(isset($promociones))
    <div id='promociones'>
        <h1>Promociones</h1>
       <ul>
        @foreach ($promociones as $promocion)
        
        <li><div>{!!$promocion->nombre_promocion!!}</div> 
         <label class="switch switch-green">
                        <input type="checkbox" id='estado_promocion_{!!$promocion->id!!}' checked name ='estado_itinerario_{!!$promocion->id!!}' class="switch-input" onchange="AjaxContainerRetrunMessage({!!$promocion->id!!},{!!$promocion->id!!})">
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                        
                    </label>
        </li>
            
            
        
        @endforeach
</ul>

    </div>
    @endif

</div>




@endsection