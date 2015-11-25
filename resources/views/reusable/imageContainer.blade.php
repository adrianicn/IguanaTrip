
{!! HTML::style('css/imageContainer/gh-buttons.css') !!} 
{!! HTML::style('css/imageContainer/style.css') !!} 
{!! HTML::style('css/imageContainer/responsive.css') !!} 
  
{!!HTML::script('js/imageContainer/lib/jquery-easing-1.3.0.js') !!}
{!!HTML::script('js/imageContainer/lib/modernizr.mediaqueries.transforms3d.js') !!}
{!!HTML::script('js/imageContainer/lib/responsive-hub.js') !!}
{!!HTML::script('js/imageContainer/src/jquery.silver_track.js') !!}
{!!HTML::script('js/imageContainer/src/plugins/jquery.silver_track.navigator.js') !!}
{!!HTML::script('js/imageContainer/src/plugins/jquery.silver_track.bullet_navigator.js') !!}
{!!HTML::script('js/imageContainer/src/plugins/jquery.silver_track.remote_content.js') !!}
{!!HTML::script('js/imageContainer/src/plugins/jquery.silver_track.responsive_hub_connector.js') !!}
{!!HTML::script('js/imageContainer/src/plugins/jquery.silver_track.css3_animation.js') !!}
{!!HTML::script('js/imageContainer/src/plugins/jquery.silver_track.circular_navigator.js') !!}
  
  
  {!!HTML::script('js/imageContainer/script.js') !!}
  {!!HTML::script('js/imageContainer/example7.js') !!}
  
  

  
  <script>
    $(function() {
      $.responsiveHub({
        layouts: {
          480:  "phone",
          481:  "small-tablet",
          731:  "tablet",
          981:  "web"
        },
        defaultLayout: "web"
      });
    });
  </script>

  

{!! Form::open(['url' => route('delete-image'),  'id'=>'deleteImage']) !!}
  <div class="track example-7">
    <div class="inner">
      <h2>Imagenes</h2>

      <div class="view-port">
        <div id="example-7" class="slider-container">
            @foreach ($ImgPromociones as $imagen)
          <div class="item">
              <?php
              $url="images/icon/".$imagen->filename
              ?>
              
              <img src="{{asset($url)}}">
              <a href='#' onclick='AjaxContainerRetrunMessage("deleteImage",{!!$imagen->id!!})' class='basic'>Eliminar</a>
          </div>
            
            @endforeach 
          
        </div>
      </div>
    </div>

    <div class="bullet-pagination"></div>

    <div class="pagination">
      <a href="#" class="prev disabled"></a>
      <a href="#" class="next disabled"></a>
    </div>
  </div>
  {!! Form::close() !!}