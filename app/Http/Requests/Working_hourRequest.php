<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Working_hourRequest extends FormRequest
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
            'user_id'  =>'required',
			'datum'  =>'required',
			'oznaka_id'  =>'required',
			'sati'  =>'required|numeric'
        ];
    }
	
	public function messages()
	{
		return [
			'user_id.required' => 'Unos djelatnika je obavezan',
			'datum.required'  => 'Unos datuma je obavezan',
			'oznaka_id.required'  => 'Unos oznake radnog vremena je obavezan',
			'sati.required'  => 'Unos sati je obavezan',
			'sati.numeric'  => 'Dozvoljen je samo upis broja'
		];
	}
}
