<?php

namespace App\Http\Controllers\Admin;

use App\Restaurant;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
  protected $validationRules = [
    "restaurant_name" => "required|string|max:150",
    "phone" => "required|regex:/[0-9]/|min:8|max:15", //FIXARE LA REGEX
    "address" => "required|string|max:150",
    "delivery_price" => "required|numeric|max:99",
    "categories" => "required|min:1"
  ];
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // $this->authorize('viewAny', Restaurant::class);

    $restaurants = Restaurant::all()->where("user_id", auth()->id());

    return view("admin.restaurants.index", compact("restaurants"));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    // The current user can create this restaurant?
    $this->authorize('create', Restaurant::class);

    $categories = Category::all();

    return view("admin.restaurants.create", compact("categories"));
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

    $request->validate([
      "image" => "required|mimes:jpeg,jpg,jpe,bmp,png|max:4096",
    ]);

    $data = $request->all();
    $newRestaurant = new Restaurant();
    $newRestaurant->restaurant_name = $data['restaurant_name'];
    $newRestaurant->phone = $data['phone'];
    $newRestaurant->address = $data['address'];
    $newRestaurant->delivery_price = $data['delivery_price'];

    $newRestaurant->slug = $this->getSlug($newRestaurant->restaurant_name);

    $path_image = Storage::put("uploads", $data["image"]);
    $newRestaurant->image = $path_image;

    $newRestaurant->user_id = auth()->id();

    $newRestaurant->save();

    if (isset($data["categories"])) {
      $newRestaurant->categories()->sync($data["categories"]);
    }

    return redirect()->route('restaurants.show', $newRestaurant->id);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Restaurant  $restaurant
   * @return \Illuminate\Http\Response
   * @throws \Illuminate\Auth\Access\AuthorizationException
   */
  public function show(Restaurant $restaurant)
  {
    // The current user can view this restaurant?
    $this->authorize('view', $restaurant);

    return view("admin.restaurants.show", compact('restaurant'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Restaurant  $restaurant
   * @return \Illuminate\Http\Response
   */
  public function edit(Restaurant $restaurant)
  {
    // The current user can edit this restaurant?
    $this->authorize('update', $restaurant);

    $categories = Category::all();

    return view("admin.restaurants.edit", compact("restaurant", "categories"));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Restaurant  $restaurant
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Restaurant $restaurant)
  {
    // validazione
    $request->validate($this->validationRules);

    $data = $request->all();

    //GESTIONE SLUG NEL CASO SIA GIA PRESENTE
    if ($restaurant->restaurant_name != $data['restaurant_name']) {
      $restaurant->restaurant_name = $data['restaurant_name'];

      $slug = Str::slug($restaurant->restaurant_name, '-');

      if ($slug != $restaurant->slug) {
        $restaurant->slug = $this->getSlug($restaurant->restaurant_name);
      }
    }

    $restaurant->restaurant_name = $data['restaurant_name'];
    $restaurant->phone = $data['phone'];
    $restaurant->address = $data['address'];
    $restaurant->delivery_price = $data['delivery_price'];

    if (isset($data["image"])) {
      $path_image = Storage::put("uploads", $data["image"]);
      $restaurant->image = $path_image;
    }

    $restaurant->save();

    if (isset($data["categories"])) {
      $restaurant->categories()->sync($data["categories"]);
    }

    return redirect()->route('restaurants.show', $restaurant->id);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Restaurant  $restaurant
   * @return \Illuminate\Http\Response
   */
  public function destroy(Restaurant $restaurant)
  {
    // The current user can delete this restaurant?
    $this->authorize('delete', $restaurant);

    //CANCELLAZIONE IMMAGINE
    // if ($restaurant->image) {
    //     Storage::delete($restaurant->image);
    // }
    $restaurant->delete();

    return redirect()->route("home");
  }

  private function getSlug($name)
  {
    $slug = Str::slug($name, '-');
    $i = 1;

    while (Restaurant::where("slug", $slug)->first()) {
      $slug = Str::slug($name, '-') . "-{$i}";
      $i++;
    }
    return $slug;
  }
}
