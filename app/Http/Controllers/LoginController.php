<?php

namespace App\Http\Controllers;

use Sentinel;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;


class LoginController extends Controller
{
    public function login()
    {
        return view('authentication.login');
    }

    public function postLogin(Request $request)
    {
        try {

            $rememberMe = false;

            if (isset($request->remember_me)) {
                $rememberMe = true;
            }

            if (Sentinel::authenticate($request->all(), $rememberMe)) {
                $slug = Sentinel::getUser()->roles()->first()->slug;

                if ($slug == 'admin') {
                    Toastr::info('Soyez le bienvenu dans Locature :)', 'Info');
                    return redirect('/admin/dashboard');
                } elseif ($slug == 'manager') {
                    Toastr::info('Soyez le bienvenu dans Locature :)', 'Info');
                    return redirect('/manager/dashboard');
                } elseif ($slug == 'client') {
                    Toastr::info('Soyez le bienvenu dans Locature :)', 'Info');
                    return redirect('/client/dashboard');
                }
                return redirect('/login');
            } else {
                Toastr::error('Information(s) de connexion incorrecte(s) :)', 'Erreur');
                return redirect()->back();
            }
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            Toastr::warning("Trop de tentative :) n\ vous êtes banni pour $delay secondes.", 'Avertissement');
            return redirect()->back()->with(['error' => " vous êtes banni pour $delay secondes. "]);
        } catch (NotActivatedException $e) {
            Toastr::info("Votre compte n'est pas activé ): n\ Verifier votre boite mail pour activer le compte", 'Info');
            return redirect()->back()->with(['error' => " Votre compte n'est pas activé "]);
        }
    }

    public function logout()
    {
        $user =  Sentinel::getUser();
        Sentinel::logout(null, true);

        Toastr::info("Aurevoir :)", 'Info');
        return redirect('/login');
    }
}
