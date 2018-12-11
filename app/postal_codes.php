<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class postalcodes extends Model
{
    protected $table = 'postal_codes';

    protected $fillable = ['country_a2','denomination','format','Regex','fixedcode','created_at', 'updated_at'];

    
    
        

    
}
