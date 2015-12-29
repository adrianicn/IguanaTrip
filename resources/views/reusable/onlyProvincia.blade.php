@section('provincias')	
 

<div class="form-group-1">
                    {!!Form::label('provincia_1', 'Provincia', array('class'=>'control-label','id'=>'iconFormulario-step4'))!!}
                    
                    
                    <select name="id_provincia" id="id_provincia" class='inputselect chng'>
@foreach($provincias as $provincia)
<option value="{!!$provincia->id!!}"  >{!!$provincia->nombre!!}</option>
    @endforeach

</select>
                </div>

<div id='descripcionGeografica1'>
                    @section('descripcionGeografica')
                    @show
                    
                </div>

 <script>
$('#id_provincia').on('change', function() {
    var valor=this.value;
  
GetDataAjaxDescripcion("{!!asset('/getDescripcionGeografica')!!}"+"/"+valor+"/6");
  $('#id_auxiliar').val(valor);
});
</script>   







@endsection