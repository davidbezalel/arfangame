/**
 * Created by David Bezalel Laoli on 6/11/2017.
 */

jQuery(document).ready(function () {
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

    $('#claimwidget').click(function (event) {
        event.preventDefault();
        $('#closeclue').click();
        $('#transaction-form-container').show();
    });
});