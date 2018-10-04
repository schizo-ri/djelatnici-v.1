<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticeRequest extends FormRequest
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
			'subject'  =>'required',
			'notice'  =>'required'
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
			'employee_id.required' => 'Unos pošiljatelja je obavezan',
			'subject.required'  => 'Unos subjekta je obavezan',
			'notice.required'  => 'Unos poruke obavezan'
		];
	}
	
}
