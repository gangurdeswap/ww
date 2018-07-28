/*
 * START - Js validation for Add User form
 */
$("#add_slider_form").validate({
    errorElement: 'div',
    errorClass: 'text-danger',
    rules: {
        slider_title: {
            required: true,
        },
        image_file: {
            required: true,
        }
    },
    messages: {
        slider_title: {
            required: "Slider Title field is required.",
        },
        image_file: {
            required: "Please Select Image.",
        },
    },
    submitHandler: function (form) {
        $('#btn_submit').attr('disabled', 'disabled');
        form.submit();
    }
});
/*
 * END - Js validation for Add User form
 */