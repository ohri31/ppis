<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TestCase;
use App\TestReport;
use App\TestCaseType;
use App\TestRequest;
use Carbon\Carbon;
use App\ExpectedResult;

class TestCaseController extends Controller
{
    
    public function __construct() {
         $this->middleware(['auth', 'clearance']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cases = TestCase::latest()->paginate(10);

        return view('testcases.index', compact('cases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = request()->get('test_request');
        $flash_message = request()->get('flash_message');
        $test_request = TestRequest::find($id);
        $test_cases = TestCase::all()->where('test_request_id', '=', $id);
        // $ed_results = edResult::all()->where('testrequest_id', '=', $test_request['id'];
        
        // //
        // $requests = TestReport::select('id', 'name')
        //                         ->pluck('name', 'id')
        //                         ->toArray();
        
        // $requests = [0 => "Select test report"] + $requests;

        $types = TestCaseType::select('id', 'name')
                                ->pluck('name', 'id')
                                ->toArray();

        $types = [0 => "Select test case type"] + $types;

        $expected = ExpectedResult::select('id', 'description')->where('testrequest_id', '=', $test_request['id'])
                                    ->pluck('description', 'id')
                                    ->toArray();

        $expected = [0 => "Select expected results"] + $expected;

        return view('testcases.create', compact('test_request', 'types', 'expected', 'test_cases', 'flash_message'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        // uraditi možda validaciju
        
        $act_result = $request['actual_results'];
        $ed = $request['expected_result_id'];
        $expected_result = ExpectedResult::find($ed);

        $testcase = new TestCase();

        $testcase = TestCase::create($request->all());
        if ($act_result >= $expected_result->min_result && $act_result <= $expected_result->max_result){
            $testcase['status']= 1;
        }
        $testcase->save();
        $flash_message = 'Test case added!';
        $test_request=$request['test_request_id'];
        return redirect()->action('TestCaseController@create', compact('test_request', 'flash_message'));
        
        // return redirect('testcases/'.$testcase->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $case = TestCase::find($id);
        $today=Carbon::now();
        return view('testcases.show', compact('case', 'today'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $case = TestCase::find($id);

        $reports = TestReport::select('id', 'title')
                                ->pluck('title', 'id')
                                ->toArray();
        
        $reports = [0 => "Select test report"] + $reports;

        $types = TestCaseType::select('id', 'name')
                                ->pluck('name', 'id')
                                ->toArray();

        $types = [0 => "Select test case type"] + $types;

        $ed = ExpectedResult::select('id', 'description')
                                    ->pluck('description', 'id')
                                    ->toArray();

        $ed = [0 => "Select ed results"] + $ed;

        return view('testcases.edit', compact('case', 'reports', 'types', 'ed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $case = TestCase::find($id);
        $case->update($request->all());

        return redirect('testcases/'.$case->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        TestCase::destroy($id);

        return redirect('/testcases');
    }
}
