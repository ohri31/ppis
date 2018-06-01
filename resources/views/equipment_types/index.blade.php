{{-- \resources\views\users\index.blade.php --}}
@extends('layouts.app')
@section('title', '| EquipmentType')

@section('content')
@can('CanManageEquipment')

<div class="container">
    <div class="row justify-content-center">
<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="fa fa-cubes"></i> Equipment Type Administration</h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Operation</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($equipment_types as $e)
                <tr>

                    <td>{{ $e->name }}</td>
                  <td>
                      <div class="btn-group">

                    <a href="{{ URL::to('equipmenttypes/'.$e->id.'/edit') }}" class="btn btn-info" style="margin-right: 6px; float: left;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['equipmenttypes.destroy', $e->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
</div>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <a href="{{ URL::to('equipmenttypes/create') }}" class="btn btn-success">Add Equipment Type</a>

</div>
</div>
</div>
@endcan
@endsection
