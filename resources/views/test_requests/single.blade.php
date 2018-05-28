{{-- \resources\views\users\index.blade.php --}} 
@extends('layouts.app') 
@section('title', '| User profile') 
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-10 col-lg-offset-1">
      <h1><i class="fa fa-sticky-note"></i> Test request {{$test_request->name }} </h1>
      <hr>
      <div class="row">
        <div class="col">

          <ul class="list-group">
            <li class="list-group-item"> <b> Company </b> {{ $test_request->user->company_name}} </li>

            <li class="list-group-item"><b> Name: </b> {{ $test_request->name }} </li>
            <li class="list-group-item"><b> Description: </b> {{ $test_request->description }}</li>
            <li class="list-group-item"><b> Equipment: </b> {{ $test_request->equipment->name }}</li>
            <li class="list-group-item"> <b> Created at: </b> {{ $test_request->created_at  }} </li>
            <li class="list-group-item"> <b> Status: </b> {{ $test_request->status->name}} </li>
            @if(isset($test_request->approvedBy))
            <li class="list-group-item"> <b> Approved by: </b> {{ $test_request->approvedby->name }} </li>
            @else
            <li class="list-group-item"> <b> Approved by: </b> Not approved </li>

            @endif
            @if($test_request->end_date > $today)
            <li class="list-group-item" style="color:green"> <i class="fa fa-clock-o" style="font-size:26px; color:green" ></i> <b> Due date: </b> {{ $test_request->end_date }}   </li>
            
            @else 
            <li class="list-group-item" style="color:red">           <i class="fa fa-clock-o" style="font-size:26px; color:red" ></i> <b> Due date: </b> {{ $test_request->end_date }}     </li>


            @endif
          </ul>

        </div>
        <div class="col justify-content-center">
          <h4> Added expected results </h4>

          @if (count($expected_results) > 0) @foreach ($expected_results as $tr)
          <i class="fa fa-check-circle-o" style='color:green'></i> {{ $tr->description }} - [{{$tr->min_result}}, {{$tr->max_result}}]{{$tr->unit}} <br>
          @endforeach @else
          <div class="alert alert-info">
            Expected results not found
          </div>
          @endif
        </div>
      </div>


    </div>
  </div>
</div>
@endsection