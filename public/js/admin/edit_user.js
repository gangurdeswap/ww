/*
 * START - Js validation for Add User form
 */
$("#edit_user_form").validate({
    errorElement: 'div',
    errorClass: 'text-danger',
    rules: {
        first_name: {
            required: true,
        },
        last_name: {
            required: true,
        },
        email: {
            required: true,
            email: true,
            remote: {
                url: javascript_path + "/user/check-email-exist",
                type: "post",
                data: {
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                    'user_id': $('#user_id').attr('data-value')
                }
            }
        }
    },
    messages: {
        first_name: {
            required: "First Name field is required.",
        },
        last_name: {
            required: "Last Name field is required.",
        },
        email: {
            required: "Email field is required.",
            email: "Please enter a valid email address.",
            remote: "This email is already been taken.",
        }
    },
    submitHandler: function (form) {
        $('#btn_submit').attr('disabled', 'disabled');
        form.submit();
    }
});
/*
 * END - Js validation for Add User form
 */
