@extends('layouts.master')

@section('content')

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
                                        <th>Nom </th>
                                        <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
                                        <th class="d-none d-sm-table-cell" style="width: 15%;">Role</th>
                                        <th style="width: 15%;">Enrégistré</th>
                                        <th class="d-none d-md-table-cell text-center" style="width: 10px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($managers as $manager)
                                    <tr>
                                        <td class="text-center font-size-sm">{{ $manager->id }}</td>
                                        <td class="font-w600 font-size-sm">
                                            <a href="/admin/users/{{ $manager->id }}">{{ $manager->last_name }} {{ $manager->first_name }}</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell font-size-sm">
                                            {{ $manager->email }}
                                        </td>
                                        @foreach ($manager->roles as $role)
                                        <td class="d-none d-sm-table-cell">
                                            <span class="badge badge-info">{{ $role->name }}</span>
                                        </td>
                                        @endforeach
                                        <td>
                                            <em class="text-muted font-size-sm">{{ $manager->created_at }}</em>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip" title="Detail">
                                                    <a href="/admin/users/{{ $manager->id }}"><i class="fa fa-fw fa-eye"></i></a>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip" title="Modifier">
                                                    <a href="/admin/users/{{ $manager->id }}/edit"><i class="fa fa-fw fa-pencil-alt"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END Dynamic Table with Export Buttons -->
                </div>
    <!-- END Page Content -->

@endsection
