<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantOrderTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('restaurant_order', function (Blueprint $table) {
      $table->id();
      $table->float("price", 7, 2);
      $table->tinyint("quantity");
      $table->foreignId("order_id")->constrained()->onDelete('cascade');
      $table->foreignId("dish_id")->nullable()->constrained()->onDelete('set null');
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
    Schema::dropIfExists('restaurant_order');
  }
}
