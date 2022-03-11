<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('restaurants', function (Blueprint $table) {
      $table->id();
      //
      $table->string("slug", 165);
      $table->string("restaurant_name", 150);
      $table->string("phone", 20);
      $table->string("address", 150);
      $table->string("image");
      $table->float("delivery_price", 4, 2);
      $table->foreignId("user_id")->constrained()->onDelete('cascade');
      //
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('restaurants');
  }
}
