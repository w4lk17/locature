@extends('layouts.master')

@section('content')

<!-- Page Content -->
<div class="content content-full">
    <div class="block block-rounded block-bordered">
        <div class="block-header">
            <h3 class="block-title">Utilisateurs</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle"
                    data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
                <button type="button" class="btn-block-option">
                    <i class="si si-settings"></i>
                </button>
            </div>
        </div>
        <div class="block-content block-content-full">
            <div class="table-responsive col-md-12">
                <table class="table table-striped table-bordered table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr class="text-uppercase">
                            <th class="font-w700">Nom</th>
                            <th class="d-sm-table-cell font-w700 text-center">Role</th>
                            <th class="d-sm-table-cell font-w700 ">Email</th>
                            <th class="d-sm-table-cell font-w700 text-center">Enrégistré</th>
                            <th class="font-w700">statut</th>
                            <th class="font-w700 text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td class="d-sm-table-cell">
                                <a href="/admin/users/{{ $user->id }}">
                                    {{ $user->last_name }} {{ $user->first_name }}
                                </a>
                            </td>
                            @foreach ($user->roles as $role)
                            <td class="d-sm-table-cell text-center">
                                <span class="link-fx font-w600">{{ $role->name }}</span>
                            </td>
                            @endforeach
                            <td class="d-sm-table-cell ">
                                {{ $user->email }}
                            </td>
                            <td class="d-sm-table-cell text-center">
                                <span class="font-w600">{{ $user->created_at->format('j/m/Y H:i') }}</span>
                            </td>
                            <td>
                                <span class="font-w700 p-2 {{ $user->isActivated() ? 'badge badge-primary'
                                    : 'badge badge-danger'}}">
                                    {{ $user->isActivated() ? 'Actif' :'Désactivé'}}</span>
                            </td>
                            @foreach ($user->roles as $role)
                            <td class="btn-group">
                                <a href="/admin/users/{{ $user->id }}/edit"
                                    class="mr-2 btn btn-sm btn-outline-secondary">Modifier
                                </a>
                                @if ($role->name != 'Admin')
                                @if ($user->isActivated())
                                <form action="/admin/desactivate/{{ $user->id }}" method="POST">
                                    {{ method_field('PUT') }}
                                    @csrf
                                    <button class="mr-2 btn btn-sm btn-danger" type="submit">
                                        Désactiver
                                    </button>
                                </form>
                                @else
                                <form action="/admin/activate/{{ $user->id }}" method="POST">
                                    {{ method_field('PUT') }}
                                    @csrf
                                    <button class="mr-2 btn btn-sm btn-primary" type="submit">
                                        Reactiver
                                    </button>
                                </form>
                                @endif
                                @endif
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->

@endsection