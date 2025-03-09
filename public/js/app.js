// var rowIdx = 1;
// $("#addBtn").on("click", function () {
//     // Adding a row inside the tbody.
//     $("#tableEstimate tbody").append(`
//             <tr id="R${++rowIdx}">
//             <td class="row-index text-center"><p> ${rowIdx}</p></td>
//             <td><input class="form-control" type="text" style="min-width:150px" id="item" name="item[]"></td>
//             <td><input class="form-control" type="text" style="min-width:150px" id="description" name="description[]"></td>
//             <td><input class="form-control unit_price" style="width:100px" type="text" id="unit_cost" name="unit_cost[]"></td>
//             <td><input class="form-control qty" style="width:80px" type="text" id="qty" name="qty[]"></td>
//             <td><input class="form-control total" style="width:120px" type="text" id="amount" name="amount[]" value="0" readonly></td>
//             <td><a href="javascript:void(0)" class="text-danger font-18 remove" title="Remove"><i class="fa fa-trash"></i></a></td>
//             </tr>`);
// });
// $("#tableEstimate tbody").on("click", ".remove", function () {
//     // Getting all the rows next to the row
//     // containing the clicked button
//     var child = $(this).closest("tr").nextAll();
//     // Iterating across all the rows
//     // obtained to change the index
//     child.each(function () {
//         // Getting <tr> id.
//         var id = $(this).attr("id");

//         // Getting the <p> inside the .row-index class.
//         var idx = $(this).children(".row-index").children("p");

//         // Gets the row number from <tr> id.
//         var dig = parseInt(id.substring(1));

//         // Modifying row index.
//         idx.html(`${dig - 1}`);

//         //   Modifying row id.
//         $(this).attr("id", `R${dig - 1}`);
//     });

//     // Removing the current row.
//     $(this).closest("tr").remove();

//     // Decreasing total number of rows by 1.
//     rowIdx--;
// });

// $("#tableEstimate tbody").on("input", ".unit_price", function () {
//     var unit_price = parseFloat($(this).val());
//     var qty = parseFloat($(this).closest("tr").find(".qty").val());
//     var total = $(this).closest("tr").find(".total");
//     total.val(unit_price * qty);

//     calc_total();
// });

// $("#tableEstimate tbody").on("input", ".qty", function () {
//     var qty = parseFloat($(this).val());
//     var unit_price = parseFloat($(this).closest("tr").find(".unit_price").val());
//     var total = $(this).closest("tr").find(".total");
//     total.val(unit_price * qty);
//     calc_total();
// });

// function calc_total() {
//     var sum = 0;
//     $(".total").each(function () {
//         sum += parseFloat($(this).val());
//         console.log('sum_:', sum);
//     });
//     $(".subtotal").text(sum);

//     var amounts = sum;
//     var tax = 100;
//     $(document).on("change keyup blur", "#qty", "#unit_price", function () {
//         var qty = $("#qty").val();
//         var unit_price = $(".unit_price").val();
//         var tva = $("#tax").val();
//         var amount = qty * unit_price;
//         var sum_amount = sum;
//         var discount = $(".discount").val();

//         // console.log('sum_amount:', sum);
//         console.log('amount:', amount);
//         console.log('tva:', tva);
//         console.log('sum_amount:', sum);
//         console.log('discount:', discount);

//         $("#amount").val(amount);
//         $("#sum_total").val(sum_amount);
//         $("#tax_1").val((sum_amount * qty) / tax);
//         $("#grand_total").val((parseInt(sum_amount)) - (parseInt(discount)));
//     });
// }

/**
 * auto refresh notification count and Dropdown
 */
function fetchNotificationsCount() {
    $.ajax({
        // url: "{{ route('notifications.count') }}",
        url: '/notifications/count',
        type: 'GET',
        success: function (data) {
            $('#notif .badge').text(data.count);
            // console.log('récupération des notifications.'+ data.count);
        },
        error: function() {
            console.log('Erreur lors de la récupération des notifications.');
        }
    });
}
// Appel initial pour charger les notifications au chargement de la page
fetchNotificationsCount();

// Appel périodique pour rafraîchir les notifications toutes les X secondes
setInterval(fetchNotificationsCount, 30000); // Toutes les 30 secondes


//sweetalert confirm dialog
jQuery('.confirmAlert').on('click', e => {
    //toast.fire('Success', 'Everything was updated perfectly!', 'success');
    Swal.fire({
        title: 'success!',
        text: 'Operation effectuer avec succès!',
        type: 'success'
    })
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
                        title: 'Supprimé!',
                        text: 'Votre fichier a été supprimé.',
                        type: 'success'
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
                        title: 'Supprimé!',
                        text: 'Votre fichier a été supprimé.',
                        type: 'success'
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
//Admin cars delete
$(document).on('click', '.deleteCar', function (event) {
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
                url: '/admin/cars/' + id,
                type: 'POST',
                data: {
                    _method: 'DELETE',
                    _token: token,
                },
                success: function () {
                    Swal.fire({
                        title: 'Supprimé!',
                        text: 'Votre fichier a été supprimé.',
                        type: 'success'
                    }).then(function () {
                        window.location = "/admin/cars";
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
                        title: 'Supprimé!',
                        text: 'Votre reservation a été supprimé avec succes.',
                        type: 'success'
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
jQuery(function () {
    One.helpers('notify');
});

//magnific galery poppup
jQuery(function () {
    One.helpers('magnific-popup');
});
//flatpicker date
jQuery(function () {
    One.helpers(['flatpickr', 'datepicker']);
});
//Page JS Helpers (Select2 plugin)
jQuery(function () {
    One.helpers('select2');
});
//Page JS Helpers (carousel)
jQuery(function () {
    One.helpers('slick');
});


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
