<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Order;
use App\Purchase;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  protected $validationRules = [
    // "order_number" => "required|regex:/^[0-9]/|min:7|max:7",
    "client_name" => "required|string|max:100",
    "client_surname" => "required|string|max:100",
    // E' REQUIRED? C'E' ANCHE DELIVERY_ADDRESS
    "client_address" => "required|string|max:150",
    "delivery_address" => "required|string|max:150",
    "client_email" => "required|string|max:150",
    "client_phone" => "required|regex:/^[0-9]/|min:8|max:15",
    "note" => "nullable|text",
    // "delivery_time" => "required|tinyInteger|min:0",
    "price_tot" => "required|numeric|min:0|max:99999999",

    // "dishes" => "required|min:1",
  ];

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $data = $request->formData;
    $cart = $request->cart;



    // dd($data);

    // Validazione dati
    // $data->validate($this->validationRules);

    $order_number = $this->orderNumber();

    // Creazione del commento
    $newOrder = new Order();
    // DATI DAL FORM CLIENTE
    $newOrder->order_number = $order_number;
    $newOrder->client_name = $data["client_name"];
    $newOrder->client_surname = $data["client_surname"];
    $newOrder->client_address = $data["client_address"];
    $newOrder->delivery_address = $data["delivery_address"];
    $newOrder->client_email = $data["client_email"];
    $newOrder->client_phone = $data["client_phone"];
    $newOrder->note = $data["note"];
    $newOrder->price_tot = $data["price_tot"];
    $newOrder->restaurant_id = $data["restaurant_id"];

    // DATO DAL RISTORANTE
    // $newOrder->delivery_time = 20;

    $newOrder->save();

    foreach ($cart as $dish) {
      $newPurchase = new Purchase();
      $newPurchase->dish_id = $dish[0]["id"];
      $newPurchase->order_id = $newOrder->id;
      $newPurchase->quantity = $dish[1];
      $newPurchase->save();
    }

    // Restituisco una risposta
    return response()->json([
      "success" => true,
    ]);
  }

  public function orderNumber()
  {
    $length = 3;
    $characters = '0123456789';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    // dd($randomString);
    return $randomString;
  }
}
