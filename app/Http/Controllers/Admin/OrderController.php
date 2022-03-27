<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\Purchase;
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
  public function show($order_id)
  {
    $order = Order::where("id", $order_id)->first();
    $purchase = Purchase::where("order_id", $order_id)->get();
    $dishes = [];
    // dd($dishes);
    return view("admin.orders.show", compact("order", "dishes"));
  }
}
