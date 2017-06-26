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
                data: 'playername',
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
            }, {
                data: null,
                className: 'right',
                orderable: false,
                render: function (data) {
                    var _status = '';
                    var _class = '';
                    if (data.status == 0) {
                        _status = 'claimed';
                        _class = 'class="label label-warning"';
                    } else if (data.status == 1) {
                        _status = 'valid';
                        _class = 'class="label label-success"';
                    } else {
                        _status = 'invalid';
                        _class = 'class="label label-danger"';
                    }
                    return '<a ' + _class + ' href="/admin/transaction/' + data.id + '">' + _status + '</a>'
                }
            }
        ],
        order: [6, 'ASC']
    });

    $('#valid-btn').click(function (event) {
        event.preventDefault();
        var _id = $(this).attr('data-id');
        $.ajax({
            url: '/admin/transaction/verify/' + _id,
            type: 'POST',
            headers: {'X-CSRF-TOKEN': token},
            cache: false,
            success: function (data) {
                if (data.status) {
                    successnotification(data.message);
                }
            }
        });
    });

    $(document).on('click', '#successmodalclose', function (event) {
        console.log('close');
        location.href = '/admin/transaction';
    });

    $('#invalid-btn').click(function (event) {
        event.preventDefault();
        var _id = $(this).attr('data-id');
        $.ajax({
            url: '/admin/transaction/invalid/' + _id,
            type: 'POST',
            headers: {'X-CSRF-TOKEN': token},
            cache: false,
            success: function (data) {
                if (data.status) {
                    successnotification(data.message);
                }
            }
        });
    });

});