@extends('layouts.master')
@section('content')
<div class="content content-boxed">
    <div class="block ">
        <div class="block-header">
            <h2 class="block-title">Mes Reservations</h2>
            <div class="block-options">
                <div class="block-options-item">
                    <code></code>
                </div>
            </div>
        </div>
        <div class="block-content block-content-full">

                <table class="table table-responsive mt-3">
                    <thead>
                        <tr>
                            <th class="d-sm-table-cell text-center" >#</th>
                            <th class="d-sm-table-cell text-center" >Voiture</th>
                            <th class="d-sm-table-cell text-center" >Depart</th>
                            <th class="d-sm-table-cell text-center" >Retour</th>
                            <th class="d-sm-table-cell text-center" >Etat</th>
                            <th class="d-sm-table-cell text-center" >Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->id }}</td>
                            <td class="font-w700">{{ $reservation->voiture->marque }} {{ $reservation->voiture->modele }}</td>
                            <td>{{ $reservation->date_depart }}</td>
                            <td>{{ $reservation->date_retour }}</td>
                            <td><span class="font-w600 text-warning" >{{ $reservation->etat == 0 ?'En attente...' :($reservation->etat == 1 ?'Acceptée' :'Refusée')}}</span></td>
                            <td><a href="/client/bookings/{{ $reservation->id }}" class="btn btn-sm btn-primary">voir</a>
                                <a href="/client/bookings/{{ $reservation->id }}/edit" class="{{ $reservation->etat == 0
                                        ? 'btn btn-sm btn-success'
                                        : 'btn btn-sm btn-success disabled'}}">Modifier</a>
                                <button class="btn btn-sm btn-danger deleteBooking" data-id="{{ $reservation->id }}">supprimer</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(!empty(Session::get('success')))
                    <div class="alert alert-success"> {{ Session::get('success') }}</div>
                @endif
                @if(!empty(Session::get('error')))
                    <div class="alert alert-danger"> {{ Session::get('error') }}</div>
                @endif

        </div>
    </div>
</div>
@endsection
