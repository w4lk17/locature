<?php

namespace App\Http\Controllers\Managers\Voiture;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Storage;
use Image;
use Sentinel;
use App\Voiture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class VoitureController extends Controller
{

    public function index()
    {
        $voitures = Voiture::all();

        $marqueCount = Voiture::select("marque", DB::raw("count(*) as count"))
            ->groupBy("marque")
            ->get();

        return view('managers.voiture.index', compact('voitures', 'marqueCount'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $rules = [
            'voiture_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'marque' => 'required',
            'modele' => 'required',
            'transmission' => 'required',
            'carburant' => 'required',
            'prix' => 'required',
            'matricule' => 'required|unique:voitures'
        ];

        $messages = [
            'required' => 'ce champ ne peut etre vide.',
            'matricule' => 'cet immatriculation existe déja'
        ];

        $this->validate($request, $rules, $messages);

        try {

            $voiture = new Voiture;

            $voiture->user_id = Sentinel::getUser()->id;
            $voiture->marque = $request->marque;
            $voiture->modele = $request->modele;
            $voiture->transmission = $request->transmission;
            $voiture->carburant = $request->carburant;
            $voiture->prix = $request->prix;
            $voiture->matricule = $request->matricule;

            if ($request->file('voiture_image')) {
                // Store the uploaded file in the "locature" directory on Cloudinary
                $result = $request->voiture_image->storeOnCloudinary('locature');
                $url = $result->getSecurePath();   // Get the url of the uploaded file; https

                $token = explode('/', $url);
                $filename = $token[sizeof($token) - 1]; // Get the file name of the uploaded file with extension

                $voiture->chemin = $url;
                $voiture->voiture_image = $filename;
            }
//            if ($request->hasFile('voiture_image')) {
//                $image      = $request->file('voiture_image');
//                $filename   = $image->getClientOriginalName();
//                $path       = $image->storeAs('/uploads', $filename,'public');
//                $location   = storage_path() . $path;
//                $url        = Storage::url($filename);
//                //$voiture->chemin = $location;
//                $voiture->chemin        = $url;
//                $voiture->voiture_image = $filename;
//
//            }

            $voiture->save();

            Toastr::success('Enrégistrement éfectué avec succès :)', 'Success');
            return redirect('/manager/voitures');
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
        return view('managers.voiture.show', compact('voiture'));
    }

    public function edit($id)
    {
        $voiture = Voiture::find($id);
        return view('managers.voiture.edit', compact('voiture'));
    }


    public function update(Request $request, $id)
    {
        // validate data
        $voiture = Voiture::findOrFail($id);

        $request->validate([
            'marque' => 'required',
            'modele' => 'required',
            'carburant' => 'required',
            'transmission' => 'required',
            'prix' => 'required',
            'matricule' => 'required',
            'voiture_image' => 'sometimes|image|max:2048'
        ]);

        // save data to the database
        $voiture = Voiture::findOrFail($id);

        $user_id = Sentinel::getUser()->id;
        $voiture->user_id = $user_id;
        $voiture->marque = $request->marque;
        $voiture->modele = $request->modele;
        $voiture->transmission = $request->transmission;
        $voiture->carburant = $request->carburant;
        $voiture->prix = $request->prix;
        $voiture->matricule = $request->matricule;

        if ($request->file('voiture_image')) {
            # get the old file and delete
            $url = $voiture->chemin; //get the old fil name from DB

            $oldFilename = explode('/', $url);
            $token = explode('.', $oldFilename[sizeof($oldFilename) - 1]); // Get the file name of the uploaded file with extension

            Cloudinary::destroy('locature/' . $token[0]);

            // upload the new file and update the database
            // Store the uploaded file in the "locature" directory on Cloudinary
            $result = $request->voiture_image->storeOnCloudinary('locature');
            $url = $result->getSecurePath();   // Get the url of the uploaded file; https

            $token2 = explode('/', $url);
            $filename = $token2[sizeof($token2) - 1]; // Get the file name of the uploaded file with extension

            $voiture->chemin = $url;
            $voiture->voiture_image = $filename;;
        }
//        if ($request->hasFile('voiture_image')) {
//            $image = $request->file('voiture_image');
//            $filename = $image->getClientOriginalName();
//            $path = $image->storeAs('/uploads', $filename);
//            $location = storage_path() . $path;
//            $oldFilename = $voiture->voiture_image;
//
//            //update the databse
//            $voiture->chemin = $location;
//            $voiture->voiture_image = $filename;
//
//            //delete the old file
//            //Storage::delete($oldFilename);
//            //Storage::disk('local')->delete($location);
//        }

        $voiture->save();
        Toastr::success('Modification efectuée avec succès :)', 'Success');
        return redirect('/manager/voitures')->with('flash', 'donnee modifie avec success');
    }


    public function destroy($id)
    {
        $voiture = Voiture::find($id);

        $voiture->delete();

        Toastr::success('Suppression reussie :)', 'Success');
        return redirect('/manager/voitures');
    }

    public function dispo(Request $request, $id)
    {
        $voiture = Voiture::findOrFail($id);

        Voiture::where('id', $voiture->id)
            ->update(['disponible' => 1]);

        return redirect()->back();
        //->with('flash', 'Statut change avec succes! ');

    }

    public function nonDispo(Request $request, $id)
    {
        $voiture = Voiture::findOrFail($id);

        Voiture::where('id', $voiture->id)
            ->update(['disponible' => 0]);

        return redirect()->back();
        //->with('flash', Statut  avec succes! ');
    }
}
