<h3>Test request <b>{{ $test_request->name }}</b></h3>
<hr/>
<li class="list-group-item"> <b> Company </b> {{ $test_request->user->company_name}} </li>
<li class="list-group-item"><b> Name: </b> {{ $test_request->name }} </li>
<li class="list-group-item"><b> Description: </b> {{ $test_request->description }}</li>
<li class="list-group-item"><b> Equipment: </b> {{ $test_request->equipment->name }}</li>
<li class="list-group-item"> <b> Created at: </b> {{ $test_request->created_at  }} </li>
<li class="list-group-item"> <b> Status: </b> {{ $test_request->status->name }} </li>
@if(isset($test_request->approvedBy))
<li class="list-group-item"> <b> Approved by: </b> {{ $test_request->approvedby->name }} </li>
@else
<li class="list-group-item"> <b> Approved by: </b> Not approved </li>
@endif
@if($test_request->end_date > \Carbon\Carbon::now())
<li class="list-group-item" style="color:green"> <i class="fa fa-clock-o" style="font-size:26px; color:green" ></i> <b> Due date: </b> {{ $test_request->end_date }}   </li>
@else 
<li class="list-group-item" style="color:red"><i class="fa fa-clock-o" style="font-size:26px; color:red" ></i> <b> Due date: </b> {{ $test_request->end_date }}     </li>
@endif

<hr />

@if($expected != null)
<li class="list-group-item"> <b> Description: </b> {{ $expected->decription }} </li>
<li class="list-group-item"><b> Unit: </b> {{ $expected->unit }} </li>
<li class="list-group-item"><b> Min result: </b> {{ $expected->min_result }}</li>
<li class="list-group-item"><b> Max result: </b> {{ $expected->max_result }}</li>
@endif

<hr />

@if($case != null)
<li class="list-group-item"><b> Name: </b> {{ $case->name }} </li>
<li class="list-group-item"><b> Steps: </b> {{ $case->steps }} </li>
<li class="list-group-item"><b> Test data: </b> {{ $case->test_data }}</li>
<li class="list-group-item"><b> Actual results: </b> {{ $case->actual_results }}</li>
<li class="list-group-item"><b> Notes: </b> {{ $case->notes }}</li>
<li class="list-group-item"><b> Status: </b> {{ $case->status }}</li>
@endif

<hr />

@if($report != null)
<li class="list-group-item"><b> Title: </b> {{ $report->title }} </li>
<li class="list-group-item"><b> Description: </b> {{ $report->description }} </li>
<li class="list-group-item"><b> Date: </b> {{ $report->date }}</li>
<li class="list-group-item"><b> Tester: </b> {{ $report->tester->email }}</li>
<li class="list-group-item"><b> Status: </b> {{ ($report->status) ? "Finished" : "In progress" }}</li>

@endif