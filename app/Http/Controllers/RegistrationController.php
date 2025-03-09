<?php

namespace App\Http\Controllers;

use Mail;
use Sentinel;
use Activation;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class RegistrationController extends Controller
{
    public function register()
    {
        return view('authentication.register');
    }

    public function postRegister(Request $request)
    {
        $user = Sentinel::register($request->all());

        $activation = Activation::create($user);

        $role = Sentinel::findRoleBySlug('client');

        $role->users()->attach($user);

        $this->sendEmail($user, $activation->code);

        Toastr::info("Compte crée avec succès.. Un mail avec le lien d'activation vous a été envoyé :)", 'Info');
        return view('authentication.login');
    }

    private function sendEmail($user, $code)
    {
        Mail::send('emails.activation', [
            'user' => $user,
            'code' => $code
        ], function ($message) use ($user)
        {
            $message->to($user->email);

            $message->subject("Bonjour M. $user->first_name, Activez votre compte.");
        });
    }
}
