<?php

namespace App\Policies;

use App\User;
use App\Restaurant;
use Illuminate\Auth\Access\Response;
// use Illuminate\Auth\Access\HandlesAuthorization;

class RestaurantPolicy
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

  // /**
  //  * Determine whether the user can view any models.
  //  *
  //  * @param  \App\User  $user
  //  * @return mixed
  //  */
  // public function viewAny(User $user)
  // {
  //   return $user->id == auth()->id()
  //     ? Response::allow()
  //     : Response::deny('You are not the owner of these Restaurants!');
  // }

  /**
   * Determine whether the user can view the model.
   *
   * @param  \App\User  $user
   * @param  \App\Dish  $dish
   * @return mixed
   */
  public function view(User $user, Restaurant $restaurant)
  {
    return $user->id === $restaurant->user_id
      ? Response::allow()
      : Response::deny("You don't own the restaurant you are trying to show.");
  }

  /**
   * Determine whether the user can create models.
   *
   * @param  \App\User  $user
   * @return mixed
   */
  public function create(User $user)
  {
    $tot_rest = Restaurant::all()->where("user_id", $user->id)->toArray();
    return $tot_rest == null
      ? Response::allow()
      : Response::deny('You already have a Restaurant!');
  }

  /**
   * Determine if the given restaurant can be updated by the user.
   *
   * @param  \App\User  $user
   * @param  \App\Restaurant  $restaurant
   * @return \Illuminate\Auth\Access\Response
   */
  public function update(User $user, Restaurant $restaurant)
  {
    return $user->id === $restaurant->user_id
      ? Response::allow()
      : Response::deny("You don't own the restaurant you are trying to edit.");
  }

  /**
   * Determine whether the user can delete the model.
   *
   * @param  \App\User  $user
   * @param  \App\Dish  $dish
   * @return mixed
   */
  public function delete(User $user, Restaurant $restaurant)
  {
    return $user->id === $restaurant->user_id
      ? Response::allow()
      : Response::deny("You don't own the restaurant you are trying to delete.");
  }
}
