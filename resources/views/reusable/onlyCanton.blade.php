@section('cantones')	
 

<div class="form-group-1">
                    {!!Form::label('canton_1', 'Canton', array('class'=>'control-label','id'=>'iconFormulario-step4'))!!}
                    
                    
                    <select name="id_canton" id="id_canton" class='inputselect chng'>
@foreach($cantones as $canton)

<option value="{!!$canton->id!!}" >{!!$canton->nombre!!}</option>

    @endforeach

</select>
                </div>

<div id='descripcionGeografica1'>
                    @section('descripcionGeografica')
                    @show
                    
                </div>

 
 <script>
$('#id_canton').on('change', function() {
    var valor=this.value;
  
  GetDataAjaxDescripcion("{!!asset('/getDescripcionGeografica')!!}"+"/"+valor+"/7");
  $('#id_auxiliar').val(valor);
});
</script>   

 @endsection