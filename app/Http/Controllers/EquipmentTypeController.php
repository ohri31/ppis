<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EquipmentType;

class EquipmentTypeController extends Controller
{

  public function __construct() {
         $this->middleware(['auth', 'clearance']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
     }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index() {
  //Get all users and pass it to the view
      $equipment_types = EquipmentType::all();
      return view('equipment_types.index')->with('equipment_types', $equipment_types);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {

      return view('equipment_types.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {
  //Validate name and permissions field
      $this->validate($request, [
          'name'=>'required|unique:equipment_types|max:10',
          ]
      );

      $name = $request['name'];
      $equipment_type = new EquipmentType();
      $equipment_type->name = $name;

      $equipment_type->save();


      return redirect()->route('equipmenttypes.index')
          ->with('flash_message',
           'Equipment type'.   $equipment_type->name.' added!');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id) {
      return redirect('equipmenttypes');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id) {
      $equipment_type = EquipmentType::findOrFail($id);
      return view('equipment_types.edit', compact('equipment_type'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id) {

    $equipment_type = EquipmentType::findOrFail($id);
  //Validate name and permission fields
      $this->validate($request, [
          'name'=>'required|max:10|unique:equipment_types,name,'.$id,
      ]);
      return redirect()->route('equipmenttypes.index')
          ->with('flash_message',
           'Equipment Type'. $equipment_type->name.' updated!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $equipment_type = EquipmentType::findOrFail($id);
      $equipment_type->delete();

      return redirect()->route('equipmenttypes.index')
          ->with('flash_message',
           'Equipment Type deleted!');

  }

}
