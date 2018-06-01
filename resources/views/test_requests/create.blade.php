@extends('layouts.app') 
@section('title', '| Add Test Request') 
@section('content')
@can ('CanSendRequestsForTesting')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-6 justify-content-center">
            {{ Form::open(array('url' => 'testrequests')) }}

            <div class="card">
                <div class="card-header bg-info text-white">
                    <h1><i class='fa fa-plus'></i> Add Test Request</h1>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        {{ Form::label('name', 'Test request name') }} 
                        {{ Form::text('name', null, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('description', 'Describe test request') }} 
                        {{ Form::text('description', null, array('class' => 'form-control')) }}
                    </div>

                    <div class='form-group'>
                        {!! Form::label('equipment', 'Choose equipment you want to test', ['class' => 'control-label']) !!} 
                        {!! Form::select('equipment', $equipment, 1, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('end_date', 'End date', ['class' => 'control-label']) !!} 
                        {!! Form::text('end_date', null, ['class' => 'form-control datepicker-future', 'placeholder' => 'Select date', 'readonly', 'required']) !!}
                    </div>

                </div>
                {{ Form::submit('Send test request', array('class' => 'btn btn-success btn-lg float-right')) }} {{ Form::close() }}

            </div>
            <hr>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 33.33%" aria-valuenow="100" aria-valuemin="0"
                    aria-valuemax="100"></div>
            </div>
        </div>
    </div>
</div>
@endcan
@endsection