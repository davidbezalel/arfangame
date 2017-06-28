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
                    $('#transactionnotificationheader').text('You have ' + _data.length + ' transaction need to handled.');
                    $.each(_data, function (index, value) {
                        if (value.status == 0) {
                            var _li = '<li><a href="/admin/transaction/' + value.id + '">' + value.name + ' claim a transaction.</a></li>';
                        } else if (value.status == 3) {
                            var _li = '<li><a href="/admin/transaction/' + value.id + '">' + value.name + ' request for a cash withdrawal.</a></li>';
                        }
                        $('#transactionlist').append(_li);
                    });
                } else {
                    $('#transactionmenu').hide();
                }
            }
        }
    });
});