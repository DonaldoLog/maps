<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
  use Mapper;
class MapsController extends Controller
{


public function index()
{
    Mapper::map(19.3910038,-99.2836973, ['zoom' => 4, 'marker' => false,  'eventBeforeLoad' => 'addMarkerListener(map);']);
    return view('map');
}
}
