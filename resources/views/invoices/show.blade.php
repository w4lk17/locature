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
                                <img src="{{ asset('assets/media/photos/locature_logo@3x.png') }}" class="inv-logo"
                                    alt="logo">
                                <ul class="list-unstyled">
                                    <li>
                                        <h5 class="mb-2"><strong>LOCATURE</strong></h5>
                                    </li>
                                    <li>Quartier Avédji,</li>
                                    <li>Lomé, TOGO</li>
                                    <li>+228 99 99 99 99</li>
                                    {{-- <li>GST No:</li> --}}
                                </ul>
                            </div>
                            <div class="col-sm-6 m-b-20">
                                <div class="invoice-details">
                                    <h3 class="text-uppercase">Facture #{{$invoicesJoin[0]->invoice_number }}</h3>
                                    <ul class="list-unstyled ">
                                        <li>Date Facture : <span>{{ $invoicesJoin[0]->invoice_date }}</span></li>
                                        <li>Date Echéance : <span>{{ $invoicesJoin[0]->expiry_date }}</span></li>
                                        <li>
                                            <h5 class="mt-2">Caissier : <span>
                                                    {{ $invoicesJoin[0]->cashier }}</span>
                                            </h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-lg-7 col-xl-8 m-b-20">
                                {{-- <h5>Invoice to:</h5> --}}
                                <span class="text-muted">Facture de:</span> Mr./Mme
                                <ul class="list-unstyled">
                                    <li>
                                        <h5 class="mb-2"><strong>{{$invoicesJoin[0]->client }}</strong></h5>
                                    </li>
                                    {{-- <li><span>Global Technologies</span></li> --}}
                                    <li>{{$invoicesJoin[0]->client_address }}</li>
                                    <li>{{$invoicesJoin[0]->billing_address }}</li>
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
                                        <th>ARTICLE</th>
                                        <th class="d-none d-sm-table-cell">DESCRIPTION</th>
                                        <th>PRIX<sup><strong>/jour</strong></sup></th>
                                        <th>NBRE de jour</th>
                                        <th class="text-right">TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoicesJoin as $key=>$item )
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $item->item }}</td>
                                        <td class="d-none d-sm-table-cell">{{ $item->description }}</td>
                                        <td>{{ $item->unit_cost }} &#x20A3;</td>
                                        <td>{{ $item->qty }}</td>
                                        <td class="text-right">{{ $item->amount }} &#x20A3;</td>
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
                                                        <th>Total HT:</th>
                                                        <td class="text-right">{{ number_format($invoicesJoin[0]->total, thousands_separator: " ") }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total TVA <span class="text-regular">
                                                            {{ $invoicesJoin[0]->tax }}% :</span></th>
                                                        <td class="text-right">{{$invoicesJoin[0]->tax_1 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Remise:<span class="text-regular"></th>
                                                        <td class="text-right">{{$invoicesJoin[0]->discount }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total TTC:</th>
                                                        <td class="text-right text-primary">
                                                            <b>{{ number_format($invoicesJoin[0]->grand_total, thousands_separator: " ") }} &#x20A3;</b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Payé:</th>
                                                        <td class="text-right text-primary">
                                                            <strong>{{ number_format($invoicesJoin[0]->perçu, thousands_separator: " ") }} &#x20A3;</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Reste à payer:</th>
                                                        <td class="text-right text-primary">
                                                            <b>{{ number_format($invoicesJoin[0]->rap, thousands_separator: " ") }} &#x20A3;</b>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-info">
                                <strong>Autres Informations:</strong>
                                <p class="text-muted">{{$invoicesJoin[0]->other_information }}</p>
                            </div>
                            <p class="font-size-sm text-muted text-center py-3 my-3 border-top">
                                Merci beaucoup de faire affaire avec nous. Nous avons hâte de travailler à nouveau avec
                                vous!
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
