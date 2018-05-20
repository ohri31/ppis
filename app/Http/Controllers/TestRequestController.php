<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestRequest;
use App\Equipment;
use App\TestRequestsStatus;
use App\ExpectedResult;
use Auth;
use DB;

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
        $test_requests = TestRequest::all()->where('approved', '=', 1);
      }
    else if($rola=='Management'){
        $test_requests = TestRequest::all()->where('approved', '=', 0);
      }
        return view('test_requests.index')->with('testrequests', $test_requests);
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

    /**
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

        return redirect()->route('testrequests.index')
            ->with('flash_message',
             'Test request'. $test_request->name.' updated!');
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



}
