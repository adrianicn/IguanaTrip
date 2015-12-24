@section('parroquias')	               

<div class="form-group-1">
                    {!!Form::label('parroquia_1', 'Parroquia', array('class'=>'control-label','id'=>'iconFormulario-step4'))!!}
                    
                    
                    <select name="id_parroquia" id="id_parroquia" class='inputselect chng'>
@foreach($parroquias as $parroquia)
@if($id_parroquia==$parroquia->id)
<option value="{!!$parroquia->id!!}" selected >{!!$parroquia->nombre!!}</option>
@else
<option value="{!!$parroquia->id!!}" >{!!$parroquia->nombre!!}</option>
@endif
    @endforeach

</select>
                </div>
<div id='descripcionGeografica1'>
                    @section('descripcionGeografica')
                    @show
                    
                </div>


@if (session('parroquia_admin'))
<script>
$('#id_parroquia').on('change', function() {
    var valor=this.value;
  
  GetDataAjaxDescripcion("{!!asset('/getDescripcionGeografica')!!}"+"/"+valor+"/8");
  $('#id_auxiliar').val(valor);
});
</script>   

@endif

@endsection