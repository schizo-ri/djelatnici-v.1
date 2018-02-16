<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
	
	/**
	* The attributes thet are mass assignable
	*
	* @var array
	*/
	protected $fillable = ['naziv','napomena','količina_monter','količina_inženjer','User_id'];
	
	/*
	* The Eloquent user model name
	* 
	* @var string
	*/
	protected static $userModel = 'App\Models\Users'; 
	
	/*
	* The Eloquent employees model name
	* 
	* @var string
	*/
	protected static $employeeModel = 'App\Models\Employee'; 
	
	/*
	* Returns the user relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	
	public function user()
	{
		return $this->belongsTo(static::$userModel,'User_id');
	}
	
	/*
	* Returns the user relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	
	public function employee()
	{
		return $this->belongsToMany(static::$employeeModel);
	}
	
	/*
	* Save Equipment
	* 
	* @param array $equipment
	* @return void
	*/
	
	public function saveEquipment($equipment=array())
	{
		return $this->fill($equipment)->save();
	}
	
	/*
	* Update Equipment
	* 
	* @param array $equipment
	* @return void
	*/
	
	public function updateEquipment($equipment=array())
	{
		return $this->update($equipment);
	}	
}
