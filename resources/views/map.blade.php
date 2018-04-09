<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
</head>

<body>
  <div style="width: 500px; height: 500px;">
    {!! Mapper::render() !!}
  </div>

  <script type="text/javascript">
    google.maps.event.addDomListener(window, 'load', new function() {
      console.log('hola1');

      setTimeout(function() {
        google.maps.event.addListener(maps[0].map, 'click', function(event) {
          console.log('hola');
          maps[0].markers[0].setPosition(event.latLng);
        });
      }, 500);
    });
    var map;
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

    function initialize() {
      var centerPosition = new google.maps.LatLng(19.3910038, -99.2836973);
      var options = {
        zoom: 6,
        center: centerPosition,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      map = new google.maps.Map($('#map')[0], options);
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };

          map.setCenter(pos);
          placeMarker(pos);
          map.setZoom(14);

        }, function() {
          handleLocationError(true, infoWindow, map.getCenter());
        });
      } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
      }

      var input = document.getElementById('searchTextField');
      var autocomplete = new google.maps.places.Autocomplete(input, {
        types: ["geocode"]
      });
      var geocoder = new google.maps.Geocoder;

      autocomplete.bindTo('bounds', map);
      var infowindow = new google.maps.InfoWindow();

      google.maps.event.addListener(autocomplete, 'place_changed', function(event) {
        infowindow.close();
        var place = autocomplete.getPlace();
        if (place.geometry.viewport) {
          map.fitBounds(place.geometry.viewport);
        } else {
          map.setCenter(place.geometry.location);
          map.setZoom(17);
        }

      });
      google.maps.event.addListener(map, 'click', function(evt) {
        placeMarker(evt.latLng);
        $('#latitud').val(evt.latLng.lat().toFixed(3));
        $('#longitud').val(evt.latLng.lng().toFixed(3));
        //geocodeLatLng(geocoder, map, infowindow);
      });
      @isset($sucursal)
      var pos = {
        lat: {!!$sucursal - > latitud!!
        },
        lng: {!!$sucursal - > longitud!!
        }
      };
      map.setCenter(pos);
      @endisset
    }
    google.maps.event.addDomListener(window, 'load', initialize);
  </script>
</body>

</html>
