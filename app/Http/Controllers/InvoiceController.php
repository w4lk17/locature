<?php

namespace App\Http\Controllers;


use App\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$factures = Factures::all();
        return view('invoices.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invoices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** Validate name field */
        $request->validate([
            'client'   => 'required|string|max:255',
        ]);

        try {
            /** Generate invoice number */
            $invoice_number  = IDGenerator(new Invoice, 'invoice_number', 5, 'INV');

            $invoices = new Invoice;

            $invoices->invoice_number    = $invoice_number;
            $invoices->client            = $request->client;
            $invoices->project           = $request->project;
            $invoices->email             = $request->email;
            $invoices->tax               = $request->tax;
            $invoices->client_address    = $request->client_address;
            $invoices->billing_address   = $request->billing_address;
            $invoices->invoice_date      = $request->invoice_date;
            $invoices->expiry_date       = $request->expiry_date;
            $invoices->total             = $request->total;
            $invoices->tax_1             = $request->tax_1;
            $invoices->discount          = $request->discount;
            $invoices->grand_total       = $request->grand_total;
            $invoices->other_information = $request->other_information;

            $invoices->save();

            //return dd($invoice_number, $request->all());

            // $estimate_number = DB::table('estimates')->orderBy('estimate_number', 'DESC')->select('estimate_number')->first();
            // $estimate_number = $estimate_number->estimate_number;

            // foreach ($request->item as $key => $items) {
            //     $estimatesAdd['item']            = $items;
            //     $estimatesAdd['estimate_number'] = $estimate_number;
            //     $estimatesAdd['description']     = $request->description[$key];
            //     $estimatesAdd['unit_cost']       = $request->unit_cost[$key];
            //     $estimatesAdd['qty']             = $request->qty[$key];
            //     $estimatesAdd['amount']          = $request->amount[$key];

            //     EstimatesAdd::create($estimatesAdd);
            // }


            //Toastr::success('Create new Estimates successfully :)', 'Success');
            return redirect()->back();
            //route('manager/invoices/create');
        } catch (\Exception $e) {
            //Toastr::error('Add Estimates fail :)', 'Error');
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return view('invoices.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
