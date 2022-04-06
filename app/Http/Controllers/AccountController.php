<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Sentinel;
use App\User;

class AccountController extends Controller
{
    public function settings()
    {
        $user =  Sentinel::getUser();

        return view('account.settings', compact('user'));
    }

    public function updateProfil(Request $request){

        $user = Sentinel::getUser();

        $rules = [
            'last_name' => 'required',
            'first_name' => 'required',
            'address' => 'required',
            'cni' => 'required',
            'tel' => 'required|min:12',
            'email' => 'required|email'
        ];

        $messages = [
            'required'  => 'ce champ ne peut etres vide.',
            'min'  => 'preceder le numero avec l\'indicatif du pays'
        ];

        $this->validate($request, $rules, $messages);

        if(!Sentinel::update($user, $request->all())){
            return redirect()->back()
                ->with(['errorI' => 'verifier si les informations sont correcte.']);
        }

        return redirect()->back()
            ->with(['successI' => 'Les informations ont ete modifie avec succès']);
    }

    public function updatePassword(Request $request){

        $hasher = Sentinel::getHasher();

        $rules = [
            'old_password' => 'required|min:6',
            'confPassword' => 'required|min:6|same:password'
        ];

        $messages = [
            'required'  => 'ce champ ne peut etres vide.',
            'min'    => 'le mot de passe doit contenir minimum 6 caractere .',
            'same'  =>'le mot de passe ne correspond pas.'
        ];

        $this->validate($request, $rules, $messages);

        $oldPassword = $request->old_password;
        $password = $request->password;
        $passwordConf = $request->confPassword;

        $user = Sentinel::getUser();

        if (!$hasher->check($oldPassword, $user->password) || $password != $passwordConf) {
            return redirect()->back()
            ->with(['errorM' => 'Echec ancien mot de passe incorrecte.']);
        }

        Sentinel::update($user, array('password' => $password));

        return redirect()->back()
            ->with(['successM' => 'Mot de passe modifier avec succès']);
    }
}
