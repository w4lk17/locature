<?php

namespace App\Http\Controllers\Managers\Voiture;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Voiture;
use App\Reservation;
use App\User;
use Sentinel;
use Storage;
use Image;
use DB;

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

//                 if (isset($_GET['query'])) {
//
//                             $search_text = $_GET['query'];
//                             $results = DB::table('voitures')->where('marque','LIKE', $search_text)->paginate(2);
//
//                             return view('managers.voiture.index',['results'=>$voitures]);
//                             //dd($search_text);
//
//                         } else {
//                             return view('managers.voiture.index', compact('voitures', 'marqueCount'));
//                         }

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
        $request->validate([
            'voiture_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'marque' => 'required',
            'modele' => 'required',
            'moteur' => 'required',
            'prix' => 'required',
            'matricule' => 'required'
        ]);

        $voiture = new Voiture;

        $voiture->user_id = Sentinel::getUser()->id;
        $voiture->marque = $request->marque;
        $voiture->modele = $request->modele;
        $voiture->moteur = $request->moteur;
        $voiture->prix = $request->prix;
        $voiture->matricule = $request->matricule;

       /* if($request->file('voiture_image')){
            $image = $request->file('voiture_image');
            $filename = $image->getClientOriginalName();
            $location = public_path('uploads/' . $filename);
            Image::make($image)->resize(300, 200)->save($location);

            $voiture->voiture_image = $filename;
        } */
       if($request->hasFile('voiture_image')) {
           $image = $request->file('voiture_image');
           $filename = $image->getClientOriginalName();
           $path = $image->storeAs('/uploads', $filename);
           $location = storage_path() . $path;
           $url = Storage::url($filename);
           //$voiture->chemin = $location;
           $voiture->chemin = env('APP_IP') . $url;
           $voiture->voiture_image = $filename;
       }

        $voiture->save();

        return redirect('/manager/voitures');
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
            'moteur' => 'required',
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
        $voiture->moteur = $request->moteur;
        $voiture->prix = $request->prix;
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
        if($request->hasFile('voiture_image')) {
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
        $voiture->disponible = $request->disponible;
        $voiture->save();

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

        return redirect('/manager/voitures');
    }

    //tri and Count


}
