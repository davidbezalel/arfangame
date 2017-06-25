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
            url: '/player/transaction',
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

    $('#claimwidget').click(function (event) {
        event.preventDefault();
        $('#closeclue').click();
        $('#transaction-form-container').show();
        $('#transaction-table-container').hide();
    });

    $('#logwidget').click(function (event) {
        event.preventDefault();
        $('#closeclue').click();
        $('#transaction-table-container').show();
        $('#transaction-form-container').hide();
    });

    $('#transaction-form').submit(function (event) {
        event.preventDefault();
        var _data = $(this).serialize();
        $.ajax({
            url: '/player/transaction/claim',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': token},
            data: _data,
            cache: false,
            success: function (data) {
                if (data.status) {
                    successnotification(data.message);
                    $('#transaction-form')[0].reset();
                    table.draw();
                } else {
                    $('#error').empty().append(data.message).show();
                }
            }
        });
    });
});