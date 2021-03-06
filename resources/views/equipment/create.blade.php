@extends('layouts.app')

@section('title', '| Add Equipment')

@section('content')
@can('CanManageEquipment')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
  <div class="card">
      <div class="card-header">
    <h1><i class='fa fa-plus'></i> Add Equipment</h1>
    <hr>
</div>

    <div class="card-body">
    {{ Form::open(array('url' => 'equipment')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description', null, array('class' => 'form-control')) }}
    </div>



    <div class='form-group'>
      {!! Form::label('equipment_type', 'Equipment type', ['class' => 'control-label']) !!}
      {!! Form::select('equipment_type', $equipment_types, 1, ['class' => 'form-control']) !!}

    </div>
    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

    <a href="{{ url()->previous() }}" class="btn btn-light" style="width: 100%;padding: 15px;margin-top: 15px;">
            Go back
        </a>
</div>
</div>
</div>
</div>
</div>
@endcan
@endsection
