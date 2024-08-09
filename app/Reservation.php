<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'voiture_id',
        'etat',
        'date_depart',
        'date_retour'
    ];

    protected $dates = ['deleted_at', 'date_depart', 'date_retour'];

    public function voiture()
    {
        return $this->belongsTo('App\Voiture');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
