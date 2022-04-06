@extends('layouts.master')

@section('content')
<div class="content content-boxed">
                    <div class="row">
                        <div class="col-xl-8">
                            <!-- Story -->
                            @foreach ($voitures as $voiture)
                            <div class="block">
                                <div class="block-content">
                                    <div class="row items-push">
                                        <div class="col-md-4 col-lg-5">
                                            <a href="/manager/voitures/{{ $voiture->id }}">
                                                <img class="img-fluid" src="{{ asset('/storage/uploads/' . $voiture->voiture_image) }}" height="400" width="800" alt="">
                                            </a>
                                        </div>
                                        <div class="col-md-8 col-lg-7">
                                            <h4 class="h3 mb-1">
                                                <a class="text-primary-dark" href="#">{{ $voiture->marque }} {{ $voiture->modele }}</a>
                                            </h4>
                                            <div class="font-size-sm mb-3">
                                                Ajouter par : <a href="#">  {{ $voiture->user->last_name  }}</a>  {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $voiture->created_at)->format('j/m/Y H:i:s') }}
                                            </div>
                                            <p class="font-size-sm">
                                                <div class="font-size-sm">
                                                    <p>Moteur : {{ $voiture->moteur }} </p>
                                                    <p>Immatriculation : {{ $voiture->matricule }} </p>
                                                    <p>Prix : {{ $voiture->prix }} <em class="text-muted">Frcs CFA</em></p>
                                                </div>
                                                Disponible : <input class="toggle-class" data-id="{{ $voiture->id }}" data-toggle="toggle" data-size="sm" data-on="Oui" data-off="Non"
                                                        data-onstyle="success"  data-offstyle="danger" type="checkbox"
                                                        {{ $voiture->disponible == '0' ? 'checked' : '' }}>
                                            </p>
                                            <a class="btn btn-sm btn-primary" href="/manager/voitures/{{ $voiture->id }}">Detail..</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- END Story -->

                            <!-- Pagination -->
                            <nav class="d-flex justify-content-center">
                                {!! $voitures->links() !!}
                            </nav>
                            <!-- END Pagination -->
                        </div>
                        <div class="col-xl-4">
                            <!-- Add Car -->
                                                        <div class="block">
                                                            <div class="block-content block-content-full ">
                                                                <div>
                                                                    <div>
                                                                    <!-- Open Search Section (visible on smaller screens) -->
                                                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                                                        <button type="button" class="btn btn-sm btn-dual d-sm-none" data-toggle="layout" data-action="header_search_on">
                                                                            <i class="si si-magnifier"></i>
                                                                        </button>
                                                                    <!-- END Open Search Section -->
                                                                     <!-- Search Form (visible on larger screens) -->
                                                                        <form class="d-none d-sm-inline-block" action="" method="">
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control form-control-alt" placeholder="Search.."  name="query">
                                                                                    <div class="input-group-append">
                                                                                        <span class="input-group-text bg-body border-0">
                                                                                        <a type="submit" >
                                                                                            <i class="si si-magnifier text-muted"></i>
                                                                                        </a>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                        </form>
                                                                     <!-- END Search Form -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END Add car -->

                            <!-- Add Car -->
                            <div class="block">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Ajout Voiture</h3>
                                </div>
                                <div class="block-content block-content-full ">
                                    <div>
                                        <div>
                                            <a class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#modal-block-fadein" data-backdrop="static" data-keyboard="false" href="#">
                                                <i class="fa fa-fw fa-plus "></i>Ajouter
                                            </a>
                                            <a class="btn btn-sm btn-light" href="javascript:void(0)">
                                                <i class="fa fa-fw fa-envelope text-muted"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Add car -->

                            <!-- Categories -->
                            <div class="block js-ecom-div-nav d-none d-xl-block">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">
                                        <i class="fa fa-fw fa-boxes text-muted mr-1"></i> Marques
                                    </h3>
                                </div>

                                <div class="block-content">
                                @foreach ($marqueCount as $marqCount)
                                    <ul class="nav nav-pills flex-column push">
                                        <li class="nav-item mb-1">
                                            <a class="nav-link active d-flex justify-content-between align-items-center" href="javascript:void(0)">
                                                {{ $marqCount->marque }}
                                                <span class="badge badge-pill badge-secondary ml-1">
                                                {{ $marqCount->count}}
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                @endforeach
                                </div>
                            </div>
                            <!-- END Categories -->
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->

@endsection


