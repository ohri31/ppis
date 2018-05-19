@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-lg-offset-1">
            <div class="jumbotron">
                <h1 class="display-4">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif Welcome !</h1>
                <div class="row">
                    <div class="col">

                        <p class="lead"> You are logged in! </p>
                        <hr class="my-4"> @role('Company')
                        <p> Verify your equipment! </p>
                        @endrole
                    </div>
                    <div class="col ">
                        <div class="col-md-8 align-text-bottom">
                            @hasanyrole('Company|Management')
                            <div class="col">
                                <div class="row form-group">
                                    <a class="btn btn-outline-primary btn-block align-bottom" href="{{ URL::to('testrequests') }}" role="button">View test request</a>
                                </div>
                            </div>
                            @endhasanyrole @hasanyrole('Management')
                            <div class="col">
                                <div class="row form-group">
                                    <a class="btn btn-outline-primary btn-block" href="{{ URL::to('testrequests') }}" role="button">View requests for adding new device</a>
                                </div>
                            </div>
                            @endhasanyrole @role('Tester')
                            <div class="col">
                                <div class="row form-group">
                                    <a class="btn btn-success  btn-block" href="{{ URL::to('testrequests') }}" role="button">View approved test request</a>
                                </div>
                            </div>
                            @endrole @role('TestMngr')
                            <div class="col">
                                <div class="row form-group">
                                    <a class="btn btn-success  btn-block" href="{{ URL::to('testrequests') }}" role="button">View reports waiting for approval</a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row form-group">
                                    <a class="btn btn-info  btn-block" href="{{ URL::to('testrequests') }}" role="button">View approved test reports</a>
                                </div>
                            </div>
                            @else
                            <div class="col">
                                <div class="row form-group">
                                    <a class="btn btn-info  btn-block" href="{{ URL::to('testrequests') }}" role="button">View test reports</a>
                                </div>
                            </div>
                            @endrole @role('Company')
                            <div class="col">
                                <div class="row form-group">
                                    <a class="btn btn-success  btn-block" href="{{ URL::to('testrequests/create') }}" role="button">Create new test request</a>
                                </div>
                            </div>
                            @endrole
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection