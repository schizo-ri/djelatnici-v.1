<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Vacation_RequestRequest extends FormRequest
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
			'GOzavršetak' => 'date|after_or_equal:GOpocetak',
			'napomena' => 'required',
			'employee_id' => 'required',
			'zahtjev' => 'required'
        ];
    }
	
	public function messages()
	{
		return [
			'GOzavršetak.after_or_equal' => 'Datuma završetka ne može biti prije datuma početka.',
			'napomena.required' => 'Unos napomene je obavezan',
			'employee_id.required' => 'Unos imena je obavezan',
			'zahtjev.required' => 'Unos vrste zahteva je obavezan',
		];
	}
}
