<?php

namespace App\Http\Controllers\Clients\Booking;

use App\User;
use Sentinel;
use App\Voiture;
use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user =  Sentinel::getUser();
        $reservations = Reservation::with('voiture')
            ->where('user_id', $user->id)
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
    public function store(Request $request)
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
            ->update(['disponible' => 0]);

        Toastr::success('Reservation efectuée avec succès :)', 'Success');
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
        $reservation = Reservation::with('voiture')
            ->get()
            ->find($id);

        if ($reservation->user_id === Sentinel::getUser()->id) {

            $voiture_id = $reservation->voiture_id;

            $voiture_info = Voiture::find($voiture_id);

            return view('clients.booking.show', compact('reservation', 'voiture_info'));
        } else {
            Toastr::error('Action non autaurisée :)', 'Error');
            return redirect('/client/dashboard')
                ->with('error', 'Vous netes pas autaurisé a effectuer cette action..');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservation = Reservation::with('voiture')
            ->get()
            ->find($id);

        if ($reservation->user_id === Sentinel::getUser()->id) {

            $voiture_id = $reservation->voiture_id;

            $voiture_info = Voiture::find($voiture_id);

            $voitures = Voiture::all()->where('disponible', 0);
            //dd($voitures);
            return view('clients.booking.edit', compact('reservation', 'voiture_info', 'voitures'));
        } else {
            Toastr::error('Action non autaurisée :)', 'Error');
            return redirect('/client/dashboard')
                ->with('error', 'Vous netes pas autaurisé a effectuer cette action. .');
        }
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

        if ($reservation->user_id === Sentinel::getUser()->id) {

            $reservation->voiture_id = $request->voitureId;
            $reservation->date_depart = $request->date_depart;
            $reservation->date_retour = $request->date_retour;
            //dd($request->voitureId);
            $reservation->save();
            Toastr::success('Modification reussie :)', 'Success');
            return redirect('/client/bookings')->with('success', 'Successfully updated your reservation!');
        } else {
            Toastr::error('Action non autaurisée :)', 'Error');
            return redirect('/client/dashboard')
                ->with('error', 'Vous netes pas autaurisé a effectuer cette action.');
        }
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

        if ($reservation->user_id === Sentinel::getUser()->id) {

            $reservation->delete();
            Toastr::success('Suppression reussie :)', 'Success');
            return redirect('/client/bookings')->with('success', 'Successfully deleted your reservation!');
        } else {
            Toastr::error('Action non autaurisée :)', 'Error');
            return redirect('/client/dashboard')
                ->with('error', 'Vous n\'etes pas autaurisé a supprimer cette réservation.');
        }
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
