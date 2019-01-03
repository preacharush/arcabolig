<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    
    protected $table = 'properties';
    
    public function client()
    {
        return $this->belongsToMany('App\client','client_has_property','property_id','client_id');
    }

    public function address()
    {
        return $this->belongsToMany('App\address','property_has_address','property_id','address_id');
        // return $this->belongsToMany('App\address','property_has_address');
    }

}
