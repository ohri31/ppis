{{-- \resources\views\users\index.blade.php --}} 
@extends('layouts.app') 
@section('title', '| Test Reports') 
@section('content')
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
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($reports as $tr)
                            <tr>
                                <td><a href="{{ URL::to('testreports/'.$tr->id) }}">{{ $tr->title }}</a></td>
                                <td>{{ $tr->description }}</td>
                                <td>{{ $tr->date }}</td>
                                <td>{{ $tr->tester->name." ".$tr->tester->surname }}</td>
                                <td>{{ $tr->request->name }}</td>
                                <td>{{ ($tr->approved==1) ? "Approved" : "Declined" }}</td>
                                
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
@endsection