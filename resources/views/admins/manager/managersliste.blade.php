@extends('layouts.master')

@section('content')

<!-- Page Content -->
<div class="content content-full">
    <div class="block block-rounded block-bordered">
        <div class="block-header">
            <h3 class="block-title">Listes des managers</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle"
                    data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
            </div>
        </div>
        <div class="block-content block-content-full">
            <div class="table-responsive col-md-12">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr>
                            {{-- <th class="text-center" style="width: 80px;">ID</th> --}}
                            <th >Nom </th>
                            <th class="d-sm-table-cell">Email</th>
                            <th class="d-sm-table-cell">Role</th>
                            <th class="d-sm-table-cell">Enrégistré</th>
                            <th class="d-md-table-cell text-center" style="width: 100px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($managers as $manager)
                        <tr>
                            {{-- <td class="text-center font-size-sm">{{ $manager->id }}</td> --}}
                            <td class="font-w600 font-size-sm">
                                <a href="/admin/users/{{ $manager->id }}">
                                {{ $manager->last_name }} {{ $manager->first_name }}</a>
                            </td>
                            <td class="d-sm-table-cell font-w600 font-size-sm">
                                {{ $manager->email }}
                            </td>
                            @foreach ($manager->roles as $role)
                            <td class="d-sm-table-cell ">
                                <span class="badge badge-info font-w700">{{ $role->name }}</span>
                            </td>
                            @endforeach
                            <td class=" text-muted font-w600 font-size-sm">
                                <em >{{ $manager->created_at->format('j/m/Y  H:i') }}</em>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip"
                                        title="Detail">
                                        <a href="/admin/users/{{ $manager->id }}"><i class="fa fa-fw fa-eye"></i></a>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip"
                                        title="Modifier">
                                        <a href="/admin/users/{{ $manager->id }}/edit"><i
                                                class="fa fa-fw fa-pencil-alt"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END Dynamic Table with Export Buttons -->
</div>
<!-- END Page Content -->

@endsection