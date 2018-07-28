/*
 * START - Js validation for Add User form
 */
$("#edit_slider_form").validate({
    errorElement: 'div',
    errorClass: 'text-danger',
    rules: {
        slider_title: {
            required: true,
        },
    },
    messages: {
        slider_title: {
            required: "Slider Title field is required.",
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