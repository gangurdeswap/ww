/*
 * Js for backend Cms list page datatable
 *
 */


$(function() {
    oTable = $('#cmsList').DataTable({
        "language": {
            "info": "Showing _START_ to _END_ of _TOTAL_ cms",
            "lengthMenu": "Show _MENU_ cms",
            "infoFiltered": "(filtered from _MAX_ total cms)",
            "sInfoEmpty": "Showing 0 to 0 of 0 cms",
        },
        "processing": true,
        "serverSide": true,
        stateSave: false,
        "ajax": javascript_path + '/get-all-cms',
        "columns": [
            {data: 'DT_Row_Index', name: 'id'},
            {data: 'page_name', name: 'page_name'},
            {data: 'action', name: 'action', orderable: false, searchable: false, "width": "15%"}
        ],
    });

});