@extends('layouts.master')

@section('content')
<div class="content content-full">
    {{-- <div class="row ">
        <div class="col-auto float-right mb-2">
            <a href="{{ route('invoices.create') }}" class="btn btn-outline-success"><i class="fa fa-plus"></i> Creer
                Facture</a>
        </div>
    </div> --}}
    <div class="block block-bordered block-rounded">
        <div class="block-header">
            <h3 class="block-title">Listes des factures</h3>
            <div class="block-options">
                <a class="btn btn-sm btn-outline-success" href="{{ route('invoices.create') }}">
                    <i class="fa fa-fw fa-plus "></i>Creer facture
                </a>
            </div>
        </div>
        <div class="block-content block-content-full">
            <div class="table-responsive col-md-12">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr>
                            {{-- <th class="text-center">#</th> --}}
                            <th hidden></th>
                            <th hidden></th>
                            <th>N° facture</th>
                            <th>Client</th>
                            <th class="d-none d-sm-table-cell">date facture</th>
                            <th class="d-none d-sm-table-cell">date echeance</th>
                            <th>montant</th>
                            <th class="d-none d-sm-table-cell">statut</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($invoices as $item)
                        <tr>
                            <td hidden class="ids">{{ $item->id }}</td>
                            <td hidden class="invoice_number">{{ $item->invoice_number }}</td>
                            <td class="font-w600 font-size-sm">
                                <a href="{{ url('manager/invoices/'.$item->invoice_number) }}">
                                    {{ $item->invoice_number }}</a>
                            </td>
                            <td class="font-w600 font-size-sm">{{ $item->client }}</td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{ $item->invoice_date }}
                                {{-- {{\Carbon\Carbon::parse($item->invoice_date)->isoFormat('D MMM YYYY')}} --}}
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{ $item->expiry_date }}
                                {{-- {{\Carbon\Carbon::parse($item->expiry_date)->isoFormat('D MMM YYYY')}} --}}
                            </td>
                            <td><strong>{{ $item->total }}CFA</strong></td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-info">Payé</span>
                            </td>
                            <td class="text-center">
                                <div>
                                    <a href="{{ url('manager/invoices/'.$item->invoice_number) }}"
                                        class="btn btn-sm btn-success" data-toggle="tooltip" title="voir">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a href="{{ url('manager/invoices/'.$item->invoice_number.'/edit') }}"
                                        class="btn btn-sm btn-primary" data-toggle="tooltip" title="Modifier">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger delete_invoice"
                                        data-toggle="modal" data-target="#delete_invoice" data-toggle="tooltip"
                                        title="Supprimer">
                                        <i class="fa fa-fw fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">Data not Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Delete invoice Modal -->
    <div class="modal custom-modal fade" id="delete_invoice" role="dialog">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Supprimer Facture</h3>
                        <p>Voulez-vous vraiment supprimer ?</p>
                    </div>
                    <form action="{{ route('invoice/delete')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" class="e_id" value="">
                        <input type="hidden" name="invoice_number" class="invoice_number" value="">
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-danger continue-btn submit-btn">Delete</button>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0)" class="btn btn-primary cancel-btn"
                                    data-dismiss="modal">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete invoice Modal -->

</div>
@section('script')
{{-- delete model --}}
<script>
    $(document).on('click','.delete_invoice',function(){
        var _this = $(this).parents('tr');
        $('.e_id').val(_this.find('.ids').text());
        $('.invoice_number').val(_this.find('.invoice_number').text());
    });
</script>
@endsection

@endsection