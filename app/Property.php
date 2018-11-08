<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    
    
    
    public function client()
    {
        return $this->belongsToMany('app\client','client_has_property','property_id','client_id');
    }

    public function address()
    {
        return $this->belongsToMany('app\address','property_has_address','property_id','address_id');
    }

}
