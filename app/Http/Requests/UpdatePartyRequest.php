<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePartyRequest extends FormRequest {

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
            'name_of_company' => 'required', 
            'address' => 'required', 
            'phone' => 'required', 
            'email' => 'required', 
            'contact_person_name' => 'required', 
            'contact_person_mobile' => 'required', 
            
		];
	}
}
