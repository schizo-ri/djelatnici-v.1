<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Working_hour extends Model
{
	protected $fillable = ['user_id','datum','oznaka_id','sati','napomena'];
	
	/*
	* The Eloquent user model names
	* 
	* @var string
	*/
	protected static $userModel = 'App\Models\Users';
	
	/*
	* The Eloquent working_tag model names
	* 
	* @var string
	*/
	protected static $working_tagModel = 'App\Models\Working_tag';
	
	/*
	* Returns the user relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function user()
	{
		return $this->belongsTo(static::$userModel,'user_id');
	}
	
	/*
	* Returns the working_tag relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function working_tag()
	{
		return $this->belongsTo(static::$working_tagModel,'oznaka_id');
	}
	
	/*
	* Save WorkingHour
	* 
	* @param array $working_hour
	* @return void
	*/
	
	public function saveWorkingHour($working_hour=array())
	{
		return $this->fill($work)->save();
	}
	
	/*
	* Update WorkingHour
	* 
	* @param array $working_hour
	* @return void
	*/
	
	public function updateWorkingHour($working_hour=array())
	{
		return $this->update($working_hour);
	}	
	
}
