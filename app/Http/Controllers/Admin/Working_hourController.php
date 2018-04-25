<?php

namespace App\Http\Controllers\Admin;

use App\Models\Working_hour;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Http\Requests\Working_hourRequest;
use App\Http\Controllers\Controller;
use Sentinel;

class Working_hourController extends Controller
{
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
        $working_hours = Working_hour::get();
		$djelatnici = Registration::join('employees','employee_id','employees.id')->select('registrations.*','employees.first_name', 'employees.last_name')->orderBy('employees.last_name','ASC')->get();
		
		//dd($djelatnici);
		return view('admin.workingHours.index')->with('working_hours',$working_hours)->with('djelatnici', $djelatnici);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
