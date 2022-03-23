<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Dish;  // ********************************
use App\Chart;
use App\Restaurant;
// use DB;
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
    // Per selezionare i campi
    $groups = Dish::where("restaurant_id", $rest->id)->pluck('price', 'name')->all();

    // Crea Oggetto Chart
    $chart = new Chart;
    $chart->labels = (array_keys($groups)); // Salva le parole chiave
    $chart->dataset = (array_values($groups)); // Salva i valori delle parole chiave
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
