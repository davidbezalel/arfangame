/**
 * Created by David Bezalel Laoli on 6/11/2017.
 */

jQuery(document).ready(function () {
    var successnotification = function (message) {
        $('#successaddmessage').empty().append(message);
        $('#successmodal').modal();
    };
    var token = $('meta[name=csrf-token]').attr("content");

    var table = $('#transaction-table').DataTable({
        serverSide: true,
        lengthChange: true,
        ajax: {
            url: '/admin/transaction',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': token}
        },
        columns: [
            {
                data: 'no',
                className: 'no',
                orderable: false,
            }, {
                data: 'bank',
                orderable: false,
            }, {
                data: 'playerbank',
            }, {
                data: 'playeraccountno',
            }, {
                data: 'playeraccountname',
            }, {
                data: 'ammount',
                render: function (data) {
                    return '<span class="spandivided spandivided-left"">IDR. </span><span class="spandivided spandivided-right"">' + data.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + '</span>';
                }
            }, {
                data: 'date',
                className: 'right',
            }, {
                data: 'type',
                className: 'right',
                orderable: false,
                render: function (data) {
                    return data == 'D' ? 'K' : 'D';
                }
            }, {
                data: 'status',
                className: 'right',
                orderable: false,
                render: function (data) {
                    var _status = '';
                    if (data == 0) {
                        _status = 'claimed';
                    } else if (data == 1) {
                        _status = 'verified';
                    } else {
                        _status = 'un-verified';
                    }
                    return '<span class="label label-warning">' + _status + '</span>'
                }
            }
        ],
        order: [6, 'ASC']
    });
});