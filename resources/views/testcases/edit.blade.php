@extends('layouts.app') 
@section('title', '| Edit Test Case') 
@section('content') 
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-6 justify-content-center">
            <h1>
                <i class="far fa-edit"></i> Edit test case
            </h1>
            <hr />
            {!! Form::model($case, [
                'method' => 'PATCH',
                'url' => ['/testcases', $case->id],
                'class' => 'form-horizontal'
            ]) !!}
                @include('testcases.form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection