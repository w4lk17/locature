@extends('layouts.master')

@section('content')
    <!-- Hero -->
    <div class="bg-image overflow-hidden" style="background-image: url({{ URL::asset('assets/media/photos/photo3@2x.jpg') }});">
                    <div class="bg-primary-dark-op">
                        <div class="content content-narrow content-full">
                            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                                <div class="flex-sm-fill">
                                    <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Tableau de bord</h1>
                                    <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Welcome  {{ Sentinel::getUser()->last_name}}</h2>
                                </div>
                                <div class="flex-sm-00-auto mt-3 mt-sm-0 ml-sm-3">
                                    <span class="d-inline-block invisible" data-toggle="appear" data-timeout="350">
                                        <a class="btn btn-primary px-4 py-2" data-toggle="modal" data-target="#modal-block-fadeinU" data-backdrop="static" data-keyboard="false" href="#">
                                            <i class="fa fa-plus mr-1"></i> Creer manager
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <!-- END Hero -->
    <!-- Page Content -->
                <div class="content">
                     <!-- Stats -->
                    <div class="row">
                        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                                <div class="block-content block-content-full bg-default">
                                    <div class="font-size-sm font-w600 text-uppercase text-white">Visiteurs</div>
                                    <div class="font-size-h2 font-w400 text-white">12,150</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                                <div class="block-content block-content-full bg-danger">
                                    <div class="font-size-sm font-w600 text-uppercase text-white">Clients</div>
                                    <div class="font-size-h2 font-w400 text-white">150</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                                <div class="block-content block-content-full bg-success">
                                    <div class="font-size-sm font-w600 text-uppercase text-white">Utilisateurs</div>
                                    <div class="font-size-h2 font-w400 text-white">{{ $UserCount }}</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                                <div class="block-content block-content-full bg-flat">
                                    <div class="font-size-sm font-w600 text-uppercase text-white">Avg Sale</div>
                                    <div class="font-size-h2 font-w400 text-white">$2001</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- END Stats -->

                    <!-- Customers and Latest Orders -->
                    <div class="row">
                        <!-- Latest Customers -->
                        <div class="col-lg-12">
                            <div class="block block-mode-loading-oneui">
                                <div class="block-header border-bottom">
                                    <h3 class="block-title">Listes des utilisateurs</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option">
                                            <i class="si si-settings"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content block-content-full">
                                    <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm mb-0 js-dataTable-buttons">
                                        <thead class="thead-dark">
                                            <tr class="text-uppercase">
                                                <th class="font-w700" style="width: 80px;">ID</th>
                                                <th class="font-w700">Nom</th>
                                                <th class="d-none d-sm-table-cell font-w700 " style="width: 30%;">Email</th>
                                                <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 15%;">Role</th>
                                                <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 15%;">Enrégistré</th>
                                                <th class="font-w700 text-center" style="width: 10%;"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    <span class="font-w600">{{ $user->id }}</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    <a href="/admin/users/{{ $user->id }}">{{ $user->last_name }} {{ $user->first_name }}</a>
                                                </td>
                                                <td class="d-none d-sm-table-cell ">
                                                     {{ $user->email }}
                                                </td>
                                                @foreach ($user->roles as $role)
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <span class="link-fx font-w600 badge badge-primary">{{ $role->name }}</span>
                                                </td>
                                                @endforeach
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <a class=" font-w600" href="#">{{ $user->created_at }}</a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="/admin/users/{{ $user->id }}" data-toggle="tooltip" data-placement="left" title="Details">
                                                        <i class="fa fa-fw fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END Latest Customers -->
                    </div>
                    <!-- END Customers and Latest Orders -->
                </div>
    <!-- END Page Content -->

@endsection
