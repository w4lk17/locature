<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admins.a_dashboard');
    }
}
