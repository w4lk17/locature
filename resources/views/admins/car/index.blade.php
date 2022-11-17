@extends('layouts.master')

@section('content')
<div class="content content-full">
    <div class="block block-rounded block-bordered">
        <div class="block-header">
            <h3 class="block-title">Listes des voitures</h3>
            <div class="block-options">
                <button class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#modal-block-fadeinA"
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
                            {{-- <th class="text-center">ID</th> --}}
                            <th>Nom</th>
                            <th class="d-sm-table-cell">carburant</th>
                            <th class="d-sm-table-cell">Prix</th>
                            <th class="d-sm-table-cell">Date Ajout </th>
                            <th class="d-sm-table-cell">Statut</th>
                            <th class="d-md-table-cell"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($voitures as $voiture)
                        <tr>
                            {{-- <td class="text-center font-size-sm">{{ $voiture->id }}</td> --}}
                            <td class="font-w600 font-size-sm">
                                <a href="/admin/cars/{{ $voiture->id }}">
                                    {{ $voiture->marque }} {{ $voiture->modele }}
                                </a>
                            </td>
                            <td class="d-sm-table-cell font-w600 font-size-sm">
                                {{ $voiture->carburant }}
                            </td>
                            <td class="d-sm-table-cell font-w600 font-size-sm">
                                {{ $voiture->prix }} <em class="text-muted">CFA</em>
                            </td>
                            <td class="d-sm-table-cell font-w600 font-size-sm">
                                <em class="text-muted">
                                    {{ $voiture->created_at->format('j/m/Y H:i') }}
                                </em>
                            </td>
                            <td class="d-sm-table-cell text-center">
                                <div class="dropdown action-label">
                                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#"
                                        data-toggle="dropdown" aria-expanded="false">
                                        <span
                                            class="{{ $voiture->disponible== 1 ? 'badge badge-warning' : 'badge badge-danger'}}">
                                            {{ $voiture->disponible == '1' ? 'Disponible' : 'Non disponible' }}
                                        </span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <form action="/admin/dispo/{{ $voiture->id }}" method="POST">
                                            {{ method_field('PUT') }}
                                            @csrf
                                            <button class="dropdown-item btn btn-link" type="submit">
                                                Disponible
                                            </button>
                                        </form>
                                        <form action="/admin/nonDispo/{{ $voiture->id }}" method="POST">
                                            {{ method_field('PUT') }}
                                            @csrf
                                            <button class="dropdown-item btn btn-link" type="submit">
                                                Non disponible
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                            <td class="d-md-table-cell text-center">
                                <a class="btn btn-sm btn-success" href="/admin/cars/{{ $voiture->id }}">Détail</a>
                                <a class="btn btn-sm btn-primary" href="/admin/cars/{{ $voiture->id }}/edit">Modifier
                                </a>

                                <button class="btn btn-sm btn-danger deleteCar" data-toggle="tooltip" title=""
                                    data-original-title="" data-id="{{ $voiture->id }}">
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