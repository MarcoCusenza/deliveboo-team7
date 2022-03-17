<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
  // richiede tutte le categorie nel database
  //url esempio: http://localhost:8000/api/categories
  public function index()
  {
    $categories = Category::all();

    // 404 category slug non trovato
    if (empty($categories)) {
      return response()->json(["message" => "There are no categories in the database"], 404);
    }

    return response()->json($categories);
  }


  // richiede le categorie cercate
  //url esempio ricerca singola categoria: http://localhost:8000/api/categories/giapponese
  //url esempio ricerca categoria multipla: http://localhost:8000/api/categories/giapponese,italiano
  public function categories($categories)
  {
    $cat_array = explode(',', $categories);
    $cat_final = Category::whereIn("slug", $cat_array)->get();

    // 404 category slug non trovato
    if (empty($cat_final)) {
      return response()->json(["message" => "Category not found"], 404);
    }

    //Si potrebbe implementare il controllo se almeno una delle categorie cercate è vuota o inesistente ma è un po' inutile
    return response()->json($cat_final);
  }


  // richiede tutte le categorie nel database + tutti i ristoranti appartenenti
  //url esempio: http://localhost:8000/api/categorest
  public function indexrest()
  {
    $categories = Category::with("restaurants")->get();

    // 404 category slug non trovato
    if (empty($categories)) {
      return response()->json(["message" => "There are no categories in the database"], 404);
    }

    return response()->json($categories);
  }


  //richiede le categorie cercate + tutti i ristoranti appartenenti
  //url esempio ricerca singola categoria: http://localhost:8000/api/categorest/giapponese
  //url esempio ricerca categoria multipla: http://localhost:8000/api/categorest/giapponese,italiano
  public function categorest($cat)
  {
    $cat_array = explode(',', $cat);
    $cat_final = Category::with("restaurants")->whereIn("slug", $cat_array)->get();

    // 404 category slug non trovato
    if (empty($cat_final)) {
      return response()->json(["message" => "Category not found"], 404);
    }

    //Si potrebbe implementare il controllo: almeno una delle categorie cercate è vuota o inesistente, ma è un po' inutile
    return response()->json($cat_final);
  }
}
