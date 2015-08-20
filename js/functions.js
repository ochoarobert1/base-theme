$(function () {
    "use strict";
    if ($("#contact-form").length > 0) {
        $("#contact-form").validationEngine('attach', {
            scroll: false,
            onValidationComplete: function (form, status) {
                if (status === true) {
                    $('#form-submit-wrapper').empty();
                    $('#form-submit-wrapper').addClass('loading');
                    var form_data = $('#contact-form').serialize();
                    $('#btn_submit').attr({disabled: 'disabled', value: 'ENVIANDO...'});
                    $.post('../contacto-submit', form_data, function (data) {
                        $('#form-submit-wrapper').html(data);
                        $('#form-submit-wrapper').removeClass('loading');
                        $('#btn_submit').attr({disabled: 'disabled', value: 'LISTO!'});
                    });
                }
            }
        });
    }
});

$(document).ready(function () {
    "use strict";
    $("#sticker").sticky({topSpacing: 0});
    $("#search").validationEngine();
    $("body").niceScroll({
        cursorcolor: '#BE1B20',
        cursorborder: '0px',
        cursorborderradius: '0px',
        background: '#2C70B7',
        hwacceleration: false,
        scrollspeed: 60,
        mousescrollstep: 85,
        smoothscroll: true,
        autohidemode: false,
        zindex: '999'
    });
});

