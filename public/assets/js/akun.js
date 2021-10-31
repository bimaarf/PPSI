$(function () {
    let width = $(window).width()

    if (width <= 575) {
        $('.login-button').removeClass('col-4');
        $('.login-button').removeClass('col-3');
        $('.login-button button').removeClass('float-end');
    } else if (width < 767) {
        $('.login-button').addClass('col-4');
        $('.login-button').removeClass('col-5');
    } else if (width > 767 && width < 886) {
        $('.login-button').removeClass('col-5');
        $('.login-button').removeClass('col-4');
        $('.login-button').addClass('col-3');
    } else {
        $('.login-button').addClass('col-5');
        $('.login-button').removeClass('col-3');
        $('.login-button').removeClass('col-4');
        $('.login-button button').addClass('float-end');
    }



    $(window).resize(function () {
        width = $(window).width()

        if (width <= 575) {
            $('.login-button').removeClass('col-4');
            $('.login-button').removeClass('col-3');
            $('.login-button button').removeClass('float-end');
        } else if (width < 767) {
            $('.login-button').addClass('col-4');
            $('.login-button').removeClass('col-5');
        } else if (width > 767 && width < 886) {
            $('.login-button').removeClass('col-5');
            $('.login-button').removeClass('col-4');
            $('.login-button').addClass('col-3');
        } else {
            $('.login-button').addClass('col-5');
            $('.login-button').removeClass('col-3');
            $('.login-button').removeClass('col-4');
            $('.login-button button').addClass('float-end');
        }
    })

})

