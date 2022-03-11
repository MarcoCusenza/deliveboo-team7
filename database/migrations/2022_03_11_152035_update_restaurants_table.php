<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRestaurantsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('restaurants', function (Blueprint $table) {
      $table->foreignId("user_id")->constrained()->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('restaurants', function (Blueprint $table) {
      $table->dropForeign(['user_id']); //eliminare il vincolo della foreign key per permettere l'eliminazione della colonna
      $table->dropColumn('user_id');
    });
  }
}
