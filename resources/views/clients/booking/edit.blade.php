@extends('layouts.master')
@section('content')
    <div class="content content-full">
        <div class="block block-bordered">
            <div class="block-content block-content-full">
                <div class="container">
                    <div class="card-header">
                        <h2>Marque : {{ $voiture_info->marque }} - <small class="text-muted h2">{{ $voiture_info->modele
                            }}</small></h2>
                        <h3>
                        <span class="">carburant : <small class="text-muted text-uppercase">{{ $voiture_info->carburant
                                }}</small></span><br>
                            <span class="">transmission : <small class="text-muted text-uppercase">{{ $voiture_info->transmission
                                }}</small></span><br>
                            <span class="">Imatriculation : <small class=" text-uppercase">{{ $voiture_info->matricule
                                }}</small></span><br>
                            <span class="">Prix : <small
                                    class=" text-uppercase">{{ $voiture_info->prix }}</small></span>
                        </h3>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <form action="{{ route('bookings.update', $reservation->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-5 ">
                                    <div class="form-group">
                                        <div>
                                            <img class="img-fluid" <img
                                                src="{{$voiture_info->chemin }}"
                                                height="200" width="300" alt=" {{ $voiture_info->marque }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="val-select2">Voiture<span class="text-danger"> *</span></label>
                                        <select class="js-select2 form-control" id="val-select2" name="voitureId"
                                                style="width: 100%;"
                                                data-placeholder="{{ $voiture_info->marque }} {{ $voiture_info->modele }}">
                                            <option></option>
                                            <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                            @foreach($voitures as $voiture)
                                                <option
                                                    value="{{ $voiture->id }}">{{ $voiture->marque }} {{ $voiture->modele }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="arrival">Date de location<span class="text-danger"> *</span></label>
                                        <input type="text" class="js-flatpickr form-control bg-white" name="date_depart"
                                               data-enable-time="true" data-time_24hr="true" placeholder="jj/mm/aaaa"
                                               value="{{ $reservation->date_depart }}">
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="departure">Date de retour<span class="text-danger"> *</span></label>
                                        <input type="text" class="js-flatpickr form-control bg-white" name="date_retour"
                                               data-enable-time="true" data-time_24hr="true" placeholder="jj/mm/aaaa"
                                               value="{{ $reservation->date_retour }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-sm-5">
                                    <button type="submit" class="btn btn-sm btn-primary">Modifier</button>
                                </div>
                                <div class="col-sm-5">
                                    <a href="javascript:history.back()" class="btn btn-sm btn-outline-primary">
                                        Annuler</a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
