<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CoreSolutions\CoreAdmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Quotations extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'quotations';
    
    protected $fillable = [
          'name_of_company',
          'address',
          'phone',
          'email',
          'contact_person_name',
          'contact_person_mobile',
          'item_name',
          'item_model',
          'description',
          'technical_spec',
          'other_terms',
          'commercial_terms_condition',
          'price',
          'attachement1',
          'attachement2',
          'attachement3',
          'attachement4'
    ];
    

    public static function boot()
    {
        parent::boot();

        Quotations::observe(new UserActionsObserver);
    }
    
    
    
    
}