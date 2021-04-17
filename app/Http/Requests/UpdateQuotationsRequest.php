<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuotationsRequest extends FormRequest {

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
            'item_name' => 'required', 
            'item_model' => 'required', 
            'description' => 'required', 
            'technical_spec' => 'required', 
            'other_terms' => 'required', 
            'commercial_terms_condition' => 'required', 
            'price' => 'required', 
            'attachement1' => 'required', 
            
		];
	}
}
