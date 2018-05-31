<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipment;
use DB;


class ChartController extends Controller
  {

    public function __construct() {
           $this->middleware(['auth', 'clearance']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
       }

    public function index() {
      $registeredCompanies = DB::table('users')
            ->select(DB::raw('MONTHNAME(created_at) as month'), DB::raw("DATE_FORMAT(created_at,'%Y-%m') as monthNum"), DB::raw('count(*) as projects'))
            ->groupBy('monthNum')
            ->get();

      $testrequests = DB::table('test_requests')
            ->select(DB::raw('MONTHNAME(created_at) as month'), DB::raw("DATE_FORMAT(created_at,'%Y-%m') as monthNum"), DB::raw('count(*) as testrequests'))
            ->groupBy('monthNum')
            ->get();

      $requests = DB::table('test_requests')
            ->select(DB::raw('approved'), DB::raw('count(*) as requests'))
            ->groupBy('approved')
            ->get();

      $requestsStatus = DB::table('test_requests')
            ->select(DB::raw('status_id'), DB::raw('count(*) as requests'))
            ->groupBy('status_id')
            ->get();

        $dataCharts = [
        'registeredCompanies' => $registeredCompanies,
        'testrequests'   => $testrequests,
        'requests' => $requests,
        'requestsStatus' => $requestsStatus
    ];

        return view('chart')->with('dataCharts', $dataCharts);
    }
  }
