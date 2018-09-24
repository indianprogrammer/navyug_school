<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
  <title>Lat long way points (LatLng)</title>
  <style type="text/css"> 
  html { height: 100% }
  body { height: 100%; margin: 0px; padding: 0px }
</style>
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyDxKROLmdQsfDBWcKVprRXVQ_Hf-wFulFU"></script>
<!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> -->
<body>
  <button onclick="initMap();">ff</button>
  <div id="map"></div>
  <div id="right-panel">
    <div id="directions-panel"></div>
  </div>
  <?php var_dump($student_location[0]['latitude']); ?>
  <?php var_dump($student_location[0]['longitude']); ?>
  <script type="text/javascript"> 
    function initMap() {
      var directionsService = new google.maps.DirectionsService;
      var directionsDisplay = new google.maps.DirectionsRenderer;
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 6,
        center:new google.maps.LatLng(21.7804096,81.3457252)
      });
     
      directionsDisplay.setMap(map);


      calculateAndDisplayRoute(directionsService, directionsDisplay);

    }

    function calculateAndDisplayRoute(directionsService, directionsDisplay) {
      var markers = [
    
       ['3fe', 21.2014144,81.2855203],
        ['3fe', 21.2283236,81.4292635],
['dd',21.7923461,81.1496711]

      ];
      var waypts = [];
// var checkboxArray = ;
// console.log(markers.length);
for (var i = 0; i < markers.length; i++) {

  waypts.push({
    location: new google.maps.LatLng(markers[i][1], markers[i][2]),
    stopover: true
  });

}
console.log(waypts);
directionsService.route({
  origin: new google.maps.LatLng(21.7719003,81.3478709),
  destination: new google.maps.LatLng(21.2023567,81.29218),
  waypoints: waypts,
  optimizeWaypoints: true,
  travelMode: 'DRIVING'
}, function(response, status) {
  if (status === 'OK') {
    directionsDisplay.setDirections(response);
    var route = response.routes[0];
    var summaryPanel = document.getElementById('directions-panel');
    summaryPanel.innerHTML = '';
// For each route, display summary information.
for (var i = 0; i < route.legs.length; i++) {
  var routeSegment = i + 1;
  summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment +
  '</b><br>';
  summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
  summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
  summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
}
} else {
  window.alert('Directions request failed due to ' + status);
}
});
}
</script>
</body>
</html>