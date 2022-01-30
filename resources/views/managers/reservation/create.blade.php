@extends('layouts.master')

@section('content')
<div class="content content-boxed">
    <div class="block">
        <div class="block-header">
            <h2 class="block-title">Liste des Reservations</h2>
            <div class="block-options">
                <div class="block-options-item">
                    <code></code>
                </div>
            </div>
        </div>
        <div class="block-content block-content-full">
                <table class="table table-responsive table-sm table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th>Nom</th>
                            <th>Voiture</th>
                            <th class="d-sm-table-cell" style="width: 15%;">date depart</th>
                            <th class="d-sm-table-cell" style="width: 15%;">date retour</th>
                            <th class="d-sm-table-cell" style="width: 15%;">status</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(!empty($reservations ) )
                    @foreach($reservations as $reservation)

                        <tr>
                            <th class="text-center" scope="row">{{ $reservation->id }}</th>
                            <td class="font-w600 font-size-sm">
                                {{ $reservation->user->last_name }} {{ $reservation->user->first_name }}
                            </td>
                            <td class="font-w600 font-size-sm">
                                <a href="/manager/voitures/{{ $reservation->voiture_id }}">{{ $reservation->voiture->marque }} {{ $reservation->voiture->modele }}</a>
                            </td>
                            <td class="d-sm-table-cell">
                                <span >{{ $reservation->date_depart }}</span>
                            </td>
                            <td class="d-sm-table-cell">
                                <span >{{ $reservation->date_retour }}</span>
                            </td>
                            <td class="d-sm-table-cell">
                                <span class="{{ $reservation->etat == 0
                                    ? 'badge badge-warning'
                                    :  ($reservation->etat == 1
                                    ? 'badge badge-info'
                                    : 'badge badge-danger')}}">{{ $reservation->etat == 0 ?'En attente...' :($reservation->etat == 1 ?'Acceptée' :'Rejetée')}}</span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <form action="/manager/confirmReserv/{{ $reservation->id }}" method="POST" >
                                        {{ method_field('PUT') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="confirme">
                                            valider
                                        </button>
                                    </form>
                                    <form action="/manager/cancelReserv/{{ $reservation->id }}" method="POST" >
                                        {{ method_field('PUT') }}
                                        {{ csrf_field() }}
                                    <button type="submit" class="btn btn-sm btn-danger js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="reject">
                                        refuser
                                    </button>
                                    </form>
                                    <a href="/manager/reservation/{{ $reservation->id }}" class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="detail">
                                        <i class="fa fa-fw fa-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @else
                        No data available in the database
                    @endif
                    </tbody>
                </table>

        </div>
    </div>
</div>
@endsection
