<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeetingRequest extends FormRequest
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
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'datum' => 'required',
			'employee_id' => 'required',
			'meeting_room_id' => 'required',
			'description' => 'required',
        ];
    }
	
	public function messages()
	{
		return [
			'datum.required' => 'Unos datuma je obavezan.',
			'employee_id.required' => 'Unos djelatnika je obavezan.',
			'meeting_room_id.required' => 'Unos sobe za sastanke je obavezan.',
			'description.required' => 'Unos opisa je obavezan.'
		];
	}
}
