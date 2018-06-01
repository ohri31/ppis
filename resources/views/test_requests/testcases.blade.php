@extends('layouts.app') 
@section('title', '| Test Case Overview') 
@section('content')
<div class="container ">
  <div class="col-md-12 justify-content-center">
    <h1>
      <i class="fa fa-eye"></i> Test Cases Overview
    </h1>
    <hr />

    <div class="row">

      <div class="col-md-6">


        <div class="card">
          <div class="card-header" style="background-color:lightseagreen; color:white;">
            <h3> <i class="fa fa-tags" style='color:white'></i> Test cases</h3>
          </div>
          <div class="card-body">
            @if (count($test_cases) > 0)
            <table class="table table-bordered table-striped">
              <tbody>
                <th> Title </th>
                <th> Data </th>
                <th> Result </th>
                <th> Range</th>
                <th> Pass </th>
                @foreach ($test_cases as $tr)
                <tr>
                  <td><a href="{{ URL::to('testcases/'.$tr->id) }}">{{ $tr->name }}</a></td>
                  <td>{{ $tr->test_data }}</td>
                  <td>{{ $tr->actual_results }}</td>
                  <td>{{ $tr->expectedresult->min_result}} - {{ $tr->expectedresult->max_result}} {{ $tr->expectedresult->unit}}
                    </td>

                  @if ($tr->status == 1)
                  <td style="text-align: center; max-width:2px;"> <i class="fa fa-check-circle" style="color:green; font-size:20px;"></i></td>
                  @else
                  <td style="text-align: center; max-width:2px;"><i class="fa fa-remove" style="color:red; font-size:20px;"></i></td>
                  @endif
                </tr>

                @endforeach
              </tbody>

            </table>

            @else
            <div class="alert alert-info">
              Test cases not found
            </div>

            @endif

          </div>
        </div>





        <a href="{{ url()->previous() }}" class="btn btn-light" style="width: 100%;padding: 15px;margin-top: 15px;">
                        Go back
                    </a>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header" style="background-color:lightseagreen; color:white; text-align:center">
            <h3> About test request </h3>
          </div>
          <div class="card-body">

            <ul class="list-group">
              <li class="list-group-item"> <b> Company </b> {{ $test_request->user->company_name}} </li>

              <li class="list-group-item"><b> Name: </b> {{ $test_request->name }} </li>
              <li class="list-group-item"><b> Description: </b> {{ $test_request->description }}</li>
              <li class="list-group-item"><b> Equipment: </b> {{ $test_request->equipment->name }}</li>
              <li class="list-group-item"> <b> Created at: </b> {{ $test_request->created_at }} </li>
              <li class="list-group-item"> <b> Status: </b> {{ $test_request->status->name}} </li>
              @if(isset($test_request->approvedBy))
              <li class="list-group-item"> <b> Approved by: </b> {{ $test_request->approvedby->name }} </li>
              @else
              <li class="list-group-item"> <b> Approved by: </b> Not approved </li>

              @endif @if($test_request->end_date > $today)
              <li class="list-group-item" style="color:green"> <i class="fa fa-clock-o" style="font-size:26px; color:green"></i> <b> Due date: </b> {{ $test_request->end_date
                }} </li>

              @else
              <li class="list-group-item" style="color:red"> <i class="fa fa-clock-o" style="font-size:26px; color:red"></i> <b> Due date: </b> {{ $test_request->end_date
                }} </li>


              @endif
            </ul>


          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection