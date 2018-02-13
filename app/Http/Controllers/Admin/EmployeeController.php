<?php

namespace App\Http\Controllers\Admin;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Http\Controllers\Controller;
use Sentinel;

class EmployeeController extends Controller
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
        if(Sentinel::inRole('administrator')) {
			$employees = Employee::orderBy('last_name','ASC')->paginate(50);
		}

	return view('admin.employees.index',['employees'=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        //$user_id = Sentinel::getUser()->id;
		$input = $request->except(['_token']);

		$data = array(
			'first_name'  			=> $input['first_name'],
			'last_name'     		=> $input['last_name'],
			'oib'           		=> $input['oib'],
			'datum_rodjenja'		=> date("Y-m-d", strtotime($input['datum_rodjenja'])),
			'mobitel'  				=> $input['mobitel'],
			'email'  				=> $input['email'],
			'prebivaliste_adresa'   => $input['prebivaliste_adresa'],
			'prebivaliste_grad'     => $input['prebivaliste_grad'],
			'boraviste_adresa'      => $input['boraviste_adresa'],
			'boraviste_grad'        => $input['boraviste_grad'],
			'zvanje'  			    => $input['zvanje'],
			'bracno_stanje'  	    => $input['bracno_stanje'],
			'radnoMjesto_id'  	    => $input['radnoMjesto_id'],
			'lijecn_pregled' 	    => date("Y-m-d", strtotime($input['lijecn_pregled'])),
			'ZNR' 	   			    => date("Y-m-d", strtotime($input['ZNR'])),
			'napomena' 	   		    => $input['napomena']
		);
		
		$employee = new Employee();
		$employee->saveEmployee($data);
		
		$message = session()->flash('success', 'Novi kandidat je snimljen');
		
		//return redirect()->back()->withFlashMessage($messange);
		return redirect()->route('admin.employees.index')->withFlashMessage($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);

		return view('admin.employees.show', ['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
		
		return view('admin.employees.edit', ['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        $employee = Employee::find($id);
		$input = $request->except(['_token']);

		$data = array(
			'first_name'  => $input['first_name'],
			'last_name'    => $input['last_name'],
			'oib'  => $input['oib'],
			'datum_rodjenja'  => date("Y-m-d", strtotime($input['datum_rodjenja'])),
			'mobitel'  => $input['mobitel'],
			'email'  => $input['email'],
			'prebivaliste_adresa'  => $input['prebivaliste_adresa'],
			'prebivaliste_grad'  => $input['prebivaliste_grad'],
			'boraviste_adresa'  => $input['boraviste_adresa'],
			'boraviste_grad'  => $input['boraviste_grad'],
			'zvanje'  => $input['zvanje'],
			'bracno_stanje'  => $input['bracno_stanje'],
			'radnoMjesto_id'  => $input['radnoMjesto_id'],
			'lijecn_pregled' 	    => date("Y-m-d", strtotime($input['lijecn_pregled'])),
			'ZNR' 	   			    => date("Y-m-d", strtotime($input['ZNR'])),
			'napomena' 	   		    => $input['napomena']
		);
		
		$employee->updateEmployee($data);
		
		$message = session()->flash('success', 'Podaci su ispravljeni');
		
		return redirect()->route('admin.employees.index')->withFlashMessage($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
		$employee->delete();
		
		$message = session()->flash('success', 'Kandidat je obrisan.');
		
		return redirect()->route('admin.employees.index')->withFlashMessage($message);
    }
}
