/**
 * Created by David Bezalel Laoli on 6/11/2017.
 */

jQuery(document).ready(function () {
    var token = $('meta[name=csrf-token]').attr("content");
    var table = $('#player-table').DataTable({
        serverSide: true,
        lengthChange: true,
        ajax: {
            url: '/admin/player',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': token}
        },
        columns: [
            {
                data: 'no',
                className: 'no',
                orderable: false,
                searchable: false,
            }, {
                data: 'name',
            }, {
                data: 'playerid',
                orderable: false,
            }, {
                data: 'deposite',
                searchable: false,
                render: function (data, type, row) {
                    return '<span class="spandivided spandivided-left"">IDR. </span><span class="spandivided spandivided-right"">' + data.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + '</span>';
                }
            }, {
                data: null,
                searchable: false,
                orderable: false,
                className: 'right',
                defaultContent: '<a class="delete action action-danger" href=""><i class="fa fa-trash-o" aria-hidden="true"></i></a>'
            }
        ],
        order: [1, 'ASC']
    });
});