<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facture extends Model
{
    use SoftDeletes;

        protected $fillable = [

        ];

        protected $dates = ['deleted_at'];
}
