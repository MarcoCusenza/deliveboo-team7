<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('dishes', function (Blueprint $table) {
      $table->id();
      //
      $table->string("slug", 135)->unique();
      $table->string("name", 120);
      $table->float('price', 7, 2);
      $table->boolean("visible")->default(false);
      $table->text("description")->nullable();
      $table->text("ingredients");
      $table->string("image")->nullable();
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
    Schema::dropIfExists('dishes');
  }
}
