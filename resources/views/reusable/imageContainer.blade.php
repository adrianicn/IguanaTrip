{!! HTML::style('css/imageContainer/tinycarousel.css') !!}
{!! HTML::script('js/imageContainer/example7.js') !!}

@if(isset($ImgPromociones))
{!! Form::open(['url' => route('delete-image'),  'id'=>'deleteImage']) !!}
<div id="slider1">
    <a class="buttons prev" href="#">&#60;</a>
    <div class="viewport">
        <ul class="overview">
            @foreach ($ImgPromociones as $imagen)
            <li>
                <?php
                $url = "images/icon/" . $imagen->filename
                ?>
                <img src="{{asset($url)}}" href='#' onclick='AjaxContainerRetrunMessage("deleteImage", {!!$imagen -> id!!})'>
                
            </li>
            @endforeach 
        </ul>
    </div>
    <a class="buttons next" href="#">&#62;</a>
</div>

{!! Form::close() !!}
@endif
@section('scripts')
{!! HTML::script('js/imageContainer/jquery.tinycarousel.js') !!}

<script type="text/javascript">
            $(document).ready(function()
    {
    $('#slider1').tinycarousel();
    });
    



</script>
    {!! HTML::script('/js/jsModal/jquery.simplemodal.js') !!}
    {!! HTML::script('/js/jsModal/basic.js') !!}

@stop


