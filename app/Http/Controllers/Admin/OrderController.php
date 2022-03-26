<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\Restaurant;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $restaurant = Restaurant::where("user_id", auth()->id())->first();

    $orders = Order::where("restaurant_id", $restaurant->id)->orderByDesc('created_at')->get();

    return view('admin.orders.index', compact('orders'));
  }

  /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view("admin.orders.show", compact("order"));
    }
}
