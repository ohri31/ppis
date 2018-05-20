@extends('layouts.app') 
@section('title', '| Add Test Request') 
@section('content') @can ('CanSendRequestsForTesting')
<div class="container">
  <div class="col-md-12 ">
    <div class="row">
      <div class="col-md-6">

        <div class="card">
          <div class="card-header bg-info text-white">
            <h1><i class='fa fa-plus'></i> Add Expected Results</h1>
          </div>
          <div class="card-body">
            {{ Form::open(array('url' => 'expectedresults')) }}
            <div class="form-group">
              <div class="row justify-content-center">
                <label for="testId" class="col-form-label">Test ID:</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="testId" readonly value='{{$test_request->id}}'>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="resultDescription" class="col-form-label">Description (insert parameter that is being tested):</label>
              <textarea class="form-control" id="resultDescription"></textarea>
            </div>
            <div class="form-group">
              <label for="resultUnit" class="col-form-label">Unit:</label>
              <input type="text" class="form-control" id="resultUnit" />
            </div>
            <div class="form-group">
              <label for="minValue" class="col-form-label">Minimum value/result:</label>
              <input type="number" step="0.00001" class="form-control" id="minValue" />
            </div>
            <div class="form-group">
              <label for="maxValue" class="col-form-label">Maximum value/result:</label>
              <input type="number" step="0.00001" class="form-control" id="maxValue" />
            </div>

            <hr> {{ Form::submit('Send test request', array('class' => 'btn btn-success btn-lg float-right')) }} {{ Form::close()
            }}
            <div class="form-group">

              <a class="btn btn-secondary btn-lg" href="{{ URL::route('testrequests/added') }}" role="button">Skip</a>
            </div>

            <div class="form-group">

            </div>
          </div>
        </div>
        <div class="progress">
          <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 66.66%" aria-valuenow="100" aria-valuemin="0"
            aria-valuemax="100"></div>
        </div>
      </div>
      <div class="col-md-6">

        <div class="card">
          <div class="card-header ">
            <h1> About test request</h1>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label class="col-form-label">Equipment:</label>
              <input type="text" class="form-control" readonly value="{{ $test_request->equipment->name }}">
            </div>
            <div class="form-group">
              <label class="col-form-label">Test request description:</label>
              <textarea class="form-control" readonly> {{$test_request->description}}</textarea>
            </div>
            <hr>
            <h4> Added expected results </h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endcan
@endsection