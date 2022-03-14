<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Dish;
use App\Restaurant;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DishController extends Controller
{
  protected $validationRules = [
    "name" => "required|string|max:150",
    "price" => "required|numeric",
    "visible" => "sometimes|accepted",
    "description" => "required|string|max:150",
    "ingredients" => "required|string|max:150",
    "image" => "nullable|image|mimes:jpeg,jpg,jpe,bmp,png|max:2048",
  ];

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $dishes = Dish::all()->where("restaurant_id", auth()->id()); //ATTENZIONE: BISOGNA MOSTRARE SOLO I PIATTI DI QUEL RISTORANTE!

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
    $request->validate($this->validationRules);

    $data = $request->all();

    $newDish = new Dish();
    $newDish->name = $data['name'];
    $newDish->price = $data['price'];
    $newDish->visible = $data['visible'];
    $newDish->description = $data['description'];

    $myRestaurant = Restaurant::all()->where('user_id', auth()->id());
    $newDish->restaurant_id = $myRestaurant->id;
    $newDish->course_id = $data['course_id'];

    $newDish->slug = $this->getSlug($newDish->name);

    $newDish->save();

    //**********INDECISI**********
    // if (isset($data["restaurants"])) {
    //   $newDish->restaurants()->sync($data["restaurants"]);
    // }

    return redirect()->route('dishes.show', $newDish->id);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Dish  $dish
   * @return \Illuminate\Http\Response
   */
  public function show(Dish $dish)
  {
    return view("admin.dishes.show", compact('dish'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Dish  $dish
   * @return \Illuminate\Http\Response
   */
  public function edit(Dish $dish)
  {
    $courses = Course::all();

    return view("admin.dishes.edit", compact("courses"));
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
    // validazione
    $request->validate($this->validationRules);

    $data = $request->all();

    //GESTIONE SLUG NEL CASO SIA GIA PRESENTE
    if ($dish->name != $data['name']) {
      $dish->name = $data['name'];

      $slug = Str::slug($dish->name, '-');

      if ($slug != $dish->slug) {
        $dish->slug = $this->getSlug($dish->name);
      }
    }

    $dish->name = $data['name'];
    $dish->price = $data['price'];
    $dish->visible = $data['visible'];
    $dish->description = $data['description'];

    $dish->save();

    //**********INDECISI**********
    // if (isset($data["restaurants"])) {
    //   $newDish->restaurants()->sync($data["restaurants"]);
    // }

    return redirect()->route('dishes.show', $dish->id);
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Dish  $dish
   * @return \Illuminate\Http\Response
   */
  public function destroy(Dish $dish)
  {
    $dish->delete();

    return redirect()->route("home");
  }

  private function getSlug($name)
  {
    $slug = Str::slug($name, '-');
    $i = 1;

    while (Dish::where("slug", $slug)->first()) {
      $slug = Str::slug($name, '-') . "-{$i}";
      $i++;
    }
    return $slug;
  }
}
