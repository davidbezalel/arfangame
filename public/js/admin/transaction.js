/**
 * Created by David Bezalel Laoli on 6/11/2017.
 */

jQuery(document).ready(function () {
    var successnotification = function (message) {
        $('#successaddmessage').empty().append(message);
        $('#successmodal').modal();
    };
    var token = $('meta[name=csrf-token]').attr("content");

    $.ajax({
        url: '/bank/all',
        type: 'POST',
        headers: {'X-CSRF-TOKEN': token},
        cache: false,
        success: function (data) {
            if (data.status) {
                var _data = data.data;
                var _no = 1;
                $.each(_data, function (index, value) {
                    var _tr = '<tr>' +
                        '<td>' + _no + '</td>' +
                        '<td>' + value.bank + '</td>' +
                        '<td>' + value.name + '</td>' +
                        '<td>' + value.accountno + '</td>' +
                        '</tr>';
                    var _option = '<option value="' + value.id + '">' + value.bank + '</option>';
                    $('#bank-table').append(_tr);
                    $('#beneficiarys').append(_option);
                    _no++;
                });
            }
        }
    });

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
                    data = data.toString().replace('.', ',');
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
                    } else if (data.status == 3) {
                        _status = 'requested';
                        _class = 'class="label label-warning"';
                    } else if (data.status == 4) {
                        _status = 'sent';
                        _class = 'class="label label-success"';
                    } else {
                        _status = 'invalid';
                        _class = 'class="label label-danger"';
                    }
                    return '<a ' + _class + ' href="/admin/transaction/' + data.id + '">' + _status + '</a>'
                }
            }, {
                data: 'adminname',
                orderable: false,
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

    $('#sent-btn').click(function (event) {
        event.preventDefault();
        var _id = $(this).attr('data-id');
        var _data = $('#transaction-form-verify').serialize();
        $('#error').hide();
        $.ajax({
            url: '/admin/transaction/sent/' + _id,
            type: 'POST',
            headers: {'X-CSRF-TOKEN': token},
            data: _data,
            cache: false,
            success: function (data) {
                if (data.status) {
                    successnotification(data.message);
                } else {
                    $('#error').empty().append(data.message).show();
                }
            }
        });
    });

});