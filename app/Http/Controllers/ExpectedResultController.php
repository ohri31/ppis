<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestRequest;
use App\Equipment;
use App\ExpectedResult;
use Auth;
use DB;


class ExpectedResultController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'clearance']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    
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
      return redirect()->action('TestRequestController@index', compact('test_requests'));
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $id = request()->get('test_request');
        $flash_message = request()->get('flash_message');
        $test_request = TestRequest::find($id);
        $expected_results = ExpectedResult::all()->where('testrequest_id', '=', $test_request['id']);
        return view('expected_results.create', compact('test_request', 'expected_results', 'flash_message'));
      }

    
     public function store(Request $request) {
         echo ('LEJLA');
     //Validate fields
         $this->validate($request, [
             'description' => 'required',
             'unit' => 'required',
             'min_value' => 'required',
             'max_value' =>'required',
             'test_id'=>'required'
             ]
         );

         $description = $request['description'];
         $unit = $request['unit'];
         $testId =  $request['test_id'];
         $minValue = $request['min_value'];
         $maxValue = $request['max_value'];

         $expected_result=new ExpectedResult();
         $expected_result->description = $description;
         $expected_result->unit = $unit;
         $expected_result->testrequest_id = $testId;
         $expected_result->min_result = $minValue;
         $expected_result->max_result = $maxValue;
 
         $expected_result->save();
 
         $test_request = TestRequest::find($testId);

         $flash_message = "Test request created. Expected result added!";
         return redirect()->action('ExpectedResultController@create', compact('test_request', 'flash_message'));
     }
 

    
    
}
