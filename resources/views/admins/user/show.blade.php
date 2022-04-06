@extends('layouts.master')

@section('content')
    <!-- Hero -->
        <!--<div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Détails Utilisateur
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                <a class="link-fx" href="/admin/users">Utilisateurs</a>
                            </li>
                                <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="">détails</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>-->
    <!-- END Hero -->
    <!-- Page Content -->
        <div class="content">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="block">
                        <div class="block-content">
                            <p>Nom : {{ $user->last_name }}</p>
                            <p>Prénom : {{ $user->first_name }}</p>
                            <p>Email : {{ $user->email }}</p>
                            <p>Adresse : {{ $user->address }}</p>
                            @foreach ($roles as $role)
                                <p>Role : <span class="badge badge-info">{{ $role->name }}</span></p>
                            @endforeach
                            <p>Date dinscription : {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->created_at)->format('j/m/Y') }}</p>
                            @if($user->last_login !== null)
                            <p>Dernière connexion : {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->last_login)->format('j/m/Y') }}</p>
                            @endif
                        </div>
                        <div class="block-header">
                            <a href="javascript:history.back()" class="btn btn-sm btn-primary">Retour</a>
                            <div class="block-options">
                                <a href="/admin/users/{{ $user->id }}/edit" class="btn btn-sm btn-primary">Modifier</a>
                                {{-- <a href="/users/{{ $user->id }}" class="btn btn-sm btn-danger deleteUser">Supprimer</a> --}}
                                <button class="btn btn-sm btn-danger deleteUser" data-id="{{ $user->id }}">supprimer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- END Page Content -->
@endsection
