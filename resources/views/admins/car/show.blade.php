@extends('layouts.master')

@section('content')
<!-- Page Content -->
<div class="content content-full">
    <div class="row">
        <div class="col-xl-12">
            <div class="block block-bordered block-rounded">
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
                                    <div class="font-size-h3 font-w600 text-success">{{ $voiture->marque}}</div>
                                    <div class="font-size-h4 text-muted">{{ $voiture->modele}}</div>
                                </div>
                                <div class="font-size-h3 font-w700">
                                    {{ $voiture->prix}} <sup><em>FCFA</em></sup>
                                </div>
                            </div>

                            <p class=" my-3 border-top">
                            <div>
                                <p><strong class="font-size-h5 font-w700">Carburant</strong> : {{ $voiture->carburant}}
                                </p>
                                <p>
                                    <strong class="font-size-h5 font-w700">Immatricule</strong> :
                                    {{ $voiture->matricule}}
                                </p>
                                <p>
                                    <strong class="font-size-h5 font-w700">Ajouté le</strong> :
                                    {{ $voiture->created_at->format('j-m-Y H:i:s') }}
                                </p>
                                <p>
                                    <strong class="font-size-h5 font-w700">Modifié le</strong> :
                                    {{ $voiture->updated_at->format('j-m-Y H:i:s') }}
                                </p>
                                <p>
                                    <strong class="font-w600">Par </strong>:
                                    <a class="font-size-h8 font-w600" href="javascript:void(0)">
                                        {{ $voiture->user->last_name }} {{ $voiture->user->first_name }}
                                    </a>
                                </p>
                            </div>
                            </p>
                            <form class="d-flex justify-content-between border-top " action="#" method="post">
                                <div class="py-3">
                                    <a class="btn btn-sm btn-primary" href="/admin/cars/{{ $voiture->id }}/edit">
                                        <i class="fa fa-pen  mr-1"></i> Modifier
                                    </a>
                                </div>
                                <div class="py-3">
                                    <button class="btn btn-sm btn-danger deleteVoiture" data-id="{{ $voiture->id }}">
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