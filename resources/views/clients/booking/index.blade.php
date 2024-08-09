@extends('layouts.master')
@section('content')
<div class="content content-full">
    <div class="block block-rounded block-bordered">
        <div class="block-header">
            <h3 class="block-title">Mes Reservations</h3>
            <div class="block-options">
                <code></code>
            </div>
        </div>
        <div class="block-content block-content-full">
            <div class="table-responsive col-md-12">
                <table class="table table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr>
                            {{-- <th class="text-center" style="width: 50px;">#</th> --}}
                            <th>Voiture</th>
                            <th class="" style="width: 20%;">date depart</th>
                            <th class="" style="width: 20%;">date retour</th>
                            <th style="width: 20%;">status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reservations as $reservation)
                        <tr>
                            {{-- <th class="text-center" scope="row">{{ $reservation->id }}</th> --}}

                            <td class="font-w700 font-size-sm">
                                {{ $reservation->voiture->marque }} {{ $reservation->voiture->modele }}
                            </td>
                            <td class="font-w700 font-size-sm">
                                <span>{{ $reservation->date_depart->format('j-m-Y') }}</span>
                            </td>
                            <td class="font-w700 font-size-sm">
                                <span>{{ $reservation->date_retour->format('j-m-Y') }}</span>
                            </td>
                            <td>
                                <span class="font-w700 font-size-sm{{ $reservation->etat == 0
                                    ? 'badge badge-warning'
                                    :  ($reservation->etat == 1
                                    ? 'badge badge-info'
                                    : 'badge badge-danger')}}">
                                    {{ $reservation->etat == 0 ?'En attente...'
                                    :($reservation->etat == 1 ?'Acceptée' :'Rejetée')}}</span>
                            </td>
                            <td class="text-center">
                                <a href="/client/bookings/{{ $reservation->id }}" class="btn btn-sm btn-primary"> 
                                    voir
                                </a>
                                <a href="/client/bookings/{{ $reservation->id }}/edit" class="{{ $reservation->etat == 0
                                    ? 'btn btn-sm btn-success'
                                    : 'btn btn-sm btn-success disabled'}}"> Modifier
                                </a>
                                <button class="btn btn-sm btn-danger deleteBooking" data-id="{{ $reservation->id }}">
                                    supprimer
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">Data not Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection