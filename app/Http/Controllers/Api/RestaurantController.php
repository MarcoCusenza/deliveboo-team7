<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
  // richiede tutti i ristoranti nel database
  // http://localhost:8000/api/restaurants
  public function index()
  {
    $restaurants = Restaurant::all();

    // 404 restaurant slug non trovato
    if (empty($restaurants)) {
      return response()->json(["message" => "There are no restaurants in the database"], 404);
    }

    return response()->json($restaurants);
  }

  // richiede il ristorante cercato
  // http://localhost:8000/api/restaurant/jotaro-sushi
  public function restaurant($slug)
  {
    $restaurants = Restaurant::where("slug", $slug)->first();

    // 404 restaurant slug non trovato
    if (empty($restaurants)) {
      return response()->json(["message" => "Restaurant not found"], 404);
    }

    return response()->json($restaurants);
  }

  // richiede il ristorante cercato + tutti i suoi piatti
  // http://localhost:8000/api/restdish/jotaro-sushi
  public function restdish($slug)
  {
    $restaurants = Restaurant::where("slug", $slug)->with("dishes")->first();

    // 404 restaurant slug non trovato
    if (empty($restaurants)) {
      return response()->json(["message" => "Restaurant not found"], 404);
    }

    return response()->json($restaurants);
  }
}
