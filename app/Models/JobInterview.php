<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobInterview extends Model
{
    /**
	* The attributes thet are mass assignable
	*
	* @var array
	*/
	protected $fillable = ['datum','first_name','last_name','oib', 'email','napomena','telefon','sprema','zvanje','radnoMjesto_id','godine_iskustva','placa','jezik'];
	
	/*
	* The Eloquent works model name
	* 
	* @var string
	*/
	protected static $workModel = 'App\Models\Work'; 

	/*
	* Returns the works relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function work()
	{
		return $this->belongsTo(static::$workModel,'radnoMjesto_id');
	}
	
	/*
	* Save JobInterview
	* 
	* @param array $jobInterview
	* @return void
	*/
	public function saveJobInterview($jobInterview=array())
	{
		return $this->fill($jobInterview)->save();
	}
	
	/*
	* Update JobInterview
	* 
	* @param array $jobInterview
	* @return void
	*/
	
	public function updateJobInterview($jobInterview=array())
	{
		return $this->update($jobInterview);
	}	
}
