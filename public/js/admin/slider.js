/*
 * START - Js for backend slider list page datatable
 */
$(function () {
    oTable = $('#slider_list').DataTable({
        "language": {
            "info": "Showing _START_ to _END_ of _TOTAL_ slider",
            "lengthMenu": "Show _MENU_ slider",
            "infoFiltered": "(filtered from _MAX_ total slider)",
            "sInfoEmpty": "Showing 0 to 0 of 0 slider",
        },
        searching: false,
        "paging": false,
        "processing": true,
        "serverSide": true,
        stateSave: false,
        "ajax": javascript_path + '/get-all-slider',
        "columns": [
            {data: 'DT_Row_Index', name: 'id'},
            {data: 'slider_title', name: 'slider_title'},

            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false, "width": "15%"}
        ],
    });
});
/*
 * END - Js for backend slider list page datatable
 */

/*
 * START - Js for Delete slider single record
 * @Param           : slider_id
 * @return          : redirect to same page
 */
function deleteSlider(id) {
    if (id) {
        if (confirm('Are you sure you want to delete this?')) {
            $.ajax({
                url: javascript_path + '/slider/delete/' + id,
                type: "POST",
                data: {
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                    'slider_id': id,
                    dataType: 'json',
                },
                success: function (resp) {
                    window.location.href = window.location.href;
                }
            });
        }
    }
}
/*
 * END - Js for Delete slider single record
 */