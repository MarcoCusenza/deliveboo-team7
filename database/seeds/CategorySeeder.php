<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $categories = config("categories-filler");

    foreach ($categories as $category) {
      $newCategory = new Category();
      //
      $newCategory->slug = $category["slug"];
      $newCategory->name = $category["name"];
      $newCategory->image = $category["image"];
      //
      $newCategory->save();
    }
  }
}
