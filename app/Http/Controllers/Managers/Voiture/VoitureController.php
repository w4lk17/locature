<?php

namespace App\Http\Controllers\Managers\Voiture;

use Image;
use Storage;
use App\User;
use Sentinel;
use App\Voiture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class VoitureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voitures = Voiture::paginate(4);

        $marqueCount = Voiture::select("marque", DB::raw("count(*) as count"))
            ->groupBy("marque")
            ->get();

        return view('managers.voiture.index', compact('voitures', 'marqueCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'voiture_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'marque'        => 'required',
            'modele'        => 'required',
            'carburant'        => 'required',
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
            $voiture->carburant    = $request->carburant;
            $voiture->prix      = $request->prix;
            $voiture->matricule = $request->matricule;

            //         if($request->file('voiture_image')){
            //             // Store the uploaded file in the "lambogini" directory on Cloudinary with the filename "prosper"
            //             $result   = $request->voiture_image->storeOnCloudinaryAs('locature', 'test');
            //
            //             $url      = $result->getSecurePath();   // Get the url of the uploaded file; https
            //             $filename = $result->getFileName();     // Get the file name of the uploaded file
            //
            //             $voiture->chemin        = $url;
            //             $voiture->voiture_image = $filename;
            //         }
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

            Toastr::success('Enrégistrement éfectué avec succès :)', 'Success');
            return redirect('/manager/voitures');
        } catch (\Exception $e) {
            //throw $e;
            Toastr::error("Echec de l'enregistrement ! :)", 'Erreur');
            return back()
                ->with('error', "Echec de l'enregistrement!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $voiture = Voiture::find($id);
        return view('managers.voiture.show', compact('voiture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $voiture = Voiture::find($id);
        return view('managers.voiture.edit', compact('voiture'));
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
        // validate data
        $voiture = Voiture::findOrFail($id);

        $request->validate([
            'marque' => 'required',
            'modele' => 'required',
            'carburant' => 'required',
            'prix' => 'required',
            'matricule' => 'required',
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

        //if($request->file('voiture_image')){
        //    // add the new photo
        //    $image = $request->file('voiture_image');
        //    $filename = $image->getClientOriginalName();
        //    $location = public_path('uploads/' . $filename);
        //    Image::make($image)->resize(300, 200)->save($location);
        //    $oldFilename = $voiture->voiture_image;
        //    // update the database
        //    $voiture->voiture_image = $filename;
        //}
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
        Toastr::success('Modification efectuée avec succès :)', 'Success');
        return redirect('/manager/voitures')->with('flash', 'donnee modifie avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
