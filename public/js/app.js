$('body').on('click', '.deleteUser', function (event) {
    event.preventDefault();

    var me = $(this),
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
                success: function (response) {
                    Swal.fire({
                        title:'Supprimé!',
                        text:'Votre fichier a été supprimé.',
                        type:'success'
                    }).then(function () {
                        window.location = "/admin/users";
                    });
                },
                error: function (xhr) {
                    Swal.fire(
                        'Erreur',
                        'Something went wrong',
                        'error'
                    )
                }
            });
        }
    })
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