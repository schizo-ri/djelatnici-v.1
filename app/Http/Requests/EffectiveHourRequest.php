<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EffectiveHourRequest extends FormRequest
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
            'employee_id' => 'required',
			'effective_cost' => 'required',
        ];
    }
	
	public function messages()
	{
		return [
			'employee_id.required' => 'Unos djelatnika je obavezan.',
			'effective_cost.required' => 'Unos vrijednosti je obavezan'
		];
	}
}
