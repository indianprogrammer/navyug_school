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
         <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key="></script>
        <!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> -->
    <body>
        <button onclick="initMap();">ff</button>
        <div id="map"></div>
<div id="right-panel">
<div>
    <script type="text/javascript"> 
    function initMap() {
  var directionsService = new google.maps.DirectionsService;
  var directionsDisplay = new google.maps.DirectionsRenderer;
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 6,
    center: {lat: 41.85, lng: -87.65}
  });
  directionsDisplay.setMap(map);

  
    calculateAndDisplayRoute(directionsService, directionsDisplay);
  
}

function calculateAndDisplayRoute(directionsService, directionsDisplay) {
   var markers = [
                ['3fe', 21.2014144,81.2855603]
               
               
            ];
  var waypts = [];
  // var checkboxArray = ;
  console.log(markers.length);
  for (var i = 0; i < markers.length; i++) {
   
      waypts.push({
        location: new google.maps.LatLng(markers[i][1], markers[i][2]),
        stopover: false
      });
    
  }
  console.log(waypts);
  directionsService.route({
     origin: new google.maps.LatLng(21.2023547,81.29218),
    destination: new google.maps.LatLng(21.2027648,81.2911285),
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