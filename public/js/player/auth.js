/**
 * Created by David Bezalel Laoli on 6/11/2017.
 */

jQuery(document).ready(function () {
    $('#registerform').submit(function (event) {
        event.preventDefault();
        $('#registerbtn').button('loading');
        $('#errorregister').hide();
        var _data = $(this).serialize();
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
                    $('#errorregister').empty().append(data.message).show();
                } else {
                    location.href ='/player/dashboard';
                }
                $('#registerbtn').button('reset');
            }
        });
    });

    $('#signinform').submit(function (event) {
        event.preventDefault();
        var _data = $(this).serialize();
        var _token = $('meta[name=csrf-token]').attr('content');
        $('#error').hide();
        $('#signinbtn').button('loading');
        $.ajax({
            url: '/player/login',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': _token},
            data: _data,
            cache: false,
            processData: false,
            success: function (data) {
                if (!data.status) {
                    $('#error').empty().append(data.message).show();
                } else {
                    location.href ='/player/deposit';
                }
                $('#signinbtn').button('reset');
            }
        });
    });
});