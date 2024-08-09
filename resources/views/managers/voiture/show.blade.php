@extends('layouts.master')

@section('content')
<!-- Page Content -->
<div class="content content-full">
    <div class="row">
        <div class="col-xl-12">
            <div class="block block-bordered block-rounded">
                <div class="block-header">
                    <h2 class="block-title">Détail de la Voiture</h2>
                </div>
                <div class="block-content block-content-full">
                    <div class="row items-push">
                        <div class="col-md-7">
                            <!-- Images -->
                            <!-- Magnific Popup (.js-gallery class is initialized in Helpers.magnific()) -->
                            <!-- For more info and examples you can check out http://dimsemenov.com/plugins/magnific-popup/ -->
                            <div class="row gutters-tiny js-gallery img-fluid-100">
                                <div class="col-12 mb-3">
                                    <img class="img-fluid"
                                        src="{{ asset('/storage/uploads/' . $voiture->voiture_image) }}" alt="">
                                </div>
                                <div class="col-4">
                                    <img class="img-fluid"
                                        src="{{ asset('/storage/uploads/' . $voiture->voiture_image) }}" alt="">
                                </div>
                                <div class="col-4">
                                    <img class="img-fluid"
                                        src="{{ asset('/storage/uploads/' . $voiture->voiture_image) }}" alt="">
                                </div>
                                <div class="col-4">
                                    <img class="img-fluid"
                                        src="{{ asset('/storage/uploads/' . $voiture->voiture_image) }}" alt="">
                                </div>
                            </div>
                            <!-- END Images -->

                        </div>
                        <div class="col-md-5">
                            <!-- Info -->
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="font-size-h3 font-w700 text-success">{{ $voiture->marque}}</div>
                                    <div class="font-size-h3 font-w700 text-muted">{{ $voiture->modele}}</div>
                                </div>
                                <div class="font-size-h3 font-w700">
                                    {{ $voiture->prix}}F CFA<sup><em>/JOUR</em></sup>
                                </div>
                            </div>

                            <p class=" my-3 border-top">
                            <div>
                                <p class="font-w600 ">Carburant :
                                    <span class="font-w700 font-size-lg">{{ $voiture->carburant}}</span>
                                </p>
                                <p class="font-w600 ">Transmission :
                                    <span class="font-w700 font-size-lg">{{ $voiture->transmission}}</span>
                                </p>
                                <p class="font-w600 ">Immatricule :
                                    <span class="font-w700 font-size-lg">{{ $voiture->matricule}}</span>
                                </p>
                                <p class="font-w600 ">Ajoutée le :
                                    <span class="font-w700 font-size-lg">
                                        {{ $voiture->created_at->format('j-m-Y H:i:s') }}
                                    </span>
                                </p>
                                <p class="font-w600 ">Modifié le :
                                    <span class="font-w700 font-size-lg">
                                        {{ $voiture->updated_at->format('j-m-Y H:i:s') }}</span>
                                </p>
                                <p class="font-w600 ">Ajoutée Par :
                                    <span class="font-w700 font-size-lg">
                                        <a class="font-size-h8 font-w700" href="javascript:void(0)">
                                            {{ $voiture->user->last_name }} {{ $voiture->user->first_name }}
                                        </a>
                                    </span>
                                </p>
                            </div>
                            </p>
                            <form class="d-flex justify-content-between border-top " action="#" method="post">
                                <div class="py-3">
                                    <a class="btn btn-primary" href="/manager/voitures/{{ $voiture->id }}/edit">
                                        <i class="fa fa-pen  mr-1"></i> Modifier
                                    </a>
                                </div>
                                <div class="py-3">
                                    <button class="btn btn-danger deleteVoiture" data-id="{{ $voiture->id }}">
                                        <i class="fa fa-trash mr-1"></i>Supprimer
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->
@endsection