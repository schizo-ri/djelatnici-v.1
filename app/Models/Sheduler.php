<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sheduler extends Model
{
	/* The attributes thet are mass assignable
	*
	* @var array
	*/
    protected $fillable = ['datum','employee_id','project_id','car_id','napomena','mjesto_rada'];
	
	/*
	* The Eloquent employee model name
	* 
	* @var string
	*/
	protected static $employeesModel = 'App\Models\Employee'; 	
	
	/*
	* The Eloquent car model name
	* 
	* @var string
	*/
	protected static $carModel = 'App\Models\Car'; 
	
	/*
	* The Eloquent project model name
	* 
	* @var string
	*/
	protected static $projectModel = 'App\Models\Project'; 
	
	/*
	* Returns the employees relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function employee()
	{
		return $this->belongsTo(static::$employeesModel,'employee_id');
	}
	
	/*
	* Returns the cars relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function car()
	{
		return $this->belongsTo(static::$carModel,'car_id');
	}
	
	/*
	* Returns the project relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function project()
	{
		return $this->belongsTo(static::$projectModel,'project_id');
	}
	
	/*
	* Save ShedulerRequest
	* 
	* @param array $ShedulerRequest
	* @return void
	*/
	
	public function saveSheduler($sheduler=array())
	{
		return $this->fill($sheduler)->save();
	}
	
	/*
	* Update ShedulerRequest
	* 
	* @param array $ShedulerRequest
	* @return void
	*/
	
	public function updateSheduler($sheduler=array())
	{
		return $this->update($sheduler);
	}	
}
