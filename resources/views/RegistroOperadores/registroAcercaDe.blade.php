@extends('front.masterPageServicios')

@section('step1')

<div style='display:none'>
    <img src="{!! asset('img/x.png')!!}" alt='' />
</div>
<style>
    #simplemodal-container a.modalCloseImg {
        background:url("{!! asset('img/x.png')!!}") no-repeat;
        width:25px; height:29px; display:inline; z-index:1200; position:absolute; top:-15px; right:-16px; cursor:pointer;}
</style>
<div id="basic-modal-content" class="cls loadModal"></div>

<div class="rowerror">
</div>

<div class="row-step4">
    <div id="title-box-header">
        <div id="title-box-type" style="cursor:pointer;"onclick="window.location.href = '{!!asset('/servicios')!!}'">
            
          <?php switch (session('tip_oper')) {
    case 1:
        $prefix="I'm an ";
        $operadorName="Agency";
        break;
    case 2:
        $prefix="I'm an ";
        $operadorName="Enterprise";
        break;
    case 3:
        $prefix="I'm just";
        $operadorName="Me";
        break;
    
}
?>

           
            <h2 class="head-title">
    {!!$prefix!!}             <strong>{!!$operadorName!!}</strong>
            </h2>
        </div>
        <div id="description-box-type">
            El Paso 2 es la información matriz del establecimeinto y su respectivo administrador o contacto. Por ejemplo existen empresas con varias sucursales, en este formulario se detalla el contacto de quien es responsable del establecimiento matriz y quien será encargado del contenido de la página
        </div>
    </div>
    <div id="space"></div>
     <div id="title-box-header-navigation">
        
           <h2 class="head-title-navigation">
   <a class="button-step4" onclick="window.location.href = '{!!asset('/servicios')!!}'"> 
       <strong><img src="{!! asset('img/flecha-1.png')!!}" height="15px" width="15px" /> Paso 1 </strong></a>
               
            </h2>
    </div>
    
    
    
    <div id="space"></div>

    <div class="wrapper uwa-font-aa">
        <div class="form-group-step2">
            texto...........................
        </div>

    </div>

    <div class="iconoInvitacion">    
                 <a onclick="RenderPartialGeneric('reusable.invitar_amigo')" href="#"><img src="{{ asset('img/amigo-1.png')}}"></a> 
    </div>         
                
</div>

@section('scripts')


{!! HTML::script('/js/jsModal/jquery.simplemodal.js') !!}
{!! HTML::script('/js/jsModal/basic.js') !!}


    

@stop

  <script>
  $(function() {
    var tooltips = $( "[title]" ).tooltip({
      position: {
        my: "left top",
        at: "right+5 top-5"
      }
    });
   
  });
  </script>

@stop