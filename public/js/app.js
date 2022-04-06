//sweetalert confirm dialog
jQuery('.confirmAlert').on('click', e => {
    //toast.fire('Success', 'Everything was updated perfectly!', 'success');
    Swal.fire({
        title:'success!',
        text:'Operation effectuer avec succès!',
        type:'success'
    })
});

// disponibilite toggle-button
$(function () {
    $('toggle-class').change(function(){
        var status = $(this).prop('checked') === true ? 0 : 1;
        var voiture_id = $(this).data('id');
            $.ajax({
                type: 'GET',
                dataType:'json',
                url:'/manager/voiture',
                data:{'status':status, 'voiture_id':voiture_id},
                success:function (data) {
                    console.log('success')
                }
            });
        });
});

//user delete
$(document).on('click', '.deleteUser', function (event) {
    event.preventDefault();

    let me = $(this),
        id = me.attr('data-id'),
        token = $("meta[name='csrf-token']").attr("content");

    Swal.fire({
        title: 'Êtes-vous sûr?',
        text: 'Vous ne pourrez pas revenir sur cela!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, supprimez-le!',
        cancelButtonText: 'Annuler'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: '/admin/users/' + id,
                type: 'POST',
                data: {
                    _method: 'DELETE',
                    _token: token,
                },
                success: function () {
                    Swal.fire({
                        title:'Supprimé!',
                        text:'Votre fichier a été supprimé.',
                        type:'success'
                    }).then(function () {
                        window.location = "/admin/users";
                    });
                },
                error: function () {
                    Swal.fire(
                        'Erreur',
                        'un probleme est survenu',
                        'error'
                    )
                }
            });
        }
    })
});

    //voiture delete
$(document).on('click', '.deleteVoiture', function (event) {
    event.preventDefault();

    let me = $(this),
        id = me.attr('data-id'),
        token = $("meta[name='csrf-token']").attr("content");

    Swal.fire({
        title: 'Êtes-vous sûr?',
        text: 'Vous ne pourrez pas revenir sur cela!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, supprimez-le!',
        cancelButtonText: 'Annuler'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: '/manager/voitures/' + id,
                type: 'POST',
                data: {
                    _method: 'DELETE',
                    _token: token,
                },
                success: function () {
                    Swal.fire({
                        title:'Supprimé!',
                        text:'Votre fichier a été supprimé.',
                        type:'success'
                    }).then(function () {
                        window.location = "/manager/voitures";
                    });
                },
                error: function () {
                    Swal.fire(
                        'Erreur',
                        'un probleme est survenu',
                        'error'
                    )
                }
            });
        }
    })
});

    //booking delete
    $(document).on('click', '.deleteBooking', function (event) {
        event.preventDefault();

        let me = $(this),
            id = me.attr('data-id'),
            token = $("meta[name='csrf-token']").attr("content");

        Swal.fire({
            title: 'Êtes-vous sûr?',
            text: 'Vous ne pourrez pas revenir sur cela!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, supprimez-le!',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '/client/bookings/' + id,
                    type: 'POST',
                    data: {
                        _method: 'DELETE',
                        _token: token,
                    },
                    success: function () {
                        Swal.fire({
                            title:'Supprimé!',
                            text:'Votre reservation a été supprimé avec succes.',
                            type:'success'
                        }).then(function () {
                            window.location = "/client/bookings";
                        });
                    },
                    error: function () {
                        Swal.fire(
                            'Erreur',
                            'un probleme est survenu',
                            'error'
                        )
                    }
                });
            }
        })
    });
    //bootstrap notification
jQuery(function(){ One.helpers('notify'); });

    //magnific galery poppup
jQuery(function(){ One.helpers('magnific-popup'); });
    //flatpicker date
jQuery(function(){ One.helpers('flatpickr'); });
    //Page JS Helpers (Select2 plugin)
    jQuery(function(){ One.helpers('select2'); });
//Page JS Helpers (carousel)
jQuery(function(){ One.helpers('slick'); });

(function ($) {

    let charts = {
        init: function () {
            //--set default font familly and font color
            Chart.defaults.global.defaultFontStyle = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#999999';
            Chart.defaults.global.defaultFontStyle              = '600';
            Chart.defaults.scale.gridLines.color                = "rgba(0,0,0,.05)";
            Chart.defaults.scale.gridLines.zeroLineColor        = "rgba(0,0,0,.1)";
            Chart.defaults.scale.ticks.beginAtZero              = true;
            Chart.defaults.scale.ticks.stepSize                 = 5;

            this.ajaxGetUserMonthlyData();
            this.ajaxGetReservMonthlyData();
            //charts.createCompletedJobsChart();

        },

        ajaxGetUserMonthlyData: function () {
            let urlPath =  '/userChartData';
            let request = $.ajax( {
                method: 'GET',
                url: urlPath
            } );

            request.done( function ( response ) {
                console.log( response );
                charts.createCompletedJobsChart( response );
            });
        },

        ajaxGetReservMonthlyData: function () {
            let urlPath = '/reservChartData';
            let request = $.ajax({
                method: 'GET',
                url: urlPath
            });

            request.done(function (response) {
                console.log( response );
                charts.createCompletedJobsChart(response);
            });
        },

        /**
         * Create the complete jobs chart
         */
        createCompletedJobsChart: function(response) {

            //let ctx = document.getElementById("myUserAreaChart");
            /*let myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: response.months, //the response get from ajax
                    datasets: [{
                        label: "Cette annees",
                        backgroundColor: 'rgba(171, 227, 125, .3)',
                        borderColor: 'rgba(171, 227, 125, 1)',
                        pointRadius: 5,
                        pointBackgroundColor: 'rgba(171, 227, 125, 1)',
                        pointBorderColor: '#fff',
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: '#fff',
                        pointHitRadius: 20,
                        pointBorderWidth: 2,
                        pointHoverBorderColor: 'rgba(171, 227, 125, 1)',
                        data: response.user_count_data // The response got from the ajax request containing data for the completed jobs in the corresponding months
                    }],
                },
                option: {
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'date'
                            },
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                maxTicksLimit: 7
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                min: 0,
                                max: response.max, // The response got from the ajax request containing max limit for y axis
                                //maxTicksLimit: 5
                            },
                            gridLines: {
                                color: "rgba(0, 0, 0, .125)",
                            }
                        }],
                    },
                    legend: {
                        display: false
                    }
                }
            });*/

            // Get Chart Containers
            let chartLinesCon  = jQuery('.myUserAreaChart');
            let chartBarsCon  = jQuery('.myBookingAreaChart');

            // Set Chart and Chart Data variables
            let userChartLinesBarsRadarData, bookingChartLinesBarsRadarData;

            // Lines/Bar/Radar Chart Data
            userChartLinesBarsRadarData = {
                labels: response.months, //['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN'],
                datasets: [
                    {
                        label: 'Utilisateurs',
                        fill: true,
                        backgroundColor: 'rgba(220,220,220,0.3)',
                        borderColor: 'rgba(220,220,220,1)',
                        pointBackgroundColor: 'rgba(220,220,220,1)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgba(220,220,220,1)',
                        data: response.userCountData //[30, 32, 40, 45, 43, 38, 55]
                    }
                ]
            };

            // Lines/Bar/Radar Chart Data
            bookingChartLinesBarsRadarData = {
                labels: response.months, //['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN'],
                datasets: [
                    {
                        label: 'Reservations',
                        fill: true,
                        backgroundColor: 'rgba(171,227,125,0.3)',
                        borderColor: 'rgba(171, 227, 125, 1)',
                        pointBackgroundColor: 'rgba(171, 227, 125, 1)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgba(171, 227, 125, 1)',
                        data: response.reservCountData //[30, 32, 40, 45, 43, 38, 55]
                    }
                ]
            };

            // Init Charts
            if (chartLinesCon.length) {
                new Chart(chartLinesCon, {type: 'line', data: userChartLinesBarsRadarData});
            }

            if (chartBarsCon.length) {
                new Chart(chartBarsCon, {type: 'bar', data: bookingChartLinesBarsRadarData});
            }
        }
    };

    charts.init();

})(jQuery);

// $('.btnUpdate').click(function (event) {
//     event.preventDefault();

//     var me = $(this),
//         url = me.attr('action'),
//         token = $("meta[name='csrf-token']").attr("content");

//     $.ajax({
//         url: url,
//         type: 'POST',
//         data: {
//             _method: 'PUT',
//             _token: token,
//         },
//         success: function (response) {
//             Swal.fire({
//                 title: 'Modification',
//                 text: 'Votre fichier a été modifie avec success.',
//                 type: 'success'
//             }).then(function () {
//                 window.location = "/admin/users";
//             });
//         },
//         error: function (xhr) {
//             var res = xhr.responseJSON;
//             Swal.fire(
//                 'Erreur',
//                 'Something went wrong' + res,
//                 'error'
//             )
//         }
//     })
// })
