<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    protected $table = 'city';

    protected $fillable = ['City', 'zipcode'];
    
    
        public function address() {
        
            return $this->hasMany('App\address','city_id','id');
        
        }

        public function country() {
        
            return $this->belongsTo('App\country');
            
        }
    
}
