@extends('layouts.app') 
@section('title', '| Test Case Overview') 
@section('content')
<div class="container ">
    <div class="col-md-12 justify-content-center">
        <div class="row">
            <div class="col-md-6">
                <h1>
                    <i class="fa fa-eye"></i> Test Case Overview
                </h1>
                <hr />
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td><b>Name</b></td>
                                <td>{{ $case->name }}</td>
                            </tr>
                            <tr>
                                <td><b>Steps</b></td>
                                <td>{{ $case->steps }}</td>
                            </tr>
                            <tr>
                                <td><b>Data</b></td>
                                <td>{{ $case->test_data }}</td>
                            </tr>
                            <tr>
                                <td><b>Actual results</b></td>
                                <td>{{ $case->actual_results }}</td>
                            </tr>
                            <tr>
                                <td><b>Expected results</b></td>
                                <td>[{{ $case->expectedresult->min_result }}, {{ $case->expectedresult->max_result }}]</td>
                            </tr>
                            <tr>
                                <td><b>Notes</b></td>
                                <td>{{ $case->notes }}</td>
                            </tr>
                            <tr>
                                @if ($case->status == 1)
                                <td><b>Test failed</b></td>
                                <td style="background-color:maroon"></td>
                                @else
                                <td><b>Test passed</b></td>
                                <td style="background-color: green"></td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row form-group">
                    <a class="btn btn-info  btn-block" href="/" role="button">Add new test case</a>
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-light" style="width: 100%;padding: 15px;margin-top: 15px;">
                        Go back 
                    </a>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="background-color:lightseagreen;"><h5> About test request </h5> </div>
                    <div class="card-body"> 
                            <ul class="list-group">
                                    <li class="list-group-item"> <b> Company </b> {{ $case->expectedresult->testrequest->user->company_name}} </li>
                        
                                    <li class="list-group-item"><b> Name: </b> {{ $case->expectedresult->testrequest->name }} </li>
                                    <li class="list-group-item"><b> Description: </b> {{ $case->expectedresult->testrequest->description }}</li>
                                    <li class="list-group-item"><b> Equipment: </b> {{ $case->expectedresult->testrequest->equipment->name }}</li>
                                    <li class="list-group-item"> <b> Created at: </b> {{ $case->expectedresult->testrequest->created_at  }} </li>
                                    <li class="list-group-item"> <b> Status: </b> {{ $case->expectedresult->testrequest->status->name}} </li>
                                    <li class="list-group-item"> <b> Approved by: </b> {{ $case->expectedresult->testrequest->approvedby->name }} </li>
                                
                                    @if($case->expectedresult->testrequest->end_date > $today)
                                    <li class="list-group-item" style="color:green"> <i class="fa fa-clock-o" style="font-size:26px; color:green" ></i> <b> Due date: </b> {{ $case->expectedresult->testrequest->end_date }}   </li>
                                    
                                    @else 
                                    <li class="list-group-item" style="color:red">           <i class="fa fa-clock-o" style="font-size:26px; color:red" ></i> <b> Due date: </b> {{ $case->expectedresult->testrequest->end_date }}     </li>
                        
                        
                                    @endif
                                  </ul>
                    </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection