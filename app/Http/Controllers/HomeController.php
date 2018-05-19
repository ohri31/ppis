<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    } 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function showProfile($id) {
        $user_id = Auth::user();
        $test_requests = TestRequest::all();
        return redirect('equipmenttypes');
    }

    public function profile() {
        $user = Auth::user();
        $role = $user->roles()->pluck('name')[0];
        return view('profile', compact('user', 'role')); //pass user and role to view
    }


}
