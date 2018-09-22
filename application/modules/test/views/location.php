<!DOCTYPE html>
<html>
<head>
  <title></title>
  <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true&libraries=places"></script> -->
  <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key="></script>
</head>
<body>
<div id="map" style="width: 100%; height: 300px;"></div>  

<?= $latitude ?>
<script type="text/javascript">
   var a="<?= $last_seen ?>";
function initialize() {
  // console.log($lat);
   var latlng = new google.maps.LatLng(<?= $latitude ?>,<?= $longitude ?>); 
    var map = new google.maps.Map(document.getElementById('map'), {
      center: latlng,
      zoomControl: true,
    mapTypeControl: true,
    scaleControl: true,
    streetViewControl: true,
    overviewMapControl: true,
    rotateControl: true   ,
      zoom: 13
    });
    var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      draggable: true,
      anchorPoint: new google.maps.Point(0, -29),
      title:"<?= $last_seen ?>"
   });
    var infowindow = new google.maps.InfoWindow();   
    google.maps.event.addListener(marker, 'click', function() {
      var iwContent = '<div id="iw_container">' +
      '<div class="iw_title"><b>Location</b> : Noida</div></div>';
      // including content to the infowindow
      infowindow.setContent(iwContent);
      // opening the infowindow in the current map and at the current marker location
      infowindow.open(map, marker);
    });
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
</body>
</html>