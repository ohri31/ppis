<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TestCase;
use App\TestReport;
use App\TestCaseType;
use App\ExpectedResult;

class TestCaseController extends Controller
{
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
        //
        $reports = TestReport::select('id', 'title')
                                ->pluck('title', 'id')
                                ->toArray();
        
        $reports = [0 => "Select test report"] + $reports;

        $types = TestCaseType::select('id', 'name')
                                ->pluck('name', 'id')
                                ->toArray();

        $types = [0 => "Select test case type"] + $types;

        $expected = ExpectedResult::select('id', 'description')
                                    ->pluck('description', 'id')
                                    ->toArray();

        $expected = [0 => "Select expected results"] + $expected;

        return view('testcases.create', compact('reports', 'types', 'expected'));
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
        $testcase = TestCase::create($request->all());

        return redirect('testcases/'.$testcase->id);
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

        return view('testcases.show', compact('case'));
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

        $expected = ExpectedResult::select('id', 'description')
                                    ->pluck('description', 'id')
                                    ->toArray();

        $expected = [0 => "Select expected results"] + $expected;

        return view('testcases.edit', compact('case', 'reports', 'types', 'expected'));
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
