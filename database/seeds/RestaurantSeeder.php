<?php

use Illuminate\Database\Seeder;
use App\Restaurant;
use Illuminate\Support\Facades\DB;

class RestaurantSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $restaurants = config("restaurants-filler");
    $pivots = [];

    foreach ($restaurants as $restaurant) {
      $newRestaurant = new Restaurant();
      //
      $newRestaurant->slug = $restaurant["slug"];
      $newRestaurant->restaurant_name = $restaurant["restaurant_name"];
      $newRestaurant->phone = $restaurant["phone"];
      $newRestaurant->address = $restaurant["address"];
      $newRestaurant->image = $restaurant["image"];
      $newRestaurant->delivery_price = $restaurant["delivery_price"];
      $newRestaurant->user_id = $restaurant["user_id"];

      $pivots[] = [
        "category_id" => $restaurant["category_id"],
        "restaurant_id" => $restaurant["restaurant_id"]
      ];
      //
      $newRestaurant->save();
    }

    DB::table("category_restaurant")->insert($pivots);
  }
}
