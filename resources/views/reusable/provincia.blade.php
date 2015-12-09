@section('provincias')	
 

<div class="form-group-1">
                    {!!Form::label('provincia_1', 'Provincia', array('class'=>'control-label','id'=>'iconFormulario-step4'))!!}
                    
                    
                    <select name="id_provincia" id="sports" class='inputselect chng'>
@foreach($provincias as $provincia)
<option value="{!!$provincia->id!!}" >{!!$provincia->nombre!!}</option>
    @endforeach

</select>
                </div>

 @endsection