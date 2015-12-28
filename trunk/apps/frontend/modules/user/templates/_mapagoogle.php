<?php
/**
 * @author     Roberto Hernandez De La Luz at Netosfera
 * @date    2011-04-13
 */
?>

<?php use_javascript('busqueda.js') ?>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
  //Se declara la variable map para que sea global
  var map;
   var geocoder;
  
  function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(25.790618, -80.226288);
    var myOptions = {
      zoom: 12,
      center: latlng,
      disableDefaultUI: true,
      navigationControl: false,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    
     google.maps.event.addListener(map, 'click', function(event) {
    placeMarker(event.latLng);
    
    });

  }
  
  function codeAddress() {
    var address = document.getElementById("usuario_direccion_direccion").value;
    if(address.length >= 15){
        geocoder.geocode( { 'address': address + " " + document.getElementById("usuario_direccion_ciudad").value }, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            
            var latlon = results[0].geometry.location;
            
            document.getElementById('usuario_direccion_lon').value = latlon.lng();
            document.getElementById('usuario_direccion_lat').value = latlon.lat();
            
            /*alert("posicion total: " + results[0].geometry.location + " Latitud " + latlon.lat() + " Longitud" + latlon.lng());
            var marker = new google.maps.Marker({
                map: map, 
                position: results[0].geometry.location
            });*/
          } else {
            alert("Geocode was not successful for the following reason: " + status);
          }
        }
        )
    };}
  
  function placeMarker(location) {
  var clickedLocation = new google.maps.LatLng(location);
  var marker = new google.maps.Marker({
      position: location, 
      map: map
  });

  map.setCenter(location);
}

</script>

<body onload="initialize()">
  <img id="loader" src="/images/ajax-loader.gif" style="vertical-align: middle; display: none" />  
  <div id="map_canvas" style="width:600px; height:400px; display: none"></div>
</body>
</html
