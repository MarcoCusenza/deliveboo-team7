<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
  public function index()
  {
    //leggere solo i post pubblicati
    $categories = Category::all();

    return response()->json($categories);
  }
}
