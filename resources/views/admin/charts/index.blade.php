@extends('layouts.app')

@section('content')
  {{-- CHARTJS --}}
  <div class="container">
    <div class="container card mb-5">
      <canvas id="userChart" class="rounded shadow"></canvas>
    </div>

    <div class="container card">
      <canvas id="userChartyear" class="rounded shadow"></canvas>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script>
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
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
          ],
          borderWidth: 1
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
            'rgba(0, 106, 100, .5)',
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
          ],
          borderWidth: 1
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
