/*global, $, alert, console*/

$(function () {

    'use strict';

    var userError = true,
        emialError = true,
        msgError = true,
        cellphoneErr = true;

    $('.username').blur(function () {
        if($(this).val().length <= 3) {
            $(this).parent('.form-group').next('.custom-alert').fadeIn()
            $(this).css('border', '1px solid red');

            userError = true;
        } else {
            $(this).parent('.form-group').next('.custom-alert').fadeOut();
            $(this).css('border', '1px solid #ced4da');
            
            userError = false;
        }
    });

    $('.email').blur(function () {
        if($(this).val() === '') {
            $(this).parent('.form-group').next('.custom-alert').fadeIn();
            $(this).css('border', '1px solid red');

            emialError = true;
        } else {
            $(this).parent('.form-group').next('.custom-alert').fadeOut();
            $(this).css('border', '1px solid #ced4da');

            emialError = false;
        }
    });

    $('.cellphone').blur(function () {
        if($(this).val().length < 7 ||  $(this).val().length > 13 ){
            $(this).parent('.form-group').next('.custom-alert').fadeIn();
            $(this).css('border', '1px solid red');

            cellphoneErr = true;
        } else {
            $(this).parent('.form-group').next('.custom-alert').fadeOut();
            $(this).css('border', '1px solid #ced4da');

            cellphoneErr = false;
        }
    });

    $('.message').blur(function () {
        if($(this).val().length < 7){
            $(this).parent('.form-group').next('.custom-alert').fadeIn();
            $(this).css('border', '1px solid red');

            msgError = true;
        } else {
            $(this).parent('.form-group').next('.custom-alert').fadeOut();
            $(this).css('border', '1px solid #ced4da');

            msgError = false
        }
    });

    $('.contact-form').submit(function(e) {
        if(userError === true || emialError === true || msgError === true || cellphoneErr === true) {
            e.preventDefault();
            $('.username, .email, .message, .cellphone').blur();
        }
    })

});