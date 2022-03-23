<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('orders', function (Blueprint $table) {
      $table->id();
      //
      $table->string("order_number")->unique();
      $table->string("client_name", 100);
      $table->string("client_surname", 100);
      $table->string("client_address", 150);
      $table->string("delivery_address", 150);
      $table->string("client_email", 150);
      $table->string("client_phone", 20);
      $table->text("note")->nullable();
      // $table->tinyInteger("delivery_time")->default(15);
      $table->float("price_tot", 10, 2);
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
    Schema::dropIfExists('orders');
  }
}
