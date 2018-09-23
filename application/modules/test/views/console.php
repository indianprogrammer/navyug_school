<div id="map_canvas" style="float:left;width:70%;height:100%;"></div>
<div id="control_panel" style="float:right;width:30%;text-align:left;padding-top:20px">
<div id="directions_panel" style="margin:20px;background-color:#FFEE77;"></div>
</div>

	 <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key="></script>
<script type="text/javascript">

var directionDisplay;
  var directionsService = new google.maps.DirectionsService();
  var map;
   
  function initialize() {
                // console.log(t);
    directionsDisplay = new google.maps.DirectionsRenderer();
    var chicago = new google.maps.LatLng(41.850033, -87.6500523);
    var myOptions = {
      zoom: 6,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      center: chicago
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    directionsDisplay.setMap(map);
    
    calcRoute();
  }
  
  function calcRoute() {
var markers = [
                ['3fe', 53.339964, -6.241972],
                ['The Fumbally', 53.337031, -6.272995],
                ['Coffeeangel', 53.343963, -6.262116],
                ['Brother Hubbard', 53.332744, -6.265639],
                ['Vice Coffee Inc.', 53.347829, -6.262295],
                ['Roasted Brown', 53.344813, -6.264707],
                ['Kaph', 53.342599, -6.263272],
                ['Fallon & Byrne', 53.343151, -6.263287],
                ['Clement & Pekoe', 53.341534, -6.26276],
                ['my current location', 53.343151, -7.263287]
            ];
            var s=[];
            var t=[];
 for (i = 0; i < markers.length; i++) {
                s.push(markers[i][1]);
                }
                for (i = 0; i < markers.length; i++) {
                t.push(markers[i][2]);
                }
                console.log(s[0]);
    var request = {
        origin: "1521 NW 54th St, Seattle, WA 98107 ",
        destination: "San Diego, CA",
        waypoints: [{
        
            location:new google.maps.LatLng(s[0],t[0]),
          stopover:false}],
        optimizeWaypoints: true,
        travelMode: google.maps.DirectionsTravelMode.WALKING
    };
    directionsService.route(request, function(response, status) {
      if (status == google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(response);
        var route = response.routes[0];
        var summaryPanel = document.getElementById("directions_panel");
        summaryPanel.innerHTML = "";
        // For each route, display summary information.
        for (var i = 0; i < route.legs.length; i++) {
          var routeSegment = i + 1;
          summaryPanel.innerHTML += "<b>Route Segment: " + routeSegment + "</b><br />";
          summaryPanel.innerHTML += route.legs[i].start_address + " to ";
          summaryPanel.innerHTML += route.legs[i].end_address + "<br />";
          summaryPanel.innerHTML += route.legs[i].distance.text + "<br /><br />";
        }
      } else {
        alert("directions response "+status);
      }
    });
  }

google.maps.event.addDomListener(window, "load", initialize);
</script>