@extends('layouts.app')

@section('title', '| Add EquipmentType')

@section('content')

<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
  <div class="card">
      <div class="card-header">
    <h1><i class='fa fa-plus'></i> Add Equipment Type</h1>
    <hr>
</div>

    <div class="card-body">
    {{ Form::open(array('url' => 'equipmenttypes')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
</div>
</div>
</div>
</div>
</div>

@endsection
