<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestRequest;
use App\Equipment;
use App\TestRequestsStatus;
use App\ExpectedResult;
use Auth;
use DB;


class ExpectedResultController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'clearance']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $id = request()->get('test_request');
        $test_request = TestRequest::find($id);

        return view('expected_result.create', compact('test_request'));
      }

    
     /* Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request) {
     //Validate name and permissions field
         $this->validate($request, [
             'resultDescription'=>'required',
             'resultUnit'=>'required',
             'minValue',
             'maxValue',
             'testId'=>'required'
             ]
         );

         $description = $request['resultDescription'];
         $unit = $request['resultUnit'];
         $testId =  $request['testId'];
         $minValue = $request['minValue'];
         $maxValue = $request['maxValue'];

         $expected_result=new ExpectedResult();
 
         $expected_result->save();
 
        // TODO:
         //should only refresh page and let company to add another expected result
         $flash_message = "Expected result added!";
         return redirect()->action('ExpectedResultController@create', compact('test_request', 'flash_message'));
     }
 

    
    
}
