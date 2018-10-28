<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    protected $table = 'company';

    protected $fillable = ['comp_reg_nr', 'comp_name','email','phone'];
    
    
        public function address() {

            return $this->belongsTo(address::class, 'id', 'address_id');
        
        }

        public function users() {

            return $this->hasMany(users::class);
        
        }
}
