@extends('layouts.master')

@section('content')
<div class="content content-boxed">
    <!-- Invoice -->
    {{-- <div class="block"> --}}
        <!-- Page Header -->
        <div class="block-header">
            <h3 class="block-title"></h3>
            <div class="block-options">
                <!-- Print Page functionality is initialized in Helpers.print() -->
                <div class="btn-group btn-group-sm">
                    <button class="btn btn-white">CSV</button>
                    <button class="btn btn-white">PDF</button>
                    <button class="btn btn-white btn-block-option" onclick="One.helpers('print');">
                        <i class="si si-printer"></i> Imprimer</button>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 m-b-20">
                                <img src="{{ asset('assets/media/photos/photo1.jpg') }}" class="inv-logo" alt="logo">
                                <ul class="list-unstyled">
                                    <li>LOCATURE</li>
                                    <li>3864 Quiet Valley Lane,</li>
                                    <li>Sherman Oaks, CA, 91403</li>
                                    <li>GST No:</li>
                                </ul>
                            </div>
                            <div class="col-sm-6 m-b-20">
                                <div class="invoice-details">
                                    <h3 class="text-uppercase">Facture #{{$invoicesJoin[0]->invoice_number }}</h3>
                                    <ul class="list-unstyled">
                                        <li>Create Date: <span>{{ $invoicesJoin[0]->invoice_date }}</span></li>
                                        <li>Expiry date: <span>{{ $invoicesJoin[0]->expiry_date }}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-lg-7 col-xl-8 m-b-20">
                                {{-- <h5>Invoice to:</h5> --}}
                                <span class="text-muted">Invoice to:</span>
                                <ul class="list-unstyled">
                                    <li>
                                        <h5 class="mb-2"><strong>{{$invoicesJoin[0]->client }}</strong></h5>
                                    </li>
                                    {{-- <li><span>Global Technologies</span></li> --}}
                                    <li>{{$invoicesJoin[0]->client_address }}</li>
                                    <li>{{$invoicesJoin[0]->billing_address }}</li>
                                    <li>United States</li>
                                    <li>888-777-6655</li>
                                    <li><a href="#">{{$invoicesJoin[0]->email }}</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6 col-lg-5 col-xl-4 m-b-20">
                                {{-- <span class="text-muted">Payment Details:</span>
                                <ul class="list-unstyled invoice-payment-details">
                                    <li>
                                        <h5>Total Due: <span class="text-right">$8,750</span></h5>
                                    </li>
                                    <li>Bank name: <span>Profit Bank Europe</span></li>
                                    <li>Country: <span>United Kingdom</span></li>
                                    <li>City: <span>London E1 8BF</span></li>
                                    <li>Address: <span>3 Goodman Street</span></li>
                                    <li>IBAN: <span>KFH37784028476740</span></li>
                                    <li>SWIFT code: <span>BPT4E</span></li>
                                </ul> --}}
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ITEM</th>
                                        <th class="d-none d-sm-table-cell">DESCRIPTION</th>
                                        <th>UNIT COST</th>
                                        <th>QUANTITY</th>
                                        <th class="text-right">TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoicesJoin as $key=>$item )
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $item->item }}</td>
                                        <td class="d-none d-sm-table-cell">{{ $item->description }}</td>
                                        <td>${{ $item->unit_cost }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td class="text-right">${{ $item->amount }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <div class="row invoice-payment">
                                <div class="col-sm-7">
                                </div>
                                <div class="col-sm-5">
                                    <div class="m-b-20">
                                        <div class="table-responsive no-border">
                                            <table class="table mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th>Subtotal:</th>
                                                        <td class="text-right">{{$invoicesJoin[0]->total }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tax: <span class="text-regular">(25%)</span></th>
                                                        <td class="text-right">{{$invoicesJoin[0]->tax_1 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total:</th>
                                                        <td class="text-right text-primary">
                                                            <h5>{{$invoicesJoin[0]->total }}</h5>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-info">
                                <strong>Other information</strong>
                                <p class="text-muted">{{$invoicesJoin[0]->other_information }}</p>
                            </div>
                            <p class="font-size-sm text-muted text-center py-3 my-3 border-top">
                                Thank you very much for doing business with us. We look forward to working with you
                                again!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--
    </div> --}}
    <!-- END Invoice -->
</div>
@endsection