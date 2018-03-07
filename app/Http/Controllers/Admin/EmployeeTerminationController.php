<?php

namespace App\Http\Controllers\Admin;

use App\Models\EmployeeTermination;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeTerminationRequest;
use App\Http\Controllers\Controller;
use Sentinel;
use Session;

class EmployeeTerminationController extends Controller
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
        $employee_terminations = EmployeeTermination::orderBy('datum_odjave','DESC')->paginate(50);

		return view('admin.employee_terminations.index',['employee_terminations'=>$employee_terminations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::get();
		return view('admin.employee_terminations.create')->with('employees', $employees);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeTerminationRequest $request)
    {
        $input = $request->except(['_token']);
		
		$data = array(
			'employee_id'  	 => $input['employee_id'],
			'otkaz_id'   	 => $input['otkaz_id'],
			'otkazni_rok'	 => $input['otkazni_rok'],
			'datum_odjave'	 => date("Y-m-d", strtotime($input['datum_odjave'])),
			'napomena'     	 => $input['napomena']
		);
		$employee_terminations = new EmployeeTermination();
		$employee_terminations->saveEmployeeTermination($data);
		
		$message = session()->flash('success', 'Djelatnik je odjavljen.');
		
		return redirect()->route('admin.employee_terminations.index')->withFlashMessage($message);
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
        $employee_termination = EmployeeTermination::find($id);
		
		return view('admin.employee_terminations.edit', ['employee_termination' => $employee_termination]);
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
        $employee_termination = EmployeeTermination::find($id);
		$input = $request->except(['_token']);
		//dd($input);
			$data = array(
				'employee_id'  	 => $input['employee_id'],
				'otkaz_id'   	 => $input['otkaz_id'],
				'otkazni_rok'	 => $input['otkazni_rok'],
				'datum_odjave'	 => date("Y-m-d", strtotime($input['datum_odjave'])),
				'napomena'     	 => $input['napomena']
			);
			$employee_termination->updateEmployeeTermination($data);
			
		$message = session()->flash('success', 'Podaci su ispravljeni');
		
		return redirect()->route('admin.employee_terminations.index')->withFlashMessage($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee_termination = EmployeeTermination::find($id);
		$employee_termination->delete();
		
		$message = session()->flash('success', 'Odjava je obrisana.');
		
		return redirect()->route('admin.employee_terminations.index')->withFlashMessage($message);
    }
}
