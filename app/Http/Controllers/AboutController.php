<?php

namespace App\Http\Controllers;
use DB;


class AboutController extends Controller
  {

    public function __construct() {
           $this->middleware(['auth', 'clearance']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
       }

    public function index() {
        return view('about');
    }
  }
