/**
 * Created by David Bezalel Laoli on 6/11/2017.
 */

jQuery(document).ready(function () {

    var successnotification = function (message) {
        $('#successaddmessage').empty().append(message);
        $('#successmodal').modal();
    };

    var modalhide = function () {
        $('.modal').fadeOut('slow', function () {
            $(this).modal('hide');
        });
    };

    /* register */
    $('#registertrigger').click(function (e) {
        e.preventDefault();
        $('#registerform')[0].reset();
        $('.redalert').hide();
        $('#registermodal').modal();
    });

    $('#register').click(function () {
        $(this).button('loading');
        $('.redalert').hide();
        var _data = $('#registerform').serialize();
        var _token = $('meta[name=csrf-token]').attr("content");
        $.ajax({
            url: '/player/register',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': _token},
            data: _data,
            cache: false,
            processData: false,
            success: function (data) {
                if (!data.status) {
                    $('#register').button('reset');
                    $('.redalert').empty().append(data.message).show();
                } else {
                    modalhide();
                    successnotification(data.message);
                }
            }
        });
    });
});