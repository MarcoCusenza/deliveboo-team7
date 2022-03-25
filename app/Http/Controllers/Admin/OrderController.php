<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\Restaurant;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  protected $validationRules = [
    "order_number" => "required|string|max:10",
    "client_name" => "required|string|max:100",
    "client_surname" => "required|string|max:100",
    "client_address" => "required|string|max:150",
    "delivery_address" => "required|string|max:150",
    "client_email" => "required|email:rfc,dns",
    "client_phone" => "required|regex:/^[0-9]/|min:8|max:15",
    "note" => "nullable|string|max:150",
    "price_tot" => "required|numeric|min:0|max:99999999",
  ];

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $restaurant = Restaurant::where("user_id", auth()->id())->first();

    $orders = Order::where("restaurant_id", $restaurant->id)->get();
    $orders = Order::orderByDesc('created_at')->get();

    return view('admin.orders.index', compact('orders'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate($this->validationRules);

    $data = $request->all();

    $newOrder = new Order();
    $newOrder->order_number = $data['order_number'];
    $newOrder->client_name = $data['client_name'];
    $newOrder->client_surname = $data['client_surname'];
    $newOrder->client_address = $data['client_address'];
    $newOrder->delivery_address = $data['delivery_address'];
    $newOrder->client_email = $data['client_email'];
    $newOrder->client_phone = $data['client_phone'];
    $newOrder->note = $data['note'];
    $newOrder->price_tot = $data['price_tot'];

    $newOrder->save();

    // return redirect()->route('orders.show', $newOrder->id);
  }
}
