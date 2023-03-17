@extends('layouts.master')
@section('content')
<div class="content content-full">
    <div class="block ">
        <div class="block block-content">
            <div>
                <div class="row">

                    <div class="col-md-6">
                        <h2>
                            <span class="col-md-6 badge  font-w600 text-uppercase 
                            {{ $voitureInfo->disponible == 1 ? 'badge-warning' : 'badge-danger'}}">
                                {{ $voitureInfo->disponible == 1 ? 'Disponible' : 'Non Disponible'}}
                            </span>
                        </h2>
                    </div>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th style=" width: 20%;"></th>
                            <th style="width: 20%;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="font-w600">
                                <h4>Marque:</h4>
                            </td>
                            <td class="font-w700 font-size-lg">
                                <h3>{{ $voitureInfo->marque }} {{ $voitureInfo->modele }}</h3>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-w600">
                                <h4>Carburant:</h4>
                            </td>
                            <td class="font-w700 font-size-lg">
                                <h3>{{ $voitureInfo->carburant }}</h3>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-w600">
                                <h4>Transmission:</h4>
                            </td>
                            <td class="font-w700 font-size-lg">
                                <h3>{{ $voitureInfo->transmission }}</h3>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-w600">
                                <h4>Prix:</h4>
                            </td>
                            <td class="font-w700 font-size-lg">
                                <h3>{{ $voitureInfo->prix }} FCFA<sup><strong>/jour</strong></sup></h3>
                            </td>
                        </tr>
                    </tbody>

                </table>

                <form action="{{ route('bookings.store') }}" method="POST">
                    @csrf
                    <div class="row ">
                        <input type="hidden" class="form-control bg-white" name="voiture_id"
                            value="{{ $voitureInfo->id }}">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label font-w600">Date Départ :</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('date_depart') ? 'error' : '' }} js-flatpickr form-control bg-white"
                                    name="date_depart" data-enable-time="true" data-time_24hr="true"
                                    placeholder="jj/mm/aaaa">
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
                                <label class="form-label">Date Retour :</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('date_retour') ? 'error' : '' }} js-flatpickr form-control bg-white"
                                    name="date_retour" data-enable-time="true" data-time_24hr="true"
                                    placeholder="jj/mm/aaaa">
                                <!-- Error -->
                                @if ($errors->has('date_retour'))
                                <div class="error">
                                    {{ $errors->first('date_retour') }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="form-group col-md-4">
                            <button type="submit" class="{{ $voitureInfo->disponible == 1
                                    ? 'btn btn-lg btn-success'
                                    : 'btn btn-lg btn-success disabled'}}">Réserver</button>
                        </div>
                        <div class="form-group col-md-4">
                            <a class="btn btn-outline-primary btn-lg " href="/client/voitures">
                                Annuler</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection