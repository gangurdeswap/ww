/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document.body).on('click', '.lang_change_top', function() {
    var lang_code = $(this).attr('data-val');
    if (lang_code) {
        $.ajax({
            url: javascript_path + '/change-language-front',
            type: 'post',
            dataType: 'json',
            data: {
                lang_code: lang_code,
                '_token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(resp) {
                if (resp.errorCode == 1) {
                    window.location.href = window.location.href;
                } else {
                    console.log('error in language change');
                }
            }
        });
    }
});


