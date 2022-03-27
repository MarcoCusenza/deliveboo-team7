<?php

namespace App\Policies;

use App\Order;
use App\User;
use App\Restaurant;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
  // use HandlesAuthorization;

  // /**
  //  * Create a new policy instance.
  //  *
  //  * @return void
  //  */
  // public function __construct()
  // {
  //     //
  // }

  /**
   * Determine whether the user can view the model.
   *
   * @param  \App\User  $user
   * @param  \App\Dish  $dish
   * @return mixed
   */
  public function view(User $user, Order $order)
  {
    $myRestaurant = Restaurant::where("user_id", $user->id)->first();
    return $myRestaurant->id === $order->restaurant_id
      ? Response::allow()
      : Response::deny("L'ordine che stai cercando di mostrare non appartiene al tuo ristorante.");
  }
}
