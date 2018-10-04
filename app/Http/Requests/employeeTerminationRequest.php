<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeTerminationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'employee_id'  =>'required',
			'otkaz_id'     =>'required',
			'otkazni_rok'  =>'required',
			'datum_odjave'  =>'required'
			
        ];
    }
	
	/**
	 * Get the error messages for the defined validation rules.
	 *
	 * @return array
	 */
	public function messages()
	{
		return [
			'employee_id.required'   => 'Unos djelatnika je obavezan',
			'otkaz_id.required'   => 'Unos vrste otkaza je obavezan',
			'otkazni_rok.required'   => 'Unos otkaznog roka je obavezan',
			'datum_odjave.required'   => 'Unos datuma otkaza je obavezan'
		];
	}
}
