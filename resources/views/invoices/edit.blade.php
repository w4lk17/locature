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
                            </select>
                        </div>
                    </div>
                    {{-- <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Project <span class="text-danger">*</span></label>
                            <select class="select form-control" id="project" name="project">
                                <option value="{{$invoicesJoin[0]->project }}">{{$invoicesJoin[0]->project }}
                                </option>
                                <option value="Office Management">Office Management</option>
                                <option value="Project Management">Project Management</option>
                            </select>
                        </div>
                    </div> --}}

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
                                <option value="18" {{$invoicesJoin[0]->tax == 18 ? 'selected' : '' }}>TVA</option>
                                <option value="0" {{$invoicesJoin[0]->tax == 0 ? 'selected' : '' }}>Sans TVA</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Addresse Client </label>
                            <textarea class="form-control" rows="1" id="client_address"
                                name="client_address">{{$invoicesJoin[0]->client_address }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Addresse Facture</label>
                            <textarea class="form-control" rows="1" id="billing_address"
                                name="billing_address">{{$invoicesJoin[0]->billing_address }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Date Facture<span class="text-danger">*</span></label>
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
                            <label>Date Echeance <span class="text-danger">*</span></label>
                            <div class="cal-icon">
                                <input class="form-control js-datepicker" type="text" id="expiry_date"
                                    name="expiry_date" data-today-highlight="true" data-week-start="1"
                                    data-autoclose="true" placeholder="dd/mm/yyyy" data-date-format="dd/mm/yyyy"
                                    value="{{$invoicesJoin[0]->expiry_date }}">

                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Project <span class="text-danger">*</span></label>
                            <select class="select form-control" id="project" name="project">
                                <option value="{{$invoicesJoin[0]->project }}">{{$invoicesJoin[0]->project }}
                                </option>
                                <option value="Office Management">Office Management</option>
                                <option value="Project Management">Project Management</option>
                            </select>
                        </div>
                    </div> --}}
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
                                        <th style="width:100px;">Prix /Jour</th>
                                        <th style="width:80px;">Nmbre de Jour</th>
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
                                            Remise
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
                        <div class="row ">
                            <div class="col-lg-2 ml-auto">
                                <div class="form-group">
                                    <label>Montant Payee <span class="text-danger">*</span></label>
                                    <input class="form-control text-right" type="text" id="perçu" name="perçu"
                                        value="{{$invoicesJoin[0]->perçu }}" placeholder="0">
                                </div>
                            </div>
                            <div class="col-lg-2 mr-auto">
                                <div class="form-group">
                                    <label>Etat <span class="text-danger">*</span></label>
                                    <select class="select form-control" id="etat" name="etat">
                                        <option value="Facturée" {{ $invoicesJoin[0]->etat == 'Facturée' ? 'selected' :
                                            '' }}>Facturée</option>
                                        <option value="Payée" {{ $invoicesJoin[0]->etat == 'Payée' ? 'selected' : ''
                                            }}>Payée</option>
                                        <option value="Partiellement payée" 
                                        {{ $invoicesJoin[0]->etat == 'Partiellement payée' ? 'selected' : '' }}>Partiellement payée</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Rèste à Payée <span class="text-danger"></span></label>
                                    <input class="form-control text-right" type="text" id="rap" name="rap"
                                        value="{{ $invoicesJoin[0]->rap }}" placeholder="0" readonly>
                                </div>
                            </div>

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
                    <button class="btn btn-primary submit-btn m-r-10 disabled">Enrégistrer & Envoyer</button>
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
<script>
    var rowIdx = 1;
    $("#addBtn").on("click", function () {
    // Adding a row inside the tbody.
        $("#tableEstimate tbody").append(`
        <tr id="R${++rowIdx}">
            <td class="row-index text-center">
                <p> ${rowIdx}</p>
            </td>
            <td><input class="form-control" type="text" style="min-width:150px" id="item" name="item[]"></td>
            <td><input class="form-control" type="text" style="min-width:150px" id="description" name="description[]"></td>
            <td><input class="form-control unit_price" style="width:100px" type="text" id="unit_cost" name="unit_cost[]"></td>
            <td><input class="form-control qty" style="width:80px" type="text" id="qty" name="qty[]"></td>
            <td><input class="form-control total" style="width:120px" type="text" id="amount" name="amount[]" value="0"
                    readonly></td>
            <td><a href="javascript:void(0)" class="text-danger font-18 remove" title="Remove"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        `);
    });

    $("#tableEstimate tbody").on("click", ".remove", function () {
    // Getting all the rows next to the row
    // containing the clicked button
        var child = $(this).closest("tr").nextAll();

        // Iterating across all the rows
        // obtained to change the index
        child.each(function () {
        // Getting <tr> id.
            var id = $(this).attr("id");

            // Getting the <p> inside the .row-index class.
            var idx = $(this).children(".row-index").children("p");

            // Gets the row number from <tr> id.
            var dig = parseInt(id.substring(1));

            // Modifying row index.
            idx.html(`${dig - 1}`);

            // Modifying row id.
            $(this).attr("id", `R${dig - 1}`);
        });

        // Removing the current row.
        $(this).closest("tr").remove();

            // Decreasing total number of rows by 1.
            rowIdx--;
    });

    $("#tableEstimate tbody").on("input", ".unit_price", function () {
        var unit_price = parseFloat($(this).val());
        var qty = parseFloat($(this).closest("tr").find(".qty").val());
        var total = $(this).closest("tr").find(".total");
        total.val(unit_price * qty);

        calc_total();
    });

    $("#tableEstimate tbody").on("input", ".qty", function () {
        var qty = parseFloat($(this).val());
        var unit_price = parseFloat($(this).closest("tr").find(".unit_price").val());
        var total = $(this).closest("tr").find(".total");
        total.val(qty * unit_price );

        calc_total();
    });

    function calc_total() {
        var sum = 0;
        $(".total").each(function () {
            sum += parseFloat($(this).val());
            console.log('sum_:', sum);
        });

        $(".subtotal").text(sum);

        var amounts = sum;
        var tax = 100;
        $(document).on("change keyup blur", "#qty, .discount", function () {
            // var qty = $("#qty").val();
            var unit_price = $(".unit_price").val();
            var tva = $("#tax").val();
            var discount = $(".discount").val();
            
            

            var tax_ = amounts * tva / tax;
            var grd_t = amounts + tax_ - discount;
           
            
            $("#sum_total").val(amounts);
            $("#tax_1").val(tax_);
            $("#grand_total").val(grd_t);
            
        });
    }
</script>
<script>
    $(document).on("change keyup blur", "#grand_total, #perçu", function () {
        var perçu = $("#perçu").val();
        var gr = $("#grand_total").val();

        var rap = gr - perçu;

        $("#rap").val(rap);
    });
</script>
@endsection
@endsection