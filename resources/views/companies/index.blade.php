{{-- \resources\views\users\index.blade.php --}}
@extends('layouts.app')
@section('title', '| Equipment')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
         @foreach ($companies as $company)
      @if($company->roles()->pluck('name')[0] == 'Company')
  <div class="card col-md-6">
    <div class="card-body">
      <h2 class="card-title"><i class="fa fa-heartbeat" style="font-size:48px;"></i>&nbsp;&nbsp;{{$company->company_name}}</h2>
      <p class="card-text"></p>
    </div>
  </div>
      @endif
     @endforeach

     
</div>
</div>
</div>

@endsection
