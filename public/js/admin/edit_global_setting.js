/*
 * START - Js for validation global setting form
 */
$("#global_setting_form").validate({
    errorElement: 'div',
    errorClass: 'text-danger',
    rules: {
        global_setting_value: {
            required: true,
        }
    },
    messages: {
        global_setting_value: {
            required: "Value field is required.",
        }
    },
    submitHandler: function (form) {
        $('#btn_submit').attr('disabled', 'disabled');
        form.submit();
    }
});
/*
 * END - Js for validation global setting form
 */