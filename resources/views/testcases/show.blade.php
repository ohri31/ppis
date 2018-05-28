@extends('layouts.app') 
@section('title', '| Test Case Overview') 
@section('content') 
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-6 justify-content-center">
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
                            <td><b>Notes</b></td>
                            <td>{{ $case->notes }}</td>
                        </tr>
                        <tr>
                            <td><b>Status</b></td>
                            <td>{{ $case->status }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection