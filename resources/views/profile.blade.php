{{-- \resources\views\users\index.blade.php --}}
@extends('layouts.app')
@section('title', '| User profile')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-lg-10 col-lg-offset-1" >
        <h1><i class="fa fa-user"></i> User profile </h1>
        <hr>
      <div class="row">
        <div class="col">
   
    <ul class="list-group">
  <li class="list-group-item"><b> Name: </b> {{ $user->name }} {{ $user->surname }}  </li>
  @role('Company')
  <li class="list-group-item"><b> Company: </b> {{ $user->company_name }}</li>
  @else
  <li class="list-group-item"><b> Role: </b> {{ $role }}</li>
  @endrole
  <li class="list-group-item"><b> Email: </b> {{ $user->email }}</li>
  <li class="list-group-item"> <b> Created at: </b> {{ $user->created_at }} </li>
</ul>
      </div>
      <div class="col justify-content-center">
          @hasanyrole('Company|Management')
          <div class = "col">
              <div class="row form-group">
          <a class="btn btn-outline-primary btn-block" href="{{ URL::to('testrequests') }}" role="button">View test request</a>
              </div>
          </div>
          @endhasanyrole

          @hasanyrole('Management')
          <div class = "col">
              <div class="row form-group">
          <a class="btn btn-outline-primary btn-block" href="{{ URL::to('testrequests') }}" role="button">View requests for adding new device</a>
              </div>
          </div>
          @endhasanyrole

          @role('Tester')
          <div class = "col">
              <div class="row form-group">
          <a class="btn btn-success btn-block" href="{{ URL::to('testrequests') }}" role="button">View approved test request</a>
              </div>
          </div>
          @endrole

          @role('TestMngr')
          <div class = "col">
              <div class="row form-group">
             <a class="btn btn-success btn-block" href="{{ URL::to('testrequests') }}" role="button">View reports waiting for approval</a>
              </div>
          </div>
          <div class = "col">
              <div class="row form-group">
             <a class="btn btn-info btn-block" href="{{ URL::to('testrequests') }}" role="button">View approved test reports</a>
              </div>
          </div>
          @else 
          <div class = "col">
              <div class="row form-group">
          <a class="btn btn-info btn-block" href="{{ URL::to('testrequests') }}" role="button">View test reports</a>
              </div>
          </div>
          @endrole
          @role('Company')
          <div class="col">
              <div class="row form-group">
          <a class="btn btn-success btn-block"  href="{{ URL::to('testrequests/create') }}" role="button">Create new test request</a>
        </div>
          </div>
        @endrole
      </div>
      </div>

  </div>
  </div>
  </div>

  @endsection
