<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRestaurantDishTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('restaurant_dish', function (Blueprint $table) {
      $table->foreignId("order_id")->constrained()->onDelete('cascade');
      $table->foreignId("dish_id")->nullable()->constrained()->onDelete('set null');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('restaurant_dish', function (Blueprint $table) {
      $table->dropForeign(['order_id']);
      $table->dropColumn('order_id');
      $table->dropForeign(['dish_id']);
      $table->dropColumn('dish_id');
    });
  }
}
