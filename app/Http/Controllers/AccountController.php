<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Sentinel;
use App\User;

class AccountController extends Controller
{
    public function profil()
    {

        return view('account.profil');
    }
}
