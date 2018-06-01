@extends('layouts.app')

@section('title', '| Add Role')

@section('content')
@can ('CanManageUsers')

<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
  <div class="card">
      <div class="card-header">
    <h1><i class='fa fa-key'></i> Add Role</h1>
    <hr>
</div>

    <div class="card-body">
    {{ Form::open(array('url' => 'roles')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <h5><b>Assign Permissions</b></h5>

    <div class='form-group'>
        @foreach ($permissions as $permission)
            {{ Form::checkbox('permissions[]',  $permission->id ) }}
            {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>

        @endforeach
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
