@extends('layouts.master')
@section('content')
<div class="content content-boxed">
    <div class="block block-bordered">
        <div class="block-content">
            <div class="container">
                    <div class="card-header">
                        <h2>Marque : {{ $voiture_info->marque }} - <small class="text-muted h2">{{ $voiture_info->modele }}</small></h2>
                        <h3>
                            <span class="">Moteur : <small class="text-muted text-uppercase">{{ $voiture_info->moteur }}</small></span>
                            <span class="ml-4">Imatriculation : <small class=" text-uppercase">{{ $voiture_info->matricule }}</small></span>
                            <span class="ml-4">Prix : <small class=" text-uppercase">{{ $voiture_info->prix }}</small></span>
                        </h3>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <form action="{{ route('bookings.update', $reservation->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-5 ">
                                    <div class="form-group">
                                        <div >
                                            <img class="img-fluid" <img src="{{ asset('/storage/uploads/' . $voiture_info->voiture_image) }}" height="200" width="300" alt=" {{ $voiture_info->marque }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="val-select2">Voiture<span class="text-danger">*</span></label>
                                        <select class="js-select2 form-control" id="val-select2" name="voiture_id" style="width: 100%;" data-placeholder="{{ $voiture_info->marque }} {{ $voiture_info->modele }}">
                                            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                            @foreach($voitures as $voiture)
                                                <option value="{{ $reservation->voiture_id }}">{{ $voiture->marque }} {{ $voiture->modele }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="arrival">Date de location<span class="text-danger">*</span></label>
                                        <input type="text" class="js-flatpickr form-control bg-white"  name="date_depart"
                                            data-enable-time="true" data-time_24hr="true" placeholder="jj/mm/aaaa" value="{{ $reservation->date_depart }}">
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="departure">Date de retour<span class="text-danger">*</span></label>
                                        <input type="text" class="js-flatpickr form-control bg-white"  name="date_retour"
                                            data-enable-time="true" data-time_24hr="true" placeholder="jj/mm/aaaa" value="{{ $reservation->date_retour }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-5">
                                    <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                </div>
                                <div class="col-sm-5 text-right">
                                    <button class="btn btn-lg btn-danger deleteBooking" data-id="{{ $reservation->id }}">supprimer</button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
