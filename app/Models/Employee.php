<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
	* The attributes thet are mass assignable
	*
	* @var array
	*/
	protected $fillable = ['first_name','last_name','ime_oca','ime_majke','oib','oi','datum_rodjenja','mjesto_rodjenja','mobitel','email','prebivaliste_adresa','prebivaliste_grad','boraviste_adresa','boraviste_grad','zvanje','bracno_stanje','radnoMjesto_id','lijecn_pregled','ZNR','konf_velicina','broj_cipela','napomena'];
	
	/*
	* The Eloquent works model name
	* 
	* @var string
	*/
	protected static $worksModel = 'App\Models\Work'; 
	
	/*
	* Returns the works relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	
	public function work()
	{
		return $this->belongsTo(static::$worksModel,'radnoMjesto_id');
	}
	
	/*
	* Save Employee
	* 
	* @param array $employee
	* @return void
	*/
	
	public function saveEmployee($employee=array())
	{
		return $this->fill($employee)->save();
	}
	
	/*
	* Update Employee
	* 
	* @param array $employee
	* @return void
	*/
	
	public function updateEmployee($employee=array())
	{
		return $this->update($employee);
	}	
	
}
