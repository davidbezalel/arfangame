/**
 * Created by David Bezalel Laoli on 6/11/2017.
 */

jQuery(document).ready(function () {
    $('#login').submit(function (event) {
        event.preventDefault();
        console.log('testing');
        $('#error').hide();
        $('#btn-login').button('loading');
        var data = $(this).serialize();
        var token = $('meta[name=csrf-token]').attr("content");
        console.log(token);
        $.ajax({
            url: '/admin/login',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': token},
            data: data,
            cache: false,
            processData: false,
            success: function (data) {
                if (!data.status) {
                    $('#btn-login').button('reset');
                    $('#error').text(data.message).show();
                } else {
                    location.href = '/admin/dashboard';
                }
            }
        });
    });

    $('#register').submit(function (event) {
        event.preventDefault();
        $('#btn-register').button('loading');
        $('#error').hide();
        var data = $(this).serialize();
        var token = $('meta[name=csrf-token]').attr("content");
        $.ajax({
            url: '/admin/register',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': token},
            data: data,
            cache: false,
            processData: false,
            success: function (data) {
                if (!data.status) {
                    $('#btn-register').button('reset');
                    $('#error').text(data.message).show();
                } else {
                    location.href = '/admin/login';
                }
            }
        });
    });
});