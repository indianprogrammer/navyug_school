
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script async defer
src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap">
</script>
<style type="text/css">
    html, body, #map {
    height: 100%;
    width: 100%;
    margin: 0px;
    padding: 0px
}
  </style>
</head>
<body>
<div id="map" style="height:400px;width:100"></div>
</body>
</html>


<script>

var locations = [

   ];
var i;
var late=[];
var lnge=[];
// call php array
 var latitude = [{"latitude":37.334818},{"latitude":21.215831}];
 var longitude = [{"longitude":-121.884886},{"longitude":81.454086}];
for(var i=0;i<latitude.length;i++){
 locations.push([latitude[i], longitude[i]]);
}
 console.log(locations);
 console.log(locations[1][0].latitude);

var marker,i;
     function initMap() {
       var map = new google.maps.Map(document.getElementById('map'), {
         zoom: 5,
         center: new google.maps.LatLng(21.215831,81.454086)
       });


// locations.push(["current",test2, test3]);
 // var infowindow = new google.maps.InfoWindow();

 var marker, i;
 // var marker = new google.maps.Marker({
 //          position: new google.maps.LatLng(21.215831,81.454086),
 //          map: map
 //        });
// var flightPlanCoordinates = [];

     for (i = 0; i < locations.length; i++) {  
       marker = new google.maps.Marker({
         position: new google.maps.LatLng(locations[i][0].latitude, locations[i][1].longitude),
         map: map
       });
// flightPlanCoordinates.push(marker.getPosition());
//      google.maps.event.addListener(marker, 'click', (function(marker, i) {
//        return function() {
//          infowindow.setContent(locations[i][0]);
//          infowindow.open(map, marker);
//        }
//      })(marker, i));
//    }
//    var flightPath = new google.maps.Polyline({
//      map: map,
//      path: flightPlanCoordinates,
//      strokeColor: "#ff0000",

//      strokeOpacity: 1.0,
//      strokeWeight: 2
//    });
}
 
   
}
 function initMap() {
  var locations = [

   ];
var i;
var late=[];
var lnge=[];
// call php array
 var latitude = [{"latitude":37.334818},{"latitude":21.215831}];
 var longitude = [{"longitude":-121.884886},{"longitude":81.454086}];
for( i=0;i<latitude.length;i++){
 locations.push([latitude[i], longitude[i]]);
}
// console(locations);
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 3,
          center: {lat: 0, lng: -180},
          mapTypeId: 'terrain'
        });
        for(i=0;i<locations.length;i++)
        {
          late.push(locations[0][0].latitude);
          lnge.push(locations[0][1].longitude);
        }
        
        var flightPlanCoordinates = [
          {lat:'+late+', lng: lnge},
          // {lat: 21.291, lng: -157.821},
          // {lat: -18.142, lng: 178.431},
          // {lat: -27.467, lng: 153.027}
        ];
        var flightPath = new google.maps.Polyline({
          path: flightPlanCoordinates,
          geodesic: true,
          strokeColor: '#FF0000',
          strokeOpacity: 1.0,
          strokeWeight: 2
        });

        flightPath.setMap(map);
      }
</script>