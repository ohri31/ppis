{{-- \resources\views\permissions\create.blade.php --}}
@extends('layouts.app')

@section('title', '| Create Permission')

@section('content')
@can ('CanManageUsers')

<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
  <div class="card">
      <div class="card-header">

    <h1><i class='fa fa-key'></i> Add Permission</h1>
    </div>

    <br>
  <div class="card-body">
    {{ Form::open(array('url' => 'permissions')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div><br>
    @if(!$roles->isEmpty())
        <h4>Assign Permission to Roles</h4>

        @foreach ($roles as $role)
            {{ Form::checkbox('roles[]',  $role->id ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

        @endforeach
    @endif
    <br>
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
