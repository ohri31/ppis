@extends('layouts.app')

@section('title', '| Add Test Request')

@section('content')
@can ('CanSendRequestsForTesting')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
  <div class="card">
      <div class="card-header">
    <h1><i class='fa fa-plus'></i> Add Test Request</h1>
    <hr>
</div>

    <div class="card-body">
    {{ Form::open(array('url' => 'testrequests')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::text('description', null, array('class' => 'form-control')) }}
    </div>


    <div class='form-group'>
      {!! Form::label('equipment', 'Equipment ', ['class' => 'control-label']) !!}
      {!! Form::select('equipment', $equipment, 1, ['class' => 'form-control']) !!}

    </div>
    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
</div>
</div>
</div>
</div>
</div>
@endcan
@endsection
