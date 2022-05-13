@extends('layouts.master')

@section('content')
<div class="content content-full">
    <div class="block  block-rounded block-bordered">
        <div class="block-header">
            <h2 class="block-title">reservation</h2>
            <div class="block-options">
                <button type="button" class="btn-block-option">
                    <i class="si si-settings"></i>
                </button>
            </div>
        </div>
        <div class="block-content">
            <div class="row">
                <p class="font-w700 col-md-6">Nom :  <span class="font-w700 font-size-lg">{{ $reservation->user->last_name }} {{ $reservation->user->first_name }}</span></p>
                <p class="font-w700 col-md-6">Email : <span class="font-w700 font-size-lg">{{ $reservation->user->email }}</span></p>

                <p class="font-w700 col-md-6">Adresse :  <span class="font-w700 font-size-lg">{{ $reservation->user->address }} </span></p>
                <p class="font-w700 col-md-6">Téléphone : <span class="font-w700 font-size-lg">{{ $reservation->user->telephone }}</span></p>
            </div>
            <div class="row">
                <p  class="font-w700 col-md-6">N° Carte d'identité : <span class="font-w700 font-size-lg">{{  $reservation->user->num_cni }}</span></p>
                <p  class="font-w700 col-md-6">N° Permis : <span class="font-w700 font-size-lg">{{  $reservation->user->num_permis }}</span></p>

                <p  class="font-w700 col-md-6">Voiture : <span class="font-w700 font-size-lg">{{ $reservation->voiture->marque }} {{ $reservation->voiture->modele }}</span></p>
                <p  class="font-w700 col-md-6">Immatriculation : <span class="font-w700 font-size-lg">{{ $reservation->voiture->matricule }}</span></p>

            </div>
            <p  class="font-w700">Statut : <span class="{{ $reservation->etat == 0
                ? 'badge badge-warning'
                :  ($reservation->etat == 1
                ? 'badge badge-info'
                : 'badge badge-danger')}} font-w700 font-size-sm">{{ $reservation->etat == 0 ?'En attente...' :($reservation->etat == 1 ?'Acceptée' :'Rejetée')}}</span></p>
            <p class="font-w700">Date de depart : <span class="font-w700 font-size-md">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $reservation->date_depart)->format('j-m-Y') }}</span></p>
            <p class="font-w700">Date de retour : <span class="font-w700 font-size-md">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $reservation->date_retour)->format('j-m-Y') }}</span></p>
            <div class="row">
                <p class="font-w700 col-md-6">Reservé le : <span class="font-w700 ">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $reservation->created_at)->format('j/m/Y H:i:s') }}</span></p>
                @foreach($users as $user)
                @if($reservation->treat_by === $user->id)
                    <p class="font-w700 col-md-6">Traité par : <span class="font-w700 "><a href="javascript:void(0)">{{ $user->last_name }} {{ $user->first_name }}</a> le {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $reservation->updated_at)->format('j/m/Y H:i:s') }}</span></p>
                @endif
                @endforeach
            </div>
        </div>
        <div class="block-header">
            <a href="/manager/reservations" class="btn btn-sm btn-secondary"><i class="fa fa-angle-left mr-1"></i>
                Retour à la liste
            </a>
            @if($reservation->etat == 0)
            <div class="block-options btn-group">
                <form action="/manager/confirmReserv/{{ $reservation->id }}" method="POST" >
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-sm btn-primary ml-2" >Valider</button>
                </form>
                <form action="/manager/cancelReserv/{{ $reservation->id }}" method="POST" >
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-sm btn-danger ml-2" >Refuser</button>
                </form>
            </div>
            @elseif($reservation->etat == 1)
            <form action="/manager/cancelReserv/{{ $reservation->id }}" method="POST" >
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-sm btn-danger ml-2" >Refuser</button>
            </form>
            @endif
        </div>
        </div>
    </div>
    </div>
</div>
@endsection
