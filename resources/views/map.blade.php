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
  </script>
</body>

</html>
