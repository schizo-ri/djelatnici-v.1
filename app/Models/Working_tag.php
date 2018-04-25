<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Working_tag extends Model
{
    protected $fillable = ['naziv','sati'];

/*
	* Save WorkingTag
	* 
	* @param array $workingTag
	* @return void
	*/
	
	public function saveWorkingTag($workingTag=array())
	{
		return $this->fill($workingTag)->save();
	}
	
	/*
	* Update WorkingTag
	* 
	* @param array $workingTag
	* @return void
	*/
	
	public function updateWorkingTag($workingTag=array())
	{
		return $this->update($workingTag);
	}	
}