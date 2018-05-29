{{-- \resources\views\users\index.blade.php --}} 
@extends('layouts.app') 
@section('title', '| Test requests') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-lg-offset-1">
            <h1>
                <i class="fas fa-chart-bar"></i> Test requests 
            </h1>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Equipment</th>
                            <th>Date created</th>
                            <th>Approved by</th>
                            <th>Status</th>
                            <th> Due date </th>

                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($requests as $tr)
                            <tr>
                                <td><a href="{{ URL::to('testrequests/'.$tr->id.'single') }}">{{ $tr->name }}</a></td>
                                <td> {{ $tr->user->company_name}} </td>
                                <td>{{ $tr->equipment->name }}</td>
                                <td>{{  $tr->created_at  }}</td>
                                <td>{{ $tr->approvedby->name }}</td>
                                <td> {{ $tr->status->name}}  </td>
                                @if($tr->end_date > $today)
                                <td style="background-color:green; font-weight:bold;"> <b> {{ $tr->end_date }} </b> </td>
                                @else 
                                <td style="background-color:red; font-weight:bold;">  {{ $tr->end_date }}</td>
                                @endif
                                
                            </tr>
                        @empty
                            <tr>
                                <td>No requests</td>
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