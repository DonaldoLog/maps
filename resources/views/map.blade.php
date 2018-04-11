<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
</head>

<body>

  <input id="searchTextField" class='form-control' placeholder="Buscar en Google Maps">
  <div id="results"></div>
  <div style="width: 500px; height: 500px;">
    {!! Mapper::render() !!}
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script type="text/javascript">
    function addMarkerListener(map) {
      var marker;
      function placeMarker(location) {
        if (marker) {
          marker.setPosition(location);
        } else {
          marker = new google.maps.Marker({
            position: location,
            map: map,
            draggable: true
          });
        }
      }
      var input = document.getElementById('searchTextField');
      var autocomplete = new google.maps.places.Autocomplete(input);

      autocomplete.bindTo('bounds', map);
      var infowindow = new google.maps.InfoWindow();
            var infowindowContent = document.getElementById('infowindow-content');
            infowindow.setContent(infowindowContent);
            var marker = new google.maps.Marker({
              map: map,
              anchorPoint: new google.maps.Point(0, -29)
            });

      autocomplete.addListener('place_changed', function(event) {
          console.log('cambiado');
        infowindow.close();
        var place = autocomplete.getPlace();
        console.log(place);
        if (place.geometry.viewport) {
          map.fitBounds(place.geometry.viewport);
            map.setZoom(15);
        } else {
          map.setCenter(place.geometry.location);
          map.setZoom(15);
        }

      });
      map.addListener('click', function(evt) {
        placeMarker(evt.latLng);
        console.log(evt.latLng.lat().toFixed(3));
        console.log(evt.latLng.lng().toFixed(3));
      });

    }
  </script>

</body>

</html>
