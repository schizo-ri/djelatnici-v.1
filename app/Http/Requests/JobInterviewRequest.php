<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobInterviewRequest extends FormRequest
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
            'first_name' => 'required',
			'last_name' => 'required',
			'datum' => 'required',
			'oib' => 'required|numeric',
			'telefon' => 'numeric',
			'email' => 'email',
			'godine_iskustva' => 'numeric',
			'placa' => 'numeric'
        ];
    }
	
	public function messages()
	{
		return [
			'first_name.required' => 'Unos imena je obavezan.',
			'last_name.required' => 'Unos prezimena je obavezan.',
			'datum.required' => 'Unos datuma je obavezan',
			'oib.required' => 'Unos OIB-a je obavezan.',
			'oib.numeric' => 'Dozvoljen je samo unos brojeva.',
			'telefon.numeric' => 'Dozvoljen je samo unos brojeva.',
			'placa.numeric' => 'Dozvoljen je samo unos brojeva.',
			'godine_iskustva.numeric' => 'Dozvoljen je samo unos brojeva.',
			'email.email' => 'E-mail adresa nije ispravno unesena.'
		];
	}
}
