$(document).ready(function () {
    // Variable for storing the DataTable instance
    let tableInstance;

    // Function to initialize the DataTable
    function initializeDataTable(selector, url, idclient) {
        // Destroy the existing DataTable instance if it exists
        if ($.fn.DataTable.isDataTable(selector)) {
            $(selector).DataTable().clear().destroy();
        }

        // Initialize a new DataTable instance
        tableInstance = $(selector).DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: url,
                data: function (d) {
                    d.idclient = idclient;
                },
                dataSrc: function (json) {
                    // Hide the pagination when no data is available
                    if (json.data.length === 0) {
                        $('.paging_full_numbers').hide();
                    }
                    return json.data;
                }
            },
            columns: [
                {
                    data: 'cin', 
                    name: 'cin', 
                    className: 'text-nowrap'
                },
                {
                    data: 'matricule', 
                    name: 'matricule', 
                    className: 'text-nowrap'
                },
                {
                    data: 'livreur', 
                    name: 'livreur', 
                    className: 'text-nowrap'
                },
                {
                    data: 'name', 
                    name: 'name', 
                    className: 'text-nowrap'
                },
                {
                    data: 'name_client', 
                    name: 'name_client', 
                    className: 'text-nowrap'
                },
                {
                    data: 'total_quantity', 
                    name: 'total_quantity', 
                    className: 'text-nowrap text-end'
                },
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: false, 
                    searchable: false,
                    className: 'text-nowrap'
                }
                
            ],
            drawCallback: function(settings) {
                var api = this.api();
                var total = api.column(5, { page: 'current' }).data().reduce(function(a, b) {
                    return parseFloat(a) + parseFloat(b);
                }, 0);

                $('#total_quantity_footer').html(total);
            },
            language: {
                "sInfo": "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
                "sInfoEmpty": "Affichage de l'élément 0 à 0 sur 0 élément",
                "sInfoFiltered": "(filtré à partir de _MAX_ éléments au total)",
                "sLengthMenu": "Afficher _MENU_ éléments",
                "sLoadingRecords": "Chargement...",
                "sProcessing": "Traitement...",
                "sSearch": "Rechercher :",
                "sZeroRecords": "Aucun élément correspondant trouvé",
                "oPaginate": { "sFirst": "Premier", "sLast": "Dernier", "sNext": "Suivant", "sPrevious": "Précédent" },
                "select": { "rows": { "_": "%d lignes sélectionnées", "0": "Aucune ligne sélectionnée", "1": "1 ligne sélectionnée" } }
            }
        });
        $(selector + ' tbody').on('click', '.delete_tmp_machandise_entree', function(e)
        {
            e.preventDefault();
            let name_product = $(this).closest('tr').find('td:eq(3)').text();
            $.ajax({
                type    : "post",
                url     : TrashTmpMarchandiseEntreByProduct,
                data: 
                {
                    name_product : name_product
                },
                dataType: "json",
                success: function (response) 
                {
                    if(response.status == 200){

                    }    
                }
            });
        });
    }

    // Initial load of DataTable for the first time with idclient value
    let idclient = $('#idclient').val();
    initializeDataTable('.Table_Tmp_Marchandis_Entree', GetDataTmpMarchandiseEntree, idclient);

    // Reload DataTable when idclient changes
    $('#idclient').on('change', function () {
        idclient = $(this).val();
        initializeDataTable('.Table_Tmp_Marchandis_Entree', GetDataTmpMarchandiseEntree, idclient);
    });

    // Handling the 'AddInTmpMarchandiseEntree' click event
    $('#AddInTmpMarchandiseEntree').on('click', function (e) {
        e.preventDefault();
        
        // Collect the form data
        let formData = new FormData($('#FormAddMarchandiseEntree')[0]);
        formData.append('_token', csrf_token);

        // Disable the button and change its text while processing
        $('#AddInTmpMarchandiseEntree').prop('disabled', true).text('Enregistrement...');

        // Make the AJAX request
        $.ajax({
            type: "POST",
            url: AddProduitInTmpMarchandiseEntree,
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) {
                // Re-enable the button after processing
                $('#AddInTmpMarchandiseEntree').prop('disabled', false).text('Ajouter le produit');
                
                if (response.status == 200) {
                    // Show success notification
                    new AWN().success(response.message, { durations: { success: 5000 } });

                    // Clear the table and reinitialize it with updated data
                    $('#Table_Tmp_Marchandis_Entree').DataTable().clear().destroy();  // Destroy the old DataTable instance
                    initializeDataTable('.Table_Tmp_Marchandis_Entree', GetDataTmpMarchandiseEntree, idclient); // Reinitialize with new data

                    // Reset the form
                    $('#FormAddMarchandiseEntree')[0].reset();
                } else if (response.status == 400) {
                    // Display validation errors if any
                    $('.ValidationMarchandiseEntree').html("").addClass('alert alert-danger');
                    $.each(response.errors, function (key, error) {
                        $('.ValidationMarchandiseEntree').append('<li>' + error + '</li>');
                    });

                    // Hide the validation message after 5 seconds
                    setTimeout(() => {
                        $('.ValidationMarchandiseEntree').fadeOut('slow', function () {
                            $(this).html("").removeClass('alert alert-danger').show();
                        });
                    }, 5000);
                } else if (response.status == 404 || response.status == 500) {
                    // Show alert if status is 404 or 500
                    new AWN().alert(response.message, { durations: { alert: 5000 } });
                }
            },
            error: function () {
                // Handle any AJAX errors
                $('#AddInTmpMarchandiseEntree').prop('disabled', false).text('Ajouter le produit');
                new AWN().alert("Une erreur est survenue, veuillez réessayer.", { durations: { alert: 5000 } });
            }
        });
    });
});
