<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'first_name'  =>'required',
			'last_name'  =>'required',
			'oib'  =>'required',
			'oi'=>'required',
			'oi_istek'=>'required',
			'datum_rodjenja'  =>'required',
			'prebivaliste_adresa'  =>'required',
			'prebivaliste_grad'  =>'required',
			'zvanje'  =>'required',
			'sprema'  =>'required',
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
			'first_name.required' => 'Unos imena je obavezan', //max.required
			'last_name.required'  => 'Unos prezimena je obavezan',
			'oib.required'  => 'Unos OIB-a je obavezan',
			'oi.required'  => 'Unos broja osobne iskaznice je obavezan',
			'oi_istek.required'  => 'Unos datuma isteka osobne iskaznice je obavezan',
			'datum_rodjenja.required'  => 'Unos datuma rođenja je obavezan',
			'prebivaliste_adresa.required'  => 'Unos adrese je obavezan',
			'prebivaliste_grad.required'  => 'Unos grada je obavezan',
			'zvanje.required'  => 'Unos zvanja je obavezan',
			'sprema.required'  => 'Unos stručne spreme je obavezan',
			'lijecn_pregled.required'  => 'Unos datuma je obavezan',
			'ZNR.required'  => 'Unos datuma je obavezan',
		];
	}
}
