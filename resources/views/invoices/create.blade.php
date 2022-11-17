@extends('layouts.master')

@section('content')
<div class="content content-full">
    <div class="row">
        <div class="col-sm-12">
            <form action="{{ route('invoices.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Client <span class="text-danger">*</span></label>
                            <select class="js-select2 form-control {{ $errors->has('client') ? 'error' : '' }}"
                                id="client" name="client" data-placeholder="-Sélectionner client-">
                                <option></option>
                                @foreach($users as $user)
                                <option value="{{ $user->last_name }} {{ $user->first_name }}">
                                    {{ $user->last_name }} {{ $user->first_name }}
                                </option>
                                @endforeach
                            </select>
                            @if($errors->has('client')) <span class="error"> {{ $errors->first("client") }} </span>
                            @endif
                        </div>
                    </div>
                    {{-- <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Project <span class="text-danger">*</span></label>
                            <select class="select form-control" id="project" name="project">
                                <option>Select Project</option>
                                <option selected>Office Management</option>
                                <option>Project Management</option>
                            </select>
                        </div>
                    </div> --}}

                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" id="email" name="email">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Taxe<span class="text-danger">*</span></label>
                            <select class="select form-control {{ $errors->has('tax') ? 'error' : '' }}" id="tax"
                                name="tax">
                                <option> --Select Tax-- </option>
                                <option value="18%">TVA</option>
                                <option value="0">Sans Taxe</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label> Addresse Client<span class="text-danger">*</span></label>
                            <textarea class="form-control {{ $errors->has('client_address') ? 'error' : '' }} " rows="1"
                                id="client_address" name="client_address"></textarea>
                            @if($errors->has('client_address')) <span class="error"> {{ $errors->first("client_address")
                                }} </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Addresse Facturation </label>
                            <textarea class="form-control" rows="1" id="billing_address"
                                name="billing_address"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Date Facturation <span class="text-danger">*</span></label>
                            <div class="cal-icon">
                                <input
                                    class="js-datepicker form-control {{ $errors->has('invoice_date') ? 'error' : '' }}"
                                    id="invoice_date" name="invoice_date" data-week-start="1" data-autoclose="true"
                                    data-today-highlight="true" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy"
                                    type="text">
                                @if($errors->has('invoice_date')) <span class="error"> {{ $errors->first("invoice_date")
                                    }} </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                            <label>Date Echéance <span class="text-danger">*</span></label>
                            <div class="cal-icon">
                                <input
                                    class="js-datepicker form-control {{ $errors->has('expiry_date') ? 'error' : '' }}"
                                    id="expiry_date" name="expiry_date" data-week-start="1" data-autoclose="true"
                                    data-today-highlight="true" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy"
                                    type="text">
                                @if($errors->has('expiry_date')) <span class="error"> {{ $errors->first("expiry_date")
                                    }} </span>
                                @endif
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
                                        <th>Amount</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><input class="form-control {{ $errors->has('item') ? 'error' : '' }}"
                                                style="min-width:150px" type="text" id="item" name="item[]" required>
                                        </td>
                                        <td><input class="form-control {{ $errors->has('description') ? 'error' : '' }}"
                                                style="min-width:150px" type="text" id="description"
                                                name="description[]" required></td>
                                        <td><input
                                                class="form-control unit_price {{ $errors->has('unit_cost') ? 'error' : '' }}"
                                                style="width:100px" type="text" id="unit_cost" name="unit_cost[]"
                                                required></td>
                                        <td><input class="form-control qty {{ $errors->has('qty') ? 'error' : '' }}"
                                                style="width:80px" type="text" id="qty" name="qty[]" required></td>
                                        <td><input class="form-control total" style="width:120px" type="text"
                                                id="amount" name="amount[]" value="0" readonly></td>
                                        <td><a href="javascript:void(0)" class="text-success font-18" title="Add"
                                                id="addBtn"><i class="fa fa-plus"></i></a>
                                        </td>
                                    </tr>
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
                                            <input class="form-control text-right total" type="text" id="sum_total"
                                                name="total" value="0" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-right">Tax</td>
                                        <td>
                                            <input class="form-control text-right" type="text" id="tax_1" name="tax_1"
                                                value="0" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-right">
                                            Discount %
                                        </td>
                                        <td>
                                            <input class="form-control text-right discount" type="text" id="discount"
                                                name="discount" value="10">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" style="text-align: right; font-weight: bold">
                                            Grand Total
                                        </td>
                                        <td style="font-size: 16px;width: 230px">
                                            <input class="form-control text-right" type="text" id="grand_total"
                                                name="grand_total" value="$ 0.00" readonly>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Autre Information</label>
                                    <textarea class="form-control" id="other_information"
                                        name="other_information"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="submit-section">
                    <button class="btn btn-primary m-r-10">Enrégistrer & Envoyer</button>
                    <button type="submit" class="btn btn-primary ">Enrégistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection