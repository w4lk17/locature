<?php

namespace App\Http\Controllers\Managers;

use App\Invoice;
use App\Voiture;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ManagerController extends Controller
{

    public function getdash()
    {
        $VoitureCount = Voiture::count();
        $ReservCount = Reservation::count();
        $InvoCount = Invoice::count();

        $totalAmount = DB::table('invoices')->where('etat', 'Payée')->sum('perçu');

        $latestCars = Voiture::orderBy('created_at', 'desc')->take(3)->get();
        $latestReservs = Reservation::orderBy('created_at', 'desc')->take(5)->get();


        return view('managers.m_dashboard', compact('VoitureCount', 'totalAmount','ReservCount', 'latestReservs', 'latestCars', 'InvoCount'));
    }

    public function stats()
    {
        return view('managers.statistic');
    }
}
