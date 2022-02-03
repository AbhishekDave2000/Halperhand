$(function () {
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll >= 100) {
            $('#testdiv').show()
        }
        else {
            $('#testdiv').hide();
        }
    });
});