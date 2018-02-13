<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KidRequest extends FormRequest
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
            'ime'  =>'required',
			'prezime'  =>'required',
			'employee_id'  =>'required',
			'datum_rodjenja'  =>'required'
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
			'ime.required' => 'Unos imena je obavezan', //max.required
			'prezime.required'  => 'Unos prezimena je obavezan',
			'employee_id.required'  => 'Unos roditelja je obavezan',
			'datum_rodjenja.required'  => 'Unos datuma rođenja je obavezan'
		];
	}
}
