{{-- \resources\views\users\index.blade.php --}}
@extends('layouts.app')
@section('title', '| Test requests')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-lg-offset-1">
            <h1>
                <i class="fas fa-chart-bar"></i> Approved and declined test requests
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
                                <td> @if ($tr->status->name == "Done")
                                   <p style="color:green"> {{ $tr->status->name}}  
                                   <i class="fa fa-check"> </i> </p>
                                @else
                                {{ $tr->status->name}}  
                                @endif</td>
                                @if($tr->end_date > $today)
                                <td style="text-align: center; font-weight:bold;"><i class="fa fa-check-circle-o" style="color:green"></i> &nbsp;<b> {{ $tr->end_date }} </b> </td>
                                @else
                                <td style="text-align: center; font-weight:bold;"><i class="fa fa-remove" style="color:red"></i>&nbsp;&nbsp;&nbsp;&nbsp;{{ $tr->end_date }}</td>
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
