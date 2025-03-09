@extends('layouts.master')

@section('content')
<div class="content content-full">
    <div class="block block-rounded block-bordered">
        <div class="block-header">
            <h3 class="block-title">Liste des Reservations</h3>
            <div class="block-options">
                <a class="btn btn-sm btn-outline-success" href="/manager/reservations/create">
                    <i class="fa fa-fw fa-plus "></i>Creer reservation
                </a>
            </div>
        </div>
        <div class="block-content block-content-full">
            <div class="table-responsive col-md-12">
                <table class="table table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th>Nom</th>
                            <th>Voiture</th>
                            <th class="d-sm-table-cell" style="width: 15%;">date depart</th>
                            <th class="d-sm-table-cell" style="width: 15%;">date retour</th>
                            <th style="width: 15%;">status</th>
                            <th class="text-center" style="width: 100px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reservations as $reservation)
                        <tr>
                            <th class="text-center" scope="row">{{ $reservation->id }}</th>
                            <td class="font-w700 ">
                                {{ $reservation->user->last_name }} {{ $reservation->user->first_name }}
                            </td>
                            <td class="font-w700 font-size-sm">
                                <a href="/manager/voitures/{{ $reservation->voiture_id }}">
                                    {{ $reservation->voiture->marque}} {{ $reservation->voiture->modele }}
                                </a>
                            </td>
                            <td class="font-w700 ">
                                {{ $reservation->date_depart->format('j-m-Y') }}
                            </td>
                            <td class="font-w700 ">
                                {{ $reservation->date_retour->format('j-m-Y') }}
                            </td>
                            <td class="font-w700">
                                <span class=" {{ $reservation->etat == 0
                                    ? 'badge badge-warning'
                                    :  ($reservation->etat == 1
                                    ? 'badge badge-info'
                                    : 'badge badge-danger')}}">{{ $reservation->etat == 0 ?'En attente...'
                                    :($reservation->etat == 1 ?'Acceptée' :'Rejetée')}}</span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    {{-- class="{{ $reservation->etat == 0
                                    ? 'btn btn-sm btn-success'
                                    : 'btn btn-sm btn-success disabled'}}" --}}
                                    <form action="/manager/confirmReserv/{{ $reservation->id }}" method="POST">
                                        {{ method_field('PUT') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class=" js-tooltip-enabled ml-1
                                            {{ $reservation->etat == 2
                                                ? 'btn btn-sm btn-success disabled'
                                                : ($reservation->etat == 1 ?'btn btn-sm btn-success ' :'btn btn-sm btn-success')}}"
                                            data-toggle="tooltip" title="" data-original-title="confirme">
                                            valider
                                        </button>
                                    </form>
                                    <form action="/manager/cancelReserv/{{ $reservation->id }}" method="POST">
                                        {{ method_field('PUT') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="js-tooltip-enabled ml-1
                                            {{ $reservation->etat == 1
                                                ? 'btn btn-sm btn-danger disabled'
                                                : 'btn btn-sm btn-danger '}}"
                                            data-toggle="tooltip" title="" data-original-title="reject">
                                            refuser
                                        </button>
                                    </form>
                                    <a href="/manager/reservations/{{ $reservation->id }}"
                                        class="btn btn-sm btn-primary js-tooltip-enabled  ml-1" data-toggle="Details"
                                        title="Details">
                                        <i class="fa fa-fw fa-eye"></i>
                                    </a>
                                </div>
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