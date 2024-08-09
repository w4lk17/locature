@extends('layouts.master')

@section('content')
<div class="content content-full">
    <div class="col-md-9">
        <div class="block block-rounded block-bordered">
            <div class="block-header ">
                <h2 class="block-title">Créer Reservation</h2>
                <div class="block-options">
                    <button type="button" class="btn-block-option">
                        <i class="si si-settings"></i>
                    </button>
                </div>
            </div>
            <div class="block-content block-content-full">
                <div>
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                </div>

                <form class="row g-3" action="/manager/reservations" method="POST">
                    @csrf

                    <div class="col-md-6 mb-3">
                        <label for="last_name" class="form-label">Nom :</label>
                        <input type="text" class="form-control {{ $errors->has('last_name') ? 'error' : '' }}"
                            name="last_name" value="{{ old(" last_name") }}">
                        @if($errors->has('last_name')) <span class="error"> {{ $errors->first("last_name") }} </span>
                        @endif
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="first_name" class="form-label">Prenom :</label>
                        <input type="text" class="form-control {{ $errors->has('first_name') ? 'error' : '' }}"
                            name="first_name" value="{{ old(" first_name") }}">
                        @if($errors->has('first_name')) <span class="error"> {{ $errors->first("first_name") }} </span>
                        @endif
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email :</label>
                        <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="email"
                         value="{{ old(" email") }}">
                        @if($errors->has('email')) <span class="error"> {{ $errors->first("email") }} </span> @endif
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="telephone" class="form-label">Téléphone :</label>
                        <input type="text" class="form-control {{ $errors->has('telephone') ? 'error' : '' }}"
                            name="telephone"  value="{{ old(" telephone")}}">
                        @if($errors->has('telephone')) <span class="error"> {{ $errors->first("telephone") }} </span>
                        @endif
                    </div>
                    <div class="col-12 mb-3">
                        <label for="address" class="form-label">Address :</label>
                        <input type="text" class="form-control {{ $errors->has('address') ? 'error' : '' }}"
                            name="address"  value="{{ old(" address")}}">
                        @if($errors->has('address')) <span class="error"> {{ $errors->first("address") }} </span> @endif
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputPassword4" class="form-label">N° CNI :</label>
                        <input type="text" class="form-control {{ $errors->has('num_cni') ? 'error' : '' }}"
                            name="num_cni" value="{{ old(" num_cni")}}">
                        @if($errors->has('num_cni')) <span class="error"> {{ $errors->first("num_cni") }} </span> @endif
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputPassword4" class="form-label">N° Permis :</label>
                        <input type="text" class="form-control {{ $errors->has('num_permis') ? 'error' : '' }}"
                            name="num_permis" value="{{ old(" num_permis")}}">
                        @if($errors->has('num_permis')) <span class="error"> {{ $errors->first("num_permis") }} </span>
                        @endif
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="voiture" class="form-label">Voiture :<span class="text-danger"> *</span></label>
                        <select class="js-select2 form-control {{ $errors->has('voitureId') ? 'error' : '' }}"
                            style="width: 100%;" name="voitureId" data-placeholder="Choisir voirure..." value="{{ old("
                            voitureId")}}">
                            <option></option>
                            @foreach ($voitures as $voiture)
                            <option value="{{ $voiture->id }}">{{ $voiture->marque }} {{ $voiture->modele }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('voitureId')) <span class="error"> Veuiller selectionner une voiture </span>
                        @endif
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="date_depart" class="form-label">Date Départ :</label>
                        <input type="text"
                            class="form-control {{ $errors->has('date_retour') ? 'error' : '' }} js-flatpickr form-control bg-white"
                            name="date_depart" data-enable-time="true" data-time_24hr="true" placeholder="jj/mm/aaaa"
                            value="{{ old(" date_depart")}}">
                        @if($errors->has('date_depart')) <span class="error"> {{ $errors->first("date_depart") }}</span>
                        @endif

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="date_retour" class="form-label">Date Retour :</label>
                        <input type="text"
                            class="form-control {{ $errors->has('date_retour') ? 'error' : '' }} js-flatpickr form-control bg-white"
                            name="date_retour" data-enable-time="true" data-time_24hr="true" placeholder="jj/mm/aaaa"
                            value="{{ old(" date_retour")}}">
                        @if($errors->has('date_retour')) <span class="error"> {{ $errors->first("date_retour") }}
                        </span> @endif
                    </div>
                    <div class="col-12 mb-3">
                        <button type="submit" class="btn btn-success">Valider</button>
                        <button type="reset" class="btn btn-primary">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection