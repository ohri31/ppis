<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;
use DB;

//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

//Enables us to output flash messaging
use Session;

class UserController extends Controller {

 public function __construct() {
        $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index() {
    //Get all users and pass it to the view
        $users = User::all()->where('approved','!=', 0);
        return view('users.index')->with('users', $users);
    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function approve(){
        $users = User::all()->where('approved','=', 0);
        return view('users.approve')->with('users', $users);  
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create() {
    //Get all roles and pass it to the view
        $roles = Role::get();
        return view('users.create', ['roles'=>$roles]);
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
    //Validate name, email and password fields
        $this->validate($request, [
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users',
          'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create($request->only('email', 'name', 'password','surname')); //Retrieving only the email and password data

        $roles = $request['roles']; //Retrieving the roles field
    //Checking if a role was selected
        if (isset($roles)) {

            foreach ($roles as $role) {
            $role_r = Role::where('id', '=', $role)->firstOrFail();
            $user->assignRole($role_r); //Assigning role to user
            }
        }
        //admin kreira testere, menadzment itd, oni su odmah approved
        $user->approved = 1;
        $user->save();
    //Redirect to the users.index view and display message
        return redirect()->route('users.index')
            ->with('flash_message',
             'User successfully added.');
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id) {
        return redirect('users');
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id) {
        $user = User::findOrFail($id); //Get user with specified id
        $roles = Role::get(); //Get all roles

        return view('users.edit', compact('user', 'roles')); //pass user and roles data to view

    }
/**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approved( $id) {

        $user = User::findOrFail($id);
  
          $user->approved = 1;
 
          $user->save();
  
          return redirect()->route('approve')
              ->with('flash_message',
               'Company '. $user->company_name.' approved!');
      }
      /**
       * Update the specified resource in storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function declined($id) {
  
        $user = User::findOrFail($id);
  
          $user->approved = 3;
 
          $user->save();
  
          return redirect()->route('approve')
              ->with('flash_message',
               'Company '. $user->company_name.' declined!');
      }
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id) {
        $user = User::findOrFail($id); //Get role specified by id

    //Validate name, email and password fields
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'required|min:6|confirmed'
        ]);
        $input = $request->only(['name', 'email', 'password']); //Retreive the name, email and password fields
        $roles = $request['roles']; //Retreive all roles
        $user->fill($input)->save();

        if (isset($roles)) {
            // save the roles history
            $admin_id = \Auth::user()->id;
            foreach($user->fetchRolesAsArray() as $item) {
                DB::table('history')
                    ->insert([
                        'user_id' => $user->id,
                        'role_id' => $item,
                        'admin_id'=> $admin_id,
                        "created_at" =>  \Carbon\Carbon::now(),
                        "updated_at" => \Carbon\Carbon::now()
                    ]);
            }

            $user->roles()->sync($roles);  //If one or more role is selected associate user to roles
        } else {
            $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        }
        return redirect()->route('users.index')
            ->with('flash_message',
             'User successfully edited.');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id) {
    //Find a user with a given id and delete
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')
            ->with('flash_message',
             'User successfully deleted.');
    }
}
