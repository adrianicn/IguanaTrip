@section('contentImagenes')	

{!! HTML::style('css/imageAjax/owl.carousel.css') !!}
{!! HTML::style('css/imageAjax/owl.theme.css') !!}
{!! HTML::style('css/imageAjax/prettify.css') !!}



@if(isset($ImgPromociones) && count($ImgPromociones)>0)
{!! Form::open(['url' => route('delete-image'),  'id'=>'deleteImage']) !!}

<div class="container">
    <div class="row">
        <div class="span12">

            <div id="owl-demo" class="owl-carousel">


                @foreach ($ImgPromociones as $imagen)

                <?php
                $url = "images/icon/" . $imagen->filename
                ?>

                <div class="item">
                    <img src="{!! asset('img/x.png')!!}" onclick='alertaConfirm({!!$imagen->id!!})' style=" width:25px; height:29px; position:absolute; top:2px; right:0px; cursor:pointer;" alt='' />
                    <img src="{{asset($url)}}" href='#' >

                </div>

                @endforeach 

            </div>

        </div>
    </div>
</div>


{!! Form::close() !!}
@endif


{!! HTML::script('js/imageAjax/owl.carousel.js') !!}
<!-- Demo -->

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
            AjaxContainerRetrunMessage("deleteImage", id);
            $("#flag_image").val('1');
                    } else {
            txt = "Cencelado";
                    }
            }
</script>


{!! HTML::script('js/imageAjax/bootstrap-collapse.js') !!}
{!! HTML::script('js/imageAjax/bootstrap-transition.js') !!}
{!! HTML::script('js/imageAjax/bootstrap-tab.js') !!}
{!! HTML::script('js/imageAjax/prettify.js') !!}
{!! HTML::script('js/imageAjax/application.js') !!}





@endsection


