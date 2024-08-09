<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticController extends Controller
{

    public function stats()
    {
        return view('admins.statistic');
    }
}
