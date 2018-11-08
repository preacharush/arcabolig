<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    
/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_reg_nr', 'client_name', 'client_contact','client_phone1','client_phone2','email'
    ];

    public function property()
    {
        return $this->belongsToMany('app\Property','client_has_property','client_id','property_id');
    }
}
