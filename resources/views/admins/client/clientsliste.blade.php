@extends('layouts.master')

@section('content')
    <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Listes des Clients
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">Clients</li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="">Tables</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    <!-- END Hero -->
    <!-- Page Content -->
                <div class="content">
                    <!-- Dynamic Table with Export Buttons -->
                    <div class="block  block-mode-loading-oneui">
                        <div class="block-header">
                            <h3 class="block-title">Listes des clients</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                    <i class="si si-refresh"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 80px;">ID</th>
                                        <th>Nom</th>
                                        <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
                                        <th class="d-none d-sm-table-cell" style="width: 15%;">Role</th>
                                        <th style="width: 15%;">Enrégistré</th>
                                        <th class="d-none d-md-table-cell text-center" style="width: 10px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $client)
                                    <tr>
                                        <td class="text-center font-size-sm">{{ $client->id }}</td>
                                        <td class="font-w600 font-size-sm">
                                            <a href="/admin/users/{{ $client->id }}">{{ $client->last_name }} {{ $client->first_name }}</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell font-size-sm">
                                            {{ $client->email }}
                                        </td>
                                         @foreach ($client->roles as $role)
                                        <td class="d-none d-sm-table-cell">
                                            <span class="badge badge-success">{{ $role->name }}</span>
                                        </td>
                                        @endforeach
                                        <td>
                                            <em class="text-muted font-size-sm">{{ $client->created_at }}</em>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip" title="Detail">
                                                    <a href="/admin/users/{{ $client->id }}"><i class="fa fa-fw fa-eye"></i></a>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip" title="Modifier">
                                                    <a href="/admin/users/{{ $client->id }}/edit"><i class="fa fa-fw fa-pencil-alt"></i>
                                                </button>
                                            </div>
                                        </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END Dynamic Table with Export Buttons -->
                </div>
    <!-- END Page Content -->
    
@endsection