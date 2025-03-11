$(document).ready(function () 
{
    $(function ()
    {
        
        initializeDataTable('.Table_Product', ListOrigin);
        function initializeDataTable(selector, url)
        {
            var tableListOrigin = $(selector).DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: url,
                    dataSrc: function (json) {
                        if (json.data.length === 0) {
                            $('.paging_full_numbers').css('display', 'none');
                        }
                        return json.data;
                    }
                },
                columns:
                [

                    {data: 'name'            , name: 'name'},
                    {data: 'username'        , name: 'username'},
                    {data: 'created_at'            , name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}

                ],
                language: {
                    "sInfo": "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
                    "sInfoEmpty": "Affichage de l'élément 0 à 0 sur 0 élément",
                    "sInfoFiltered": "(filtré à partir de _MAX_ éléments au total)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ",",
                    "sLengthMenu": "Afficher _MENU_ éléments",
                    "sLoadingRecords": "Chargement...",
                    "sProcessing": "Traitement...",
                    "sSearch": "Rechercher :",
                    "sZeroRecords": "Aucun élément correspondant trouvé",
                    "oPaginate": {
                        "sFirst": "Premier",
                        "sLast": "Dernier",
                        "sNext": "Suivant",
                        "sPrevious": "Précédent"
                    },
                    "oAria": {
                        "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                        "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
                    },
                    "select": {
                        "rows": {
                            "_": "%d lignes sélectionnées",
                            "0": "Aucune ligne sélectionnée",
                            "1": "1 ligne sélectionnée"
                        }
                    }
                }
            });
            $(selector + ' tbody').on('click', '.editProduct', function(e)
            {
                e.preventDefault();
                $('#ModalEditProduct').modal("show");
                var id                 = $(this).attr('data-id');
                var name         = $(this).closest('tr').find('td:eq(0)').text();
                $('#TitleProdutctEdit').val(name);
                $('#EditProduct').attr('data-value',id);
                

            });

            $(selector + ' tbody').on('click', '.deleteCaisseVide', function(e) {
                e.preventDefault();
                let id = $(this).attr('data-id'); // جلب ID من الزر

                new AWN().confirm(
                    "Êtes-vous sûr de vouloir supprimer ?", 
                    function() {
                        $.ajax({
                            type: "POST",
                            url: DeleteCaisseVide, // الرابط
                            data: {
                                _token: csrf_token,
                                id: id
                            },
                            dataType: "json",
                            success: function(response) {
                                if (response.status == 200) {
                                    new AWN().success("Suppression effectuée avec succès !", { durations: { success: 5000 } });
                                    $('.Table_CaisseVide').DataTable().ajax.reload(); // إعادة تحميل الجدول
                                } else {
                                    new AWN().alert("Erreur : " + response.message, { durations: { alert: 5000 } });
                                }
                            },
                            error: function() {
                                new AWN().alert("Une erreur s'est produite, veuillez réessayer.", { durations: { alert: 5000 } });
                            }
                        });
                    }, 
                    function() {
                        new AWN().info("Suppression annulée");
                    },
                    {
                        labels: {
                            confirm: "Oui, Supprimer !",
                            cancel: "Annuler"
                        }
                    }
                );
            });
            


           
        }
    });


    $('#AddProduct').on('click',function (e) 
    {
        e.preventDefault();
        let formData = new FormData($('#FormAddProduct')[0]);
        formData.append('_token', csrf_token); 
        $('#AddProduct').prop('disabled', true).text('Enregistrement...');
        $.ajax({
            type    : "POST",
            url     : AddProduct,
            data    : formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) 
            {
                $('#AddProduct').prop('disabled', false).text('Sauvegarder');
                if(response.status == 200)
                {
                    new AWN().success(response.message, { durations: { success: 5000 } });
                    $('#ModalAddProduct').modal('hide');
                    $('.Table_Product').DataTable().ajax.reload();
                    $('#FormAddProduct')[0].reset();
                }
                else if (response.status == 400) 
                {
                    $('.ValidationAddProduct').html("").addClass('alert alert-danger');
                    $.each(response.errors, function(key, error) {
                        $('.ValidationAddProduct').append('<li>' + error + '</li>');
                    });
                    setTimeout(() => {
                        $('.ValidationAddProduct').fadeOut('slow', function() {
                            $(this).html("").removeClass('alert alert-danger').show();
                        });
                    }, 5000);
                }
                else if (response.status == 404 || response.status == 500) 
                {
                    new AWN().alert(response.message, { durations: { alert: 5000 } });
                }
            },
            error: function() {
                $('#AddProduct').prop('disabled', false).text('Sauvegarder');
                new AWN().alert("Une erreur est survenue, veuillez réessayer.", { durations: { alert: 5000 } });
            }
        });
    });  
    
    $('#EditProduct').on('click',function(e)
    {
        e.preventDefault();
        let formData = new FormData($('#FormEditProduct')[0]);
        formData.append('_token', csrf_token); 
        formData.append('id', $(this).attr('data-value')); 
        $('#EditProduct').prop('disabled', true).text('Enregistrement...');
        $.ajax({
            type    : "POST",
            url     : UpdateProduct,
            data    : formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) 
            {
                $('#EditProduct').prop('disabled', false).text('Sauvegarder');
                if(response.status == 200)
                {
                    new AWN().success(response.message, { durations: { success: 5000 } });
                    $('#ModalEditProduct').modal('hide');
                    $('.Table_Product').DataTable().ajax.reload();
                    $('#FormEditProduct')[0].reset();
                }
                else if (response.status == 400) 
                {
                    $('.ValidationEditProduct').html("").addClass('alert alert-danger');
                    $.each(response.errors, function(key, error) {
                        $('.ValidationEditProduct').append('<li>' + error + '</li>');
                    });
                    setTimeout(() => {
                        $('.ValidationEditProduct').fadeOut('slow', function() {
                            $(this).html("").removeClass('alert alert-danger').show();
                        });
                    }, 5000);
                }
                else if (response.status == 404 || response.status == 500) 
                {
                    new AWN().alert(response.message, { durations: { alert: 5000 } });
                }
            },
            error: function() {
                $('#EditProduct').prop('disabled', false).text('Sauvegarder');
                new AWN().alert("Une erreur est survenue, veuillez réessayer.", { durations: { alert: 5000 } });
            }
        });
    });
});