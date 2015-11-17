
  <style>
      
      #map {
      
width:481px;height:344px
        
      }
    </style>
  
          
        <div class='form-group'>
            <label for=''>map</label>
            <input type="text" id='searchmap'>
            <div id="map"></div>
            
        </div>
        <div class="form-group">
            <label for=''>Latitud</label>
            <input type="text" class='form-control input-sm' name='latitud_servicio' value="{!!$latitud_servicio!!}" id='latitud_servicio'/>
            
            
        </div>
        <div class="form-group">
            <label for=''>Longitud</label>
            <input type="text" class='form-control input-sm' name='longitud_servicio' value="{!!$longitud_servicio!!}" id='longitud_servicio'/>
            
        </div>
        
          
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDor7F0iN5YavbFiLRA7pY7L8-Rgl89GT8&signed_in=true&libraries=places&callback=initMap" async defer></script>
  
        
     <script>
         
var map;
var infowindow;

function initMap() {
  

  map = new google.maps.Map(document.getElementById('map'), {
    center: {
         lat:-0.0972178,
         lng:-78.49366320000001
        
    },
    zoom: 15
  });
  
  var marker= new google.maps.Marker({
      
     position:{
         lat:-0.0972178,
         lng:-78.49366320000001
     },
     map:map,
     draggable:true
  });
  
  var searchBox=new google.maps.places.SearchBox(document.getElementById('searchmap'));
  google.maps.event.addListener(searchBox,'places_changed',function(){
      var places=searchBox.getPlaces();
      var bounds=new google.maps.LatLngBounds();
      var i,place;
      for(i=0;place=places[i];i++){
          bounds.extend(place.geometry.location);
          marker.setPosition(place.geometry.location);
      }
      map.fitBounds(bounds);
      map.setZoom(15);
      
  });
  google.maps.event.addListener(marker,'position_changed',function(){
      
      var lat=marker.getPosition().lat();
      var lng=marker.getPosition().lng;
      $('#latitud_servicio').val(lat);
      $('#longitud_servicio').val(lng);
  })
  }
  
  
    </script>
  </head>
  
  



{!!HTML::script('js/jquery_.js') !!}

   





