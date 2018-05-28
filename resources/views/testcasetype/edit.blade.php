@extends('layouts.app') 
@section('title', '| Edit Test Case Type') 
@section('content') 
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-6 justify-content-center">
            <h1>
                <i class="far fa-edit"></i> Edit test case type
            </h1>
            <hr />
            {!! Form::model($type, [
                'method' => 'PATCH',
                'url' => ['/testcasetype', $type->id],
                'class' => 'form-horizontal'
            ]) !!}
                @include('testcasetype.form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection