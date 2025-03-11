$(document).ready(function () 
{
    $(function ()
    {
        
        initializeDataTable('.Table_CaisseVide', caissesortie);
        function initializeDataTable(selector, url)
        {
            var tableLiveur = $(selector).DataTable({
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

                    {data: 'number_box'            , name: 'number_box'},
                    {data: 'cumul'                 , name: 'cumul'},
                    {data: 'cin'                   , name: 'cin'},
                    {data: 'matricule'             , name: 'matricule'},
                    {data: 'namelivreur'           , name: 'namelivreur'},
                    {data: 'client_name'           , name: 'client_name'},
                    {data: 'name'                  , name: 'name'},
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
            $(selector + ' tbody').on('click', '.editCaisseVide', function(e)
            {
                e.preventDefault();
                $('#ModalEditCaisseVide').modal("show");
                var id                 = $(this).attr('data-id');
                var idclient           = $(this).attr('data-client');
                var idlivreur          = $(this).attr('data-livreur');
                var number_box         = $(this).closest('tr').find('td:eq(0)').text();
               
                
                
                $('#idclientEdit').val(idclient);
                $('#idlivreurEdit').val(idlivreur);
                $('#number_boxEdit').val(number_box);
               
                $('#UpdateCaisseVides').attr('data-value',id);
                

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

    $(document).on('input', 'input[name="number_box"]', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    $('#AddCaisseVides').on('click',function(e)
    {
        e.preventDefault();
        let formData = new FormData($('#FormAddCaisseVide')[0]);
        formData.append('_token', csrf_token); 
       
        $('#AddCaisseVides').prop('disabled', true).text('Enregistrement...');
       
        $.ajax({
            type    : "POST",
            url     : AddCaisseVides,
            data    : formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) 
            {
                $('#AddCaisseVides').prop('disabled', false).text('Sauvegarder');
                if(response.status == 200)
                {
                    new AWN().success(response.message, { durations: { success: 5000 } });
                    $('#ModalAddCaisseSortie').modal('hide');
                    $('.Table_CaisseVide').DataTable().ajax.reload();
                    $('#FormAddClient')[0].reset();
                }
                else if (response.status == 400) 
                {
                    $('.ValidationAddCaisseVide').html("").addClass('alert alert-danger');
                    $.each(response.errors, function(key, error) {
                        $('.ValidationAddCaisseVide').append('<li>' + error + '</li>');
                    });
                    setTimeout(() => {
                        $('.ValidationAddCaisseVide').fadeOut('slow', function() {
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
                $('#AddCaisseVides').prop('disabled', false).text('Sauvegarder');
                new AWN().alert("Une erreur est survenue, veuillez réessayer.", { durations: { alert: 5000 } });
            }
        });
    });


    $('#UpdateCaisseVides').on('click', function(e) {
        e.preventDefault();
        let formData = new FormData($('#FormCaisseVidesUpdate')[0]);
        formData.append('_token', csrf_token);
        formData.append('id',$(this).attr('data-value'));
        $('#UpdateCaisseVides').prop('disabled', true).text('Mise à jour...');
    
        $.ajax({
            type: "POST",
            url: UpdateCaisseVide,
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function(response) {
                $('#UpdateCaisseVides').prop('disabled', false).text('Modifier');
    
                if (response.status == 200) {
                    new AWN().success(response.message, { durations: { success: 5000 } });
                    $('#ModalEditCaisseVide').modal('hide'); // إخفاء المودال
                    $('.Table_CaisseVide').DataTable().ajax.reload(); // إعادة تحميل الجدول
                    $('#FormCaisseVidesUpdate')[0].reset(); // تفريغ الفورم
                }
                else if (response.status == 400) {
                    $('.ValidationUpdateCaisseVide').html("").addClass('alert alert-danger');
                    $.each(response.errors, function(key, error) {
                        $('.ValidationUpdateCaisseVide').append('<li>' + error + '</li>');
                    });
    
                    setTimeout(() => {
                        $('.ValidationUpdateCaisseVide').fadeOut('slow', function() {
                            $(this).html("").removeClass('alert alert-danger').show();
                        });
                    }, 5000);
                }
                else if (response.status == 404 || response.status == 500) {
                    new AWN().alert(response.message, { durations: { alert: 5000 } });
                }
            },
            error: function() {
                $('#UpdateCaisseVides').prop('disabled', false).text('Modifier');
                new AWN().alert("Une erreur est survenue, veuillez réessayer.", { durations: { alert: 5000 } });
            }
        });
    });
    
});