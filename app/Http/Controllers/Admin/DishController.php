<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Dish;
use App\Restaurant;
use App\Course;
use Illuminate\Http\Request;

class DishController extends Controller
{
  protected $validationRules = [
    "restaurant_name" => "required|string|max:150",
    "phone" => "required|string|max:20",
    "address" => "required|string|max:150",
    "image" => "required|image|mimes:jpeg,jpg,jpe,bmp,png|max:2048",
    "delivery_price" => "required|numeric",
  ];

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $dishes = Dish::all(); //ATTENZIONE: BISOGNA MOSTRARE SOLO I PIATTI DI QUEL RISTORANTE!

    return view("admin.dishes.index", compact("dishes"));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $courses = Course::all();

    //ATTENZIONE: COME FACCIO A SAPERE CHI STA MODIFICANDO?
    return view("admin.dishes.create", compact("courses"));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Dish  $dish
   * @return \Illuminate\Http\Response
   */
  public function show(Dish $dish)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Dish  $dish
   * @return \Illuminate\Http\Response
   */
  public function edit(Dish $dish)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Dish  $dish
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Dish $dish)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Dish  $dish
   * @return \Illuminate\Http\Response
   */
  public function destroy(Dish $dish)
  {
    //
  }
}
