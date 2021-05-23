<?php

namespace App\Http\Controllers\Clients\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Voiture;
use App\Reservation;
use App\User;
use Sentinel;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::with('voiture')
                ->latest('created_at', 'asc')
                ->get();

        return view('clients.booking.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($voiture_id)
    {
        $voitureInfo = Voiture::find($voiture_id);

        return view('clients.booking.create', compact('voitureInfo'));
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

        $request->request->add(['user_id' => $user->id]);

        Reservation::create($request->all());

        return redirect('/client/bookings')->with('success', 'Reservation efectuer avec succes!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::with('voiture')->get()->find($id);

        $voiture_id = $reservation->voiture_id;

        $voiture_info = Voiture::find($voiture_id);

        return view('clients.booking.show', compact('reservation', 'voiture_info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservation = Reservation::with('voiture')->get()->find($id);

        $voiture_id = $reservation->voiture_id;

        $voiture_info = Voiture::find($voiture_id);

        $voitures = Voiture::all();

        return view('clients.booking.edit', compact('reservation', 'voiture_info', 'voitures'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        $reservation->voiture_id = $request->voiture_id;
        $reservation->date_depart = $request->date_depart;
        $reservation->date_retour = $request->date_retour;

        $reservation->save();
        return redirect('/client/bookings')->with('success', 'Successfully updated your reservation!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();

        return redirect('/client/bookings')->with('success', 'Successfully deleted your reservation!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//      public function dashboard()
//          {
//              $voitures = Voiture::all();
//              return view('clients.accueil', compact('voitures'));
//          }
}
