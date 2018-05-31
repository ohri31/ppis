@extends('layouts.app')
@section('title', '| Chart')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
<div class="container row justify-content-center">
<div class="col-md-10 text-center">
    <select id="category_id" name="category_id" class="form-control selectpicker" width="10">
            <option id="option0" value="0">Choose chart</option>
            <option id="option1" value="1">Registered users statistics</option>
            <option id="option2" value="2">Test requests statistics</option>
            <option id="option3" value="3">Test requests approval statuses</option>
            <option id="option4" value="4">Test requests statuses</option>
    </select>
<br/>
  <h3 id="label1" style="display:none">Number of registered companies per month</h3>
  <canvas id="chart1" height="100" style="display:none"></canvas>

  <h3 id="label2" style="display:none">Number of test requests per month</h3>
  <canvas id="chart2" height="100" style="display:none"></canvas>

  <h3 id="label3" style="display:none">Approval statuses for test requests</h3>
  <canvas id="chart3" height="100" style="display:none"></canvas>

  <h3 id="label4" style="display:none">Test requests statuses</h3>
  <canvas id="chart4" height="100" style="display:none"></canvas>

</div>
</div>

<script>
$("#category_id").change(function() {
  var id = $(this).val();

//charts
  $("#chart1").hide();
  $("#chart2").hide();
  $("#chart3").hide();
  $("#chart4").hide();

//labels
  $("#label1").hide();
  $("#label2").hide();
  $("#label3").hide();
  $("#label4").hide();

  $("#chart" + id).show();
  $("#label" + id).show();
}).change();
</script>

<script>
var ctx = document.getElementById("chart1").getContext('2d')

var result = {!! json_encode($dataCharts['registeredCompanies']) !!}

var labels = [],data=[];
    for (var i = 0; i < result.length; i++) {
        labels.push(result[i].month);
        data.push(result[i].projects);
    }

var statistics = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                data: data,
            }]
        },
        options: {
              scales: {
                  xAxes: [{
                    ticks: {
                       beginAtZero: true,
                       fixedStepSize: 2,
                       max: 15,
                       min: 0
                   },
                    barPercentage: 1.0,
                    categoryPercentage: 0.1
                  }]
              },
              legend: {
                  display: false
              },
              tooltips: {
                  callbacks: {
                     label: function(tooltipItem) {
                            return tooltipItem.yLabel;
                     }
                  }
              }
          }
      });
</script>

<script>
var ctx2 = document.getElementById("chart2").getContext('2d')

var result2 = {!! json_encode($dataCharts['testrequests']) !!}

var labels2 = [],data2=[];
    for (var i = 0; i < result2.length; i++) {
        labels2.push(result2[i].month);
        data2.push(result2[i].testrequests);
    }

var statistics2 = new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: labels2,
            datasets: [{
                data: data2,
                backgroundColor: ["#20b2aa", "#C0C0C0"]
            }]
        },
        options: {
              scales: {
                  xAxes: [{
                    ticks: {
                       beginAtZero: true,
                       fixedStepSize: 2,
                       max: 15,
                       min: 0
                   },
                    barPercentage: 1.0,
                    categoryPercentage: 0.1
                  }]
              }
          }
      });
</script>

<script>
var ctx3 = document.getElementById("chart3").getContext('2d')

var result = {!! json_encode($dataCharts['requests']) !!}

var labels = [],data=[];
    for (var i = 0; i < result.length; i++) {
      if(result[i].approved == 0)labels.push("Pending");
      else if(result[i].approved == 1)labels.push("Approved");
      else if(result[i].approved == 3)labels.push("Declined");
      data.push(result[i].requests);
    }

var statistics = new Chart(ctx3, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: false,
                data: data,
                backgroundColor: ["#20b2aa", "#C0C0C0"],
                legend: {
                  display:false
                }
            }]
        },
        options: {
          scales: {
              yAxes: [{
                ticks: {
                   beginAtZero: true,
                   fixedStepSize: 1,
                   min: 0
               }
              }]
          },
    legend: {
        display: false
    },
    tooltips: {
        callbacks: {
           label: function(tooltipItem) {
                  return tooltipItem.yLabel;
           }
        }
    }
}
      });
</script>

<script>
var ctx4 = document.getElementById("chart4").getContext('2d')

var result = {!! json_encode($dataCharts['requestsStatus']) !!}

var labels = [],data=[];
    for (var i = 0; i < result.length; i++) {
        if(result[i].status_id==1)labels.push("New");
        else if(result[i].status_id==2)labels.push("In progress");
        else if(result[i].status_id==3)labels.push("Done");
        data.push(result[i].requests);
    }

var statistics = new Chart(ctx4, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor:  ["#20b2aa", "#C0C0C0"]
            }]
        },
        options: {
              scales: {
                  xAxes: [{
                    ticks: {
                       beginAtZero: true,
                       fixedStepSize: 2,
                       max: 15,
                       min: 0
                   },
                    barPercentage: 1.0,
                    categoryPercentage: 0.1
                  }]
              }
          }
      });
</script>
@endsection
