jQuery(document).ready(function($) {
    $('#contact').on('submit', function(e) {
        e.preventDefault();

        $('#send').attr('disabled', 'disabled').parent().append($('<div>').addClass('spinner'));

        var data = {
            'action': 'fr_send_email',
            'name': $('[name="name"]').val(),  
            'phone': $('[name="phone"]').val(),  
            'email': $('[name="email"]').val(),  
            'company': $('[name="company"]').val(),  
            'website': $('[name="website"]').val(),  
        }

       $.post(ajaxurl, data, function(response) {
            if (response) {
                $('.spinner').remove();
                $('#send').text('Votre message a bien été envoyé').addClass('sent');
            }
       });
    });
});
