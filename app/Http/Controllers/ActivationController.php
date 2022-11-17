<?php

namespace App\Http\Controllers;

use App\User;
use Sentinel;
use Activation;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ActivationController extends Controller
{
    public function activate($email, $activationCode)
    {
        $user = User::whereEmail($email)->first();

        if (Activation::complete($user, $activationCode)) {

            Toastr::success('Activation du Compte reussie ! :)', 'Success');
            return redirect('/login');
        } else {
            Toastr::error('Echec Activation du Compte ! :)', 'Erreur');
        }
    }
}
