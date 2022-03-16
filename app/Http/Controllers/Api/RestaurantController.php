<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
  //richiede tutti i ristoranti nel database
  public function index()
  {
    $restaurants = Restaurant::all();

    return response()->json($restaurants);
  }

  
}
