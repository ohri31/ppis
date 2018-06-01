{{-- \resources\views\users\index.blade.php --}}
@extends('layouts.app')
@section('title', '| Equipment')

@section('content')
@can('CanManageEquipment')
<div class="container">
    <div class="row justify-content-center">
<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="fa fa-cubes"></i> Equipment Administration  <a href="{{ route('equipmenttypes.index') }}" class="btn btn-default pull-right">Equipment types</a></h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Date/Time Added</th>
                    <th>Operations</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($equipment as $e)
                <tr>

                    <td>{{ $e->name }}</td>
                    <td>{{ $e->description }}</td>
                    <td>{{ $e->equipment_type->name}}</td>
                    <td>{{ $e->created_at->format('F d, Y h:ia') }}</td>
                    <td>
                        <div class="btn-group">

                      <a href="{{ URL::to('equipment/'.$e->id.'/edit') }}" class="btn btn-info" style="margin-right: 6px; float: left;">Edit</a>

                      {!! Form::open(['method' => 'DELETE', 'route' => ['equipment.destroy', $e->id] ]) !!}
                      {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                      {!! Form::close() !!}
  </div>
                      </td>
                  </tr>
                  @endforeach
              </tbody>

          </table>
      </div>

      <a href="{{ URL::to('equipment/create') }}" class="btn btn-success">Add Equipment</a>

      <a href="{{ url()->previous() }}" class="btn btn-light" style="width: 100%;padding: 15px;margin-top: 15px;">
            Go back
        </a>
  </div>
  </div>
  </div>
@endcan
  @endsection
