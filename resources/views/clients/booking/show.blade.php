@extends('layouts.master')
@section('content')
<div class="content content-boxed">
    <div class="block col-9">
        <div class="block-header">
            <h2 class="block-title">reservation</h2>
            <div class="block-options">
                <button type="button" class="btn-block-option">
                    <i class="si si-settings"></i>
                </button>
            </div>
        </div>
        <div class="block-content block-content-full">
            <!-- <div class="row">
                    <p class="font-w700 col-md-6">Nom :  <span class="font-w700 font-size-lg">{{ $reservation->user->last_name }} {{ $reservation->user->first_name }}</span></p>
                    <p class="font-w700 col-md-6">Email : <span class="font-w700 font-size-lg">{{ $reservation->user->email }}</span></p>
                </div>
                <div class="row">
                    <p class="font-w700 col-md-6">Adresse :  <span class="font-w700 font-size-lg">{{ $reservation->user->address }} </span></p>
                    <p class="font-w700 col-md-6">Téléphone : <span class="font-w700 font-size-lg">{{ $reservation->user->telephone }}</span></p>
                </div> -->
            <div class="row">
                <p class="font-w700 col-md-6">Voiture : <span class="font-w700 font-size-lg">{{
                        $reservation->voiture->marque }} {{ $reservation->voiture->modele }}</span></p>
                <p class="font-w700 col-md-6">Immatriculation : <span class="font-w700 font-size-lg">{{
                        $reservation->voiture->matricule }}</span></p>
            </div>
            <p class="font-w700">Statut : <span class="{{ $reservation->etat == 0
                    ? 'badge badge-warning'
                    :  ($reservation->etat == 1
                    ? 'badge badge-info'
                    : 'badge badge-danger')}} font-w700 font-size-sm"> {{ $reservation->etat == 0 ?'En attente...'
                    :($reservation->etat == 1 ?'Acceptée' :'Rejetée')}}</span>
                @if( $reservation->etat !== 0 && $reservation->etat !== 1 )

                <button type="button" class="btn btn-block-options" data-toggle="popover" data-placement="right"
                    title="" data-content="Veillez contacter la Direction pour plus d'information.">
                    <i class="si si-info text-city"></i>
                </button>
                @endif
            </p>
            <p class="font-w700">Date de depart : <span class="font-w700 font-size-md">{{
                    \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $reservation->date_depart)->format('j-m-Y')
                    }}</span></p>
            <p class="font-w700">Date de retour : <span class="font-w700 font-size-md">{{
                    \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $reservation->date_retour)->format('j-m-Y')
                    }}</span></p>
            <p class="font-w700">Reservée le : <span class="font-w700 font-size-md">{{
                    \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $reservation->created_at)->format('j/m/Y H:i:s')
                    }}</span></p>
            <div>
                <a type="button" href="/client/bookings" class="btn btn-secondary ">
                    <i class="fa fa-angle-left mr-1"></i> Retour a la liste
                </a>
            </div>
        </div>

    </div>
</div>

@endsection