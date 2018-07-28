/*
 * This JS for admin contact us section list page
 */


$(function() {
    oTable = $('#contactUsList').DataTable({
        "language": {
            "info": "Showing _START_ to _END_ of _TOTAL_ contact us",
            "lengthMenu": "Show _MENU_ contact us",
            "infoFiltered": "(filtered from _MAX_ total contact us)",
            "sInfoEmpty": "Showing 0 to 0 of 0 contact us",
        },
        "processing": true,
        "serverSide": true,
        stateSave: false,
        "ajax": javascript_path + '/get-all-contact-us',
        "columns": [
            {data: 'DT_Row_Index', name: 'id'},
            {data: 'email', name: 'email'},
            {data: 'message', name: 'message'},
            {data: 'date', name: 'date'},
            {data: 'action', name: 'action', orderable: false, searchable: false, "width": "15%"}
        ],
    });

});