@extends('layouts.master')
@section('content')
<div class="content content-boxed">
    <div class="block col-9 p-3">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h2>{{ $voitureInfo->marque }} - <small class="text-muted h2">{{ $voitureInfo->modele }}</small></h2>
                    </div>
                    <div class="col-md-6">
                        <h2><span class=" col-md-8 badge badge-danger font-w600 text-uppercase ">{{ $voitureInfo->disponible == 0
                                                    ? 'Disponible'
                                                    : 'Non Disponible'}}</span></h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h3 class="card-title"><small class="text-muted">Immatriculation : </small>{{ $voitureInfo->matricule }}</h3>
                <h3 class="card-title"><small class="text-muted">Moteur : </small>{{ $voitureInfo->moteur }}</h3>
                <h3 class="card-title"><small class="text-muted">Prix : </small>{{ $voitureInfo->prix  }} CFA /24h</h3>
                <form action="{{ route('bookings.store') }}" method="POST">
                    @csrf
                    <div class="row ">
                        <input type="hidden" class="form-control bg-white"  name="voiture_id" value="{{ $voitureInfo->id }}">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Date de location :</label>
                                <input type="text" class="form-control {{ $errors->has('date_depart') ? 'error' : '' }} js-flatpickr form-control bg-white"  name="date_depart"
                                    data-enable-time="true" data-time_24hr="true" placeholder="jj/mm/aaaa">
                                    <!-- Error -->
                                    @if ($errors->has('date_depart'))
                                    <div class="error">
                                        {{ $errors->first('date_depart') }}
                                    </div>
                                    @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Date de retour :</label>
                                <input type="text" class="form-control {{ $errors->has('date_retour') ? 'error' : '' }} js-flatpickr form-control bg-white"  name="date_retour"
                                    data-enable-time="true" data-time_24hr="true" placeholder="jj/mm/aaaa">
                                    <!-- Error -->
                                    @if ($errors->has('date_retour'))
                                    <div class="error">
                                        {{ $errors->first('date_retour') }}
                                    </div>
                                    @endif
                            </div>
                        </div>
                    </div>

                        <div class="row ">
                            <div class="col-md-4">
                                <button type="submit" class="{{ $voitureInfo->disponible == 0
                                    ? 'btn btn-sm btn-success'
                                    : 'btn btn-sm btn-success disabled'}}">Réserver</button>
                            </div>
                            <div class="col-md-8">
                                <a class="btn btn-outline-primary btn-sm " href="javascript:history.back()"> Annuler</a>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
