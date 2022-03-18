<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


// ____CATEGORIES____
// ___________________

// richiede tutte le categorie nel database
// http://localhost:8000/api/categories
Route::get("/categories", "Api\CategoryController@index");

// richiede le categorie cercate
// http://localhost:8000/api/categories/giapponese
// http://localhost:8000/api/categories/giapponese,italiano
Route::get("/categories/{slug}", "Api\CategoryController@categories");

// richiede tutte le categorie nel database + tutti i ristoranti appartenenti
// http://localhost:8000/api/categorest
Route::get("/categorest", "Api\CategoryController@indexrest");

// richiede le categorie cercate + tutti i ristoranti appartenenti
// http://localhost:8000/api/categorest/giapponese
// http://localhost:8000/api/categorest/giapponese,italiano
Route::get("/categorest/{slug}", "Api\CategoryController@categorest");



// ____RESTAURANTS____
// ___________________

// richiede tutti i ristoranti nel database
// http://localhost:8000/api/restaurants
Route::get("/restaurants", "Api\RestaurantController@index");


// richiede il ristorante cercato
// http://localhost:8000/api/restaurant/jotaro-sushi
Route::get("/restaurant/{slug}", "Api\RestaurantController@restaurant");



// ____DISHES____
// ______________

// richiede tutti i piatti VISIBILI di un dato ristorante
// http://localhost:8000/api/dishes/jotaro-sushi
Route::get("/dishes/{slug}", "Api\DishController@dishes");
