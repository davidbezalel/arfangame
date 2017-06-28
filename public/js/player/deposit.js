/**
 * Created by David Bezalel Laoli on 6/11/2017.
 */

jQuery(document).ready(function () {
    var successnotification = function (message) {
        $('#successaddmessage').empty().append(message);
        $('#successmodal').modal();
    };
    var token = $('meta[name=csrf-token]').attr("content");
    var table = $('#deposit-table').DataTable({
        serverSide: true,
        lengthChange: true,
        ajax: {
            url: '/player/deposit',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': token}
        },
        columns: [
            {
                data: 'no',
                className: 'no',
                orderable: false,
            }, {
                data: 'ammount',
                orderable: false,
                className: 'right',
                render: function (data) {
                    data = data.toString().replace('.', ',');
                    return '<span class="spandivided spandivided-left"">IDR. </span><span class="spandivided spandivided-right"">' + data.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + '</span>';
                }
            }, {
                data: 'type',
                orderable: false,
                className: 'right'
            }, {
                data: 'transactiondescription',
                orderable: false
            }, {
                data: 'created_at',
                className: 'right'
            }
        ],
        order: [4, 'ASC']
    });
});