@extends('layouts.app')

@section('content')
  {{-- CHARTJS --}}
  <div class="container chart_bgc border rounded pb-3">
    <div class="row px-3 pt-3 mb-4">
      <h2 class="col-12 mb-3">Numero di ordini</h2>
      <div class="col-12 col-lg-6 mb-5">
        <canvas id="userChart" class="rounded shadow"></canvas>
        <input onchange="filterData()" type="month" id="startDate">
        <input onchange="filterData()" type="month" id="endDate">
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
  <script async>
    const dates = {!! json_encode($chartMonth->labels) !!};
    const dataPoints = {!! json_encode($chartMonth->dataset) !!};

    let inpStartDate = document.getElementById('startDate').value = dates[0];
    // console.log(inpStartDate)
    let inpEndDate = document.getElementById('endDate').value = dates[dates.length - 1];

    //CHIAMATA MESI
    var ctx = document.getElementById('userChart').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'line',

      // The data for our dataset
      data: {
        labels: dates, // Pariole sotto la tabella
        datasets: [{
          label: 'N°ordini / mese',
          data: dataPoints,

          // Bisogna trovare un modo assegnare un colore per ogni elemento con un ciclo
          backgroundColor: [
            'rgba(73, 242, 228, .4)',
          ],
          borderColor: [
            // 'rgba(0, 106, 100, 1)',
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

    filterData();


    // CHIAMATA ANNI
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
        labels: {!! json_encode($chartPriceMonth->labels) !!}, // Pariole sotto la tabella
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
        labels: {!! json_encode($chartPriceYear->labels) !!}, // Pariole sotto la tabella
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


    function filterData() {
      // console.log(inpStartDate)

      // Copio l'array per evitare di perdere i dati
      const dates2 = [...dates];
      // console.log("data 2: ",dates2)
      const startDate = document.getElementById('startDate');
      const endDate = document.getElementById('endDate');

      console.log(startDate.value);
      console.log(endDate.value);

      let suppLabels = [];
      let tokenTemp = startDate.value;
      let tokenEnd = endDate.value;

      suppLabels.push(tokenTemp);

      while (tokenTemp != tokenEnd) {
        let month = "";
        month += tokenTemp[5];
        month += tokenTemp[6];
        let numMonth = parseInt(month);

        if (numMonth != 12) {
          numMonth++;
          stringMonth = numMonth.toString();

          if (stringMonth.length < 2) {
            stringMonth = '0' + stringMonth;
          }

          tokenTemp = setCharAt(tokenTemp, 5, stringMonth[0]);
          tokenTemp = setCharAt(tokenTemp, 6, stringMonth[1]);
        } else {
          let year = "";
          year = tokenTemp[0];
          year += tokenTemp[1];
          year += tokenTemp[2];
          year += tokenTemp[3];

          console.log("year", year);
          let numYear = parseInt(year);
          console.log("numYear", numYear);
          numYear++;
          stringYear = numYear.toString();

          console.log("stringYear", stringYear);

          tokenTemp = setCharAt(tokenTemp, 0, stringYear[0]);
          tokenTemp = setCharAt(tokenTemp, 1, stringYear[1]);
          tokenTemp = setCharAt(tokenTemp, 2, stringYear[2]);
          tokenTemp = setCharAt(tokenTemp, 3, stringYear[3]);

          tokenTemp = setCharAt(tokenTemp, 5, '0');
          tokenTemp = setCharAt(tokenTemp, 6, '1');
        }
        suppLabels.push(tokenTemp);
        console.log(suppLabels);
      }


      // // Prendo l'indice dall'array
      // const indexStartDate = dates2.indexOf(startDate.value);
      // const indexEndDate = dates2.indexOf(endDate.value);
      // // console.log("START: ",indexStartDate, "-- END: ", indexEndDate);

      // // Slice l'array per vedere solo i dati selezionati
      // const filterDate = dates2.slice(indexStartDate, indexEndDate + 1);

      // Rimpiazza la labels del chart
      chart.config.data.labels = suppLabels;


      let suppData = [];

      const dataPoints2 = [...dataPoints];

      suppLabels.forEach((itemPost, indexPost) => {
        let boolSent = false;
        dates2.forEach((itemPre, indexPre) => {
          if (itemPost == itemPre) {
            suppData[indexPost] = dataPoints2[indexPre];
            boolSent = true;
          }
        });
        if (boolSent == false) {
          suppData[indexPost] = 0;
        }
      });

      console.log("suppData", suppData);

      // const filterDataPoints = dataPoints2.slice(indexStartDate, indexEndDate + 1);
      chart.config.data.datasets[0].data = suppData;

      // console.log(dates2[indexStartDate].replace('-', ""));
      // let dates3 = dates2[indexStartDate].replace('-', "");
      // console.log(parseInt(dates3));
      /*
      RAGIONAMENTO MOVIMENTI BANCARI
        Se dateStart - inputStart = < 0 --> dateStart  (202201 - 202112) Perché dateStart == primo ordine
        Se dateStart - inputStart = > 0 --> check if inputStart is in Array
            If not --> dateStart = if(inputStart - 1 is in Array)
                If not --> dateStart = if(inputStart - 2 is in Array) ......

        Se dateEnd - inputEnd = < 0 --> dateEnd  (202204 - 202205) Perché dateEns == ultimo ordine
        Se dateEnd - inputEnd = > 0 --> check if inputEnd is in Array
            If not --> dateEnd = if(inputEnd + 1 is in Array)
                If not --> dateEnd = if(inputEnd + 2 is in Array) ......
      */

      chart.update();
    }

    function setCharAt(str, index, chr) {
      if (index > str.length - 1) return str;
      return str.substring(0, index) + chr + str.substring(index + 1);
    }
  </script>
@endsection
