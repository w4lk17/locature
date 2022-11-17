<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voiture extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'matricule',
        'modele',
        'marque',
        'carburant',
        'chemin',
        'prix',
        'voiture_image',
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo("App\User");
    }
}
