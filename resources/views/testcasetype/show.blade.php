@extends('layouts.app') 
@section('title', '| Test Case Type Overview') 
@section('content') 
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-6 justify-content-center">
            <h1>
                <i class="fa fa-eye"></i> Test Case Type
            </h1>
            <hr />
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <td><b>Name</b></td>
                            <td>{{ $type->name }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection