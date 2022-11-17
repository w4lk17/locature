<?php

namespace App\Http\Controllers;

use Sentinel;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class LockscreenController extends Controller
{
    public function lockScreen()
    {
        if (url()->previous() == route('lockscreen')) {
            session(['locked' => 'true']);
        } else {
            session(['locked' => 'true', 'uri' => url()->previous()]);
        }

        $user =  Sentinel::getUser();

        return view('authentication.lock-screen', compact('user'));
    }

    public function postLockscreen(Request $request)
    {
        $hasher = Sentinel::getHasher();
        $user =  Sentinel::getUser();

        /*$rules = [
            'password' => 'required|min:6',
        ];

        $messages = [
            'required'  => 'Entrer un mot de passe valide.',
            'min'    => 'le mot de passe doit contenir minimum 6 caractere .'
         ];

        $this->validate($request, $rules, $messages);*/

        $oldPassword = $request->password;

        if ($hasher->check($oldPassword, $user->password)) {
            $uri = $request->session()->get('uri');

            $request->session()->forget(['locked', 'uri']);


            Toastr::info("Bon retour $user->last_name :)", 'Info');
            return redirect($uri);
        }
        Toastr::error('le mot de passe correspond pas :)', 'Erreur');
        return redirect()->back();
    }
}
