<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    /**
	* The attributes thet are mass assignable
	*
	* @var array
	*/
	protected $fillable = ['employee_id','subject','notice'];

	/*
	* The Eloquent employee model name
	* 
	* @var string
	*/
	protected static $userModel = 'App\Models\Users'; 
	
	/*
	* Returns the employee relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function user()
	{
		return $this->belongsTo(static::$userModel,'employee_id');
	}
	
	/*
	* Save Notice
	* 
	* @param array $notice
	* @return void
	*/
	public function saveNotice($notice=array())
	{
		return $this->fill($notice)->save();
	}
	
	/*
	* Update Notice
	* 
	* @param array $notice
	* @return void
	*/
	
	public function updateNotice($notice=array())
	{
		return $this->update($notice);
	}	
	
	
}
