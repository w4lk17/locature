<?php

namespace App\Http\Controllers\Admins;

use App\User;
use Sentinel;
use App\Http\Controllers\Controller;
use App\Reservation;
use App\Voiture;
use Brian2694\Toastr\Facades\Toastr;
use Cartalyst\Sentinel\Laravel\Facades\Activation;


class AdminController extends Controller
{
    public function getdash()
    {

        $UserCount   = User::count();
        $CarsCount   = Voiture::count();
        $ReservCount = Reservation::count();

        $client = Sentinel::findRoleBySlug('client');
        $ClientsCount = $client->users()->get()->count();

        $clients  = $client->users()->latest()->limit(5)->get();
        $reservs  = Reservation::latest()->limit(5)->get();

        return view('admins.a_dashboard', compact('reservs', 'clients', 'UserCount', 'CarsCount', 'ReservCount', 'ClientsCount'));
    }


    public function Activate($id)
    {
        $user = Sentinel::findById($id);

        $userId = $user->id;

        Activation::where('user_id', $userId)
            ->update(['completed' => 1]);

        Toastr::success('Utilisateur activé avec succès ! :)', 'Success');
        return redirect()->back();
    }

    public function Desactivate($id)
    {
        $user = Sentinel::findById($id);

        $userId = $user->id;

        Activation::where('user_id', $userId)
            ->update(['completed' => 0]);

        Toastr::success('Utilisateur désactivé avec succès ! :)', 'Success');
        return redirect()->back();
    }

    public function getmanagers()
    {
        $managers = Sentinel::findRoleBySlug('manager');
        $managers = $managers->users()->get();

        return view('admins.manager.managersliste', compact('managers'));
    }

    public function getclients()
    {
        $clients = Sentinel::findRoleBySlug('client');
        $clients = $clients->users()->get();

        return view('admins.client.clientsliste', compact('clients'));
    }
}
