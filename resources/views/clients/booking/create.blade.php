@extends('layouts.master')
@section('content')
<div class="content content-boxed">
    <div class="block p-3">
        <div class="card">
            <div class="card-header">
                <h2>{{ $voitureInfo->marque }} - <small class="text-muted h2">{{ $voitureInfo->modele }}</small></h2>
            </div>
            <div class="card-body">
                <h3 class="card-title"><small class="text-muted">Immatriculation: </small>{{ $voitureInfo->matricule }}</h3>
                <h3 class="card-title"><small class="text-muted">Moteur: </small>{{ $voitureInfo->moteur }}</h3>
                <h3 class="card-title"><small class="text-muted">Prix: </small>{{ $voitureInfo->prix }} CFA/24h</h3>
                <form action="{{ route('bookings.store') }}" method="POST">
                    @csrf
                    <div class="row ">
                        <input type="hidden" class="form-control bg-white"  name="voiture_id" value="{{ $voitureInfo->id }}">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="arrival">Date de location</label>
                                <input type="text" class="js-flatpickr form-control bg-white"  name="date_depart"
                                    data-enable-time="true" data-time_24hr="true" placeholder="jj/mm/aaaa">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="departure">Date de retour</label>
                                <input type="text" class="js-flatpickr form-control bg-white"  name="date_retour"
                                    data-enable-time="true" data-time_24hr="true" placeholder="jj/mm/aaaa">
                            </div>
                        </div>
                    </div>

                        <div class="row ">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-lg btn-primary mb-3 ">Reserver</button>
                            </div>
                            <div class="col-md-8">
                                <a class="btn btn-outline-primary btn-lg mb-3 " href="javascript:history.back()"> Annuler</a>
                            </div>
                        </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
