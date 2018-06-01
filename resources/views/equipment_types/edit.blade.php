@extends('layouts.app')

@section('title', '| Edit EquipmentType')
@can('CanManageEquipment')
@section('content')

<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
  <div class="card">
      <div class="card-header">
    <h1><i class='fa fa-edit'></i> Edit Equipment Type</h1>
    <hr>
</div>

    <div class="card-body">
      {{ Form::model($equipment_type, array('route' => array('equipmenttypes.update', $equipment_type->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}

      <div class="form-group">
          {{ Form::label('name', 'Equipment type Name') }}
          {{ Form::text('name', null, array('class' => 'form-control')) }}
      </div>
      <br>
      {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

      {{ Form::close() }}
</div>
</div>
</div>
</div>
</div>
@endcan
@endsection
