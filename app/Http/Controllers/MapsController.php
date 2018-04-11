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
  Mapper::map(19.3910038,-99.2836973, ['zoom' => 4, 'marker' => false,  'eventBeforeLoad' => 'addMarkerListener(map);']);
    return view('map');
}
}
