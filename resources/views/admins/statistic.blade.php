@extends('layouts.master')

@section('content')
<!-- Charts -->

<div class="content content-full">
    <div class="block block-rounded block-mode-loading-oneui">
        <div class="block-header">
            <h3 class="block-title">Graphique de revenue</h3>
        </div>
        <div class="block block-content ">
            <div class="col-md-9">
                <figure>
                    <h1>Graphique de revenue par Mois</h1>
                    <div id="container"></div>
                </figure>
            </div>
        </div>
    </div>
</div>

@section('script')
<script src="{{ asset('assets/js/plugins/highcharts/highcharts.js') }}"></script>
<script src="{{ asset('assets/js/plugins/highcharts/modules/data.js') }}"></script>
<script src="{{ asset('assets/js/plugins/highcharts/modules/exporting.js') }}"></script>
<script src="{{ asset('assets/js/plugins/highcharts/modules/export-data.js') }}"></script>
<script src="{{ asset('assets/js/plugins/highcharts/modules/accessibility.js') }}"></script>
<script type="text/javascript">
    var data = <?php echo json_encode($data)?>;
                var year = new Date().getFullYear();
                Highcharts.chart('container', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: `revenue par mois, ${year}`
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
                        categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August',
                            'September', 'October', 'November', 'December'
                        ]
                    },
                    yAxis: {
                        title: {
                            text: 'Revenue'
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle'
                    },
                    credits:{
                        enabled:false
                    },
                    series: [{
                       name: 'Revenue',
                        data: data
                       
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
<style type="text/css">
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 310px;
        max-width: 900px;
        margin: 1em;
    }

    #container {
        height: 400px;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }
</style>
@endsection
<!-- END Charts -->
@endsection