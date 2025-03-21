@extends('layouts.master')

@section('content')
<!-- Page Content -->
<div class="content content-full">
    <div class="block block-bordered block-rounded">
        <div class="block-header">
            <h3 class="block-title">Listes des clients</h3>
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
                            <th>Nom</th>
                            <th>Email</th>
                            <th>telephone</th>
                            <th>adresse</th>
                            <th>Role</th>
                            <th>Enrégistré</th>
                            <th class="d-md-table-cell text-center" style="width: 100px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                        <tr>
                            {{-- <td class="text-center font-size-sm">{{ $client->id }}</td> --}}
                            <td class="font-w700 font-size-sm">
                                <a href="/admin/users/{{ $client->id }}">
                                    {{ $client->last_name }} {{ $client->first_name }}</a>
                            </td>
                            <td class="font-w700 font-size-sm">
                                {{ $client->email }}
                            </td>
                            <td class="font-w700 font-size-sm">
                                {{ $client->address }}
                            </td>
                            <td class="font-w700 font-size-sm">
                                {{ $client->telephone }}
                            </td>
                            @foreach ($client->roles as $role)
                            <td>
                                <span class="badge badge-success font-w700 font-size-sm">{{ $role->name }}</span>
                            </td>
                            @endforeach
                            <td class="font-w700 font-size-sm">
                                {{ $client->created_at->format('j/m/Y H:i') }}
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip"
                                        title="Detail">
                                        <a href="/admin/users/{{ $client->id }}"><i class="fa fa-fw fa-eye"></i></a>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip"
                                        title="Modifier">
                                        <a href="/admin/users/{{ $client->id }}/edit"><i
                                                class="fa fa-fw fa-pencil-alt"></i></a>
                                    </button>
                                </div>
                            </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->

@endsection