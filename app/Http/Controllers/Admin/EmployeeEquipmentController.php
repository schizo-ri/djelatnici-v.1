<?php

namespace App\Http\Controllers\Admin;

use App\Models\EmployeeEquipment;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeEquipmentRequest;
use App\Http\Controllers\Controller;
use Sentinel;
use Session;
use App\Models\Employee;

class EmployeeEquipmentController extends Controller
{
    /**
   * Set middleware to quard controller.
   *
   * @return void
   */
    public function __construct()
    {
        $this->middleware('sentinel.auth');
    }
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeeEquipments = EmployeeEquipment::orderBy('naziv','ASC')->paginate(50);

		return view('admin.employee_equipments.index',['employeeEquipments'=>$employeeEquipments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::get();
		return view('admin.employee_equipments.create')->with('employees', $employees);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeEquipmentRequest $request)
    {
        $input = $request->except(['_token']);
		dd($input);
		
		$data = array(
			'employee_id'  	 => $input['employee_id'],
			'equipment_id'   => $input['equipment_id'],
			'kolicina'	     => $input['kolicina'],
			'napomena'     		=> $input['napomena']
		);
		
		$employeeEquipment = new EmployeeEquipment();
		$employeeEquipment->saveEmployeeEquipment($data);
		
		$message = session()->flash('success', 'Oprema je zadužena');
		
		return redirect()->route('admin.employee_equipments.index')->withFlashMessage($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
