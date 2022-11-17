@extends('layouts.master')

@section('content')
<div class="content content-full">
    <div class="block block-rounded block-bordered">
        <div class="block-header">
            <h3 class="block-title">Listes des voitures</h3>
            <div class="block-options">
                <button class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#modal-block-fadein"
                    data-backdrop="static" data-keyboard="false" href="#">
                    <i class="fa fa-fw fa-plus "></i>Ajouter voiture
                </button>
            </div>
        </div>
        <div class="block-content block-content-full">
            <div class="table-responsive col-md-12">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th>Nom</th>
                            <th class="d-none d-sm-table-cell">carburant</th>
                            <th class="d-none d-sm-table-cell">Prix</th>
                            <th class="text-center">Date Ajout </th>
                            <th class="d-none d-sm-table-cell">Statut</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($voitures as $voiture)
                        <tr>
                            <td class="text-center font-size-sm">{{ $voiture->id }}</td>
                            <td class="font-w600 font-size-sm">
                                <a href="/manager/voitures/{{ $voiture->id }}">
                                    {{ $voiture->marque }} {{ $voiture->modele }}
                                </a>
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{ $voiture->carburant }}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{ $voiture->prix }} <em class="text-muted">CFA</em>
                            </td>
                            <td>
                                <em class="text-muted font-size-sm">
                                    {{ $voiture->created_at->format('j/m/Y H:i') }}
                                </em>
                            </td>
                            <td class="d-none d-sm-table-cell text-center">
                                <div class="dropdown action-label">
                                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#"
                                        data-toggle="dropdown" aria-expanded="false">
                                        <span
                                            class="{{ $voiture->disponible== 1 ? 'badge badge-warning' : 'badge badge-danger'}}">
                                            {{ $voiture->disponible == '1' ? 'Disponible' : 'Non disponible' }}
                                        </span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <form action="/manager/dispo/{{ $voiture->id }}" method="POST">
                                            {{ method_field('PUT') }}
                                            @csrf
                                            <button class="dropdown-item btn btn-link" type="submit">
                                                Disponible
                                            </button>
                                        </form>
                                        <form action="/manager/nonDispo/{{ $voiture->id }}" method="POST">
                                            {{ method_field('PUT') }}
                                            @csrf
                                            <button class="dropdown-item btn btn-link" type="submit"> Non
                                                disponible
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-success" href="/manager/voitures/{{ $voiture->id }}">Détail</a>
                                <a class="btn btn-sm btn-primary"
                                    href="/manager/voitures/{{ $voiture->id }}/edit">Modifier
                                </a>

                                <button class="btn btn-sm btn-danger deleteVoiture" data-toggle="tooltip"
                                    title="Supprimer" data-original-title="Supprimer" data-id="{{ $voiture->id }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">Data not Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- END Page Content -->

@endsection