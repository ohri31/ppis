<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EquipmentType;
use App\Equipment;


class EquipmentController extends Controller
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
        $equipment = Equipment::all();
        return view('equipment.index')->with('equipment', $equipment);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
      $equipment_types = EquipmentType::pluck('name', 'id');
      return view('equipment.create')->with('equipment_types', $equipment_types);
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
            'name'=>'required|unique:equipment|max:30',
            'description',
            'equipment_type' =>'required',
            ]
        );
        $name = $request['name'];
        $description = $request['description'];
        $equipment_type =  $request['equipment_type'];

        $equipment = new Equipment();
        $equipment->name = $name;
        $equipment->description = $description;
        $equipment->equipment_type_id = $equipment_type;

        $equipment->save();


        return redirect()->route('equipment.index')
            ->with('flash_message',
             'Equipment'.   $equipment->name.' added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return redirect('equipment');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $equipment = Equipment::findOrFail($id);
        $equipment_types = EquipmentType::pluck('name', 'id');
        return view('equipment.edit', compact('equipment', 'equipment_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

      $equipment = Equipment::findOrFail($id);
    //Validate name and permission fields
        $this->validate($request, [
            'name'=>'required|max:10|unique:equipment',
            'description',
            'equipment_type' =>'required',
        ]);

        $input = $request->except(['equipment_type']);
        $equipment_type = $request['equipment_type'];
        $equipment->fill($input)->save();

        return redirect()->route('equipment.index')
            ->with('flash_message',
             'Equipment'. $equipment->name.' updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $equipment= Equipment::findOrFail($id);
        $equipment->delete();

        return redirect()->route('equipment.index')
            ->with('flash_message',
             'Equipment deleted!');

    }

  }
