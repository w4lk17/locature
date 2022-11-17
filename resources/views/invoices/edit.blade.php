@extends('layouts.master')

@section('content')
<div class="content content-full">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('create/invoices/update') }}" method="POST">
                @csrf
                {{-- @method('PUT') --}}
                <input class="form-control" type="hidden" id="id" name="id" value="{{$invoices->id }}">
                <input class="form-control" type="hidden" id="invoice_number" name="invoice_number"
                    value="{{$invoices->invoice_number }}">
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Client <span class="text-danger">*</span></label>
                            <select class="select form-control" id="client" name="client">
                                <option value="{{$invoicesJoin[0]->client }}">{{$invoicesJoin[0]->client }}
                                </option>
                                <option value="Barry Cuda">Barry Cuda</option>
                                <option value="Tressa Wexler">Tressa Wexler</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Project <span class="text-danger">*</span></label>
                            <select class="select form-control" id="project" name="project">
                                <option value="{{$invoicesJoin[0]->project }}">{{$invoicesJoin[0]->project }}
                                </option>
                                <option value="Office Management">Office Management</option>
                                <option value="Project Management">Project Management</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" id="email" name="email"
                                value="{{$invoicesJoin[0]->email }}">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Tax</label>
                            <select class="select form-control" id="tax" name="tax">
                                <option value="{{$invoicesJoin[0]->tax }}">{{$invoicesJoin[0]->tax }}</option>
                                <option value="VAT">VAT</option>
                                <option value="GST">GST</option>
                                <option value="No Tax">No Tax</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Client Address</label>
                            <textarea class="form-control" rows="1" id="client_address"
                                name="client_address">{{$invoicesJoin[0]->client_address }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Billing Address</label>
                            <textarea class="form-control" rows="1" id="billing_address"
                                name="billing_address">{{$invoicesJoin[0]->billing_address }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Estimate Date <span class="text-danger">*</span></label>
                            <div class="cal-icon">
                                <input class="form-control js-datepicker" type="text" id="estimate_date"
                                    name="invoice_date" data-today-highlight="true" data-week-start="1"
                                    data-autoclose="true" placeholder="dd/mm/yyyy" data-date-format="dd/mm/yyyy"
                                    value="{{$invoicesJoin[0]->invoice_date }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Expiry Date <span class="text-danger">*</span></label>
                            <div class="cal-icon">
                                <input class="form-control js-datepicker" type="text" id="expiry_date"
                                    name="expiry_date" data-today-highlight="true" data-week-start="1"
                                    data-autoclose="true" placeholder="dd/mm/yyyy" data-date-format="dd/mm/yyyy"
                                    value="{{$invoicesJoin[0]->expiry_date }}">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-hover table-white" id="tableEstimate">
                                <thead>
                                    <tr>
                                        <th style="width: 20px">#</th>
                                        <th class="col-sm-2">Item</th>
                                        <th class="col-md-6">Description</th>
                                        <th style="width:100px;">Unit Cost</th>
                                        <th style="width:80px;">Qty</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoicesJoin as $key=>$item )
                                    <tr>
                                        <input type="hidden" name="invoices_adds[]" value="{{$item->id }}">
                                        <td hidden class="ids">{{ $item->id }}</td>
                                        <td>{{ ++$key }}</td>
                                        <td>
                                            <input class="form-control" type="text" id="item" name="item[]"
                                                value="{{ $item->item }}" style="min-width:150px">
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" id="description"
                                                name="description[]" value="{{ $item->description }}"
                                                style="min-width:150px">
                                        </td>
                                        <td>
                                            <input class="form-control unit_price" style="width:100px" type="text"
                                                id="unit_cost" name="unit_cost[]" value="{{ $item->unit_cost }}">
                                        </td>
                                        <td>
                                            <input class="form-control qty" style="width:80px" type="text" id="qty"
                                                name="qty[]" value="{{ $item->qty }}">
                                        </td>
                                        <td>
                                            <input class="form-control total" style="width:120px" id="amount"
                                                name="amount[]" type="text" value="{{ $item->amount }}" readonly>
                                        </td>
                                        @if($key =='1')
                                        <td><a href="javascript:void(0)" class="text-success font-18" title="Add"
                                                id="addBtn">
                                                <i class="fa fa-plus"></i></a></td>
                                        @endif
                                        @if($item->id ==!null)
                                        <td><a class="text-danger font-18 delete_invoice" href="#" data-toggle="modal"
                                                data-target="#delete_invoice" title="Remove">
                                                <i class="fa fa-trash"></i></a>
                                        </td>
                                        @else
                                        <td><a class="text-danger font-18 remove" href="#" title="Remove">
                                                <i class="fa fa-trash"></i></a>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-white">
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right">Total</td>
                                        <td>
                                            <input class="form-control text-right" type="text" id="sum_total"
                                                name="total" value="{{$invoicesJoin[0]->total }}" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" style="text-align: right">Tax</td>
                                        <td style="text-align: right;width: 230px">
                                            <input class="form-control text-right" type="text" id="tax_1" name="tax_1"
                                                value="{{$invoicesJoin[0]->tax_1 }}" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" style="text-align: right">
                                            Discount %
                                        </td>
                                        <td style="text-align: right; width: 230px">
                                            <input class="form-control text-right discount" type="text" id="discount"
                                                name="discount" value="{{$invoicesJoin[0]->discount }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" style="text-align: right; font-weight: bold">
                                            Grand Total
                                        </td>
                                        <td style="text-align: right; font-weight: bold; font-size: 16px;width: 230px">
                                            <input class="form-control text-right" type="text" id="grand_total"
                                                name="grand_total" value="{{$invoicesJoin[0]->grand_total }}" readonly>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Other Information</label>
                                    <textarea class="form-control" id="other_information"
                                        name="other_information">{{$invoicesJoin[0]->other_information }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="submit-section">
                    <button class="btn btn-primary submit-btn m-r-10">Enrégistrer & Envoyer</button>
                    <button type="submit" class="btn btn-primary submit-btn">Enrégistrer</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Delete invoice add Modal -->
    <div class="modal custom-modal fade" id="delete_invoice" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Supprimer article </h3>
                        <p>Voulez-vous vraiment supprimer cette colonne?</p>
                    </div>
                    <form action="{{ route('invoice_add/delete') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" class="e_id" value="">
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary continue-btn submit-btn">Delete</button>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-dismiss="modal"
                                    class="btn btn-primary cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete invoice add Modal -->
</div>

<!-- /Page Content -->
@section('script')
{{-- delete model --}}
<script>
    $(document).on('click','.delete_invoice',function() {
        var _this = $(this).parents('tr');
        $('.e_id').val(_this.find('.ids').text());
    });
</script>
@endsection
@endsection