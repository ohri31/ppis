@extends('layouts.app')

@section('title', '| Edit Permission')

@section('content')
@can ('CanManageUsers')

<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
  <div class="card">
      <div class="card-header">
    <h1><i class='fa fa-key'></i> Edit {{$permission->name}}</h1>
  </div>
    <br>
    <div class="card-body">

    {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}

    <div class="form-group">
        {{ Form::label('name', 'Permission Name') }}
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
