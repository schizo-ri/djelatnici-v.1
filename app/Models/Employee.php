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
	protected $fillable = ['first_name','last_name','oib','datum_rodjenja','mobitel','email','prebivaliste_adresa','prebivaliste_grad','boraviste_adresa','boraviste_grad','zvanje','bracno_stanje', 'broj_djece','radno_mjesto','lijecn_pregled','ZNR','napomena'];
	
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
