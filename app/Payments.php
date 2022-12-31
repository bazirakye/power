<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Payments extends Model
{
    
    protected $table='payments';

    protected $fillable = [
        'meter_number',
        'amount',
        'cost_of_units',
        'vat',
        'service_fee',
        'token',
        'units'       
    ];
}
