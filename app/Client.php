<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_reg_nr', 'client_name', 'client_contact','client_phone1','client_phone2','client_email'
    ];

    public function properties()
    {
        return $this->belongsToMany('App\Property','client_has_property','client_id','property_id');
    }

    public function address() {

        return $this->belongsTo(address::class,'address_id','id' );
    
    }

    public function company() {

        return $this->belongsToMany(company::class,'company_has_clients');
    
    }
}
