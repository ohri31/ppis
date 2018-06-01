@extends('layouts.app') 
@section('title', '| Edit Test Report') 
@section('content') 
@can('CanCreateTestReports')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-6 justify-content-center">
            <h1>
                <i class="far fa-edit"></i> Edit test report
            </h1>
            <hr />
            {!! Form::model($report, [
                'method' => 'PATCH',
                'url' => ['/testreports', $report->id],
                'class' => 'form-horizontal'
            ]) !!}
                @include('test_reports.form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endcan
@endsection