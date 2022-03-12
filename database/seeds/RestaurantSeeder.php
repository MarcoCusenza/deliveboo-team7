<?php

use Illuminate\Database\Seeder;
use App\Restaurant;

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
      //
      $newRestaurant->save();
    }
  }
}
