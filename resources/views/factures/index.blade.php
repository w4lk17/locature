@extends('layouts.master')

@section('content')
<div class="content content-full">

						<div class="row ">

							<div class="col-auto float-right mb-2">
								<a href="/manager/factures/create" class="btn btn-success"><i class="fa fa-plus"></i> Creer Facture</a>
							</div>
						</div>
	<div class="row">
    <div class="col-md-12">
        <div class="block block-bordered block-rounded">
            <div class="block">
                                    <div class="block-header">
                                        <h3 class="block-title">Listes des factures</small></h3>
                                    </div>
                                    <div class="block-content block-content-full">
                                        <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                                        <table class="table table-bordered table-sm table-striped table-vcenter js-dataTable-full-pagination">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>N° facture</th>
                                                    <th>Client</th>
                                                    <th class="d-none d-sm-table-cell" >fait le</th>
                                                    <th>paye le</th>
                                                    <th>montant</th>
                                                    <th class="d-none d-sm-table-cell" >statut</th>
                                                    <th class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center font-size-sm">1</td>
                                                    <td class="font-w600 font-size-sm">
                                                        <a href="#">#INV-0001<?a>
                                                    </td>
                                                    <td class="font-w600 font-size-sm">Lisa Jenkins</td>
                                                    <td class="d-none d-sm-table-cell font-size-sm">
                                                        <em><strong>23 mar 2012</strong></em>
                                                    </td>
                                                    <td class="d-none d-sm-table-cell">
                                                        <em><strong>23 mar 2012</strong></em>
                                                    </td>
                                                    <td class="d-none d-sm-table-cell"><strong>$456</strong></td>
                                                    <td class="d-none d-sm-table-cell">
                                                        <span class="badge badge-info">Payé</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <div>
                                                            <a href="#" class="btn btn-sm btn-success" data-toggle="tooltip" title="show">
                                                                <i class="far fa-eye"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit">
                                                                <i class="fa fa-fw fa-pencil-alt"></i>
                                                            </a>
                                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete">
                                                                <i class="fa fa-fw fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
        </div>
    </div>
</div>
</div>

@endsection
