<?php

namespace App;

use App\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    //use SoftDeletes;

    protected $fillable = [
        'invoice_number',
        'client',
        'email',
        'tax',
        'client_address',
        'billing_address',
        'invoice_date',
        'expiry_date',
        'total',
        'tax_1',
        'discount',
        'grand_total',
        'other_information'
    ];

    protected $dates = ['deleted_at'];
}
