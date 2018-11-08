<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    protected $table = 'address';

    protected $fillable = ['address', 'address2','district'];
    

        public function company() {
        
            return $this->belongsTo(company::class);

        }

        public function city() {
        
            return $this->hasOne(city::class, 'id', 'city_id');
            
        }

        public function property()
        {
            
        return $this->belongsToMany('App\Property','property_has_address','address_id','property_id');

        }
    
}
