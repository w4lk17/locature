<?php

namespace App\Http\Controllers\Managers\Reservation;

use DB;
use App\User;
use Sentinel;
use App\Voiture;
use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::latest()->get();

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
        //$voitures = Voiture::all();
        $voitures = DB::table('voitures')->where('disponible', 1)->get();

        return view('managers.reservation.create', compact('voitures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $treatBy =  Sentinel::getUser(); //get loggedin user

        $rules = [
            'last_name'   => 'required',
            'first_name'  => 'required',
            'email'       => 'required|email|unique:users',
            'telephone'   => 'required',
            'address'     => 'required',
            'num_cni'     => 'required',
            'num_permis'  => 'required',
            'voitureId'   => 'required',
            'date_depart' => 'required',
            'date_retour' => 'required'
        ];

        $messages = [
            'required' => 'ce champ ne peut etre vide.',
            'email'    => 'cet email existe déja'
        ];

        $this->validate($request, $rules, $messages);

        try {
            $user = new User;

            $user->last_name  = $request->last_name;
            $user->first_name = $request->first_name;
            $user->email      = $request->email;
            $user->telephone  = $request->telephone;
            $user->address    = $request->address;
            $user->num_cni    = $request->num_cni;
            $user->num_permis = $request->num_permis;

            $newuser = Sentinel::registerAndActivate(array_merge($request->all(), ['password' => 'password']));

            $user = Sentinel::findById($newuser->id);

            $role = Sentinel::findRoleBySlug('client');
            $role->users()->attach($user);

            $reservations = [
                'date_depart'  => $request->date_depart,
                'date_retour'  => $request->date_retour,
                'voiture_id'   => $request->voitureId,
                'user_id'      => $newuser->id,
                'treat_by'     => $treatBy->id,
            ];

            $reserv = Reservation::create($reservations);

            // update the car to unavailable after reservation
            $voitureId = $reserv->voiture_id;

            Voiture::where('id', $voitureId)
                ->update(['disponible' => 0]);

            //DB::table('reservations')->insert($reservations);
            Toastr::success('Reservation enregistrée avec succès :)', 'Success');
            return redirect()->back()
                ->with('success', 'Reservation efectuer avec succes!');
        } catch (\Exception $e) {
            //throw $e;
            Toastr::error('Echec Enregistrement :)', 'Erreur');
            return back()
                ->with('error', 'Echec de la reservation !');
        }
    }

    public function confirmReserv(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $user = Sentinel::getUser()->id;

        $reservation = Reservation::where('id', $reservation->id)
            ->update(['etat' => 1, 'treat_by' => $user]);

        Toastr::success('Reservation confirmée avec succes! :)', 'Success');
        return redirect('/manager/reservations') //->with('success', 'Reservation confirmee avec succes!');
            ->with('flash', 'Reservation confirmée avec succes! ');
    }

    public function cancelReserv(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $user = Sentinel::getUser()->id;

        //update the car disponibility
        $voitureId = $reservation->voiture_id;
        Voiture::where('id', $voitureId)
            ->update(['disponible' => 1]);

        $reservation = Reservation::where('id', $reservation->id)
            ->update(['etat' => 2, 'treat_by' => $user]);

        Toastr::success('Reservation refusée avec succes! :)', 'Success');
        return redirect('/manager/reservations') //->with('success', 'Reservation confirmee avec succes!');
            ->with('flash', 'Reservation annulée avec succes! ');
    }
}
