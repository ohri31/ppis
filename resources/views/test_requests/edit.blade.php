@extends('layouts.app')
@section('title', '| Edit Test Request')
@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
  <div class="card">
      <div class="card-header">
    <h1><i class='fa fa-edit'></i> Edit Test Request</h1>
    <hr>
</div>

    <div class="card-body">
      {{ Form::model($test_request, array('route' => array('testrequests.update', $test_request->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}

      <div class="form-group">
          {{ Form::label('name', 'Name') }}
          {{ Form::text('name', null, array('class' => 'form-control','readonly')) }}
      </div>

      <div class="form-group">
          {{ Form::label('description', 'Description') }}
          {{ Form::text('description', null, array('class' => 'form-control','readonly')) }}
      </div>

      <div class='form-group'>
        {!! Form::label('equipment', 'Equipment ', ['class' => 'control-label']) !!}
        {!! Form::select('equipment', $equipment, $test_request->equipment_id, ['class' => 'form-control','readonly']) !!}

      </div>

      <div class='form-group'>
        {!! Form::label('status', 'Status ', ['class' => 'control-label']) !!}
        {!! Form::select('status', $status, $test_request->status_id, ['class' => 'form-control']) !!}

      </div>


      {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

      {{ Form::close() }}
</div>
</div>
</div>
</div>
</div>
@endsection
