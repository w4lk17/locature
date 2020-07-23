<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

class ListeController extends Controller
{
    public function getmanager()
    {
        $managers = Sentinel::findRoleBySlug('manager');
        $managers = $managers->users()->get();

        return view('admins.manager.managersliste', compact('managers'));
    }

    public function getclient()
    {
        $clients = Sentinel::findRoleBySlug('client');
        $clients = $clients->users()->get();

        return view('admins.client.clientsliste', compact('clients'));
    }
}
