<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartyQuotation extends Model
{
	protected $table = 'party_quotation';
    protected $fillable = ['name_of_company','address','phone','email','contact_person_name','contact_person_mobile','item_name','item_model','description','technical_spec','other_terms','commercial_terms_condition'];

}