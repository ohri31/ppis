{{-- \resources\views\users\index.blade.php --}} 
@extends('layouts.app') 
@section('title', '| Test Requests') 
@section('content')
@can('CanManageTestRequests')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-lg-14 col-lg-offset-1">
            @if (!empty($test_reports))
            <h1><i class="fa fa-cubes"></i> Finished Test Requests </h1>
            
            @else
            <h1><i class="fa fa-cubes"></i> Test Requests </h1>
            
            @endif
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                    aria-valuemax="100"></div>
            </div>
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
                            @if (!empty($test_reports))
                            <th>Report created</th>
                            <th>Report approved</th>
                            
                            @endif
                            
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($testrequests as $tr)

                        <tr>
                            <td>
                                <a href="{{ URL::to('testrequests/'.$tr->id.'/single') }}">{{ $tr->name }}</a>
                            </td>
                            <td>{{ $tr->description }}</td>
                            <td>{{ $tr->equipment->name}}</td>
                            <td>{{ $tr->user->company_name}}</td>
                            <td>{{ $tr->status->name}}</td>
                            <td style="text-align:center;">
                                @if($tr->approved == 1)
                                <i class="fa fa-check" style="font-size:24px;"></i> @elseif ($tr->approved == 3)
                                <i class="fa fa-close" style="font-size:24px;"></i> @else
                                <i class="fa fa-hourglass-half" style="font-size:24px;"></i> @endif
                            </td>
                            @if(isset($tr->approvedby))
                            <td>{{ $tr->approvedby->name}}</td>
                            @else
                            <td>Not approved</td>

                            @endif
                            <td>{{ $tr->created_at->format('F d, Y h:ia') }}</td>
                            <td style="text-align: center;">
                                <div class="btn-group">
                                     @hasanyrole('Company|TestMngr')
                                        @if($tr->status->id == 3)
                                            <a href="{{ url('testrequests/'.$tr->id.'/pdf' )}}" class="btn btn-danger" style="margin-right: 15px;border-radius: 3px;">
                                                <i class="far fa-file-pdf"></i>
                                            </a>
                                        @endif
                                    @endhasanyrole
                                    @role('Tester')
                                    <a href="{{ URL::to('testrequests/'.$tr->id.'/edit') }}" class="btn btn-info" style="margin-right: 6px; float: left;">Edit</a>                                    @endrole @role('Company') {!! Form::open(['method' => 'DELETE', 'route' => ['testrequests.destroy',
                                    $tr->id] ]) !!} {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} {!! Form::close()
                                    !!} 
                                    @endrole
                                     @role('Management') 
                                     {!! Form::open(['method' => 'PUT', 'route' => ['testrequests.approved', $tr->id] ]) !!} 
                                    {!! Form::submit('Approve', ['class' => 'btn btn-info']) !!}
                                     {!! Form::close()!!} 

                                    {!! Form::open(['method' => 'PUT', 'route' => ['testrequests.declined', $tr->id]]) !!} 
                                    {!! Form::submit('Decline', ['class' => 'btn btn-danger']) !!} 
                                    {!! Form::close() !!}
                                    @endrole
                                   
                                </div>
                            </td>
                          
                            @if( ! empty($test_reports))
                                @foreach ($test_reports as $test_report)
                                   @if ($test_report->request->id == $tr->id)
                                    <td style="text-align:center;">
                                       <i class="fa fa-check-square" style="color:green;  text-align:center; font-size:25px;"></i>
                                    </td>
                                    <td style="text-align:center;">
                                        @if ($test_report->approved == '1')
                                            <i class="fa fa-check-square" style="color:green;  text-align:center; font-size:25px;"></i>
                                        @else 
                                            <i class="fa fa-times-circle" style="color:red;  text-align:center; font-size:25px;"></i>
                                        @endif
                                    </td>
                                   @endif
                                @endforeach             
                            @endif
                           
                            @hasanyrole('Tester|TestMngr')
                            <td>
                                 <a href="{{ URL::to('testrequests/'.$tr->id.'/testcases') }}" class="btn btn-warning" style="margin-right: 6px; float: left; font-weight: bold;">View test cases</a>                                 
                            </td>
                            @endhasanyrole
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            @role('Company')
            <a href="{{ URL::to('testrequests/create') }}" class="btn btn-success">Add Test Request</a> @endrole

           


        </div>
    </div>
</div>
@endcan
@endsection