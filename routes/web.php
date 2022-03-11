<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// verify=>true per inviare mail di verifica registrazione
Auth::routes(["verify" => true]);


// Route::get('/', function () {
//   return view('welcome');
// });


Route::prefix("admin")->namespace("Admin")->middleware("verified")->group(
  function () {
    // Route::get('/home', 'HomeController@index')->name('home');
  }
);

// router di Vue
Route::get("{any?}", function () {
  return view("front");
})->where("any", ".*");
