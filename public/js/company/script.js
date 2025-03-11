$(document).ready(function () {
    
        
  
    



    // fetch data company
    
    $(function ()
    {
        /* if ($.fn.DataTable.isDataTable(selector)) {
            $(selector).DataTable().destroy();
        } */
        initializeDataTable('.Table_Company', company);
        function initializeDataTable(selector, url)
        {
            var tablecCompany = $(selector).DataTable({
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

                    {data: 'name'             , name: 'name'},
                    {data: 'status'             , name: 'status'},
                    {data: 'nameuser'        , name: 'nameuser'},
                    {data: 'created_at'     , name: 'created_at'},
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
            $(selector + ' tbody').on('click', '.editCompany', function(e)
            {
                e.preventDefault();
                var IdcCompany   = $(this).attr('data-id');
                var nameCompany  = $(this).closest('tr').find('td:eq(0)').text();
                var statusCompany  = $(this).closest('tr').find('td:eq(1)').text();
                var isActive = statusCompany === 'Active' ? 1 : 0;
                $('#nameCompanyEdit').val(nameCompany);
                $('#statusCompanyEdit').val(isActive);
                $('#EditCompany').attr('data-value',IdcCompany);
                

            });

            /* $(selector + ' tbody').on('click', '.trash', function(e)
            {
                e.preventDefault();
                var IdCharge  = $(this).attr('value');
                swal({
                    title: "es-tu sûr de supprimer cette charge",
                    text: "Une fois supprimée, vous ne pourrez plus récupérer cette charge !",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete)
                    {
                        var data =
                        {
                            'id'         : IdCharge,
                            '_token'     : csrf_token,
                        };
                        $.ajax({
                            type: "post",
                            url: TrashCharge,
                            data: data,

                            dataType: "json",
                            success: function (response)
                            {
                                if(response.status == 200)
                                {
                                    swal("Votre charge a été supprimée !", {
                                        icon: "success",
                                    });
                                    $('.TableCharge').DataTable().ajax.reload();
                                }
                                else if(response.status ==400)
                                {
                                    swal("Oops !", response.message, "error");
                                }
                                else if(response.status ==404)
                                {
                                    swal("Oops !", response.message, "error");
                                }
                            }
                        });

                    }
                    else
                    {
                        swal("Votre charge est sécurisée !");
                    }
                    });
            });

            $(selector + ' tbody').on('click', '.ChangeDate', function(e)
            {
                e.preventDefault();
                var idcharge = $(this).attr('value');
                $('#idCharge').val(idcharge);
                $('#ModelChargeEditDate').modal('show');
            }); */

        }
    });
        
   
    // Add Company 
    $('#AddCompany').on('click',function(e) {
        e.preventDefault(); // هذه السطر مهم لمنع الإرسال الافتراضي للنموذج.
        
        let nameCompany = $('#nameCompany').val();
        let statusCompany = $('#statusCompany').val();
        $.ajax({
            type: "post",
            url: AddCompany,
            data: {
                'name': nameCompany,
                'status': statusCompany,
                '_token': csrf_token,
            },
            dataType: "json",
            success: function(response) {
                if(response.status == 200) {
                    new AWN().success(response.message, {durations: {success: 5000}});
                    $('#ModalAddCompany').modal('hide');
                    $('.Table_Company').DataTable().ajax.reload();
                    // هنا يمكن تحديث الجدول أو البيانات المعروضة.
                } else if(response.status == 400) {
                    $('.ValidationAddCompany').html("");
                    $('.ValidationAddCompany').addClass('alert alert-danger');
                    $.each(response.errors, function(key, list_err) {
                        $('.ValidationAddCompany').append('<li>' + list_err + '</li>');
                    });
    
                    setTimeout(() => {
                        $('.ValidationAddCompany').fadeOut('slow', function() {
                            $(this).html("").removeClass('alert alert-danger').show();
                        });
                    }, 5000);
                }    
            }
        });
    }); // end Add company


    // Edit Company

    $('#EditCompany').on('click',function(e)
    {
        e.preventDefault();
        var data =
        {
            'name'          : $('#nameCompanyEdit').val(),
            '_token'        : csrf_token,
            'status'         : $('#statusCompanyEdit').val(),
            'id'            : $(this).attr('data-value'),

        };

        $.ajax({
            type: "post",
            url: UpdateCompany,
            data: data,
            dataType: "json",
            success: function (response)
            {

                if(response.status == 200)
                {
                    new AWN().success(response.message, {durations: {success: 0}});
                    $('.ValidationAddCompany').html("");
                    $('#ModalEditCompany').modal("hide");
                    $('.Table_Company').DataTable().ajax.reload();
                }
                else if(response.status == 422)
                {
                    $('.ValidationAddCompany').html("");
                    $('.ValidationAddCompany').addClass('alert alert-danger');
                    $.each(response.errors, function(key, list_err) {
                        $('.ValidationAddCompany').append('<li>' + list_err + '</li>');
                    });
    
                    setTimeout(() => {
                        $('.ValidationAddCompany').fadeOut('slow', function() {
                            $(this).html("").removeClass('alert alert-danger').show();
                        });
                    }, 5000);
                }
                else if(response.status == 404)
                {
                    new AWN().warning(response.message, {durations: {warning: 5000}})
                    /* setTimeout(() => {
                        
                    }, 5000); */
                    
                }
            }
        });
    });
    



    

    
});