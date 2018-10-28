<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    protected $table = 'country';

    protected $fillable = ['country'];

    public $timestamps = false;

    
    
        public function city() {
        
            return $this->hasMany('app\city');
        
        }

    
}
