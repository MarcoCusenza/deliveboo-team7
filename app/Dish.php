<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
  public function restaurant()
  {
    return $this->belongsTo("App\Restaurant");
  }

  public function purchases()
  {
    return $this->belongsToMany("App\Purchase");
  }

  public function course()
  {
    return $this->belongsTo("App\Course");
  }
}
