@extends('layouts.app') 
@section('title', '| Add Test Request') 
@section('content') @can ('CanSendRequestsForTesting')
<div class="container">
  <div class="col-md-12 ">
    @if(empty($flash_message)) @else
    <div class="container">
      <div class="alert alert-success"><em> {{$flash_message}}</em>
      </div>
    </div>
    @endif

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
                {{ Form::label('test_id', 'Test request id') }}
                <div class="col-sm-4">
                  {{ Form::text('test_id', $test_request->id, array('class' => 'form-control', 'readonly')) }}

                </div>

              </div>
            </div>
            <div class="form-group">
              {{ Form::label('description', 'Description (insert parameter that is being tested):') }} {{ Form::textarea('description',
              null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
              {{ Form::label('unit', 'Unit') }} {{ Form::text('unit', null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
              {{ Form::label('min_value', 'Minimum value/result:') }} {{ Form::number('min_value', null ,array('class' => 'form-control',
              'step'=>'0.00001')) }}
            </div>
            <div class="form-group">
              {{ Form::label('max_value', 'Maximum value/result:') }} {{ Form::number('max_value', null ,array('class' => 'form-control',
              'step'=>'0.00001')) }}
            </div>

            <hr>
            <div class="form-group">

              <a class="btn btn-secondary btn-lg" href="{{ URL::to('testrequests') }}" role="button">Skip</a>
            </div>

            {{ Form::submit('Send expected result', array('class' => 'btn btn-success btn-lg float-right')) }} {{ Form::close() }}

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

            @if (count($expected_results) > 0) @foreach ($expected_results as $tr) 
            <i class="fa fa-check-circle-o" style='color:green'></i>
            {{ $tr->description }} - [{{$tr->min_result}}, {{$tr->max_result}}]{{$tr->unit}} 
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
</div>

@endcan
@endsection