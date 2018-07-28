/*
 * START - Js for backend  global setting list page datatable
 */
$(function () {
    oTable = $('#global_setting_list').DataTable({
        "language": {
            "info": "Showing _START_ to _END_ of _TOTAL_ cms",
            "lengthMenu": "Show _MENU_ cms",
            "infoFiltered": "(filtered from _MAX_ total cms)",
            "sInfoEmpty": "Showing 0 to 0 of 0 cms",
        },
        searching: false,
        "paging": false,
        "processing": true,
        "serverSide": true,
        stateSave: false,
        "ajax": javascript_path + '/get-all-global-setting',
        "columns": [
            {data: 'DT_Row_Index', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'value', name: 'value'},
            {data: 'action', name: 'action', orderable: false, searchable: false, "width": "15%"}
        ],
    });
});
/*
 * END - Js for backend  global setting list page datatable
 */
