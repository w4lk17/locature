<?php

namespace App\Http\Controllers\Managers\Reservation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Reservation;
use App\User;
use Sentinel;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();

        return view('managers.reservation.index', compact('reservations'));
    }

     public function show($id)
     {
        $reservation = Reservation::findOrFail($id);

        $users = User::all();

        return view('managers.reservation.show', compact('reservation', 'users'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$voitureInfo = Voiture::find($voiture_id);

        return view('managers.reservation.create');
    }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request )
    {
        $user =  Sentinel::getUser();

        $rules = [
            'date_depart' => 'required',
            'date_retour' => 'required'
       ];

        $messages = [
            'required'  => 'ce champ ne peut etre vide.'
        ];

        $this->validate($request, $rules, $messages);

        $request->request->add(['user_id' => $user->id]);

        $reserv = Reservation::create($request->all());

        // update the car to unavailable after reservation
        $voitureId = $reserv->voiture_id;

        Voiture::where('id', $voitureId)
            ->update(['disponible' => 1]);

        return redirect()->back()
            ->with('success', 'Reservation efectuer avec succes!');
    }

    public function confirmReserv(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $user = Sentinel::getUser()->id;

        $reservation = Reservation::where('id', $reservation->id)
                ->update(['etat' => 1, 'treat_by' => $user]);

        return redirect('/manager/reservations')//->with('success', 'Reservation confirmee avec succes!');
                ->with('flash', 'Reservation confirmée avec succes! ');

    }

    public function cancelReserv(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $user = Sentinel::getUser()->id;

        $reservation = Reservation::where('id', $reservation->id)
                ->update(['etat' => 2, 'treat_by' => $user]);

        return redirect('/manager/reservations')//->with('success', 'Reservation confirmee avec succes!');
                ->with('flash', 'Reservation annulée avec succes! ');

    }
}
