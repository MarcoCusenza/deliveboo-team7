<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  public function restaurant()
  {
    return $this->belongsTo("App\Restaurant");
  }

  public function purchase()
  {
    return $this->belongsTo("App\Purchase");
  }
}
