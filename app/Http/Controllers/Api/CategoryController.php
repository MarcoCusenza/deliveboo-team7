<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
  //richiede tutte le categorie nel database
  public function index()
  {
    $categories = Category::all();

    return response()->json($categories);
  }

  //richiede una categoria con tutti i suoi ristoranti
  public function show($slug)
  {
    $category = Category::where("slug", $slug)->with(["restaurants"])->first();

    // 404 category slug non trovato
    if (empty($category)) {
      return response()->json(["message" => "Category not found"], 404);
    }

    return response()->json($category);
  }


  public function resOfCat($categories)
  {
    $prova = Category::with("restaurants")->whereIn("slug", [""])->get();

    return response()->json($prova);
  }

}
