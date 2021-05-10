@extends('layouts.master')
@section('content')
<!-- Page Content -->
    <div class="content ">
    <!-- Stats -->
        <div class="row">
            <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                    <div class="block-content block-content-full bg-default">
                        <div class="font-size-sm font-w600 text-uppercase text-white">Visiteurs</div>
                        <div class="font-size-h2 font-w400 text-white">120,580</div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                <a class="block block-rounded block-themed block-link-pop border-left border-primary border-4x" href="/manager/voitures">
                    <div class="block-content block-content-full bg-danger">
                        <div class="font-size-sm font-w600 text-uppercase text-white ">Voitures</div>
                        <div class="font-size-h2 font-w400 text-white">#</div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="/manager/reservations">
                    <div class="block-content block-content-full bg-success">
                        <div class="font-size-sm font-w600 text-uppercase text-white">Reservations</div>
                        <div class="font-size-h2 font-w400 text-white">#</div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                    <div class="block-content block-content-full bg-flat">
                        <div class="font-size-sm font-w600 text-uppercase text-white">Statistiques</div>
                        <div class="font-size-h2 font-w400 text-white">$21</div>
                    </div>
                </a>
            </div>
        </div>
        <!-- END Stats -->
    </div>
<!-- END Page Content -->
@endsection
