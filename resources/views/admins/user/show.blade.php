@extends('layouts.master')

@section('content')
<div class="content content-full">
    <div class="block block-rounded col-md-8">

        <div class="block-header">
            <h3 class="block-title">Détail de l'utilisateur</h3>
        </div>
        <div class="block-content block-content-full">
            <div class="col-md-9">
                <div class="row">
                    <p class="font-w600 font-size-lg col-md-6">Nom :</p>

                    <p class="font-w700 font-size-lg col-md-6">{{ $user->last_name }}</p>
                </div>
                <div class="row">
                    <p class="font-w600 font-size-lg col-md-6">Prénom :</p>

                    <p class="font-w700 font-size-lg col-md-6">{{ $user->first_name }}</p>
                </div>
                <div class="row">
                    <p class="font-w600 font-size-lg col-md-6">Email :</p>

                    <p class="font-w700 font-size-lg col-md-6"> {{ $user->email }}</p>
                </div>
                <div class="row">
                    <p class="font-w600 font-size-lg col-md-6">No. Permis :</p>

                    <p class="font-w700 font-size-lg col-md-6">
                        @empty($user->num_permis)
                        --
                        @endempty
                        {{ $user->num_permis }}
                    </p>
                </div>
                <div class="row">
                    <p class="font-w600 font-size-lg col-md-6">No. CNI :</p>

                    <p class="font-w700 font-size-lg col-md-6">
                        @empty($user->num_cni)
                        --
                        @endempty
                        {{ $user->num_cni }}
                    </p>
                </div>
                <div class="row">
                    <p class="font-w600 font-size-lg col-md-6">Adresse :</p>

                    <p class="font-w700 font-size-lg col-md-6"> {{ $user->address }}</p>
                </div>

                <div class="row">
                    <p class="font-w600 font-size-lg col-md-6">Téléphone :</p>

                    <p class="font-w700 font-size-lg col-md-6"> {{ $user->telephone }}</p>
                </div>

                @foreach ($roles as $role)
                <div class="row">
                    <p class="font-w600 font-size-lg col-md-6">Role :</p>

                    <p class="font-w700 font-size-lg col-md-3 badge badge-info"> {{ $role->name }}</p>
                </div>
                @endforeach

                <div class="row">
                    <p class="font-w600 font-size-lg col-md-6">Date d'enrégistrement :</p>

                    <p class="font-w700 font-size-lg col-md-6"> {{ $user->created_at->format('j /m /Y H:i') }}</p>
                </div>

                @if($user->last_login !== null)
                <div class="row">
                    <p class="font-w600 font-size-lg col-md-6">Dernière connexion :</p>

                    <p class="font-w700 font-size-lg col-md-6"> {{ $user->last_login->format('j /m /Y H:i') }}</p>
                </div>
                @endif
            </div>
            <div class="col-md-9 mt-2">
                <a href="javascript:history.back()" class="btn btn-sm btn-secondary mr-5">Retour</a>

                <a href="/admin/users/{{ $user->id }}/edit" class="btn btn-sm btn-primary">Modifier</a>
                <button class="btn btn-sm btn-danger deleteUser" data-id="{{ $user->id }}">supprimer</button>
            </div>
        </div>




    </div>
</div>
@endsection