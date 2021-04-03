@extends('layouts.master')
@section('content')
<div class="content content-boxed">
    <div class="block block-bordered">
        <div class="block-content">
            <div class="container">
                <h2>Mes Reservations</h2>
                <table class="table mt-3">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Voiture</th>
                        <th scope="col">Depart</th>
                        <th scope="col">Retour</th>
                        <th scope="col">Etat</th>
                        <th scope="col">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->id }}</td>
                            <td>{{ $reservation->voiture->marque }} {{ $reservation->voiture->modele }}</td>
                            <td>{{ $reservation->date_depart }}</td>
                            <td>{{ $reservation->date_retour }}</td>
                            <td><span class="font-w600 text-warning" >{{ $etat }}</span></td>
                            <td><a href="/bookings/{{ $reservation->id }}/edit" class="btn btn-sm btn-success">Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(!empty(Session::get('success')))
                    <div class="alert alert-success"> {{ Session::get('success') }}</div>
                @endif
                @if(!empty(Session::get('error')))
                    <div class="alert alert-danger"> {{ Session::get('error') }}</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
