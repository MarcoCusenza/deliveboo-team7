<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Order;
use App\Purchase;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  protected $validationRules = [
    "formData.client_name" => "required|string|max:100",
    "formData.client_surname" => "required|string|max:100",
    "formData.client_address" => "required|string|max:150",
    "formData.delivery_address" => "required|string|max:150",
    "formData.client_email" => "required|string|max:150",
    "formData.client_phone" => "required|regex:/^[0-9]/|min:8|max:15",
    "formData.note" => "nullable|text",
    "formData.price_tot" => "required|numeric|min:0|max:99999999",
    "formData.restaurant_id" => "required|numeric|min:1",

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
    // $data = $request->formData;
    $cart = $request->cart;

    // dd($cart);
    // dd($data);

    // Validazione dati
    $request->validate($this->validationRules);
    // $validator = Validator::make($data, [
    //   "client_name" => "required|string|max:100",
    //   "client_surname" => "required|string|max:100",
    //   "client_address" => "required|string|max:150",
    //   "delivery_address" => "required|string|max:150",
    //   "client_email" => "required|string|max:150",
    //   "client_phone" => "required|regex:/^[0-9]/|min:8|max:15",
    //   "note" => "nullable|text",
    //   "price_tot" => "required|numeric|min:0|max:99999999",
    // ]);

    $order_number = $this->orderNumber();

    $newOrder = new Order();
    // DATI DAL FORM CLIENTE
    $newOrder->order_number = $order_number;
    $newOrder->client_name = $request->formData["client_name"];
    $newOrder->client_surname = $request->formData["client_surname"];
    $newOrder->client_address = $request->formData["client_address"];
    $newOrder->delivery_address = $request->formData["delivery_address"];
    $newOrder->client_email = $request->formData["client_email"];
    $newOrder->client_phone = $request->formData["client_phone"];
    $newOrder->note = $request->formData["note"];
    $newOrder->price_tot = $request->formData["price_tot"];
    $newOrder->restaurant_id = $request->formData["restaurant_id"];

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
    $length = 8;
    $characters = '0123456789';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;

    // $od = "";
    // $idlength = strlen($this->newOrder->id);

    // for ($i = 0; $i < 12 - $idlength; $i++) {
    //   $od .= "0";
    // }

    // $od .= strlen($this->newOrder->id);

    // // dd($randomString);
    // return $od;
  }
}