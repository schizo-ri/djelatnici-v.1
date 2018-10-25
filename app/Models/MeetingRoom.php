<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeetingRoom extends Model
{
    /**
	* The attributes thet are mass assignable
	*
	* @var array
	*/
	protected $fillable = ['name','location','description'];
	
	/*
	* Save MeetingRoom
	* 
	* @param array $metingRoom
	* @return void
	*/
	public function saveMeetingRoom($metingRoom=array())
	{
		return $this->fill($metingRoom)->save();
	}
	
	/*
	* Update MeetingRooms
	* 
	* @param array $metingRoom
	* @return void
	*/
	
	public function updateMeetingRoom($metingRoom=array())
	{
		return $this->update($metingRoom);
	}	
}
