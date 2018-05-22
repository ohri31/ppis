@extends('layouts.app') 
@section('title', '| Test Report Overview') 
@section('content') 
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-6 justify-content-center">
            <h1>
                <i class="fa fa-eye"></i> Test Report Overview
            </h1>
            <hr />
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <td><b>Title</b></td>
                            <td>{{ $report->title }}</td>
                        </tr>
                        <tr>
                            <td><b>Description</b></td>
                            <td>{{ $report->description }}</td>
                        </tr>
                        <tr>
                            <td><b>Date</b></td>
                            <td>{{ $report->date }}</td>
                        </tr>
                        <tr>
                            <td><b>Tester</b></td>
                            <td>{{ $report->tester->name." ".$report->tester->surname }}</td>
                        </tr>
                        <tr>
                            <td><b>Request</b></td>
                            <td>{{ $report->request->name }}</td>
                        </tr>
                        <tr>
                            <td><b>Status</b></td>
                            <td>{{ ($report->status) ? "In progress" : "Finished" }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection