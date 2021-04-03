<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Reminder;
use Mail;
use Sentinel;

class ForgotPasswordController extends Controller
{
    public function forgotPassword()
    {
        return view('authentication.forgot_password');
    }

    public function PostForgotPassword(Request $request)
    {
        $user = User::whereEmail($request->email)->first();

        if (empty($user))
            return redirect()->back()->with(['error' => " Désolé cette adresse email n'est associée à aucun compte."]);


        $reminder = Reminder::exists($user) ?: Reminder::create($user);

        $this->sendEmail($user, $reminder->code);

        return redirect()->back()->with(['success' => " Reset code was sent to your email "]);

    }

    public function resetPassword($email, $resetCode)
    {
        $user = User::byEmail($email);

        if (empty($user))
            abort(404);
            //return redirect()->back()->with(['error' => " Cette adresse email n'est associée à aucun compte."]);

        if (Reminder::exists($user)) {
            if (Reminder::exists($user, $resetCode)) {
                return view('authentication.reset-password');
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }

    }

    public function postResetPassword(Request $request, $email, $resetCode)
    {
         $user = User::byEmail($email);

        if (empty($user))
            abort(404);//return redirect()->back()->with(['error' => " Cette adresse email n'est associée à aucun compte."]);

        if (Reminder::exists($user)) {
            if (Reminder::exists($user, $resetCode)) {
                Reminder::complete($user, $resetCode, $request->password);

                return redirect('/login')->with('success', ' Votre nouveau mot de passe a bien été enregistrer');

            } else
                return redirect()->back()
                    ->with('error', ' Nouveau mot de passe non enregistrer !');
        } else {
            return redirect()->back()
                    ->with('error', ' Cet Utilisateur n\'est pas dans la base ');
        }
    }

    private function sendEmail($user, $code)
    {
        Mail::send('emails.forgot-password', [
            'user' => $user,
            'code' => $code
        ], function ($message) use ($user) {

            $message->to($user->email);

            $message->subject("Locature : demande de reinitialisation de mot de passe.");
        });
    }
}
