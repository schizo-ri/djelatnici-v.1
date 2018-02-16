<?php

namespace App\Http\Controllers\Admin;

use App\Models\Equipment;
use Illuminate\Http\Request;
use App\Http\Requests\EquipmentRequest;
use App\Http\Controllers\Controller;
use Sentinel;
use Session;

class EquipmentController extends Controller
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
        $equipments = Equipment::orderBy('naziv','ASC')->paginate(50);

		return view('admin.equipments.index',['equipments'=>$equipments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.equipments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EquipmentRequest $request)
    {
        $input = $request->except(['_token']);

		$data = array(
			'naziv'  			=> $input['naziv'],
			'napomena'     		=> $input['napomena'],
			'količina_monter'   => $input['količina_monter'],
			'količina_inženjer'	=> $input['količina_inženjer'],
			'User_id'  			=> $input['User_id']
		);
		
		$equipment = new Equipment();
		$equipment->saveEquipment($data);
		
		$message = session()->flash('success', 'Nova oprema je snimljena');
		
		return redirect()->route('admin.equipments.index')->withFlashMessage($message);
		
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
        $equipment = Equipment::find($id);
		
		return view('admin.equipments.edit', ['equipment' => $equipment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EquipmentRequest $request, $id)
    {
        $equipment = Equipment::find($id);
		$input = $request->except(['_token']);

		$data = array(
			'naziv'  			=> $input['naziv'],
			'napomena'     		=> $input['napomena'],
			'količina_monter'   => $input['količina_monter'],
			'količina_inženjer'	=> $input['količina_inženjer'],
			'User_id'  			=> $input['User_id']
		);
		
		$equipment->updateEquipment($data);
		
		$message = session()->flash('success', 'Podaci su ispravljeni');
		
		return redirect()->route('admin.equipments.index')->withFlashMessage($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipment = Equipment::find($id);
		$equipment->delete();
		
		$message = session()->flash('success', 'Oprema je obrisana.');
		
		return redirect()->route('admin.equipments.index')->withFlashMessage($message);
    }
}
