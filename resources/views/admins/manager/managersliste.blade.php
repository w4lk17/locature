@extends('layouts.master')

@section('content')
    <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Listes des Managers
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">Tables</li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="">DataTables</a>
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
                            <h3 class="block-title">Listes des managers</h3>
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
                                        <th>Name</th>
                                        <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
                                        <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th>
                                        <th style="width: 15%;">Registered</th>
                                        <th class="d-none d-md-table-cell text-center" style="width: 10px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($managers as $manager)
                                    <tr>
                                        <td class="text-center font-size-sm">{{ $manager->id }}</td>
                                        <td class="font-w600 font-size-sm">
                                            <a href="#">{{ $manager->last_name }} {{ $manager->first_name }}</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell font-size-sm">
                                            {{ $manager->email }}
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <span class="badge badge-success">VIP</span>
                                        </td>
                                        <td>
                                            <em class="text-muted font-size-sm">{{ $manager->created_at }}</em>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip" title="Detail">
                                                    <a href="/users/{{ $manager->id }}"><i class="fa fa-fw fa-eye"></i></a>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip" title="Modifier">
                                                    <a href="/users/{{ $manager->id }}/edit"><i class="fa fa-fw fa-pencil-alt"></i>
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