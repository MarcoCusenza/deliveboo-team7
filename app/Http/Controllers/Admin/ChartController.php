<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;  // ********************************
use App\Chart;
use App\Restaurant;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ChartController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $rest = Restaurant::where("user_id", auth()->id())->first();

    //CHIAMATA MESI
    $groups = Order::where("restaurant_id", $rest->id)
      ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('COUNT(id) as tot'))
      ->orderBy('month', "asc")
      ->groupBy('month')
      ->pluck('tot', 'month')->all();

    $chartMonth = new Chart;
    $chartMonth->labels = (array_keys($groups));
    $chartMonth->dataset = (array_values($groups));

    //CHIAMATA ANNI
    $groups = Order::where("restaurant_id", $rest->id)
      ->select(DB::raw('DATE_FORMAT(created_at, "%Y") as year'), DB::raw('COUNT(id) as tot'))
      ->orderBy('year', "asc")
      ->groupBy('year')
      ->pluck('tot', 'year')->all();

    $chartYear = new Chart;
    $chartYear->labels = (array_keys($groups));
    $chartYear->dataset = (array_values($groups));

    //CHIAMATA VENDITE MENSILI
    $groups = Order::where("restaurant_id", $rest->id)
      ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('SUM(price_tot) as tot'))
      ->orderBy('month', "asc")
      ->groupBy('month')
      ->pluck('tot', 'month')->all();

    $chartPriceMonth = new Chart;
    $chartPriceMonth->labels = (array_keys($groups));
    $chartPriceMonth->dataset = (array_values($groups));

    //CHIAMATA VENDITE ANNUALI
    $groups = Order::where("restaurant_id", $rest->id)
      ->select(DB::raw('DATE_FORMAT(created_at, "%Y") as year'), DB::raw('SUM(price_tot) as tot'))
      ->orderBy('year', "asc")
      ->groupBy('year')
      ->pluck('tot', 'year')->all();

    $chartPriceYear = new Chart;
    $chartPriceYear->labels = (array_keys($groups));
    $chartPriceYear->dataset = (array_values($groups));



    return view('admin.charts.index', compact('chartMonth', 'chartYear', 'chartPriceMonth', 'chartPriceYear'));
  }
}
