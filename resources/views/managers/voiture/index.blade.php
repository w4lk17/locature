@extends('layouts.master')

@section('content')
<div class="content content-full">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block block-rounded block-bordered">
                                <div class="block-header">
                                                    <h3 class="block-title">Listes des voitures</h3>
                                                    <div class="block-options">
                                                        <button class="btn btn-sm btn-outline-primary"  data-toggle="modal" data-target="#modal-block-fadein" data-backdrop="static" data-keyboard="false" href="#">
                                                           <i class="fa fa-fw fa-plus "></i>Ajouter voiture
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="block-content block-content-full table-responsive">
                                                    <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                                                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center" >ID</th>
                                                                <th>Nom</th>
                                                                <th class="d-none d-sm-table-cell" >Moteur</th>
                                                                <th class="d-none d-sm-table-cell" >Prix</th>
                                                                <th class="text-center">Date Ajout </th>
                                                                <th class="d-none d-sm-table-cell" >Statut</th>
                                                                <th ></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @forelse ($voitures as $voiture)
                                                            <tr>
                                                                <td class="text-center font-size-sm">1</td>
                                                                <td class="font-w600 font-size-sm">
                                                                    <a href="/manager/voitures/{{ $voiture->id }}">{{ $voiture->marque }} {{ $voiture->modele }}</a>
                                                                </td>
                                                                <td class="d-none d-sm-table-cell font-size-sm">
                                                                    {{ $voiture->moteur }} <em class="text-muted">@example.com</em>
                                                                </td>
                                                                <td class="d-none d-sm-table-cell font-size-sm">
                                                                   {{ $voiture->prix }} <em class="text-muted">CFA</em>
                                                                </td>
                                                                <td>
                                                                    <em class="text-muted font-size-sm">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $voiture->created_at)->format('j/m/Y H:i') }}</em>
                                                                </td>
                                                                <td class="d-none d-sm-table-cell text-center">
                                                                    <div class="dropdown action-label">
                                                                        <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                                                <span class="{{ $voiture->disponible== 1
                                                                                    ? 'badge badge-warning'
                                                                                    : 'badge badge-danger'}}">{{ $voiture->disponible == '1' ? 'Disponible' : 'Non disponible' }}</span>
                                                                        </a>
                                                                	    <div class="dropdown-menu dropdown-menu-right">
                                                                	    <form action="/manager/dispo/{{ $voiture->id }}" method="POST" >
                                                                            {{ method_field('PUT') }}
                                                                            {{ csrf_field() }}
                                                                		    <button class="dropdown-item btn btn-link" type="submit"> Disponible</button>
                                                                		</form>
                                                                        <form action="/manager/nonDispo/{{ $voiture->id }}" method="POST" >
                                                                            {{ method_field('PUT') }}
                                                                            {{ csrf_field() }}
                                                                		    <button class="dropdown-item btn btn-link" type="submit"> Non disponible</a>
                                                                	    </form>
                                                                	    </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <a class="btn btn-sm btn-primary" href="/manager/voitures/{{ $voiture->id }}">Détail</a>
                                                                    <a class="btn btn-sm btn-primary" href="/manager/voitures/{{ $voiture->id }}/edit">Modifier</a>
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
</div>
<!-- END Page Content -->

@endsection


