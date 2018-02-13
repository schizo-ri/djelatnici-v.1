<?php

namespace App\Http\Controllers\Admin;

use App\Models\Work;
use Illuminate\Http\Request;
use App\Http\Requests\WorkRequest;
use App\Http\Controllers\Controller;
use Sentinel;

class WorkController extends Controller
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
        $works = Work::orderBy('odjel','ASC')->orderBy('naziv','ASC')->paginate(20);
		
		return view('admin.works.index',['works'=>$works]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.works.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkRequest $request)
    {
		$input = $request->except(['_token']);

		$data = array(
			'odjel'  => $input['odjel'],
			'naziv'  => $input['naziv']
		);
		
		$work = new Work();
		$work->saveWork($data);
		
		$message = session()->flash('success', 'Dodano je novo radno mjesto');
		
		//return redirect()->back()->withFlashMessage($messange);
		return redirect()->route('admin.works.index')->withFlashMessage($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $work = Work::find($id);
		
		return view('admin.works.show', ['work' => $work]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $work = Work::find($id);
		
		return view('admin.works.edit', ['work' => $work]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WorkRequest $request, $id)
    {
        $work = Work::find($id);
		$input = $request->except(['_token']);

		$data = array(
			'odjel'  => $input['odjel'],
			'naziv'  => $input['naziv']
		);
		
		$work->updateWork($data);
		
		$message = session()->flash('success', 'Radno mjesto je ispravljeno');
		
		return redirect()->route('admin.works.index')->withFlashMessage($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $work = Work::find($id);
		$work->delete();
		
		$message = session()->flash('success', 'Radno mjesto je obrisano.');
		
		return redirect()->route('admin.works.index')->withFlashMessage($message);
    }
}
