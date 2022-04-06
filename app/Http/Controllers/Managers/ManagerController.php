<?php

namespace App\Http\Controllers\Managers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Voiture;
use App\Reservation;

class ManagerController extends Controller
{

    public function getdash()
    {
        $VoitureCount = Voiture::count();
        $ReservCount = Reservation::count();

        $latestCars = Voiture::latest()->limit(3)->get();
        $latestReservs = Reservation::latest()->limit(5)->get();

        return view('managers.m_dashboard', compact('VoitureCount', 'ReservCount', 'latestReservs', 'latestCars'));
    }

    public function stats()
    {
        return view('managers.statistic');
    }
}
