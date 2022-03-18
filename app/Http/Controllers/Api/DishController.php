<?php

namespace App\Http\Controllers\Api;

use App\Dish;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DishController extends Controller
{
  // richiede tutti i piatti VISIBILI di un dato ristorante
  // http://localhost:8000/api/dishes/jotaro-sushi
  public function dishes($slug)
  {
    $dishes = Dish::where("visible", 1)->whereHas("restaurant", function ($query) use ($slug) {
      return $query->where("slug", $slug);
    })->get();

    // 404 restaurant slug non trovato
    if (empty($dishes)) {
      return response()->json(["message" => "Restaurant not found"], 404);
    }

    return response()->json($dishes);
  }
}
