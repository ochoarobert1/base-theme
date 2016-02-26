$(document).ready(function () {
    "use strict";
    $("#sticker").sticky({topSpacing: 0});
    $("#search").validationEngine();
    $("body").niceScroll({
        cursorcolor: '#BE1B20',
        cursorborder: '0px',
        cursorwidth: '10px',
        cursorborderradius: '0px',
        background: '#000000',
        hwacceleration: false,
        scrollspeed: 60,
        mousescrollstep: 85,
        smoothscroll: true,
        autohidemode: false,
        zindex: '999'
    });
});

