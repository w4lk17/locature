@extends('layouts.master')

@section('content')
    <!-- Hero -->
               <!-- <div class="bg-image overflow-hidden" style="background-image: url({{ URL::asset('assets/media/photos/photo3@2x.jpg') }});">
                    <div class="bg-primary-dark-op">
                        <div class="content content-narrow content-full">
                            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                                <div class="flex-sm-fill">
                                    <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Tableau de Bord</h1>
                                    <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Welcome {{ Sentinel::getUser()->last_name}}</h2>
                                </div>
                                <div class="flex-sm-00-auto mt-3 mt-sm-0 ml-sm-3">
                                    <span class="d-inline-block invisible" data-toggle="appear" data-timeout="350">
                                        <button type="button" class="btn btn-primary px-4 py-2 push" data-toggle="modal" data-target="#modal-block-fadein" data-backdrop="static" data-keyboard="false">
                                            <i class="fa fa-plus mr-1"></i>Ajout Voitures</button>
                                        {{-- <a class="btn btn-primary px-4 py-2" data-toggle="click-ripple" href="javascript:void(0)">
                                            <i class="fa fa-plus mr-1"></i> Ajout Voitures
                                        </a> --}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
    <!-- END Hero -->

    <!-- Page Content -->
                <div class="content ">
                    <!-- Stats -->
                    <div class="row">
                        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                                <div class="block-content block-content-full bg-default">
                                    <div class="font-size-sm font-w600 text-uppercase text-white">Visiteurs</div>
                                    <div class="font-size-h2 font-w400 text-white">120,580</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                            <a class="block block-rounded block-themed block-link-pop border-left border-primary border-4x" href="/manager/voitures">
                                <div class="block-content block-content-full bg-danger">
                                    <div class="font-size-sm font-w600 text-uppercase text-white ">Voitures</div>
                                    <div class="font-size-h2 font-w400 text-white">{{ $VoitureCount }}</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="/manager/reservations">
                                <div class="block-content block-content-full bg-success">
                                    <div class="font-size-sm font-w600 text-uppercase text-white">Reservations</div>
                                    <div class="font-size-h2 font-w400 text-white">{{ $ReservCount }}</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                                <div class="block-content block-content-full bg-flat">
                                    <div class="font-size-sm font-w600 text-uppercase text-white">Statistiques</div>
                                    <div class="font-size-h2 font-w400 text-white">$21</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- END Stats -->
                    <!-- Dashboard Charts -->
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="block block-mode-loading-oneui">
                                                    <div class="block-header">
                                                        <h3 class="block-title">Utilisateurs</h3>
                                                        <div class="block-options">
                                                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                                                <i class="si si-refresh"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="block-content block-content-full text-center">
                                                        <div >
                                                            <canvas class="myUserAreaChart"></canvas>
                                                        </div>
                                                    </div>
                                                    <div class="block-header small text-muted">Mise a jour le {{ date('d-m-Y H:i:s') }}</div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <!-- Bars Chart -->
                                                    <div class="block">
                                                        <div class="block-header">
                                                            <h3 class="block-title">Reservations</h3>
                                                            <div class="block-options">
                                                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                                                    <i class="si si-refresh"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="block-content block-content-full text-center">
                                                            <div >
                                                            <!-- Bars Chart Container -->
                                                            <canvas class="myBookingAreaChart"></canvas>
                                                            </div>
                                                        </div>
                                                        <div class="block-header small text-muted">Mise a jour le {{ date('d-m-Y H:i:s') }}</div>
                                                    </div>
                                                <!-- END Bars Chart -->
                                            </div>
                                        </div>
                                        <!-- END Dashboard Charts -->

                    <!-- Customers and Latest Orders -->
                    <div class="row row-deck">
                        <!-- Latest Customers -->
                        <div class="col-lg-6">
                            <div class="block block-mode-loading-oneui">
                                <div class="block-header border-bottom">
                                    <h3 class="block-title">Dernieres voitures ajoutees</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content block-content-full">
                                @foreach ($latestCars as $latestCar)
                                    <ul class="nav-items push ">
                                        <li>
                                            <a class="media py-2" href="/manager/voitures/{{ $latestCar->id }}">
                                                <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                                    <img class="img-avatar" src="{{ asset('/storage/uploads/' . $latestCar->voiture_image) }}" alt="">
                                                </div>
                                                <div class="media-body py-2">
                                                    <div class="font-w600">{{ $latestCar->marque }} {{ $latestCar->modele }}
                                                        <span class="badge badge-info float-right">{{ $latestCar->prix }} CFA</span></div>
                                                    <div class="font-size-sm text-muted mt-2">Par  : {{ $latestCar->user->last_name}} {{ $latestCar->user->first_name}}</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                @endforeach
                                </div>
                                <div class="block text-center">
                                    <a href="/manager/voitures" class="uppercase">Voir toutes les voitures</a>
                                </div>
                            </div>
                        </div>
                        <!-- END Latest Customers -->

                        <!-- Latest Orders -->
                        <div class="col-lg-6">
                            <div class="block block-mode-loading-oneui">
                                <div class="block-header border-bottom">
                                    <h3 class="block-title">dernieres reservations</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content block-content-full">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm mb-0">
                                        <thead class="thead-dark">
                                            <tr class="text-uppercase">
                                                <th class="d-sm-table-cell font-w700">#</th>
                                                <th class="d-sm-table-cell font-w700">Date Depart</th>
                                                <th class="d-sm-table-cell font-w700">Date Retour</th>
                                                <th class="d-sm-table-cell font-w700" >Voiture</th>
                                                <th class="d-sm-table-cell font-w700">etat</th>
                                                <th class="font-w700 text-center" ></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($latestReservs as $latestReserv)
                                            <tr>
                                                <td>
                                                    <span class="font-w600">{{  $latestReserv->id}}</span>
                                                </td>
                                                <td class="d-sm-table-cell">
                                                    <span class="font-size-sm text-muted">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $latestReserv->date_depart)->format('j-m-Y') }}</span>
                                                </td>
                                                <td class="d-sm-table-cell">
                                                    <span class="font-size-sm text-muted">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $latestReserv->date_retour)->format('j-m-Y') }}</span>
                                                </td>
                                                <td class="d-sm-table-cell">
                                                    {{ $latestReserv->voiture->marque }}
                                                </td>
                                                <td class="d-sm-table-cell">
                                                    <span class="{{ $latestReserv->etat == 0
                                                        ? 'badge badge-warning'
                                                        :  ($latestReserv->etat == 1
                                                        ? 'badge badge-info'
                                                        : 'badge badge-danger')}}">{{ $latestReserv->etat == 0 ?'En attente...' :($latestReserv->etat == 1 ?'Acceptée' :'Rejetée')}}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a href="/manager/reservation/{{$latestReserv->id}}" data-toggle="tooltip" data-placement="left" title="Manage">
                                                        <i class="fa fa-fw fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                                <div class="block text-center">
                                    <a href="/manager/reservations" class="uppercase btn btn-primary">Voir toutes les reservations</a>
                                </div>
                            </div>
                        </div>
                        <!-- END Latest Orders -->
                    </div>
                    <!-- END Customers and Latest Orders -->
                </div>
<!-- END Page Content -->
@endsection

