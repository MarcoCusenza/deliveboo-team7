<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// verify=>true per inviare mail di verifica registrazione
// Auth::routes(["verify" => true]);
Auth::routes(['verify' => true]);


Route::prefix("admin")->namespace("Admin")->middleware("verified")->group(
  function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource("restaurants", "RestaurantController");
    Route::resource("dishes", "DishController");
    Route::get('/charts', 'ChartController@index')->name('charts');
    Route::get('/orders', 'OrderController@index')->name('orders');
  }
);

// Rotta GET per la pagina di checkout
Route::get('/payment/checkout', function () {
  //genero oggetto gateway con i parametri del mio account Braintree presi da env
  $gateway = new Braintree\Gateway([
    'environment' => config('services.braintree.environment'),
    'merchantId' => config('services.braintree.merchantId'),
    'publicKey' => config('services.braintree.publicKey'),
    'privateKey' => config('services.braintree.privateKey')
  ]);


  $token = $gateway->ClientToken()->generate();

  return response()->json($token);
})->name("checkout");


// // PROVA Rotta GET per la pagina di checkout
// Route::get('/payment/checkout/blade', function () {
//   $gateway = new Braintree\Gateway([
//     'environment' => config('services.braintree.environment'),
//     'merchantId' => config('services.braintree.merchantId'),
//     'publicKey' => config('services.braintree.publicKey'),
//     'privateKey' => config('services.braintree.privateKey')
//   ]);


//   $token = $gateway->ClientToken()->generate();

//   return view('checkout', [
//     'token' => $token
//   ]);
// })->name("checkout");


// Rotta POST per la domanda di conferma pagamento e reindirizzamento pagina di successo
Route::post('/payment/checkout', function (Request $request) {

  $gateway = new Braintree\Gateway([
    'environment' => config('services.braintree.environment'),
    'merchantId' => config('services.braintree.merchantId'),
    'publicKey' => config('services.braintree.publicKey'),
    'privateKey' => config('services.braintree.privateKey')
  ]);


  $amount = $request->amount;
  $nonce = $request->payment_method_nonce;
  $name = $request->name;
  $surname = $request->surname;
  $email = $request->email;

  $result = $gateway->transaction()->sale([
    'amount' => $amount,
    'paymentMethodNonce' => $nonce,
    'customer' => [
      'firstName' => $name,
      'lastName' => $surname,
      'email' => $email,
    ],
    'options' => [
      'submitForSettlement' => true
    ]
  ]);

  if ($result->success) {
    $transaction = $result->transaction;
    // header("Location: transaction.php?id=" . $transaction->id);

    // return back()->with('success_message', 'Transaction successful. The ID is:' . $transaction->id);
    return response()->json($transaction->id);
  } else {
    $errorString = "";

    foreach ($result->errors->deepAll() as $error) {
      $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
    }

    // return back()->withErrors('An error occurred with the message: ' . $result->message);
    return response()->json($result->message);
  }
});

//rotta braintree
// Route::get('/payment/checkout', 'PaymentController@index')->name('checkout');
// Route::get('/payment/make', 'PaymentController@make')->name('payment.make');


// Route::get('/', function () {
//   return view('front');
// });

// router di Vue
Route::get("{any?}", function () {
  return view("front");
})->where("any", ".*");
