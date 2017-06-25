/**
 * Created by David Bezalel Laoli on 6/11/2017.
 */

jQuery(document).ready(function () {
    var successnotification = function (message) {
        $('#successaddmessage').empty().append(message);
        $('#successmodal').modal();
    };

    var modalhide = function () {
        $('#bank-modal').fadeOut('slow', function () {
            $(this).modal('hide');
        });
    };

    var token = $('meta[name=csrf-token]').attr("content");

    var table = $('#bank-table').DataTable({
        serverSide: true,
        lengthChange: true,
        ajax: {
            url: '/admin/bank',
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
            }, {
                data: 'name',
                orderable: false,
            }, {
                data: 'accountno',
                orderable: false,
            }, {
                data: null,
                orderable: false,
                className: 'right',
                render: function (data) {
                    return "<a href='' data-data='" + JSON.stringify(data) + "' class='action update'><i class='fa fa-pencil-square-o'></i></a>" +
                        "<a href='' data-id='" + data.id + "' class='action action-danger delete'><i class='fa fa-trash-o'></i></a>";
                }
            }
        ],
        order: [1, 'ASC']
    });

    /* add */
    $('#add').click(function (event) {
        event.preventDefault();
        $('#bank-modal').modal();
        $('#update-btn').hide();
        $('#add-btn').show();
    });

    $('#add-btn').click(function (event) {
        event.preventDefault();
        var _data = $('#bank-form').serialize();
        $('#error').hide();
        $(this).button('loading');
        $.ajax({
            url: '/admin/bank/add',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': token},
            data: _data,
            cache: false,
            processData: false,
            success: function (data) {
                if (!data.status) {
                    $('#error').empty().append(data.message).show();
                } else {
                    modalhide();
                    successnotification(data.message);
                    table.draw();
                    $('#bank-form')[0].reset();

                }
                $('#add-btn').button('reset');
            }
        });
    });


    /* update */
    $(document).on('click', '.update', function (event) {
        event.preventDefault();
        $('#bank-modal').modal();
        $('#add-btn').hide();
        $('#update-btn').show();
        var _data = JSON.parse($(this).attr('data-data'));
        $('input[name=bank]').val(_data.bank);
        $('input[name=name]').val(_data.name);
        $('input[name=accountno]').val(_data.accountno);
        $('input[name=id]').val(_data.id);

    });

    $('#update-btn').click(function (event) {
        event.preventDefault();
        var _data = $('#bank-form').serialize();
        $('#error').hide();
        $(this).button('loading');
        $.ajax({
            url: '/admin/bank/update',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': token},
            data: _data,
            cache: false,
            processData: false,
            success: function (data) {
                if (!data.status) {
                    $('#error').empty().append(data.message).show();
                } else {
                    modalhide();
                    successnotification(data.message);
                    table.draw();
                    $('#bank-form')[0].reset();

                }
                $('#update-btn').button('reset');
            }
        });
    });

    /* delete */
    $(document).on('click', '.delete', function (event) {
        event.preventDefault();
        var _id = $(this).attr('data-id');
        if (confirm('Do you want to delete this bank?')) {
            $.ajax({
                url: '/admin/bank/delete',
                type: 'POST',
                headers: {'X-CSRF-TOKEN': token},
                data: {'id': _id},
                cache: false,
                success: function (data) {
                    if (data.status) {
                        successnotification(data.message);
                        table.draw();
                    }
                }
            });
        }
    });
});