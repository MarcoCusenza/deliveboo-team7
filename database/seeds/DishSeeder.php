<?php

use Illuminate\Database\Seeder;
use App\Dish;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $dishes = config("dishes-filler");


        foreach ($dishes as $dish) {
            $newDish = new Dish();
            //
            $newDish->name = $dish["name"];
            $newDish->slug = $dish["slug"];
            $newDish->price = $dish["price"];
            $newDish->visible = $dish["visible"];
            $newDish->description = $dish["description"];
            $newDish->ingredients = $dish["ingredients"];
            $newDish->image = $dish["image"];
            $newDish->restaurant_id = $dish["restaurant_id"];
            $newDish->course_id = $dish["course_id"];

            //
            $newDish->save();
        }
    }
}
