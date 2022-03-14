<?php

namespace App\Policies;

use App\Dish;
use App\User;
use App\Restaurant;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class DishPolicy
{
  //use HandlesAuthorization;

  // /**
  //  * Create a new policy instance.
  //  *
  //  * @return void
  //  */
  // public function __construct()
  // {
  //     //
  // }

  // /**
  //  * Determine whether the user can view any models.
  //  *
  //  * @param  \App\User  $user
  //  * @return mixed
  //  */
  // public function viewAny(User $user)
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
  public function view(User $user, Dish $dish)
  {
    $myRestaurant = Restaurant::first()->where("user_id", $user->id)->get();
    return $myRestaurant[0]->id === $dish->restaurant_id
      ? Response::allow()
      : Response::deny("Your restaurant doesn't own the dish you are trying to show.");
  }

  //LA POLICY SULLA CREATE NON SERVE, UN UTENTE REGISTRATO PUO' SEMPRE CREARE UN NUOVO PIATTO CHE VERRA' AGGIUNTO AL SUO RISTORANTE
  // /**
  //  * Determine whether the user can create models.
  //  *
  //  * @param  \App\User  $user
  //  * @return mixed
  //  */
  // public function create(User $user)
  // {
  //     //
  // }

  /**
   * Determine whether the user can update the model.
   *
   * @param  \App\User  $user
   * @param  \App\Dish  $dish
   * @return mixed
   */
  public function update(User $user, Dish $dish)
  {
    $myRestaurant = Restaurant::first()->where("user_id", $user->id)->get();
    return $myRestaurant[0]->id === $dish->restaurant_id
      ? Response::allow()
      : Response::deny("Your restaurant doesn't own the dish you are trying to edit.");
  }

  /**
   * Determine whether the user can delete the model.
   *
   * @param  \App\User  $user
   * @param  \App\Dish  $dish
   * @return mixed
   */
  public function delete(User $user, Dish $dish)
  {
    $myRestaurant = Restaurant::first()->where("user_id", $user->id)->get();
    return $myRestaurant[0]->id === $dish->restaurant_id
      ? Response::allow()
      : Response::deny("Your restaurant doesn't own the dish you are trying to delete.");
  }

  // /**
  //  * Determine whether the user can restore the model.
  //  *
  //  * @param  \App\User  $user
  //  * @param  \App\Dish  $dish
  //  * @return mixed
  //  */
  // public function restore(User $user, Dish $dish)
  // {
  //     //
  // }

  // /**
  //  * Determine whether the user can permanently delete the model.
  //  *
  //  * @param  \App\User  $user
  //  * @param  \App\Dish  $dish
  //  * @return mixed
  //  */
  // public function forceDelete(User $user, Dish $dish)
  // {
  //     //
  // }
}
