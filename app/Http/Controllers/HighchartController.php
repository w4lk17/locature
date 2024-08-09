<?php

namespace App\Http\Controllers;

use App\User;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HighchartController extends Controller
{
    public function handleChart()
    {
        $userData = User::select(\DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("Month(created_at)"))
            ->pluck('count');

        return view('home', compact('userData'));
    }


    public function handleStat()
    {
        $userData = User::select(\DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("Month(created_at)"))
            ->pluck('count');

        // return view('home', compact('userData'));
        // dd($userData);
        return view('admins.statistic', compact('userData'));
    }
}
