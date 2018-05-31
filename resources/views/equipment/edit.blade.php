@extends('layouts.app')

@section('title', '| Edit Equipment')

@section('content')
@can('CanAddEquipment')

<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
  <div class="card">
      <div class="card-header">
    <h1><i class='fa fa-edit'></i> Edit Equipment</h1>
    <hr>
</div>

    <div class="card-body">
      {{ Form::model($equipment, array('route' => array('equipment.update', $equipment->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}

      <div class="form-group">
          {{ Form::label('name', 'Name') }}
          {{ Form::text('name', null, array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
          {{ Form::label('description', 'Description') }}
          {{ Form::text('description', null, array('class' => 'form-control')) }}
      </div>



      <div class='form-group'>
        {!! Form::label('equipment_type', 'Equipment type', ['class' => 'control-label']) !!}
        {!! Form::select('equipment_type', $equipment_types, $equipment->equipment_type_id, ['class' => 'form-control']) !!}

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
