<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class countries extends Model
{
    protected $table = 'countries';

    protected $fillable = ['created_at', 'updated_at'];

    
    public function postal_codes() {
        
        return $this->hasMany('app\postalcodes');
    
    }
    
}
