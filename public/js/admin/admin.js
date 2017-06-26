/**
 * Created by David Bezalel Laoli on 6/11/2017.
 */

jQuery(document).ready(function () {
    var token = $('meta[name=csrf-token]').attr('content');
    $.ajax({
        url: '/admin/notification/transaction',
        type: 'POST',
        headers: {'X-CSRF-TOKEN': token},
        cache: false,
        success: function (data) {
            if (data.status) {
                var _data = data.data;
                if (_data.length > 0) {
                    $('#transactionnotificationcount').text(_data.length);
                    $('#transactionnotificationheader').text('You have ' + _data.length + ' claimed transaction need to verify.');
                    $.each(_data, function (index, value) {
                        var _li = '<li><a href="/admin/transaction/' + value.id + '">' + value.name + ' claim a transaction.</a></li>';
                        $('#transactionlist').append(_li);
                    });
                } else {
                    $('#transactionmenu').hide();
                }
            }
        }
    });
});