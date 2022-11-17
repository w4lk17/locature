<?php

namespace App\Http\Controllers\Admins\Car;

use Storage;
use Sentinel;
use App\Voiture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class CarController extends Controller
{
    public function index()
    {
        $voitures = Voiture::all();

        $marqueCount = Voiture::select("marque", DB::raw("count(*) as count"))
            ->groupBy("marque")
            ->get();

        return view('admins.car.index', compact('voitures', 'marqueCount'));
    }


    public function store(Request $request)
    {
        $rules = [
            'voiture_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'marque'        => 'required',
            'modele'        => 'required',
            'carburant'     => 'required',
            'prix'          => 'required',
            'matricule'     => 'required|unique:voitures'
        ];

        $messages = [
            'required'  => 'ce champ ne peut etre vide.',
            'matricule' => 'cet immatriculation existe déja'
        ];

        $this->validate($request, $rules, $messages);

        try {

            $voiture = new Voiture;

            $voiture->user_id   = Sentinel::getUser()->id;
            $voiture->marque    = $request->marque;
            $voiture->modele    = $request->modele;
            $voiture->carburant = $request->carburant;
            $voiture->prix      = $request->prix;
            $voiture->matricule = $request->matricule;

            if ($request->hasFile('voiture_image')) {
                $image      = $request->file('voiture_image');
                $filename   = $image->getClientOriginalName();
                $path       = $image->storeAs('/uploads', $filename);
                $location   = storage_path() . $path;
                $url        = Storage::url($filename);
                //$voiture->chemin = $location;
                $voiture->chemin        = env('APP_IP') . $url;
                $voiture->voiture_image = $filename;
            }

            $voiture->save();

            Toastr::success('Enrégistrement réussie:)', 'Success');
            return redirect('/admin/cars');
        } catch (\Exception $e) {
            //throw $e;
            Toastr::error("Echec de l'enregistrement ! :)", 'Erreur');
            return back()
                ->with('error', "Echec de l'enregistrement!");
        }
    }


    public function show($id)
    {
        $voiture = Voiture::find($id);
        return view('admins.car.show', compact('voiture'));
    }

    public function edit($id)
    {
        $voiture = Voiture::find($id);
        return view('admins.car.edit', compact('voiture'));
    }

    public function update(Request $request, $id)
    {
        // validate data
        $voiture = Voiture::findOrFail($id);

        $request->validate([
            'marque'        => 'required',
            'modele'        => 'required',
            'carburant'     => 'required',
            'prix'          => 'required',
            'matricule'     => 'required',
            'voiture_image' => 'sometimes|image|max:2048'
        ]);

        // save data to the database
        $voiture = Voiture::findOrFail($id);

        $user_id            = Sentinel::getUser()->id;
        $voiture->user_id   = $user_id;
        $voiture->marque    = $request->marque;
        $voiture->modele    = $request->modele;
        $voiture->carburant    = $request->carburant;
        $voiture->prix      = $request->prix;
        $voiture->matricule = $request->matricule;

        if ($request->hasFile('voiture_image')) {
            $image = $request->file('voiture_image');
            $filename = $image->getClientOriginalName();
            $path = $image->storeAs('/uploads', $filename);
            $location = storage_path() . $path;
            $oldFilename = $voiture->voiture_image;

            //update the databse
            $voiture->chemin = $location;
            $voiture->voiture_image = $filename;

            //delete the old file
            //Storage::delete($oldFilename);
            //Storage::disk('local')->delete($location);
        }

        $voiture->save();
        Toastr::success('Modification réussie :)', 'Success');
        return redirect('/admin/cars')->with('flash', 'donnee modifie avec success');
    }


    public function destroy($id)
    {
        $voiture = Voiture::find($id);

        $voiture->delete();

        Toastr::success('Suppression reussie :)', 'Success');
        return redirect('/admin/cars');
    }

    public function dispo( $id)
    {
        $voiture = Voiture::findOrFail($id);

        Voiture::where('id', $voiture->id)
            ->update(['disponible' => 1]);

        return redirect()->back();
        //->with('flash', 'Statut change avec succes! ');

    }

    public function nonDispo( $id)
    {
        $voiture = Voiture::findOrFail($id);

        Voiture::where('id', $voiture->id)
            ->update(['disponible' => 0]);

        return redirect()->back();
        //->with('flash', Statut  avec succes! ');
    }
}
