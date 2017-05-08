@section('contentImagenes')	

@if(isset($ImgPromociones) && count($ImgPromociones)>0)
{!! Form::open(['url' => route('delete-image1'),  'id'=>'deleteImage']) !!}
<br><br>
        <div class="product-images col-sm-12 box-lg">

            <div id="owl-demo" class="owl-carousel">

                @foreach ($ImgPromociones as $imagen)

                <?php
                $url = "images/icon/" . $imagen->filename
                ?>

                <div class="item">
                    <img src="{!! asset('img/x.png')!!}" onclick='alertaConfirm({!!$imagen->id!!})' style=" width:25px; height:29px; position:absolute; top:2px; right:0px; cursor:pointer;" alt='' />
                    <img src="{{asset($url)}}" href='#' >
                    
            
                    <input type="text" value="{!!$imagen->descripcion_fotografia!!}" name="descripcion_fotografia_{!!$imagen->id!!}" 
                           style='height: 15px;width: 100%;' placeholder='Descripcion' 
                           onchange="AjaxSaveDetailsFotografia1('deleteImage','{!!$imagen->id!!}')">
                </div>
                @endforeach 

            </div>

        </div>
{!! Form::close() !!}
@endif

<style>
    #owl-demo .item{
        margin: 3px;
    }
    #owl-demo .item img{
        display: block;
        width: 100%;
        height: auto;
    }
</style>


<script>
 $(document).ready(function() {
    $("#owl-demo").owlCarousel({
    autoPlay: 5000,
            items : 4,
            itemsDesktop : [1199, 3],
            itemsDesktopSmall : [979, 3]
    });
            });
            
            
            //Funcion para eliminación
            function alertaConfirm(id){
            var r = confirm("Está seguro de que desea eliminar esta imagen?");
                    if (r == true) {
            AjaxContainerRetrunMessageImagen("deleteImage", id);
            $("#flag_image").val('1');
                    } else {
            txt = "Cencelado";
                    }
            }
</script>

@endsection


