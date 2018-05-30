@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-lg-offset-1 justify-content-center">
            <div class="jumbotron" style="border-color:lightseagreen;">
                <div class="row">
                    <div class="col" style="text-align:center; vertical-align:middle;">

                            <h1 class="display-4">
                                    @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                    @endif Welcome !</h1>
                        <h4> You are logged in as {{Auth::user()->roles()->pluck('name')[0]}}! </h4>
                        <hr class="my-4">
                         @role('Company')
                        <p> Verify your equipment! </p>
                        @endrole
                        <div class="col align-text-bottom">
                            @hasanyrole('Company|Management')
                            <div class="col">
                                <div class="row form-group">
                                    <a class="btn btn-outline-primary btn-block align-bottom" href="{{ URL::to('testrequests') }}" role="button">View test request</a>
                                </div>
                            </div>
                            @endhasanyrole @hasanyrole('Management')
                            <div class="col">
                                <div class="row form-group">
                                    <a class="btn btn-outline-primary btn-block" href="{{ URL::to('/approvedrequests') }}" role="button">View approved and declined requests</a>
                                </div>
                            </div>
                            @endhasanyrole @role('Tester')
                            <div class="col">
                                <div class="row form-group">
                                    <a class="btn btn-success  btn-block" href="{{ URL::to('testrequests') }}" role="button">View approved test requests</a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row form-group">
                                    <a class="btn btn-success  btn-block" href="{{ URL::to('finishedtestrequests') }}" role="button">View finished test requests</a>
                                </div>
                            </div>
                            @endrole @role('TestMngr')
                            <div class="col">
                                <div class="row form-group">
                                    <a class="btn btn-success  btn-block" href="{{ URL::to('testreports') }}" role="button">View reports waiting for approval</a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row form-group">
                                    <a class="btn btn-info  btn-block" href="{{ URL::to('/approvedreports') }}" role="button">View approved test reports</a>
                                </div>
                            </div>
                            @else
                            <div class="col">
                                <div class="row form-group">
                                    <a class="btn btn-info  btn-block" href="{{ URL::to('testreports') }}" role="button">View test reports</a>
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

                    <div class="col ">
                            <img src="../resources/img.jpg" alt="First slide">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
