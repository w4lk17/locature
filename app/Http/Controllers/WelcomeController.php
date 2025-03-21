<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Voiture;

class WelcomeController extends Controller
{
    public function welcome(){

        $voitures = Voiture::paginate(6);

        return view('welcome', compact('voitures'));
    }
}
