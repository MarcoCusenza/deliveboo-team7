<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;  // ********************************
use App\Chart;
use App\Restaurant;
use DB;
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

    return view('admin.charts.index', compact('chartMonth', 'chartYear'));
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
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Chart  $chart
   * @return \Illuminate\Http\Response
   */
  public function show(Chart $chart)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Chart  $chart
   * @return \Illuminate\Http\Response
   */
  public function edit(Chart $chart)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Chart  $chart
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Chart $chart)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Chart  $chart
   * @return \Illuminate\Http\Response
   */
  public function destroy(Chart $chart)
  {
    //
  }
}
