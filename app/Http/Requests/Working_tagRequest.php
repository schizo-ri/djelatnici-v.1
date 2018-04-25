<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Working_tagRequest extends FormRequest
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
            'naziv'  =>'required',
			'sati'  =>'required|numeric'		
        ];
    }
	
	public function messages()
	{
		return [
			'naziv.required' => 'Unos naziva je obavezan',
			'sati.required'  => 'Unos broja sati je obavezan',
			'sati.numeric'  => 'Dozvoljen je samo upis broja'
		];
	}
}
