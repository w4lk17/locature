@extends('layouts.master')
@section('content')
<!-- Page Content -->
<div class="content content-full">
    <!-- Stats -->
    <div class="row">
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="/client/history">
                <div class="block-content block-content-full bg-default">
                    <div class="font-size-sm font-w600 text-uppercase text-white">Historique</div>
                    <div class="font-size-h2 font-w400 text-white">###</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-themed block-link-pop border-left border-primary border-4x"
                href="/client/voitures">
                <div class="block-content block-content-full bg-danger">
                    <div class="font-size-sm font-w600 text-uppercase text-white ">Voitures Disponibles</div>
                    <div class="font-size-h2 font-w400 text-white">{{ $DispoCarsCount }}</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="/client/bookings">
                <div class="block-content block-content-full bg-success">
                    <div class="font-size-sm font-w600 text-uppercase text-white">Mes Reservations</div>
                    <div class="font-size-h2 font-w400 text-white">{{ $BookingCount }}</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop border-left border-primary border-4x"
                href="javascript:void(0)">
                <div class="block-content block-content-full bg-flat">
                    <div class="font-size-sm font-w600 text-uppercase text-white">Statistiques</div>
                    <div class="font-size-h2 font-w400 text-white">###</div>
                </div>
            </a>
        </div>
    </div>
    <!-- END Stats -->
</div>
<!-- END Page Content -->
@endsection