@extends('layouts.app')

@section('content')
  {{-- CHARTJS --}}
  <div class="container chart_bgc border rounded pb-3">
    <div class="row px-3 pt-3 mb-4">
      <h2 class="col-12 mb-3">Numero di ordini</h2>
      <div class="col-12 col-lg-6 mb-5">
        <canvas id="userChart" class="rounded shadow"></canvas>
      </div>
  
      <div class="col-12 col-lg-6">
        <canvas id="userChartyear" class="rounded shadow"></canvas>
      </div>
    </div>

    <div class="row px-3 pt-3">
      <h2 class="col-12 mb-3">Ammontare delle vendite</h2>
      <div class="col-12 col-lg-6 container mb-5">
        <canvas id="ChartPriceMonth" class="rounded shadow"></canvas>
      </div>
  
      <div class="col-12 col-lg-6 container">
        <canvas id="chartPriceYear" class="rounded shadow"></canvas>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script>
    //CHIAMATA MESI
    var ctx = document.getElementById('userChart').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'line',

      // The data for our dataset
      data: {
        labels: {!! json_encode($chartMonth->labels) !!}, // Pariole sotto la tabella
        datasets: [{
          label: 'N°ordini / mese',
          data: {!! json_encode($chartMonth->dataset) !!},

          // Bisogna trovare un modo assegnare un colore per ogni elemento con un ciclo
          backgroundColor: [
            'rgba(73, 242, 228, .4)',
          ],
          borderColor: [
            'rgba(0, 106, 100, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
          ],
          borderWidth: 2
        }, ]
      },
      // Configuration options go here
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true,
              callback: function(value) {
                if (value % 1 === 0) {
                  return value;
                }
              }
            },
            scaleLabel: {
              display: false
            }
          }]
        },
        legend: {
          labels: {
            // This more specific font property overrides the global property
            fontColor: '#122C4B',
            fontFamily: "'Muli', sans-serif",
            padding: 25,
            boxWidth: 25,
            fontSize: 18,
          }
        },
        layout: {
          padding: {
            left: 10,
            right: 10,
            top: 0,
            bottom: 10
          }
        }
      }
    });

    //CHIAMATA ANNI
    var ctj = document.getElementById('userChartyear').getContext('2d');
    var chartb = new Chart(ctj, {
      // The type of chart we want to create
      type: 'line',

      // The data for our dataset
      data: {
        labels: {!! json_encode($chartYear->labels) !!}, // Pariole sotto la tabella
        datasets: [{
          label: 'N°ordini / anno',
          data: {!! json_encode($chartYear->dataset) !!},

          // Bisogna trovare un modo assegnare un colore per ogni elemento con un ciclo
          backgroundColor: [
            'rgba(73, 242, 228, .4)',
          ],
          borderColor: [
            'rgba(0, 106, 100, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
          ],
          borderWidth: 2
        }, ]
      },
      // Configuration options go here
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true,
              callback: function(value) {
                if (value % 1 === 0) {
                  return value;
                }
              }
            },
            scaleLabel: {
              display: false
            }
          }]
        },
        legend: {
          labels: {
            // This more specific font property overrides the global property
            fontColor: '#122C4B',
            fontFamily: "'Muli', sans-serif",
            padding: 25,
            boxWidth: 25,
            fontSize: 18,
          }
        },
        layout: {
          padding: {
            left: 10,
            right: 10,
            top: 0,
            bottom: 10
          }
        }
      }
    });

    //CHIAMATA VENDITE MENSILI
    var ctj = document.getElementById('ChartPriceMonth').getContext('2d');
    var chartc = new Chart(ctj, {
      // The type of chart we want to create
      type: 'line',

      // The data for our dataset
      data: {
        labels: {!!json_encode($chartPriceMonth->labels)!!}, // Pariole sotto la tabella
        datasets: [{
          label: 'Totale vendite mensili',
          data: {!! json_encode($chartPriceMonth->dataset) !!},

          // Bisogna trovare un modo assegnare un colore per ogni elemento con un ciclo
          backgroundColor: [
            'rgba(73, 242, 228, .4)',
          ],
          borderColor: [
            'rgba(0, 106, 100, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
          ],
          borderWidth: 2
        }, ]
      },
      // Configuration options go here
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true,
              callback: function(value) {
                if (value % 1 === 0) {
                  return value;
                }
              }
            },
            scaleLabel: {
              display: false
            }
          }]
        },
        legend: {
          labels: {
            // This more specific font property overrides the global property
            fontColor: '#122C4B',
            fontFamily: "'Muli', sans-serif",
            padding: 25,
            boxWidth: 25,
            fontSize: 18,
          }
        },
        layout: {
          padding: {
            left: 10,
            right: 10,
            top: 0,
            bottom: 10
          }
        }
      }
    });

    //CHIAMATA VENDITE ANNUALI
    var ctj = document.getElementById('chartPriceYear').getContext('2d');
    var chartd = new Chart(ctj, {
      // The type of chart we want to create
      type: 'line',

      // The data for our dataset
      data: {
        labels: {!!json_encode($chartPriceYear->labels)!!}, // Pariole sotto la tabella
        datasets: [{
          label: 'Totale vendite annuali',
          data: {!! json_encode($chartPriceYear->dataset) !!},

          // Bisogna trovare un modo assegnare un colore per ogni elemento con un ciclo
          backgroundColor: [
            'rgba(73, 242, 228, .4)',
          ],
          borderColor: [
            'rgba(0, 106, 100, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
          ],
          borderWidth: 2
        }, ]
      },
      // Configuration options go here
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true,
              callback: function(value) {
                if (value % 1 === 0) {
                  return value;
                }
              }
            },
            scaleLabel: {
              display: false
            }
          }]
        },
        legend: {
          labels: {
            // This more specific font property overrides the global property
            fontColor: '#122C4B',
            fontFamily: "'Muli', sans-serif",
            padding: 25,
            boxWidth: 25,
            fontSize: 18,
          }
        },
        layout: {
          padding: {
            left: 10,
            right: 10,
            top: 0,
            bottom: 10
          }
        }
      }
    });
  </script>
@endsection
