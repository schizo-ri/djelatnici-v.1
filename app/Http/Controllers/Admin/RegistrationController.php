<?php

namespace App\Http\Controllers\Admin;

use App\Models\Registration;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;
use App\Http\Controllers\Controller;
use Sentinel;
use DB;
use Session;
use PDF;

class RegistrationController extends Controller
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
        $registrations = Registration::join('employees','registrations.employee_id', '=', 'employees.id')->select('registrations.*','employees.first_name','employees.last_name')->orderBy('employees.last_name','ASC')->get();
		
		//dd($registrations);
		
		return view('admin.registrations.index',['registrations'=>$registrations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$employees = Employee::get();
		return view('admin.registrations.create')->with('employees', $employees);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegistrationRequest $request)
    {
        $input = $request->except(['_token']);
		
		$data = array(
			'employee_id'  		=> $input['employee_id'],
			'radnoMjesto_id'    => $input['radnoMjesto_id'],
			'datum_prijave'		=> date("Y-m-d", strtotime($input['datum_prijave'])),
			'probni_rok'  		=> $input['probni_rok'],
			'staz'   			=> $input['staz'],
			'lijecn_pregled'    => date("Y-m-d", strtotime($input['lijecn_pregled'])),
			'ZNR'      			=> date("Y-m-d", strtotime($input['ZNR'])),
			'napomena'  	    => $input['napomena']
		);
		
		$registration = new Registration();
		$registration->saveRegistration($data);
		
		$message = session()->flash('success', 'Novi djelatnik je prijavljen');
		
		//return redirect()->back()->withFlashMessage($messange);
		return redirect()->route('admin.registrations.index')->withFlashMessage($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $registration = Registration::find($id);
		
		return view('admin.registrations.show', ['registration' => $registration]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registration = Registration::find($id);
		return view('admin.registrations.edit', ['registration' => $registration]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RegistrationRequest $request, $id)
    {
        $registration = Registration::find($id);
		$input = $request->except(['_token']);
		//dd($input);
		
		//if(!$input['datum_odjave']){
			$data = array(
				'employee_id'  		=> $input['employee_id'],
				'radnoMjesto_id'    => $input['radnoMjesto_id'],
				'datum_prijave'		=> date("Y-m-d", strtotime($input['datum_prijave'])),
				'probni_rok'  		=> $input['probni_rok'],
				'staz'   			=> $input['staz'],
				'lijecn_pregled'    => date("Y-m-d", strtotime($input['lijecn_pregled'])),
				'ZNR'      			=> date("Y-m-d", strtotime($input['ZNR'])),
				'napomena'  	    => $input['napomena']
			);
		/*} else {
		$data = array(
			'employee_id'  		=> $input['employee_id'],
			'radnoMjesto_id'    => $input['radnoMjesto_id'],
			'datum_prijave'		=> date("Y-m-d", strtotime($input['datum_prijave'])),
			'probni_rok'  		=> $input['probni_rok'],
			'staz'   			=> $input['staz'],
			'lijecn_pregled'    => date("Y-m-d", strtotime($input['lijecn_pregled'])),
			'ZNR'      			=> date("Y-m-d", strtotime($input['ZNR'])),
			'napomena'  	    => $input['napomena'],
			'datum_odjave'		=> date("Y-m-d", strtotime($input['datum_odjave'])),
			'otkaz_id'   		=> $input['otkaz_id'],
			'otkazni_rok'   	=> $input['otkazni_rok']
	
		);
		}*/
		
		$registration->updateRegistration($data);
		
		$message = session()->flash('success', 'Podaci su ispravljeni');
		
		return redirect()->route('admin.registrations.index')->withFlashMessage($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registration = Registration::find($id);
		$registration->delete();
		
		$message = session()->flash('success', 'Kandidat je obrisan.');
		
		return redirect()->route('admin.registrations.index')->withFlashMessage($message);
    }
	
	public function generate_pdf($id) 
	{
	$registration = Registration::find($id);
	$pdf = PDF::loadView('admin.registrations.show', compact('registration'));
	return $pdf->download('djelatnik_'. $registration->id .'.pdf');

	}
}
