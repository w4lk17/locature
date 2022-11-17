<?php

namespace App\Http\Controllers;


use Exception;
use App\Invoice;
use App\InvoicesAdd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices     = Invoice::all();
        // $invoices     = DB::table('invoices')->get();
        $invoicesJoin = DB::table('invoices') //jointure des 2 tables
            ->join('invoices_adds', 'invoices.invoice_number', '=', 'invoices_adds.invoice_number')
            ->select('invoices.*', 'invoices_adds.*')
            ->get();

        return view('invoices.index', compact('invoices', 'invoicesJoin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = DB::table('users')->get();

        return view('invoices.create', compact('users'));
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
        $rules = [
            'client'            => 'required|string|max:255',
            'email'             => 'required|string|max:255',
            'client_address'    => 'required|string|max:255',
            'invoice_date'      => 'required|string|max:255',
            'expiry_date'       => 'required|string|max:255',
        ];

        $messages = [
            'required' => 'ce champ ne peut être vide.',
        ];

        $this->validate($request, $rules, $messages);

        try {
            /** Generate invoice number */
            $invoice_number  = IDGenerator(new Invoice, 'invoice_number', 5, 'INV');

            $invoices = new Invoice;

            $invoices->invoice_number    = $invoice_number;
            $invoices->client            = $request->client;
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
            //return dd($invoice_number);
            $invoices->save();

            $invoice_number = DB::table('invoices')->orderBy('invoice_number', 'DESC')->select('invoice_number')->first();
            $invoice_number = $invoice_number->invoice_number;

            foreach ($request->item as $key => $items) {

                $invoicesAdd['item']            = $items;
                $invoicesAdd['invoice_number']  = $invoice_number;
                $invoicesAdd['description']     = $request->description[$key];
                $invoicesAdd['unit_cost']       = $request->unit_cost[$key];
                $invoicesAdd['qty']             = $request->qty[$key];
                $invoicesAdd['amount']          = $request->amount[$key];

                InvoicesAdd::create($invoicesAdd);
                //dd($request->all());
            }

            Toastr::success('Facture creée avec succès :)', 'Success');
            return redirect()->back();
        } catch (Exception $e) {
            Toastr::error('Echec Enregistrement :(', 'Error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice $invoice_number
     * @return \Illuminate\Http\Response
     */
    public function show($invoice_number)
    {
        $invoicesJoin = DB::table('invoices')
            ->join('invoices_adds', 'invoices.invoice_number', '=', 'invoices_adds.invoice_number')
            ->select('invoices.*', 'invoices_adds.*')
            ->where('invoices_adds.invoice_number', $invoice_number)
            ->get();

        return view('invoices.show', compact('invoicesJoin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice $invoice_number
     * @return \Illuminate\Http\Response
     */
    public function edit($invoice_number)
    {
        $invoices     = DB::table('invoices')->where('invoice_number', $invoice_number)->first();
        $invoicesJoin = DB::table('invoices')
            ->join('invoices_adds', 'invoices.invoice_number', '=', 'invoices_adds.invoice_number')
            ->select('invoices.*', 'invoices_adds.*')
            ->where('invoices_adds.invoice_number', $invoice_number)
            ->get();

        return view('invoices.edit', compact('invoices', 'invoicesJoin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        // // try {

        // $update = [
        //     'id'                => $request->id,
        //     'client'            => $request->client,
        //     'project'           => $request->project,
        //     'email'             => $request->email,
        //     'tax'               => $request->tax,
        //     'client_address'    => $request->client_address,
        //     'billing_address'   => $request->billing_address,
        //     'invoice_date'      => $request->invoice_date,
        //     'expiry_date'       => $request->expiry_date,
        //     'total'             => $request->total,
        //     'tax_1'             => $request->tax_1,
        //     'discount'          => $request->discount,
        //     'grand_total'       => $request->grand_total,
        //     'other_information' => $request->other_information,
        // ];

        // Invoice::where('id', $request->id)->update($update);
        // /** delete record */
        // foreach ($request->invoices_adds as $key => $items) {
        //     $invoices_adds['invoice_number'] = $request->invoice_number;
        //     $invoices_adds['id']            = $request->invoices_adds[$key];
        //     $invoices_adds['item']            = $request->item[$key];
        //     $invoices_adds['description']     = $request->description[$key];
        //     $invoices_adds['unit_cost']       = $request->unit_cost[$key];
        //     $invoices_adds['qty']             = $request->qty[$key];
        //     $invoices_adds['amount']          = $request->amount[$key];

        //     DB::table('invoices_adds')->where('id', $request->invoices_adds[$key])->update($invoices_adds);
        //     //DB::table('invoices_adds')->where('id', $request->invoices_adds[$key])->delete();
        // }
        // /** insert new record */
        // // foreach ($request->item as $key => $item) {
        // //     $invoicesAdd['invoice_number'] = $request->invoice_number;
        // //     $invoicesAdd['item']            = $request->item[$key];
        // //     $invoicesAdd['description']     = $request->description[$key];
        // //     $invoicesAdd['unit_cost']       = $request->unit_cost[$key];
        // //     $invoicesAdd['qty']             = $request->qty[$key];
        // //     $invoicesAdd['amount']          = $request->amount[$key];

        // //     InvoicesAdd::create($invoicesAdd);
        // // }

        // Toastr::success('Updated Invoice successfully :)', 'Success');
        // return redirect()->back();
        // // } catch (\Exception $e) {
        // //     DB::rollback();
        // //     Toastr::error('Update Estimates fail :)', 'Error');
        // //     return redirect()->back();
        // // } 

    }

    public function InvoiceUpdate(Request $request)
    {

        try {

            $update = [
                'id'                => $request->id,
                'client'            => $request->client,
                'email'             => $request->email,
                'tax'               => $request->tax,
                'client_address'    => $request->client_address,
                'billing_address'   => $request->billing_address,
                'invoice_date'      => $request->invoice_date,
                'expiry_date'       => $request->expiry_date,
                'total'             => $request->total,
                'tax_1'             => $request->tax_1,
                'discount'          => $request->discount,
                'grand_total'       => $request->grand_total,
                'other_information' => $request->other_information,
            ];

            Invoice::where('id', $request->id)->update($update);
            /** delete record */
            foreach ($request->invoices_adds as $key => $items) {
                DB::table('invoices_adds')->where('id', $request->invoices_adds[$key])->delete();
            }
            /** insert new record */
            foreach ($request->item as $key => $item) {
                $invoicesAdd['invoice_number']  = $request->invoice_number;
                $invoicesAdd['item']            = $request->item[$key];
                $invoicesAdd['description']     = $request->description[$key];
                $invoicesAdd['unit_cost']       = $request->unit_cost[$key];
                $invoicesAdd['qty']             = $request->qty[$key];
                $invoicesAdd['amount']          = $request->amount[$key];

                InvoicesAdd::create($invoicesAdd);
            }

            Toastr::success('Updated Invoice successfully :)', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Update Estimates fail :)', 'Error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function InvoiceDelete(Request $request)
    {
        try {

            /** delete record table invoices_adds */
            $invoice_number = DB::table('invoices_adds')->where('invoice_number', $request->invoice_number)->get();
            foreach ($invoice_number as $key => $id_invoice_number) {
                DB::table('invoices_adds')->where('id', $id_invoice_number->id)->delete();
            }

            /** delete record table invoices */
            Invoice::destroy($request->id);

            Toastr::success(' Suppression reussie :)', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::error(' Echec de la Suppression :)', 'Erreur');
            return redirect()->back();
        }
    }

    /** delete record invoice add */
    public function InvoiceAddDelete(Request $request)
    {
        try {

            InvoicesAdd::destroy($request->id);

            Toastr::success('Colonne supprimée :)', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::error('Echec suppression :)', 'Erreur');
            return redirect()->back();
        }
    }
}
