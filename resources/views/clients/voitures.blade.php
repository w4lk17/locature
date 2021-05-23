@extends('layouts.master')
@section('content')
<div class="content content-boxed">
    @foreach ($voitures as $voiture)
    <div class="block block-bordered">
        <div class=" block block-content">
            <div class="container">
                <div class="block  block-bordered">
                    <div class=" block-content block-content-full ribbon ribbon-modern ribbon-warning">
                        <div class="ribbon-box">
                            <i class="fa fa-check mr-1"></i> Disponible
                        </div>
                        <div class="block-content">
                            <div class="row items-push">
                                <div class="col-md-4">
                                    <img class="img-fluid" src="{{ asset('/storage/uploads/' . $voiture->voiture_image) }}" />
                                </div>
                                <div class="col-md-8">
                                    <h4 class="h3 mb-1">
                                        <a class="text-primary-dark" href="#">{{ $voiture->marque }}</a>
                                        <a class="text-primary-dark h4" href="#">{{ $voiture->modele }}</a>
                                    </h4>
                                    <div class="font-size-sm">
                                        <p class="text-uppercase">Moteur: <span class="text-uppercase h5">{{ $voiture->moteur }}</p>
                                        <p>Immatriculation: <span class="text-uppercase h5">{{ $voiture->matricule }}</p>
                                        <p>Prix: <span class="text-uppercase h5">{{ $voiture->prix }} CFA/24h</span></p>
                                    </div>
                                    <a class="btn btn-primary" href="/client/bookings/create/{{ $voiture->id }}">Reserver</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- Pagination -->
    <nav class="d-flex justify-content-center">
        {!! $voitures->links() !!}
    </nav>
    <!-- END Pagination -->
</div>
@endsection
