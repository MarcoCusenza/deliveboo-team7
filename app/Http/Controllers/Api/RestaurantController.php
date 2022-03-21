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
    $restaurants = Restaurant::select("*")->paginate(6);

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

  // richiede tutti i ristoranti di una data categoria
  // localhost:8000/api/restaucat/italiano
  public function restaucat($cat)
  {
    $cat_array = explode(',', $cat);

    //whereHas mi permette di prendere restaurants ma dare una clausola sulla tabella categories
    $restaurants = Restaurant::whereHas("categories", function ($query) use ($cat_array) {
      $query->whereIn("slug", $cat_array)->with("categories");
    })->paginate(10);

    // 404 restaurant slug non trovato
    if (empty($restaurants)) {
      return response()->json(["message" => "Restaurant not found"], 404);
    }

    return response()->json($restaurants);
  }
}
