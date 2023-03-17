@extends('layouts.master')

@section('content')
<!-- Hero -->
{{-- <div class="bg-image overflow-hidden"
    style="background-image: url({{ URL::asset('assets/media/photos/photo3@2x.jpg') }});">
    <div class="bg-primary-dark-op">
        <div class="content content-narrow content-full">
            <div
                class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                <div class="flex-sm-fill">
                    <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Tableau de bord</h1>
                    <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">
                        Welcome {{ Sentinel::getUser()->last_name}}</h2>
                </div>
                <div class="flex-sm-00-auto mt-3 mt-sm-0 ml-sm-3">
                    <span class="d-inline-block invisible" data-toggle="appear" data-timeout="350">
                        <a class="btn btn-primary px-4 py-2" data-toggle="modal" data-target="#modal-block-fadeinU"
                            data-backdrop="static" data-keyboard="false" href="#">
                            <i class="fa fa-plus mr-1"></i> Creer manager
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- END Hero -->
<!-- Page Content -->
<div class="content content-full">
    <!-- Stats -->
    <div class="row">
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="/admin/users">
                <div class="block-content block-content-full bg-default">
                    <div class="font-size-sm font-w600 text-uppercase text-white">Utilisateurs</div>
                    <div class="font-size-h2 font-w400 text-white">{{ $UserCount }}</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="/admin/clients">
                <div class="block-content block-content-full bg-danger">
                    <div class="font-size-sm font-w600 text-uppercase text-white">Clients</div>
                    <div class="font-size-h2 font-w400 text-white">{{ $ClientsCount }}</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="/admin/cars">
                <div class="block-content block-content-full bg-success">
                    <div class="font-size-sm font-w600 text-uppercase text-white">Voitures</div>
                    <div class="font-size-h2 font-w400 text-white">{{ $CarsCount }}</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="/admin/reservations">
                <div class="block-content block-content-full bg-flat">
                    <div class="font-size-sm font-w600 text-uppercase text-white">Reservations</div>
                    <div class="font-size-h2 font-w400 text-white">{{ $ReservCount }}</div>
                </div>
            </a>
        </div>
    </div>
    {{-- chart bars --}}
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 text-center">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Total Revenue</h3>
                            <div id="bar-charts"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Sales Overview</h3>
                            <div id="line-charts"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end chart bars --}}
    <div class="row">
        <div class="col-md-6">
            <div class="card card-table">
                <div class="card-header">
                    <h3 class="card-title mb-0">Clients</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table custom-table mb-0">
                            <thead>
                                <tr>
                                    {{-- <th class="text-center" style="width: 50px;">#</th> --}}
                                    <th>Name</th>
                                    <th>email</th>
                                    <th>enregistré</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                <tr>
                                    {{-- <th class="text-center" scope="row">1</th> --}}
                                    <td class="d-sm-table-cell ">
                                        <span class="font-w600">
                                            {{ $client->last_name }} {{ $client->first_name }}</span>
                                    </td>
                                    <td class="d-sm-table-cell ">
                                        <span class="font-w600">{{ $client->email }}</span>
                                    </td>
                                    <td class="d-sm-table-cell font-size-sm">
                                        <span class="font-w600">{{ $client->created_at->format('j/m/Y') }}</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip"
                                                title="" data-original-title="View Client">
                                                <a href="/admin/users/{{ $client->id }}"><i
                                                        class="fa fa-fw fa-eye"></i></a>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip"
                                                title="" data-original-title="Edit Client">
                                                <a href="/admin/users/{{ $client->id }}/edit"><i
                                                        class="fa fa-fw fa-pencil-alt"></i></a>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="/admin/clients">Voir tous les clients</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-table">
                <div class="card-header">
                    <h3 class="card-title mb-0">Nos 5 dernieres Reservations</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table custom-table mb-0">
                            <thead>
                                <tr>
                                    <th>Name </th>
                                    <th>Voiture</th>
                                    <th>statut</th>
                                    <th>reservé</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservs as $reserv)
                                <tr>
                                    <td>
                                        <span class="text-muted font-w600">
                                            {{ $reserv->user->last_name }} {{ $reserv->user->first_name }}</span>
                                    </td>
                                    <td>
                                        <span class="font-w600">
                                            {{ $reserv->voiture->marque }} {{ $reserv->voiture->modele }}</span>
                                    </td>
                                    <td>
                                        <span class="{{ $reserv->etat == 0
                                            ? 'badge badge-warning'
                                            :  ($reserv->etat == 1
                                            ? 'badge badge-info'
                                            : 'badge badge-danger')}}"> {{ $reserv->etat == 0 ?'En attente...'
                                            :($reserv->etat == 1 ?'Acceptée' :'Rejetée') }}</span>
                                    </td>
                                    <td class="d-sm-table-cell font-size-sm">
                                        <span class="font-w600">{{ $reserv->created_at->format('j/m/Y H:i') }}</span>
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip"
                                                title="" data-original-title="">
                                                <a href="/admin/clients"><i class="fa fa-fw fa-eye"></i></a>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip"
                                                title="" data-original-title="">
                                                <a href=""><i class="fa fa-fw fa-pencil-alt"></i></a>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="#">Voir tous les reservations</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->
@endsection