@extends('layouts.master')

@section('content')
<!-- Page Content -->
<div class="content content-full">
    <div class="block block-rounded block-bordered mb-0">
        <div class="block-header ">
            <h3 class="block-title">Modification de la voiture</h3>
        </div>
        <div class="block-content font-size-sm">
            <form action="/manager/voitures/{{ $voiture->id }}" method="POST" enctype="multipart/form-data">

                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="marque">MARQUE:</label>
                        <input type="text" class="form-control" id="marque" name="marque" value="{{ $voiture->marque }}"
                            required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="modele">MODELE:</label>
                        <input type="text" class="form-control" id="modele" name="modele" value="{{ $voiture->modele }}"
                            required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="carburant">carburant:</label>
                        <input type="text" class="form-control" id="carburant" name="carburant"
                            value="{{ $voiture->carburant }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="prix">PRIX:</label>
                        <input type="text" class="form-control" id="prix" name="prix" value="{{ $voiture->prix }}"
                            required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="matricule">IMMATRICULATION:</label>
                        <input type="text" class="form-control" id="matricule" name="matricule"
                            value="{{ $voiture->matricule }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>IMAGE:</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input " data-toggle="custom-file-input"
                                id="voiture_image" name="voiture_image" value="{{ $voiture->voiture_image}}">
                            <label class="custom-file-label" for="voiture_image">Choisir image</label>
                        </div>
                    </div>
                </div>
                <div class="block-content block-content-full text-right border-top">
                    <a class="btn btn-sm btn-light" href="javascript:history.back()"> Annuler</a>
                    <button type="submit" class="btn btn-sm btn-success">Enrégistrer</button>
                </div>
            </form>
        </div>
    </div>
    <!-- END Your Block -->
</div>
<!-- END Page Content -->
@endsection