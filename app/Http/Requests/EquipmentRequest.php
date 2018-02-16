<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipmentRequest extends FormRequest
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
            'naziv'    =>'required',
			'User_id'  =>'required',
			'količina_monter'  =>'required',
			'količina_inženjer'  =>'required'
			
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
			'naziv.required'   => 'Unos naziva opreme je obavezan',
			'User_id.required' => 'Unos zadužene osobe je obavezan',
			'količina_monter.required' => 'Polje ne može biti prazno, upiši 0 ili potrebnu količinu!',
			'količina_inženjer.required' => 'Polje ne može biti prazno, upiši 0 ili potrebnu količinu!'
		];
	}
}
