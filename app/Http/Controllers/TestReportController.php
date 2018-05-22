<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\TestReport;
use App\TestRequest;
use App\User;

class TestReportController extends Controller
{
    //
    public function index()
    {
        $reports = TestReport::latest()->paginate(10);

        return view('test_reports.index', compact('reports'));
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

        return view('test_reports.create', compact('testers', 'requests'));
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
            'tester_id' => 'required',
            'request_id' => 'required'
        ]);

        // fetch data 
        $data = $request->all();

        // initilize the 
        $data['date'] = Carbon::now();

        // create test report
        $report = TestReport::create($data);

        return redirect('testreports/'.$report->id);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'tester_id' => 'required',
            'request_id' => 'required'
        ]);

        try {
            // fetch report
            $report = TestReport::findOrFail($id);

            // fetch data 
            $data = $request->all();

            $report->title = $data['title'];
            $report->description = $data['description'];
            $report->tester_id = $data['tester_id'];
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
}
