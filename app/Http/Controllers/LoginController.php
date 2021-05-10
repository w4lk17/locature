<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
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

            if (isset($request->remember_me)){
                $rememberMe = true;
            }

            if (Sentinel::authenticate($request->all(), $rememberMe)) {
                $slug = Sentinel::getUser()->roles()->first()->slug;

                if ($slug == 'admin') {
                    return redirect('/admin/users');
                }elseif ($slug == 'manager') {
                    return redirect('/manager/dashboard');
                }elseif ($slug == 'client'){
                     return redirect('/client/dashboard');
                 }
                return redirect('/');
            } else {
                return redirect()->back()->with(['error' => 'mauvais identifiant ']);
            }
       } catch (ThrottlingException $e) {
           $delay = $e->getDelay();

            return redirect()->back()->with(['error' => " vous êtes banni pour $delay secondes. "]);
       } catch (NotActivatedException $e) {

            return redirect()->back()->with(['error' => " Votre compte n'est pas activé "]);
       }

    }

    public function logout()
    {
        Sentinel::logout();
        return redirect('/login');
    }
}
