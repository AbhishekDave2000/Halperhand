$(document).ready(function() {
    $(window).scroll(function() {
        if (this.scrollY > 20) {
            $('.navbar').addClass("sticky");
            $('.navbar-brand img').addClass("sticky");
            $('.navbar .navbar-nav .rounded-link').addClass("sticky");
        } else {
            $('.navbar').removeClass("sticky");
            $('.navbar-brand img').removeClass("sticky");
            $('.navbar .navbar-nav .rounded-link').removeClass("sticky");
        }
    })
});