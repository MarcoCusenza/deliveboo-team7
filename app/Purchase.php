<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
  public function order()
  {
    return $this->hasOne("App\Order");
  }

  public function dishes()
  {
    return $this->hasMany("App\Dish");
  }
}
