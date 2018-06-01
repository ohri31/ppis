@extends('layouts.app') 
@section('title', '| Add Test Report') 
@section('content') 
@can('CanCreateTestReports')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-6 justify-content-center">
            <h1>
                <i class="far fa-edit"></i> Create test report
            </h1>
            <hr />
            {!! Form::open([
                'url' => '/testreports', 
                'class' => 'form-horizontal', 
                'files' => true]) 
            !!}
                @include('test_reports.form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endcan
@endsection