$(document).ready(function () {

    $(function () {
        if ($.fn.DataTable.isDataTable('.TableCategories')) {
            $('.TableCategories').DataTable().destroy();
        }
        initializeDataTable('.TableCategories', categories);
        
        function initializeDataTable(selector, url) {
            var tableCategories = $(selector).DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: url,
                    dataSrc: function (json) {
                        if (json.data.length === 0) {
                            $('.paging_full_numbers').css('display', 'none');
                        }
                        return json.data;
                    },
                    error: function(xhr, error, thrown) {
                        console.log('DataTables error: ' + error + ' ' + thrown);
                        console.log(xhr);
                    }
                },
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                language: {
                    "sInfo": "",
                    "sInfoEmpty": "Affichage de l'élément 0 à 0 sur 0 élément",
                    "sInfoFiltered": "(filtré à partir de _MAX_ éléments au total)",
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
                    }
                }
            });
            $(selector + ' tbody').on('click', '.editCategory', function(e)
            {
                e.preventDefault();
                $('#ModalEditCategory').modal("show");
                var IdCategory = $(this).attr('data-id');
                var name = $(this).closest('tr').find('td:eq(0)').text();
                $('#name').val(name);
                $('#BtnUpdateCategory').attr('data-value', IdCategory);
            });

            $(selector + ' tbody').on('click', '.deleteCategory', function(e)
            {
                e.preventDefault();
                var IdCategory = $(this).attr('data-id');
                let notifier = new AWN();

                let onOk = () => {
                    $.ajax({
                        type: "post",
                        url: DeleteCategory,
                        data: 
                        {
                            id: IdCategory,
                            _token: csrf_token,
                        },
                        dataType: "json",
                        success: function (response) 
                        {
                            if(response.status == 200)
                            {
                                new AWN().success(response.message, {durations: {success: 5000}});
                                $('.TableCategories').DataTable().ajax.reload();
                            }   
                            else if(response.status == 404)
                            {
                                new AWN().warning(response.message, {durations: {warning: 5000}});
                            }  
                        },
                        error: function() {
                            new AWN().alert("Une erreur est survenue, veuillez réessayer.", { durations: { alert: 5000 } });
                        }
                    });
                };

                let onCancel = () => {
                    notifier.info('Annulation de la suppression');
                };

                notifier.confirm(
                    'Êtes-vous sûr de vouloir supprimer cette catégorie ?',
                    onOk,
                    onCancel,
                    {
                        labels: {
                            confirm: 'Supprimer',
                            cancel: 'Annuler'
                        }
                    }
                );
            });
        }
    });
    
    $('#BtnAddCategory').on('click', function(e)
    {
        e.preventDefault();
        
        let formData = new FormData($('#FormAddCategory')[0]);
        formData.append('_token', csrf_token);

        $('#BtnAddCategory').prop('disabled', true).text('Enregistrement...');

        $.ajax({
            type: "POST",
            url: AddCategory,
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) 
            {
                $('#BtnAddCategory').prop('disabled', false).text('Sauvegarder');
                if(response.status == 200)
                {
                    new AWN().success(response.message, {durations: {success: 5000}});
                    $('#ModalAddCategory').modal('hide');
                    $('.TableCategories').DataTable().ajax.reload();
                    $('#FormAddCategory')[0].reset();
                }  
                else if(response.status == 404)
                {
                    new AWN().warning(response.message, {durations: {warning: 5000}});
                }
                else if(response.status == 400)
                {
                    $('.validationAddCategory').html("");
                    $('.validationAddCategory').addClass('alert alert-danger');
                    $.each(response.errors, function(key, list_err) {
                        $('.validationAddCategory').append('<li>' + list_err + '</li>');
                    });
    
                    setTimeout(() => {
                        $('.validationAddCategory').fadeOut('slow', function() {
                            $(this).html("").removeClass('alert alert-danger').show();
                        });
                    }, 5000);
                }  
                else if (response.status == 404 || response.status == 500) {
                    new AWN().alert(response.message, { durations: { alert: 5000 } });
                }
            },
            error: function() {
                $('#BtnAddCategory').prop('disabled', false).text('Sauvegarder');
                new AWN().alert("Une erreur est survenue, veuillez réessayer.", { durations: { alert: 5000 } });
            }
        });
    });

    $('#BtnUpdateCategory').on('click', function(e) {
        e.preventDefault();
        
        let formData = new FormData($('#FormUpdateCategory')[0]);
        formData.append('_token', csrf_token);
        formData.append('id', $(this).attr('data-value'));
       
        $('#BtnUpdateCategory').prop('disabled', true).text('Mise à jour...');
    
        $.ajax({
            type: "POST",
            url: UpdateCategory,
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function(response) {
                $('#BtnUpdateCategory').prop('disabled', false).text('Mettre à jour');
                if (response.status == 200) {
                    new AWN().success(response.message, {durations: {success: 5000}});
                    $('#ModalEditCategory').modal('hide');
                    $('.TableCategories').DataTable().ajax.reload();
                }  
                else if (response.status == 404) {
                    new AWN().warning(response.message, {durations: {warning: 5000}});
                }
                else if (response.status == 400) {
                    $('.validationEditCategory').html("");
                    $('.validationEditCategory').addClass('alert alert-danger');
                    $.each(response.errors, function(key, list_err) {
                        $('.validationEditCategory').append('<li>' + list_err + '</li>');
                    });
    
                    setTimeout(() => {
                        $('.validationEditCategory').fadeOut('slow', function() {
                            $(this).html("").removeClass('alert alert-danger').show();
                        });
                    }, 5000);
                }  
                else if (response.status == 500) {
                    new AWN().alert(response.message, { durations: { alert: 5000 } });
                }
            },
            error: function() {
                $('#BtnUpdateCategory').prop('disabled', false).text('Mettre à jour');
                new AWN().alert("Une erreur est survenue, veuillez réessayer.", { durations: { alert: 5000 } });
            }
        });
    });
    
});