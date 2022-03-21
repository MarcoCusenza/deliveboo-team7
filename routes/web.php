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
// Auth::routes(["verify" => true]);
Auth::routes();


Route::prefix("admin")->namespace("Admin")->middleware("auth")->group(
  function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource("restaurants", "RestaurantController");
    Route::resource("dishes", "DishController");
  }
);

//rotta braintree
Route::get('/payment/make', 'PaymentController@make')->name('payment.make');

// Route::get('/', function () {
//   return view('front');
// });

// router di Vue
Route::get("{any?}", function () {
  return view("front");
})->where("any", ".*");
