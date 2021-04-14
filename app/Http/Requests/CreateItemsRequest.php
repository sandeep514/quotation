<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateItemsRequest extends FormRequest {

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
            'item_name' => 'required', 
            'item_model' => 'required', 
            'attachment1' => 'required', 
            'description' => 'required', 
            'technical_spec' => 'required', 
            'other_terms' => 'required', 
            'commercial_terms_condition' => 'required', 
            
		];
	}
}
