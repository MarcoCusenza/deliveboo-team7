<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDishesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('dishes', function (Blueprint $table) {
      $table->foreignId("restaurant_id")->constrained()->onDelete('cascade');
      $table->foreignId("course_id")->nullable()->constrained()->onDelete('set null');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('dishes', function (Blueprint $table) {
      $table->dropForeign(['restaurant_id']);
      $table->dropColumn('restaurant_id');
      $table->dropForeign(['course_id']);
      $table->dropColumn('course_id');
    });
  }
}
