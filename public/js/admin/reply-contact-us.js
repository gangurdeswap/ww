/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function() {
    tinymce.init({
        selector: "#reply_text",
        setup: function(editor) {
            editor.on('change', function() {
                editor.save();
            });
        },
        menubar: true,
        statusbar: true,
        plugins: "textcolor,lists,paste",
        paste_as_text: true,
    });
});