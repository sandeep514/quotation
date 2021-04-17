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
use App\Quotations;

class GenerateexcelControler extends Controller
{
    public function generate()
    {
        $party = Party::pluck('name_of_company', 'id')->prepend('Select Party Name', 0);
        $items = Items::pluck('item_model', 'id')->prepend('Select Item', 0);
        return View('admin.generateexcel.create', compact('party', 'items'));
    }

    public function getPartyDetails($id)
    {
        $party = Party::where('id', $id)->first();
        if ($party) {
            return response()->json(['data' => $party , 'status' => true]);
        } else {
            return response()->json(['data' => null , 'status' => false]);
        }
    }

    public function getItemDetails($id)
    {
        $item = Items::where('id', $id)->first();
        if ($item) {
            return response()->json(['data' => $item , 'status' => true]);
        } else {
            return response()->json(['data' => null , 'status' => false]);
        }
    }

    public function generateWordFile(Request $request)
    {
        //save party info
        $data = ['name_of_company' 			 => $request->name_of_company,
                'address' 					 => $request->address,
                'phone' 					 => $request->phone,
                'email' 					 => $request->email,
                'contact_person_name' 		 => $request->contact_person_name,
                'contact_person_mobile' 	 => $request->contact_person_mobile,
                'item_name' 				 => $request->item_name,
                'item_model' 				 => $request->item_model,
                'description' 				 => $request->description,
                'technical_spec' 			 => $request->technical_spec,
                'other_terms' 				 => $request->other_terms,
                'commercial_terms_condition' => $request->commercial_terms_condition,
                'price' 					 => $request->price,
                'attachement1'               => $request->attachement1,
                'attachement2'               => $request->attachement2,
                'attachement3'               => $request->attachement3,
                'attachement4'               => $request->attachement4,
            ];

        // PartyQuotation::create($data);
        Quotations::create($data);
        
        return view('admin.exportword', compact('data'));
    }

    public static function numberTowords($num)
    {
        $ones = [
            0 =>"ZERO",
            1 => "ONE",
            2 => "TWO",
            3 => "THREE",
            4 => "FOUR",
            5 => "FIVE",
            6 => "SIX",
            7 => "SEVEN",
            8 => "EIGHT",
            9 => "NINE",
            10 => "TEN",
            11 => "ELEVEN",
            12 => "TWELVE",
            13 => "THIRTEEN",
            14 => "FOURTEEN",
            15 => "FIFTEEN",
            16 => "SIXTEEN",
            17 => "SEVENTEEN",
            18 => "EIGHTEEN",
            19 => "NINETEEN",
            "014" => "FOURTEEN"];
        
        $tens = [
            0 => "ZERO",
            1 => "TEN",
            2 => "TWENTY",
            3 => "THIRTY",
            4 => "FORTY",
            5 => "FIFTY",
            6 => "SIXTY",
            7 => "SEVENTY",
            8 => "EIGHTY",
            9 => "NINETY"];
        
        $hundreds = [
            "HUNDRED",
            "THOUSAND",
            "MILLION",
            "BILLION",
            "TRILLION",
            "QUARDRILLION"];

        /*limit t quadrillion */
        
        $num = number_format($num, 2, ".", ",");
        $num_arr = explode(".", $num);
        $wholenum = $num_arr[0];
        $decnum = $num_arr[1];
        $whole_arr = array_reverse(explode(",", $wholenum));
        krsort($whole_arr, 1);
        $rettxt = "";
        
        foreach ($whole_arr as $key => $i) {
            while (substr($i, 0, 1)=="0") {
                $i=substr($i, 1, 5);
            }
            if ($i < 20) {
                /* echo "getting:".$i; */
                $rettxt .= $ones[$i];
            } elseif ($i < 100) {
                if (substr($i, 0, 1)!="0") {
                    $rettxt .= $tens[substr($i, 0, 1)];
                }
                if (substr($i, 1, 1)!="0") {
                    $rettxt .= " ".$ones[substr($i, 1, 1)];
                }
            } else {
                if (substr($i, 0, 1)!="0") {
                    $rettxt .= $ones[substr($i, 0, 1)]." ".$hundreds[0];
                }
                if (substr($i, 1, 1)!="0") {
                    $rettxt .= " ".$tens[substr($i, 1, 1)];
                }
                if (substr($i, 2, 1)!="0") {
                    $rettxt .= " ".$ones[substr($i, 2, 1)];
                }
            }
            if ($key > 0) {
                $rettxt .= " ".$hundreds[$key]." ";
            }
        }
        if ($decnum > 0) {
            $rettxt .= " and ";
            if ($decnum < 20) {
                $rettxt .= $ones[$decnum];
            } elseif ($decnum < 100) {
                $rettxt .= $tens[substr($decnum, 0, 1)];
                $rettxt .= " ".$ones[substr($decnum, 1, 1)];
            }
        }
        return $rettxt;
    }
}
