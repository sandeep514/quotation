<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CoreSolutions\CoreAdmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Items extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'items';
    
    protected $fillable = [
          'item_name',
          'item_model',
          'attachment1',
          'attachment2',
          'attachment3',
          'attachment4',
          'description',
          'technical_spec',
          'other_terms',
          'commercial_terms_condition'
    ];
    

    public static function boot()
    {
        parent::boot();

        Items::observe(new UserActionsObserver);
    }
    
    
    
    
}