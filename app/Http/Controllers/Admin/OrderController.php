<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $validationRules = [
        "order_number" => "required|regex:/^[0-9]/|mix:7|max:7",
        "client_name" => "required|string|max:100",
        "client_surname" => "required|string|max:100",
        // E' REQUIRED? C'E' ANCHE DELIVERY_ADDRESS
        "client_address" => "required|string|max:150",
        "client_email" => "required|string|max:150",
        "client_phone" => "required|regex:/^[0-9]/|min:8|max:15",
        "note" => "nullable|text",
        "delivery_time" => "required|tinyInteger|min:0",
        "delivery_address" => "required|string|max:150",
        "price_tot" => "required|numeric|min:0|max:99999999",
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        // Validazione dati
        $request->validate($this->validationRules);

        $data = $request->all();       

        // Creazione del commento
        $newOrder = new Order();
        // DATI DAL FORM CLIENTE
        // $newOrder->order_number = orderNumber(); BISOGNA METTERE STRING NELLA MIGRATION
        $newOrder->client_name = $data["client_name"];
        $newOrder->client_surname = $data["client_surname"];
        $newOrder->client_address = $data["client_address"];
        $newOrder->delivery_address = $data["delivery_address"]; // DA METTERE NEL FORM
        $newOrder->client_email = $data["client_email"];
        $newOrder->client_phone = $data["client_phone"];
        $newOrder->note = $data["note"];
        // DATO DAL RISTORANTE
        $newOrder->delivery_time = 
        // DATO DALLA PIVOT CON DISHES
        $newOrder->price_tot = 
        $newOrder->save();

        // Restituisco una risposta
        return response()->json([
            "success" => true,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function orderNumber() {
        $length = 7;
        $characters = '0123456789';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}