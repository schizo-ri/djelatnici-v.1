<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MeetingRoom;
use App\Http\Requests\MeetingRoomRequest;
use DateTime;

class MeetingRoomController extends Controller
{
    /**
	*
	* Set middleware to quard controller.
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
        $meeting_rooms= MeetingRoom::get();
		return view('admin.meeting_rooms.index',['meeting_rooms' => $meeting_rooms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.meeting_rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MeetingRoomRequest $request)
    {
		$input = $request->except(['_token']);

		$data = array(
			'name'  => $input['name'],
			'location'  => $input['location'],
			'description'  => $input['description']
		);
		
		$meetingRoom = new MeetingRoom();
		$meetingRoom->saveMeetingRoom($data);
	
		$message = session()->flash('success', 'Dodana je nova soba');
		
		$datum = new DateTime('now');
		$mjesec = date_format($datum,'m');
		
		//return redirect()->back()->withFlashMessage($messange);
		return redirect()->route('admin.showKalendar',['mjesec'=> $mjesec])->withFlashMessage($message);
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
        $meeting_room = MeetingRoom::find($id);
		
		return view('admin.meeting_rooms.edit',['meeting_room'=>$meeting_room]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MeetingRoomRequest $request, $id)
    {
        $meeting_room = MeetingRoom::find($id);
		$input = $request->except(['_token']);

		$data = array(
			'name'  => $input['name'],
			'location'  => $input['location'],
			'description'  => $input['description']
		);
		
		$meeting_room->updateMeetingRoom($data);
		
		$message = session()->flash('success', 'Podaci su ispravljeni');
		
		return redirect()->route('admin.meeting_rooms.index')->withFlashMessage($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meeting_room = MeetingRoom::find($id);
		$meeting_room->delete();
		
		$message = session()->flash('success', 'Soba je obrisana.');
		
		return redirect()->route('admin.meeting_rooms.index')->withFlashMessage($message);
    }
}
