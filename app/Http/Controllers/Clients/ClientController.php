<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Voiture;
use App\Reservation;
use App\User;
use Sentinel;

class ClientController extends Controller
{
    public function dashboard()
    {

        return view('clients.dashboard');
    }
    public function getvoitures()
    {
        $voitures = Voiture::all();

        return view('clients.voitures', compact('voitures'));
    }

//     public function index()
//     {
//         $reservations = Reservation::with('voiture')
//             ->latest('date_depart', 'asc')
//             ->get();
//
//         return view('clients.booking.index', compact('reservations'));
//     }
//
//     public function create($voiture_id)
//     {
//         $voiture_info = Voiture::find($voiture_id);
//
//         return view('clients.booking.create', compact('voiture_info'));
//     }
//
//     public function store(Request $request)
//         {
//             Reservation::create($request->all());
//
//             return redirect('managers/reservations')->with('success', 'Reservation created!');
//         }
//
//     public function show($id)
//         {
//             $reservation = Reservation::with('voiture')->get()->find($id);
//
//             $voiture_id = $reservation->voiture_id;
//
//             $voiture_info = Voiture::find($voiture_id);
//
//             return view('managers.reservation.show', compact('reservation', 'voiture_info'));
//         }
}
