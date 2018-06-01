<?php

namespace App\Http\Controllers;
use App\User;
use DB;


class CompanyController extends Controller
  {

    
    public function index() {
      $companies = User::all();
        return view('companies.index')->with('companies', $companies);
    }
  }
