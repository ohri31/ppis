{{-- \resources\views\users\index.blade.php --}} 
@extends('layouts.app') 
@section('title', '| Test Case Type') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-lg-offset-1">
            <h1>
                <i class="fas fa-chart-bar"></i> Test Cases Type 
            </h1>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th style="text-align: right;">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($types as $tr)
                            <tr>
                                <td>{{ $tr->name }}</td>
                                <td style="text-align: right;">
                                    <a href="{{ url('testcasetype/'.$tr->id.'/edit') }}" class="btn btn-primary btn-sm">
                                        Edit 
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>No types</td>
                                <td>-</td>                            
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
            @role('Company')
            <a href="{{ URL::to('testcasetype/create') }}" class="btn btn-success">Add New Test Case</a> @endrole
        </div>
    </div>
</div>
@endsection