{{-- \resources\views\users\index.blade.php --}} 
@extends('layouts.app') 
@section('title', '| Test Cases') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-lg-offset-1">
            <h1>
                <i class="fas fa-chart-bar"></i> Test Cases 
            </h1>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Test Request</th>
                            <th>Test Case Type</th>
                            <th>Expected Results</th>
                            <th>Status</th>
                            <th style="text-align: right;">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($cases as $tr)
                            <tr>
                                <td>{{ $tr->name }}</td>
                                <td>{{ $tr->testRequest->name }}</td>
                                <td>{{ $tr->testCaseType->name }}</td>
                                <td>{{ (isset($tr->expectedResult->id)) ? $tr->expectedResult->id : "-" }}</td>
                                <td>{{ ($tr->status) ? "Finished" : "Active" }}</td>
                                <td style="text-align: right;">
                                    <a href="{{ url('testcases/'.$tr->id.'/edit') }}" class="btn btn-primary btn-sm">
                                        Edit 
                                    </a>
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
            <a href="{{ URL::to('testcases/create') }}" class="btn btn-success">Add New Test Case</a> @endrole
        </div>
    </div>
</div>
@endsection