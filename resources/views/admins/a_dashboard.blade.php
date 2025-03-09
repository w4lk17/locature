@extends('layouts.master')

@section('content')
<div class="content content-full">
    <!-- Stats -->
    <div class="row">
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="/admin/users">
                <div class="block-content block-content-full bg-default">
                    <div class="font-size-sm font-w600 text-uppercase text-white">Utilisateurs</div>
                    <div class="font-size-h2 font-w400 text-white">{{ $UserCount }}</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="/admin/clients">
                <div class="block-content block-content-full bg-danger">
                    <div class="font-size-sm font-w600 text-uppercase text-white">Clients</div>
                    <div class="font-size-h2 font-w400 text-white">{{ $ClientsCount }}</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="/admin/cars">
                <div class="block-content block-content-full bg-success">
                    <div class="font-size-sm font-w600 text-uppercase text-white">Voitures</div>
                    <div class="font-size-h2 font-w400 text-white">{{ $CarsCount }}</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop border-left border-primary border-4x"
                href="/admin/reservations">
                <div class="block-content block-content-full bg-flat">
                    <div class="font-size-sm font-w600 text-uppercase text-white">Reservations</div>
                    <div class="font-size-h2 font-w400 text-white">{{ $ReservCount }}</div>
                </div>
            </a>
        </div>
    </div>
    {{-- chart bars --}}
    <div class="row">
        <div class="col-md-9">
            <figure>
                <div id="container"></div>
            </figure>
        </div>
    </div>
    {{-- end chart bars --}}
    <div class="row">
        <div class="col-md-6">
            <div class="card card-table">
                <div class="card-header">
                    <h3 class="card-title mb-0">Clients</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table custom-table mb-0">
                            <thead>
                                <tr>
                                    {{-- <th class="text-center" style="width: 50px;">#</th> --}}
                                    <th>Name</th>
                                    <th>email</th>
                                    <th>enregistré</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                <tr>
                                    {{-- <th class="text-center" scope="row">1</th> --}}
                                    <td class="d-sm-table-cell ">
                                        <span class="font-w600">
                                            {{ $client->last_name }} {{ $client->first_name }}</span>
                                    </td>
                                    <td class="d-sm-table-cell ">
                                        <span class="font-w600">{{ $client->email }}</span>
                                    </td>
                                    <td class="d-sm-table-cell font-size-sm">
                                        <span class="font-w600">{{ $client->created_at->format('j/m/Y') }}</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip"
                                                title="" data-original-title="View Client">
                                                <a href="/admin/users/{{ $client->id }}"><i
                                                        class="fa fa-fw fa-eye"></i></a>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip"
                                                title="" data-original-title="Edit Client">
                                                <a href="/admin/users/{{ $client->id }}/edit"><i
                                                        class="fa fa-fw fa-pencil-alt"></i></a>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="/admin/clients">Voir tous les clients</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-table">
                <div class="card-header">
                    <h3 class="card-title mb-0">Récentes Reservations</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table custom-table mb-0">
                            <thead>
                                <tr>
                                    <th>Name </th>
                                    <th>Voiture</th>
                                    <th>statut</th>
                                    <th>reservé</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservs as $reserv)
                                <tr>
                                    <td>
                                        <span class="text-muted font-w600">
                                            {{ $reserv->user->last_name }} {{ $reserv->user->first_name }}</span>
                                    </td>
                                    <td>
                                        <span class="font-w600">
                                            {{ $reserv->voiture->marque }} {{ $reserv->voiture->modele }}</span>
                                    </td>
                                    <td>
                                        <span class="{{ $reserv->etat == 0
                                            ? 'badge badge-warning'
                                            :  ($reserv->etat == 1
                                            ? 'badge badge-info'
                                            : 'badge badge-danger')}}"> {{ $reserv->etat == 0 ?'En attente...'
                                            :($reserv->etat == 1 ?'Acceptée' :'Rejetée') }}</span>
                                    </td>
                                    <td class="d-sm-table-cell font-size-sm">
                                        <span class="font-w600">{{ $reserv->created_at->format('j/m/Y H:i') }}</span>
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip"
                                                title="" data-original-title="Détail">
                                                <a href="/admin/reservations/{{ $reserv->id }}">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                            </button>
                                            {{-- <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip"
                                                title="" data-original-title="">
                                                <a href=""><i class="fa fa-fw fa-pencil-alt"></i></a>
                                            </button> --}}
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="/admin/reservations">Voir tous les reservations</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->
@section('script')
<script src="{{ asset('assets/js/plugins/highcharts/highcharts.js') }}"></script>
<script src="{{ asset('assets/js/plugins/highcharts/modules/data.js') }}"></script>
<script src="{{ asset('assets/js/plugins/highcharts/modules/exporting.js') }}"></script>
<script src="{{ asset('assets/js/plugins/highcharts/modules/export-data.js') }}"></script>
<script src="{{ asset('assets/js/plugins/highcharts/modules/accessibility.js') }}"></script>
<script type="text/javascript">
    var chartData = <?php echo json_encode($chartData)?>;
                var year = new Date().getFullYear();
                Highcharts.chart('container', {
                    chart: {
                        type: 'line',
                        styledMode: true
                    },
                    title: {
                        text: `Progression, ${year}`
                    },
                    // subtitle: {
                    //     text: 'Source: positronx.io'
                    // },
                    accessibility: {
                        announceNewData: {
                            enabled: true
                        }
                    },
                    xAxis: {
                        categories: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août',
                            'Septembre', 'Octobre', 'Novembre', 'Décembre'
                        ]
                    },
                    yAxis: [{ // Primary axis
                        className: 'highcharts-color-0',
                        title: {
                            text: 'Utilisateur'
                        }
                    }, { // Secondary axis
                        className: 'highcharts-color-1',
                        opposite: true,
                        title: {
                            text: 'Reservation'
                        }
                    }],
                    // legend: {
                    //     layout: 'vertical',
                    //     align: 'right',
                    //     verticalAlign: 'middle'
                    // },
                    plotOptions: {
                        column: {
                            borderRadius: 5
                        },
                        // series: {
                        //     allowPointSelect: true,
                        //     borderWidth: 0,
                        //     dataLabels: {
                        //         enabled: false,
                        //         format: '{point.y}'
                        //     }
                        // }
                    },
                    credits:{
                        enabled:false
                    },
                    series: [{
                        name: 'Utilisateur',
                        data: chartData.dataU,

                    }, {
                        name: 'Reservation',
                        data: chartData.dataR,
                        yAxis: 1
                    }],
                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                        }]
                    }
                });
</script>
@endsection
@endsection
