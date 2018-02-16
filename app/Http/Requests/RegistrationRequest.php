<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
			'radnoMjesto_id'  =>'required',
			'datum_prijave'  =>'required',
			'probni_rok'  =>'required',
			'godišnji_dani'  =>'required',
			'lijecn_pregled'  =>'required',
			'ZNR'  =>'required'		
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
			'employee_id.required' => 'Unos djelatnika je obavezan',
			'radnoMjesto_id.required'  => 'Unos radnog mjesta je obavezan',
			'datum_prijave.required'  => 'Unos datuma prijave je obavezan',
			'probni_rok.required'  => 'Unos probnog roka je obavezan',
			'godišnji_dani.required'  => 'Unos početnih dana godiišnjeg odmora je obavezan',
			'lijecn_pregled.required'  => 'Unos datuma liječničkog pregleda je obavezan',
			'ZNR.required'  => 'Unos datuma obuke o zaštiti na radu je obavezan'
		];
	}
}
