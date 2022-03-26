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

    $groups = Order::where("restaurant_id", $rest->id)
    
      // ->select(DB::raw('COUNT(id) as tot'), DB::raw('DATE_FORMAT(created_at, "%Y-%M-%d - %H:%i") as month'))
      ->select(DB::raw('COUNT(id) as tot'), DB::raw('DATE_FORMAT(created_at, "%Y-%M") as month'))
      // ->orderBy('month', "asc")
      ->groupBy('month')
      ->pluck('tot', 'month')->all();

    $chart = new Chart;
    $chart->labels = (array_keys($groups));
    $chart->dataset = (array_values($groups));
    return view('admin.charts.index', compact('chart'));
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
