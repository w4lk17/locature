<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

class LockscreenController extends Controller
{
    public function lockScreen()
    {
        if (url()->previous() == route('lockscreen'))
        {
            session(['locked' => 'true']);
        }
        else
        {
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

            if($hasher->check($oldPassword, $user->password)){
                $uri = $request->session()->get('uri');

                $request->session()->forget(['locked', 'uri']);

                return redirect($uri)->with('flash', 'Welcome Back! ' . $user->lastname);
            }

            return redirect()->back()
                ->with(['error' => 'mot de passe correspond pas.']);
    }
}
