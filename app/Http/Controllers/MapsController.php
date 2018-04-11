<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
  use Mapper;
class MapsController extends Controller
{


public function index()
{
  //  Mapper::map(53.381128999999990000, -1.470085000000040000,['draggable' => true,'eventDragEnd' => 'console.log(event.latLng.lat()); console.log(event.latLng.lng());','zoom' => 4, 'marker' => false, 'eventBeforeLoad' => 'addEventListener(map);']);
//Mapper::map(40, -100, ['zoom' => 4, 'marker' => false, 'type' => MapperBase::TYPE_ROADMAP, 'eventBeforeLoad' => 'addEventListener(map);']);
  Mapper::map(19.3910038,-99.2836973, ['zoom' => 4, 'marker' => false, 'eventBeforeLoad' => "
  var marker='';
  function placeMarker(location) {
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
        google.maps.event.addListener(map, 'click', function(evt) {
    dire=evt.latLng;
    console.log('this:'+dire)
    placeMarker(dire);
  });
  var input = document.getElementById('searchTextField');
  var autocomplete = new google.maps.places.Autocomplete(input, {
    types: ['geocode']
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

if (navigator.geolocation) {
  console.log('g');
   navigator.geolocation.getCurrentPosition(function(position) {
     var pos = {
       lat: position.coords.latitude,
       lng: position.coords.longitude
     };

     map.setCenter(pos);
     console.log(pos);
     placeMarker(pos);
     map.setZoom(14);

   }, function() {
     handleLocationError(true, infoWindow, map.getCenter());
   });
 } else {
   // Browser doesn't support Geolocation
   handleLocationError(false, infoWindow, map.getCenter());
 }
  "]);
    return view('map');
}
}
