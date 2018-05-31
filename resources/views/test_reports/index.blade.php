{{-- \resources\views\users\index.blade.php --}} 
@extends('layouts.app') 
@section('title', '| Test Reports') 
@section('content')
@can('CanManageTestReports')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-lg-offset-1">
            <h1>
                <i class="fas fa-chart-bar"></i> Test Reports 
            </h1>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Tester</th>
                            <th>Request</th>
                            <th>Status</th>
                            <th> Operations</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($reports as $tr)
                            <tr>
                                <td>{{ $tr->title }}</td>
                                <td>{{ $tr->description }}</td>
                                <td>{{ $tr->date }}</td>
                                <td>{{ $tr->tester->name." ".$tr->tester->surname }}</td>
                                <td>{{ $tr->request->name }}</td>
                                <td>{{ ($tr->status) ? "In progress" : "Finished" }}</td>
                                <td>
                                    <div class="btn-group">
                                        @role('Tester')
                                        <a href="{{ URL::to('testreports/'.$tr->id.'/edit') }}" class="btn btn-info" style="margin-right: 6px; float: left;">Edit</a>                                    @endrole @role('Company') {!! Form::open(['method' => 'DELETE', 'route' => ['testreports.destroy',
                                        $tr->id] ]) !!} {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} {!! Form::close()
                                        !!} 
                                        @endrole
                                         @role('TestMngr') 
                                         {!! Form::open(['method' => 'PUT', 'route' => ['testreports.approved', $tr->id] ]) !!} 
                                        {!! Form::submit('Approve', ['class' => 'btn btn-info']) !!}
                                         {!! Form::close()!!} 
    
                                        {!! Form::open(['method' => 'PUT', 'route' => ['testreports.declined', $tr->id]]) !!} 
                                        {!! Form::submit('Decline', ['class' => 'btn btn-danger']) !!} 
                                        {!! Form::close() !!}
                                        @endrole
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>No reports</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>                            
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
            @role('Company')
            <a href="{{ URL::to('testrequests/create') }}" class="btn btn-success">Add Test Request</a> 
            @endrole
        </div>
    </div>
</div>
@endcan
@endsection