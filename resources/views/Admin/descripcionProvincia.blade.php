@section('descripcionGeografica')	

        
        
@foreach ($descripcion as $operadorData)
<?php
$descripcion_esp = $operadorData->descripcion_esp;
$descripcion_eng = $operadorData->descripcion_eng;
$id = $operadorData->id;
?>
@endforeach     




<div class="wrapper uwa-font-aa">
    <div class="form-group-step2">
        <input type="hidden" value="{!!Session::get('user_id')!!}" name="id_usuario" id="id_usuario">


        {!!Form::label('detalle_servicio_1', 'Descripción Español', array("title"=>"Descripcion",'class'=>'control-label-1'))!!}
        <textarea id="descripcion_esp" name="descripcion_esp" class="ptm chng" placeholder="Descripcion" title="Descripción.">{!!trim($descripcion_esp)!!}</textarea>

    </div>
    <div class="form-group-step2">


        {!!Form::label('detalle_servicio_1', 'Descripción Inglés', array("title"=>"Descripcion",'class'=>'control-label-1'))!!}
        <textarea id="descripcion_eng" name="descripcion_eng" class="ptm chng" placeholder="Descripcion" title="Descripción.">{!!trim($descripcion_eng)!!}</textarea>
    </div>

    <div class="form-group-step2">
        <div class="box-content-button-step2">
            <a class="button" onclick="AjaxContainerRegistroWithMessage('postGeoLoc','wrapper','Se ha guardado con éxito')" href="#">Guardar</a>
        </div>
    </div>    
        <div id="secondary-data">
                <div id="promocion"><a class="button-step4" title="Si deseas agregar fotografias de tu servicio puedes hacerlo aquí, nosotros nos encargaremos de darle la publicidad necesaria." onclick="RenderPartialGenericFotografia('reusable.uploadImagePopUp', {!!$typeGeo!!},0, {!!$id!!})" href="#"> <h1 class="h1-agregar">+</h1> Agregar foto</a></div>
            </div>

</div>
  <div id="renderPartialImagenes">
            @section('contentImagenes')
            @show
        </div>
    
<input type="hidden" value="0" id="flag_image">



    {!! HTML::script('/js/jsModal/jquery.simplemodal.js') !!}
    {!! HTML::script('/js/jsModal/basic.js') !!}
    {!!HTML::script('js/loadingScreen/loadingoverlay.min.js') !!}
    {!!HTML::script('js/loadingScreen/loadingoverlay.min.js') !!}
            
    
    


@endsection

