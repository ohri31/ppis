{{-- \resources\views\users\index.blade.php --}}
@extends('layouts.app')
@section('title', '| Users')

@section('content')
@can ('CanManageUsers')

<div class="container">
    <div class="row justify-content-center">
<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="fa fa-users"></i> Approve/Decline Companies <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a>
    <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a>
    <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Manage users</a></h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Date/Time Added</th>
                    <th>User Roles</th>
                    <th>Operations</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                <tr>

                    <td>{{ $user->name }}</td>
                    <td>{{ $user->surname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                    <td>{{  $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                    <td>
                      <div class="btn-group">
                      {!! Form::open(['method' => 'PUT', 'route' => ['users.approved', $user->id] ]) !!}
                      {!! Form::submit('Approve', ['class' => 'btn btn-info']) !!}
                      {!! Form::close() !!}

                      {!! Form::open(['method' => 'PUT', 'route' => ['users.declined', $user->id] ]) !!}
                      {!! Form::submit('Decline', ['class' => 'btn btn-danger']) !!}
                      {!! Form::close() !!}

                    
                    {!! Form::close() !!}
</div>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>
</div>
</div>
@endcan
@endsection
