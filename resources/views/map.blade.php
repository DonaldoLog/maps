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
  <script
  			  src="https://code.jquery.com/jquery-3.3.1.min.js"
  			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  			  crossorigin="anonymous"></script>
          <script type="text/javascript">
              var marker="";
          function placeMarker(location,map) {
            if (marker) {
              console.log('marjer');
            marker.setPosition(location);
            } else {
              console.log('marjer2');

            marker = new google.maps.Marker({
            position: location,
            map: map,
            draggable: true
            });
            }
            }

          </script>







</body>

</html>
