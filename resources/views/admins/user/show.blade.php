@extends('layouts.master')

@section('content')
<!-- Page Content -->
<div class="content content-full">
    <div class="col-md-9">
        <div class="block block-rounded block-bordered">
            <div class="block-content ">
                <p class="font-w700 col-md-6">Nom : <span class="font-w700 font-size-lg">{{ $user->last_name }}</p>
                <p class="font-w700 col-md-6">Prénom : <span class="font-w700 font-size-lg">{{ $user->first_name }}</p>
                <p class="font-w700 col-md">Email : <span class="font-w700 font-size-lg"> {{ $user->email }}</p>
                <p class="font-w700 col-md-6">Adresse : <span class="font-w700 font-size-lg"> {{ $user->address }}</p>
                @foreach ($roles as $role)
                <p class="font-w700 col-md-6">Role : <span class="font-w700 font-size-lg badge badge-info">{{
                        $role->name }}</span></p>
                @endforeach
                <p class="font-w700 col-md">Date d'enrégistrement : <span class="font-w700 font-size-lg"> {{
                        \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',
                        $user->created_at)->format('j /m /Y  H:i') }}
                </p>
                @if($user->last_login !== null)
                <p class="font-w700 col-md">Dernière connexion : <span class="font-w700 font-size-lg">
                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->last_login)->format('j/m /Y  H:i')
                        }}
                </p>
                @endif
            </div>
            <div class="block-header mb-2">
                <a href="javascript:history.back()" class="btn btn-sm btn-secondary ">Retour</a>
                <div class="block-options">
                    <a href="/admin/users/{{ $user->id }}/edit" class="btn btn-sm btn-primary">Modifier</a>
                    <button class="btn btn-sm btn-danger deleteUser" data-id="{{ $user->id }}">supprimer</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->
@endsection