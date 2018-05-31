<?php

namespace App\Http\Controllers;
use App\User;
use DB;


class CompanyController extends Controller
  {

    public function __construct() {
           $this->middleware(['auth', 'clearance']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
       }

    public function index() {
      $companies = User::all();
        return view('companies.index')->with('companies', $companies);
    }
  }
