  <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
        
      }
    </style>
  
          {!! Form::open(array('url'=>'maps','files'=>true)) !!}
          
        <div class='form-group'>
            <label for=''>Title</label>
            <input type="text" class='form-control input-sm' name='title'/>
            
        </div>
        <div class='form-group'>
            <label for=''>map</label>
            <input type="text" id='searchmap'>
            <div id="map"></div>
            
        </div>
        <div class="form-group">
            <label for=''>lat</label>
            <input type="text" class='form-control input-sm' name='lat' id='lat'/>
            
            
        </div>
        <div class="form-group">
            <label for=''>lng</label>
            <input type="text" class='form-control input-sm' name='lng' id='lng'/>
            
        </div>
        <button class="btn btn-sm ">Save</button>
          {!! Form::close() !!}

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDor7F0iN5YavbFiLRA7pY7L8-Rgl89GT8&signed_in=true&libraries=places&callback=initMap" async defer></script>
  
        
     <script>
var map;
var infowindow;

function initMap() {
  

  map = new google.maps.Map(document.getElementById('map'), {
    center: {
         lat:22.7,
         lng:85.36
        
    },
    zoom: 15
  });
  
  var marker= new google.maps.Marker({
      
     position:{
         lat:22.7,
         lng:85.36
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
      $('#lat').val(lat);
      $('#lng').val(lng);
  })
  }
  
    </script>
  </head>
  
  



{!!HTML::script('js/jquery_.js') !!}

   





