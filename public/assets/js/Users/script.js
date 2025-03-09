$(document).ready(function () {

   
    
    $('#BtnADDUser').on('click',function(e)
    {
        e.preventDefault();
        
        let formData = new FormData($('#FormAddUser')[0]);
        formData.append('_token', csrf_token);

        $('#BtnADDUser').prop('disabled', true).text('Enregistrement...');

        
        $.ajax({
            type: "POST",
            url: csrf_token,
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) 
            {
                $('#BtnADDUser').prop('disabled', false).text('Sauvegarder');
                if(response.status == 200)
                {
                    new AWN().success(response.message, {durations: {success: 5000}});
                    $('#ModalAddUser').modal('hide');
                    $('.TableUsers').DataTable().ajax.reload();
                    $('#FormAddUser')[0].reset();
                }  
                else if(response.status == 404)
                {
                    new AWN().warning(response.message, {durations: {warning: 5000}});
                }
                else if(response.status == 400)
                {
                    $('.validationAddUser').html("");
                    $('.validationAddUser').addClass('alert alert-danger');
                    $.each(response.errors, function(key, list_err) {
                        $('.validationAddUser').append('<li>' + list_err + '</li>');
                    });
    
                    setTimeout(() => {
                        $('.validationAddUser').fadeOut('slow', function() {
                            $(this).html("").removeClass('alert alert-danger').show();
                        });
                    }, 5000);
                }  
                else if (response.status == 404 || response.status == 500) {
                    new AWN().alert(response.message, { durations: { alert: 5000 } });
                }
            },
            error: function() {
                $('#BtnADDUser').prop('disabled', false).text('Sauvegarder');
                new AWN().alert("Une erreur est survenue, veuillez réessayer.", { durations: { alert: 5000 } });
            }
        });
    });
});