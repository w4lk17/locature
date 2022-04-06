@extends('layouts.master')

@section('content')
<div class="content">
    <div class="block col-md-9">
        <div class="block-header ">
            <h2 class="block-title">reservation</h2>
            <div class="block-options">
                <button type="button" class="btn-block-option">
                    <i class="si si-settings"></i>
                </button>
            </div>
        </div>
        <div class="block-content">

            <form class="row g-3">
                <div class="col-md-6 mb-3">
                    <label for="last_name" class="form-label">Nom</label>
                    <input type="text" class="form-control" name="last_name" id="inputEmail4">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="first_name" class="form-label">Prenom</label>
                    <input type="text" class="form-control" name="first_name" id="inputPassword4">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="inputEmail4">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="telephone" class="form-label">Téléphone</label>
                    <input type="text" class="form-control" name="telephone" id="inputPassword4" placeholder="+228 12 34 56 78">
                </div>
                <div class="col-12 mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="inputPassword4" class="form-label">N° CNI</label>
                    <input type="text" class="form-control" name="cni" id="inputPassword4" placeholder="e.g :9999-999-9999">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="voiture" class="form-label">Voiture<span class="text-danger"> *</span></label>
                    <select class="js-select2 form-control" id="" name="voitureId"  data-placeholder="Choisir voirure...">
                        <option value="">Choisir voirure...</option>
                        <option>one</option>
                        <option>two</option>
                        <option>two</option>
                        <option>two</option>
                </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="date_depart" class="form-label">Date Départ</label>
                    <input type="text" class="form-control {{ $errors->has('date_retour') ? 'error' : '' }} js-flatpickr form)control bg-white"
                            name="date_depart" data-date-format="d-m-Y H:i" data-enable-time="true" data-time_24hr="true" placeholder="jj/mm/aaaa">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="date_retour" class="form-label">Date Retour</label>
                    <input type="text" class="form-control {{ $errors->has('date_retour') ? 'error' : '' }} js-flatpickr form-control bg-white"
                            name="date_retour" data-date-format="d-m-Y H:i" data-enable-time="true" data-time_24hr="true" placeholder="jj/mm/aaaa">
                </div>
                <div class="col-12 mb-3">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                </div>
                </div>
                <div class="col-12 mb-3">
                    <button type="submit" class="btn btn-success">Valider</button>
                    <button type="" class="btn btn-primary">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
