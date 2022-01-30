<?php

namespace App\Http\Controllers\Managers\Reservation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Reservation;

class ReservationController extends Controller
{
    public function getReservations()
    {
        $reservations = Reservation::all();

        return view('managers.reservation.create', compact('reservations'));
    }

    public function confirmReserv(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        $reservation = Reservation::where('id', $reservation->id)
                ->update(['etat' => 1]);

        return redirect('/manager/reservations')//->with('success', 'Reservation confirmee avec succes!');
                ->with('flash', 'Reservation confirmée avec succes! ');

    }
    public function cancelReserv(Request $request, $id)
        {
            $reservation = Reservation::findOrFail($id);

            $reservation = Reservation::where('id', $reservation->id)
                    ->update(['etat' => 2]);

            return redirect('/manager/reservations')//->with('success', 'Reservation confirmee avec succes!');
                    ->with('flash', 'Reservation annulée avec succes! ');

        }

    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);

        return view('managers.reservation.show', compact('reservation'));
    }
}
