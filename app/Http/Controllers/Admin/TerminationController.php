<?php

namespace App\Http\Controllers\Admin;

use App\Models\Termination;
use Illuminate\Http\Request;
use App\Http\Requests\TerminationRequest;
use App\Http\Controllers\Controller;
use Sentinel;
use Session;


class TerminationController extends Controller
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
        $terminations = Termination::orderBy('naziv','ASC')->paginate(50);

		return view('admin.terminations.index',['terminations'=>$terminations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.terminations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TerminationRequest $request)
    {
        $input = $request->except(['_token']);

		$data = array(
			'naziv'  			=> $input['naziv']
		);
		
		$termination = new Termination();
		$termination->saveTermination($data);
		
		$message = session()->flash('success', 'Nova vrsta otkaza je snimljena');
		
		//return redirect()->back()->withFlashMessage($messange);
		return redirect()->route('admin.terminations.index')->withFlashMessage($message);
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
        $termination = Termination::find($id);
		
		return view('admin.terminations.edit', ['termination' => $termination]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TerminationRequest $request, $id)
    {
        $termination = Termination::find($id);
		$input = $request->except(['_token']);

		$data = array(
			'naziv'  => $input['naziv']
		);
		
		$termination->updateTermination($data);
		
		$message = session()->flash('success', 'Podaci su ispravljeni');
		
		return redirect()->route('admin.terminations.index')->withFlashMessage($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $termination = Termination::find($id);
		$termination->delete();
		
		$message = session()->flash('success', 'Otkaz je obrisan.');
		
		return redirect()->route('admin.terminations.index')->withFlashMessage($message);
    }
}
