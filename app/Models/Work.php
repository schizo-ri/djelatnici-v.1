<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = ['odjel','naziv'];
	
	/*
	* The Eloquent employees model names
	* 
	* @var string
	*/
	protected static $employeesModel = 'App\Models\Employee';
	
	/*
	* Returns the employee relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\HasMany
	*/
	
	public function employee()
	{
		return $this->hasMany(static::$employeesModel,'radnoMjesto_id');
	}	
	
	/*
	* Save Work
	* 
	* @param array $work
	* @return void
	*/
	
	public function saveWork($work=array())
	{
		return $this->fill($work)->save();
	}
	
	/*
	* Update Work
	* 
	* @param array $work
	* @return void
	*/
	
	public function updateWork($work=array())
	{
		return $this->update($work);
	}	
}


