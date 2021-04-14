<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Party;
use App\PartyQuotation;
use App\Items;
use App\Http\Requests\CreatePartyRequest;
use App\Http\Requests\UpdatePartyRequest;
use Illuminate\Http\Request;

class GenerateexcelControler extends Controller {

	public function generate()
	{
		$party = Party::pluck('name_of_company' , 'id')->prepend('Select Party Name' , 0);
		$items = Items::pluck('item_model' , 'id')->prepend('Select Item' , 0);
		return View('admin.generateexcel.create' , compact('party' , 'items'));
	}	

	public function getPartyDetails($id)
	{
		$party = Party::where('id' , $id)->first();
		if($party){
			return response()->json(['data' => $party , 'status' => true]);
		}else{
			return response()->json(['data' => null , 'status' => false]);
		}
	}

	public function getItemDetails($id)
	{
		$item = Items::where('id' , $id)->first();
		if( $item ){
			return response()->json(['data' => $item , 'status' => true]);
		}else{
			return response()->json(['data' => null , 'status' => false]);
		}
	}

	public function generateWordFile(Request $request)
	{
		//save party info
		$data = ['name_of_company' 			=> $request->name_of_company,
				'address' 					=> $request->address,
				'phone' 					=> $request->phone,
				'email' 					=> $request->email,
				'contact_person_name' 		=> $request->contact_person_name,
				'contact_person_mobile' 	=> $request->contact_person_mobile,
				'item_name' 				=> $request->item_name,
				'item_model' 				=> $request->item_model,
				'description' 				=> $request->description,
				'technical_spec' 			=> $request->technical_spec,
				'other_terms' 				=> $request->other_terms,
				'commercial_terms_condition'=> $request->commercial_terms_condition];

		// PartyQuotation::create($data);

		return view('admin.exportword' , compact('data'));
	}
}