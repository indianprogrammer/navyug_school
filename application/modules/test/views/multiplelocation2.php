<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <!-- <link rel="stylesheet" type="text/css" href="master.css"> -->
</head>

<body>

    <h1>My First Google Map</h1>

    <div id="googleMap" style="width:60%;height:800px;"></div>

    <script>
        function detectBrowser() {
            var useragent = navigator.userAgent;
            var mapdiv = document.getElementById("map");
            if (useragent.indexOf('iPhone') != -1 || useragent.indexOf('Android') != -1) {
                mapdiv.style.width = '100%';
                mapdiv.style.height = '100%';
            } else {
                mapdiv.style.width = '600px';
                mapdiv.style.height = '800px';
            }
        }
        var myLatLng;
        var latit;
        var longit;
        function geoSuccess(position) {
            // var latitude = position.coords.latitude;
            // var longitude = position.coords.longitude;
            var directionsService = new google.maps.DirectionsService;
            var directionsDisplay = new google.maps.DirectionsRenderer;
            myLatLng = {
                lat: 53.339964,
                lng:  -6.241972
            };
            var mapProp = {
                //            center: new google.maps.LatLng(latitude, longitude), // puts your current location at the centre of the map,
                zoom: 15,
                mapTypeId: 'roadmap',
            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
            var directionsService = new google.maps.DirectionsService;
            var directionsDisplay = new google.maps.DirectionsRenderer;
            //call renderer to display directions
            directionsDisplay.setMap(map);
            var bounds = new google.maps.LatLngBounds();
            //        var mapOptions = {
            //            mapTypeId: 'roadmap'
            //        };
            // Multiple Markers
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'My location'
            });
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
            // Info Window Content
            var infoWindowContent = [
                ['<div class="info_content">' +
                    '<h3>3fe</h3>' +
                    '<p>32 Grand Canal Street Lower, Grand Canal Dock, Dublin 2</p>' +
                    '<img src="images/3fe.jpg" width="200" height="200">' +
                    '</div>'
                ],
                ['<div class="info_content">' +
                    '<h3>The Fumbally</h3>' +
                    '<p>Fumbally Lane, Dublin 8</p>' +
                    '<img src="images/thefumbally.jpg" width="200" height="200">' +
                    '</div>'
                ],
                ['<div class="info_content">' +
                    '<h3>' + markers[3][0] + '</h3>' +
                    '<p>46 Harrington Street Dublin 8</p>' +
                    '<img src="images/brotherhubbard.jpg" width="200" height="200">' +
                    '</div>'
                ],
                ['<div class="info_content">' +
                    '<h3>Vice Coffee inc</h3>' +
                    '<p>54 Middle Abbey St, Dublin 1</p>' +
                    '<img src="images/vicecoffeeinc.jpg" width="200" height="200">' +
                    '</div>'
                ],
                ['<div class="info_content">' +
                    '<h3>Roasted Brown</h3>' +
                    '<p>1st Floor, Filmbase, Curved Street, Temple Bar, Dublin 2</p>' +
                    '<img src="images/roastedbrown.jpg" width="200" height="200">' +
                    '</div>'
                ],
                ['<div class="info_content">' +
                    '<h3>Kaph</h3>' +
                    '<p>31 Drury St, Dublin 2</p>' +
                    '<img src="images/kaph-6.jpg" width="200" height="200">' +
                    '</div>'
                ],
                ['<div class="info_content">' +
                    '<h3>Fallon & Byrne</h3>' +
                    '<p>17 Exchequer St, Dublin 2</p>' +
                    '<img src="images/fallonandbyrne.jpg" width="200" height="200">' +
                    '</div>'
                ],
                ['<div class="info_content">' +
                    '<h3>Clement & Pekoe</h3>' +
                    '<p>50 South William St, Dublin 2</p>' +
                    '<img src="images/ClementPekoe.jpg" width="200" height="200">' +
                    '</div>'
                ]
            ];
            // Display multiple markers on a map
            var infoWindow = new google.maps.InfoWindow(),
                marker, i;
            // Loop through our array of markers & place each one on the map
            for (i = 0; i < markers.length; i++) {
                var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                bounds.extend(position);
                marker = new google.maps.Marker({
                    position: position,
                    map: map,
                    title: markers[i][0]
                });
                // Allow each marker to have an info window
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infoWindow.setContent(infoWindowContent[i][0]);
                        infoWindow.open(map, marker);
                        latit = marker.getPosition().lat();
                        longit = marker.getPosition().lng();
                        // console.log("lat: " + latit);
                        // console.log("lng: " + longit);
                    }
                })(marker, i));
                marker.addListener('click', function() {
                    directionsService.route({
                        // origin: document.getElementById('start').value,
                        origin: myLatLng,
                        // destination: marker.getPosition(),
                        destination: {
                            lat: latit,
                            lng: longit
                        },
                        travelMode: 'DRIVING'
                    }, function(response, status) {
                        if (status === 'OK') {
                            directionsDisplay.setDirections(response);
                        } else {
                            // window.alert('Directions request failed due to ' + status);
                            wait = true;
                setTimeout("wait = true", 2000);
                        }
                    });
                });
                // Automatically center the map fitting all markers on the screen
                map.fitBounds(bounds);
            }
        }
        // function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        //     directionsService.route({
        //         // origin: document.getElementById('start').value,
        //         origin: myLatLng,
        //         destination: marker.getPosition(),
        //         travelMode: 'DRIVING'
        //     }, function(response, status) {
        //         if (status === 'OK') {
        //             console.log('all good');
        //             directionsDisplay.setDirections(response);
        //         } else {
        //             window.alert('Directions request failed due to ' + status);
        //         }
        //     });
        // }
        function geoError() {
            alert("Geocoder failed.");
        }
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(geoSuccess, geoError);
                // alert("Geolocation is supported by this browser.");
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }
    </script>

    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC29AuoDi4-Bsh-8zPHr-Z2sgJHxSOZn90&callback=geoSuccess"></script>

</body>

</html>