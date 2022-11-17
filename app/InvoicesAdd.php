<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoicesAdd extends Model
{

    protected $fillable = [
        'item',
        'invoice_number',
        'description',
        'unit_cost',
        'qty',
        'amount'
    ];
}
