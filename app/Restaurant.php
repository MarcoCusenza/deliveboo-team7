<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{

  // protected $fillable = ["restaurant_name", "phone", "address", "image", "delivery_price"];

  public function user()
  {
    return $this->belongsTo("App\User");
  }

  public function orders()
  {
    return $this->hasMany("App\Order");
  }

  public function categories()
  {
    return $this->belongsToMany("App\Category");
  }

  public function dishes()
  {
    return $this->hasMany("App\Dish");
  }
}
