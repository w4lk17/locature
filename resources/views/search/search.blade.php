@extends('layouts.master')

@section('content')
// if (isset($_GET['query'])) {
//
// $search_text = $_GET['query'];
// $results = DB::table('voitures')->where('marque','LIKE', $search_text)->paginate(2);
//
// return view('managers.voiture.index',['results'=>$voitures]);
// //dd($search_text);
//
// } else {
// return view('managers.voiture.index', compact('voitures', 'marqueCount'));
// }
@endsection