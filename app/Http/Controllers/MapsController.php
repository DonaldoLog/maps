<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
  use Mapper;
class MapsController extends Controller
{


public function index()
{
    Mapper::map(53.381128999999990000, -1.470085000000040000,['draggable' => true]);
  
    return view('map');
}
}
