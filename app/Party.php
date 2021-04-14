<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CoreSolutions\CoreAdmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Party extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'party';
    
    protected $fillable = [
          'name_of_company',
          'address',
          'phone',
          'email',
          'contact_person_name',
          'contact_person_mobile'
    ];
    

    public static function boot()
    {
        parent::boot();

        Party::observe(new UserActionsObserver);
    }
    
    
    
    
}