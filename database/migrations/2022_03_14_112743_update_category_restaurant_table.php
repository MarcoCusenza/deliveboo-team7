<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCategoryRestaurantTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('category_restaurant', function (Blueprint $table) {
      $table->foreignId("restaurant_id")->nullable()->constrained()->onDelete('set null');
      $table->foreignId("category_id")->nullable()->constrained()->onDelete('set null');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('category_restaurant', function (Blueprint $table) {
      $table->dropForeign(['restaurant_id']);
      $table->dropColumn('restaurant_id');
      $table->dropForeign(['category_id']);
      $table->dropColumn('category_id');
    });
  }
}
