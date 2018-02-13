<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kid;
use Illuminate\Http\Request;
use App\Http\Requests\KidRequest;
use App\Http\Controllers\Controller;
use Sentinel;

class KidController extends Controller
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
        $kids = Kid::orderBy('prezime','ASC')->paginate(50);
		
		return view('admin.kids.index',['kids'=>$kids]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kids.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KidRequest $request)
    {
        $input = $request->except(['_token']);

		$data = array(
			'ime'  => $input['ime'],
			'prezime'   => $input['prezime'],
			'datum_rodjenja'  => date("Y-m-d", strtotime($input['datum_rodjenja'])),
			'employee_id'  => $input['employee_id'],
		);
		
		$kid = new Kid();
		$kid->saveKid($data);
		
		$message = session()->flash('success', 'Novo dijete je upisano');
		
		//return redirect()->back()->withFlashMessage($messange);
		return redirect()->route('admin.kids.index')->withFlashMessage($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kid = Kid::find($id);

		return view('admin.kids.show', ['kid' => $kid]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kid = Kid::find($id);
		
		return view('admin.kids.edit', ['kid' => $kid]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KidRequest $request, $id)
    {
        $kid = Kid::find($id);
		$input = $request->except(['_token']);

		$data = array(
			'ime'  => $input['ime'],
			'prezime'   => $input['prezime'],
			'datum_rodjenja'  => date("Y-m-d", strtotime($input['datum_rodjenja'])),
			'employee_id'  => $input['employee_id']
		);
		
		$kid->updateKid($data);
		
		$message = session()->flash('success', 'Podaci su ispravljeni');
		
		return redirect()->route('admin.kids.index')->withFlashMessage($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kid = Kid::find($id);
		$kid->delete();
		
		$message = session()->flash('success', 'Dijete je obrisano.');
		
		return redirect()->route('admin.kids.index')->withFlashMessage($message);
    }
}
