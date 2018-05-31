<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\TestReport;
use App\TestRequest;
use App\User;

class TestReportController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'clearance']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    public function index()
    {
        $reports = TestReport::all()->where('approved', '=', 0);

        return view('test_reports.index', compact('reports'));
    }

    public function approve()
    {
        $reports = TestReport::all()->where('approved', '!=', 0);

        return view('test_reports.approve', compact('reports'));
    }

    public function show($id)
    {
        try {
            // fetch report
            $report = TestReport::findOrFail($id);

            return  view('test_reports.show', compact('report'));
        } catch(\Exception $e) {
            return redirect('404');
        }
    }

    public function create()
    {
        // fetch requests
        $requests = TestRequest::select('id', 'name')
                                ->pluck('name', 'id')
                                ->toArray();

        $requests = [0 => "Select request"] + $requests;

        return view('test_reports.create', compact('requests'));
    }

    public function edit($id)
    {
        try {
            // fetch report
            $report = TestReport::findOrFail($id);

             // fetch testers
            $testers = User::select('id', 'email')
                            ->pluck('email', 'id')
                            ->toArray();

            $testers = [0 => "Select tester"] + $testers;

            // fetch requests
            $requests = TestRequest::select('id', 'name')
                                    ->pluck('name', 'id')
                                    ->toArray();

            $requests = [0 => "Select request"] + $requests;

            return  view('test_reports.edit', compact('report', 'testers', 'requests'));
        } catch(\Exception $e) {
            return redirect('404');
        }
    }

    public function store(Request $request)
    {
        // validate the input request
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'request_id' => 'required'
        ]);

        // fetch data 
        $data = $request->all();

        // initilize the 
        $data['date'] = Carbon::now();

        // add teser
        $data['tester_id'] = Auth::user()->id;

        // create test report
        $report = TestReport::create($data);

        return redirect('testreports/'.$report->id);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'request_id' => 'required'
        ]);

        try {
            // fetch report
            $report = TestReport::findOrFail($id);

            // fetch data 
            $data = $request->all();

            $report->title = $data['title'];
            $report->description = $data['description'];
            //$report->tester_id = Auth::user();
            $report->request_id = $data['request_id'];

            $report->save();

            return redirect('testreports/'.$report->id);
        } catch(\Exception $e) {
            return redirect('404');
        }
    }

    public function destroy($id)
    {
        TestReport::destroy($id);

        return redirect('testreports');
    }


       /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approved( $id) {

        $test_report = TestReport::findOrFail($id);
  
          $test_report->approved = 1;
          $test_report->approved_by_id = \Auth::user()->id;

  
          $test_report->save();
  
          return redirect()->route('testreports.index')
              ->with('flash_message',
               'Test report'. $test_report->name.' approved!');
      }

       /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function declined($id) {

        $test_report = TestReport::findOrFail($id);
  
          $test_report->approved = 3;
          $test_report->approved_by_id = \Auth::user()->id;
  
          $test_report->save();
  
          return redirect()->route('testreports.index')
              ->with('flash_message',
               'Test report'. $test_report->name.' declined!');
      }
}
