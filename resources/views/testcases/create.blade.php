@extends('layouts.app')
@section('title', '| Add Test Case')
@section('content')
<div class="container ">
        <div class="col-md-14 justify-content-center">
                @if(!empty($flash_message))
                  <div class="alert alert-success"><em> {{$flash_message}}</em>
                </div>
                @endif
            <div class="row">
                <div class="col-md-7">

            <h1>
                <i class="far fa-edit"></i> Create test case
            </h1>
            <hr />
            {!! Form::open([
                'url' => '/testcases',
                'class' => 'form-horizontal',
                'files' => true])
            !!}
                @include('testcases.form')
            {!! Form::close() !!}
            </div>
            <div class="col-md-5">
                    <div class="card">
                        <div class="card-header" style="background-color:lightseagreen;">
                            <h1> <i class="fa fa-check-circle-o" style='color:green'></i> About test cases</h1>
                        </div>
                        <div class="card-body">
                            @if (count($test_cases) > 0)
                            <table class="table table-bordered table-striped">
                                    <tbody>
                                        <th>  Title </th>
                                        <th> Data </th>
                                        <th> Result </th>
                                        <th> Range</th>
                                        <th> Pass  </th>
                                @foreach ($test_cases as $tr)
                                            <tr>
                                                <td><a href="{{ URL::to('testcases/'.$tr->id) }}">{{ $tr->name }}</a></td>
                                                <td>{{ $tr->test_data }}</td>
                                                <td>{{ $tr->actual_results }}</td>
                                                <td>{{ $tr->expectedresult->min_result}} - {{ $tr->expectedresult->max_result}} {{ $tr->expectedresult->unit}} </td>

                                                @if ($tr->status == 1)
                                                <td style="text-align: center; max-width:2px;"> <i class="fa fa-check-circle" style="color:green; font-size:20px;"></i></td>
                                                @else
                                                <td style="text-align: center; max-width:2px;"><i class="fa fa-remove" style="color:red; font-size:20px;"></i></td>
                                                @endif
                                            </tr>

                                @endforeach
                            </tbody>

                            </table>

                             @else
                            <div class="alert alert-info">
                                Test cases not found
                            </div>

                            @endif

                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
