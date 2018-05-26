@extends('layouts.app') 
@section('title', '| Add Test Case Type') 
@section('content') 
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-6 justify-content-center">
            <h1>
                <i class="far fa-edit"></i> Create test case type
            </h1>
            <hr />
            {!! Form::open([
                'url' => '/testcasetype', 
                'class' => 'form-horizontal', 
                'files' => true]) 
            !!}
                @include('testcasetype.form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection