@extends('layouts.master')

@section('content')
<!-- Page Content -->
                <div class="content content-full">
                    <!-- Toggle Side Content -->
                    <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
                    <!-- <div class="d-xl-none push">
                        <div class="row gutters-tiny">
                            <div class="col-6">
                                <button type="button" class="btn btn-light btn-block" data-toggle="class-toggle" data-target=".js-ecom-div-nav" data-class="d-none">
                                    <i class="fa fa-fw fa-bars text-muted mr-1"></i> Navigation
                                </button>
                            </div>
                        </div>
                    </div> -->
                    <!-- END Toggle Side Content -->

                    <div class="row">
                        <!-- <div class="col-xl-4 order-xl-1">
                            <div class="block block-rounded block-bordered js-ecom-div-nav d-none d-xl-block">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">
                                        <i class="fa fa-fw fa-boxes text-muted mr-1"></i> Categories
                                    </h3>
                                </div>
                                <div class="block-content">
                                    <ul class="nav nav-pills flex-column push">
                                        <li class="nav-item mb-1">
                                            <a class="nav-link active d-flex justify-content-between align-items-center" href="/manager/voitures">
                                                liste des voitures <span class="badge badge-pill badge-secondary ml-1">7k</span>
                                            </a>
                                        </li>
                                        <li class="nav-item mb-1">
                                            <a class="nav-link d-flex justify-content-between align-items-center" href="javascript:void(0)">
                                                Apps <span class="badge badge-pill badge-secondary ml-1">2k</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-xl-8 order-xl-0">
                            <!-- Product -->
                            <div class="block">
                                <div class="block-content">
                                    <!-- Vitals -->
                                    <div class="row items-push">
                                        <div class="col-md-6">
                                            <!-- Images -->
                                            <!-- Magnific Popup (.js-gallery class is initialized in Helpers.magnific()) -->
                                            <!-- For more info and examples you can check out http://dimsemenov.com/plugins/magnific-popup/ -->
                                            <div class="row gutters-tiny js-gallery img-fluid-100">
                                                <div class="col-12 mb-3">
                                                    <img class="img-fluid"  src="{{ asset('/storage/uploads/' . $voiture->voiture_image) }}" alt="">
                                                </div>
                                                <div class="col-4">
                                                    <img class="img-fluid" src="{{ asset('/storage/uploads/' . $voiture->voiture_image) }}" alt="">
                                                </div>
                                                <div class="col-4">
                                                    <img class="img-fluid" src="{{ asset('/storage/uploads/' . $voiture->voiture_image) }}" alt="">
                                                </div>
                                                <div class="col-4">
                                                    <img class="img-fluid" src="{{ asset('/storage/uploads/' . $voiture->voiture_image) }}" alt="">
                                                </div>
                                            </div>
                                            <!-- END Images -->

                                        </div>
                                        <div class="col-md-6">
                                            <!-- Info -->
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="font-size-h3 font-w600 text-success">{{ $voiture->marque}}</div>
                                                    <div class="font-size-h4 text-muted">{{ $voiture->modele}}</div>
                                                </div>
                                                <div class="font-size-h3 font-w700">
                                                    {{ $voiture->prix}} <em>frcs CFA</em>
                                                </div>
                                            </div>

                                            <p class=" my-3 border-top">
                                                <div>
                                                    <p><strong>Moteur</strong> : {{ $voiture->moteur}}</p>
                                                    <p><strong>Immatricule</strong> : {{ $voiture->matricule}}</p>
                                                    <p><strong>Ajouté le</strong> : {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $voiture->created_at)->format('j-m-Y H:i:s') }}</p>
                                                    <p><strong>Modifié le</strong> : {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $voiture->updated_at)->format('j-m-Y H:i:s') }}</p>
                                                    <p class="font-size-h8 font-w600">Par  : {{ $voiture->user->last_name}} {{ $voiture->user->first_name}}</p>
                                                </div>
                                            </p>
                                            <form class="d-flex justify-content-between border-top " action="#" method="post">
                                                <div class="py-3">
                                                    <a class="btn btn-sm btn-primary" href="/manager/voitures/{{ $voiture->id }}/edit">
                                                        <i class="fa fa-pen  mr-1"></i> Modifier
                                                    </a>
                                                </div>
                                                <div class="py-3">
                                                    <button class="btn btn-sm btn-danger deleteVoiture" data-id="{{ $voiture->id }}">
                                                        <i class="fa fa-trash mr-1"></i>Supprimer
                                                    </button>
                                                </div>
                                            </form>
                                            <!-- END Info -->
                                        </div>
                                    </div>
                                    <!-- END Vitals -->

                                    <!-- Author -->
                                    <!-- <div class="block block-rounded block-bordered">
                                        <div class="block-content block-content-full d-flex justify-content-between align-items-center">
                                            <div>
                                                <div class="mb-2">
                                                    Ajouté par: <a class="font-w600" href="javascript:void(0)">{{ $voiture->user->last_name}} {{ $voiture->user->first_name}}</a>
                                                </div>
                                                <div>
                                                    <a class="btn btn-sm btn-light" href="javascript:void(0)">
                                                        <i class="fa fa-fw fa-plus text-success"></i>
                                                    </a>
                                                    <a class="btn btn-sm btn-light" href="javascript:void(0)">
                                                        <i class="fa fa-fw fa-envelope text-muted"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <img class="img-avatar" src="{{ asset('assets/media/avatars/avatar2.jpg') }}" alt="">
                                        </div>
                                    </div> -->
                                    <!-- END Author -->
                                </div>
                            </div>
                            <!-- END Product -->
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
@endsection
