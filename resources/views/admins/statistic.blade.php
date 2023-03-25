@extends('layouts.master')

@section('content')
<!-- Charts -->

<div class="content ">
    <div class="block block-rounded block-mode-loading-oneui">
        <div class="block-header">
            <h3 class="block-title">Nombre d'Operation par manager</h3>
        </div>
        <div class="block block-content ">
            <figure class="highcharts-figure">
                <h1>Nombre de resèrvation traitée par Manager</h1>
                <div id="container"></div>
            </figure>
        </div>
    </div>
</div> @section('script')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">
    var userData = <?php echo json_encode($userData)?>;
                var year = new Date().getFullYear();
                Highcharts.chart('container', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: `New User Growth, ${year}`
                    },
                    subtitle: {
                        text: 'Source: positronx.io'
                    },
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
                            text: 'Nombre d\'operation par Manager'
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle'
                    },
                    plotOptions: {
                        series: {
                            allowPointSelect: true,
                            borderWidth: 0,
                            dataLabels: {
                                enabled: true,
                                format: '{point.y}'
                            }
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> of total<br />'
                    },
                    series: [{
                       name: 'New Users',
                        data: userData
                        // name: 'Jane',
                        // data: [1, 0, 4,1, 0, 15,1, 0, 4,1, 0, 4]
                        // }, {
                        // name: 'John',
                        // data: [5, 7, 3]
                       
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
<!-- END Charts -->
@endsection