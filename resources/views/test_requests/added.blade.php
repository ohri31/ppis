@extends('layouts.app') 
@section('title', '| Add Test Request') 
@section('content') @can ('CanSendRequestsForTesting')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-6 justify-content-center">

            <div class="card">

                <div class="card-header text-white bg-success">Finished</div>
                <div class="card-body">
                    <h5 class="card-title"> Successfully created test request and added expected results.</h5>
                </div>
            </div>
            <hr>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                    aria-valuemax="100"></div>
            </div>
        </div>
    </div>
</div>

@endcan
@endsection