jQuery(document).ready(function($) {
    $('#message')
        .on('focus', function() {
            if ($(this).hasClass('placeholder')) {
                $(this).removeClass('placeholder').html('&nbsp;');
            };
        })
        .on('blur', function() {
            if ($.trim($(this).length) == 0) {
                console.log($(this));
                $(this).text('Tell us a little about what you are looking for').addClass('placeholder');
            }
        });
    $('#contact').on('submit', function(e) {
        e.preventDefault();

        if ($.trim($('#message').length) < 5) {
            alert('Please tell us something nice');
            return false;
        }

        $('#send').attr('disabled', 'disabled').parent().append($('<div>').addClass('spinner'));

        var data = {
            'action': 'fr_send_email',
            'name': $('[name="name"]').val(),  
            'phone': $('[name="phone"]').val(),  
            'email': $('[name="email"]').val(),  
            'message': $('#message').val()
        }

       $.post(ajaxurl, data, function(response) {
            if (response) {
                $('.spinner').remove();
                $('#send').removeClass('sending').addClass('sent').text('Message sent');
            }
       });
    });
});
