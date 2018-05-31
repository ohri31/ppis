<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestRequest;
use App\Equipment;
use App\TestRequestsStatus;
use App\ExpectedResult;
use Auth;
use DB;
use PDF;

use Carbon\Carbon;

class TestRequestController extends Controller
{
  public function __construct() {
         $this->middleware(['auth', 'clearance']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
     }
    //
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index() {
    //Get all users and pass it to the view
    $rola = Auth::user()->roles()->pluck('name')[0];
    $user_id = Auth::user()->id;
    $test_requests = TestRequest::all();

    if($rola == 'Company'){
        $test_requests = TestRequest::all()->where('user_id', '=', $user_id );
      }
    else  if ($rola=='Tester'){
        $test_requests = TestRequest::all()->where('approved', '=', 1)
                                           ->where('status_id', '!=', 3);
      }
    else if($rola=='Management'){
        $test_requests = TestRequest::all()->where('approved', '=', 0);
      }
        return view('test_requests.index')->with('testrequests', $test_requests);
    }

    public function approve()
    {
        $requests = TestRequest::all()->where('approved', '!=', 0);
        $today = Carbon::now();
        return view('test_requests.approve', compact('requests', 'today'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
      $equipment = Equipment::pluck('name', 'id');
      $expectedResults=[];
      return view('test_requests.create', compact('equipment', 'expectedResults'));
    }

    /** @can ('CanSendRequestsForTesting')
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
    //Validate name and permissions field
        $this->validate($request, [
            'name'=>'required|unique:equipment|max:30',
            'description',
            'equipment' =>'required',
            ]
        );
        $name = $request['name'];
        $description = $request['description'];
        $equipment =  $request['equipment'];

        $test_request = new TestRequest();
        $test_request->name = $name;
        $test_request->description = $description;
        $test_request->equipment_id = $equipment;
        $test_request->user_id = \Auth::user()->id;
        $test_request->end_date = Carbon::parse($request['end_date']);

        $test_request->save();

        $flash_message = 'Test request '.   $test_request->name.' added!';

        return redirect()->action('ExpectedResultController@create', compact('test_request', 'flash_message'));
    }

       //
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function added() {
        //Get all users and pass it to the view
        $rola = Auth::user()->roles()->pluck('name')[0];
        $user_id = Auth::user()->id;

            return view('test_requests.added');
        }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return redirect('testrequests');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $test_request = TestRequest::findOrFail($id);
        $equipment = Equipment::pluck('name', 'id');
        $status = TestRequestsStatus::pluck('name', 'id');

        return view('test_requests.edit', compact('test_request', 'equipment','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

      $test_request = TestRequest::findOrFail($id);
    //Validate name and permission fields
        $this->validate($request, [
            'name'=>'required|max:10|unique:equipment',
            'description',
            'status' =>'required',
        ]);

        $input = $request->except(['status']);
        $status = $request['status'];
        $test_request->status_id = $status;
        $test_request->save();
        $flash_message="Test request updated";
        if ($status==2){
            return redirect()->action('TestCaseController@create', compact('test_request', 'flash_message'));
        } else if ($status==3) {
            return redirect()->route('testreports.create')
            ->with('flash_message',
             'Test request'. $test_request->name.' updated!');
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approved( $id) {

      $test_request = TestRequest::findOrFail($id);

        $test_request->approved = 1;
        $test_request->approvedby_id = \Auth::user()->id;

        $test_request->save();

        return redirect()->route('testrequests.index')
            ->with('flash_message',
             'Test request'. $test_request->name.' approved!');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function declined($id) {

      $test_request = TestRequest::findOrFail($id);

        $test_request->approved = 3;
        $test_request->approvedby_id = \Auth::user()->id;

        $test_request->save();

        return redirect()->route('testrequests.index')
            ->with('flash_message',
             'Test request'. $test_request->name.' declined!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $test_request= TestRequest::findOrFail($id);
        $test_request->delete();

        return redirect()->route('testrequests.index')
            ->with('flash_message',
             'Test request deleted!');

    }

     /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function single($id)
    {
      $test_request= TestRequest::findOrFail($id);
        $expected_results = ExpectedResult::all()->where('testrequest_id', '=', $test_request->id);
        $today = Carbon::now();
        return view('test_requests.single', compact('test_request', 'expected_results', 'today'));
    }


    public function downloadPDf($id)
    {
        $request = TestRequest::findOrFail($id);
        $expected = $request->expectedResults;
        $case = ($request->expectedResults != null) ? $request->expectedResults->testCase : null; 
        $report = $request->testReport;

        // wrap up the data
        $data = [
            'test_request' => $request,
            'expected' => $expected,
            'case' => $case,
            'report' => $report
        ];

        // wrap the pdf with data
        $pdf = PDF::loadView('test_requests.pdf', $data);
        return $pdf->download('test_requests.pdf');
    }
}
