{{-- \resources\views\users\index.blade.php --}}
@extends('layouts.app')
@section('title', '| Test Requests')

@section('content')
<div class="container">
    <div class="row justify-content-center">
<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="fa fa-cubes"></i> Test Requests Administration</h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Equipment</th>
                    <th>Company</th>
                    <th>Status</th>
                    <th>Approved</th>
                    <th>Approved by</th>
                    <th>Date/Time Added</th>
                    <th>Operations</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($testrequests as $tr)

                <tr>

                    <td>{{ $tr->name }}</td>
                    <td>{{ $tr->description }}</td>
                    <td>{{ $tr->equipment->name}}</td>
                    <td>{{ $tr->user->company_name}}</td>
                    <td>{{ $tr->status->name}}</td>
                    <td style="text-align:center;">
                    @if($tr->approved == 1)
                    <i class="fa fa-check" style="font-size:24px;"></i>
                    @elseif ($tr->approved == 3)
                    <i class="fa fa-close" style="font-size:24px;"></i>
                    @else
                    <i class="fa fa-hourglass-half" style="font-size:24px;"></i>
                    @endif
                  </td>
                    @if(isset($tr->approvedby))
                    <td>{{ $tr->approvedby->name}}</td>
                    @else
                    <td>Not approved</td>

                    @endif
                    <td>{{ $tr->created_at->format('F d, Y h:ia') }}</td>
                    <td>
                        <div class="btn-group">
                      @role('Tester')
                      <a href="{{ URL::to('testrequests/'.$tr->id.'/edit') }}" class="btn btn-info" style="margin-right: 6px; float: left;">Edit</a>
                      @endrole
                      @role('Company')
                      {!! Form::open(['method' => 'DELETE', 'route' => ['testrequests.destroy', $tr->id] ]) !!}
                      {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                      {!! Form::close() !!}
                      @endrole
                      @role('Management')
                      {!! Form::open(['method' => 'PUT', 'route' => ['testrequests.approved', $tr->id] ]) !!}
                      {!! Form::submit('Approve', ['class' => 'btn btn-info']) !!}
                      {!! Form::close() !!}

                      {!! Form::open(['method' => 'PUT', 'route' => ['testrequests.declined', $tr->id] ]) !!}
                      {!! Form::submit('Decline', ['class' => 'btn btn-danger']) !!}
                      {!! Form::close() !!}
                      @endrole
  </div>
                      </td>
                  </tr>
                  @endforeach
              </tbody>

          </table>
      </div>
@role('Company')
      <a href="{{ URL::to('testrequests/create') }}" class="btn btn-success">Add Test Request</a>
@endrole
  </div>
  </div>
  </div>

  @endsection
