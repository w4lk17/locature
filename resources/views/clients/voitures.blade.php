@extends('layouts.master')
@section('content')
<div class="content content-full">
    @foreach ($voitures as $voiture)
    <div class="block ">
        <div class=" block block-content">
            <div class="container">
                <div class="block  block-bordered">
                    <div class=" block-content block-content-full ribbon ribbon-modern {{ $voiture->disponible == 1
                            ? 'ribbon-warning'
                            : 'ribbon-danger'}}">
                        <div class="ribbon-box">
                            <i class="fa fa-check mr-1"></i>{{ $voiture->disponible == 1
                            ? 'Disponible'
                            : 'Non Disponible'}}
                        </div>
                        <div class="block-content">
                            <div class="row items-push">
                                <div class="col-md-4">
                                    <img class="img-fluid"
                                        src="{{$voiture->chemin }}"  alt=""/>
                                </div>
                                <div class="col-md-8">
                                    <div>
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th style="width: 10%;"></th>
                                                    <th style="width: 10%;"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="font-w600">Marque:</td>
                                                    <td class="font-w700 font-size-lg">
                                                        {{ $voiture->marque }} {{ $voiture->modele }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-w600">Carburant:</td>
                                                    <td class="font-w700 font-size-lg">
                                                        {{ $voiture->carburant }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-w600">Transmission:</td>
                                                    <td class="font-w700 font-size-lg">
                                                        {{ $voiture->transmission }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="font-w600">Prix:</td>
                                                    <td class="font-w700 font-size-lg">
                                                        {{ $voiture->prix }} F.CFA<sup><strong>/jour</strong></sup>
                                                    </td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>

                                    <a class="btn btn-primary mt-3"
                                        href="/client/bookings/create/{{ $voiture->id }}">Détails...
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- Pagination -->
    <nav class="d-flex justify-content-center">
        {{ $voitures->links() }}
    </nav>
    <!-- END Pagination -->
</div>
@endsection
