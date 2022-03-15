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
    "price" => "required|numeric|max:99999",
    "visible" => "sometimes|accepted",
    "description" => "nullable|string|max:150",
    "ingredients" => "required|string|max:150",
    "image" => "nullable|image|mimes:jpeg,jpg,jpe,bmp,png|max:4096",
  ];

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $myRestaurant = Restaurant::first()->where("user_id", auth()->id())->get();
    $dishes = Dish::all()->where("restaurant_id", $myRestaurant[0]->id);

    return view("admin.dishes.index", compact("dishes"));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    // LA POLICY SULLA CREATE NON SERVE, UN UTENTE REGISTRATO PUO' SEMPRE CREARE UN NUOVO PIATTO CHE VERRA' AGGIUNTO AL SUO RISTORANTE

    $courses = Course::all();

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
    if (isset($data["visible"])) {
      $newDish->visible = true;
    }
    $newDish->description = $data['description'];
    $newDish->ingredients = $data['ingredients'];


    $myRestaurant = Restaurant::first()->where('user_id', auth()->id())->get();
    $newDish->restaurant_id = $myRestaurant[0]->id;
    $newDish->course_id = $data['course_id'];

    $newDish->slug = $this->getSlug($newDish->name);

    $newDish->save();

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
    // The current user can view this dish?
    $this->authorize('view', $dish);

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
    // The current user can edit this dish?
    $this->authorize('update', $dish);

    $courses = Course::all();

    return view("admin.dishes.edit", compact("dish", "courses"));
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
    if (isset($data["visible"])) {
      $dish->visible = true;
    }
    $dish->description = $data['description'];

    $dish->save();

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
    // The current user can delete this dish?
    $this->authorize('delete', $dish);

    //CANCELLAZIONE IMMAGINE
    // if ($dish->image) {
    //     Storage::delete($dish->image);
    // }

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
