$(function () {
    let width = $(window).width()

    if (width <= 575) {
        $('.card-title').removeClass('mt-5');
        $('.login-button').removeClass('col-5');
        $('.login-button button').removeClass('float-end');
    } else if (width < 767) {
        $('.card-title').removeClass('mt-5');
        $('.login-button').addClass('col-4');
        $('.login-button').removeClass('col-5');
    } else if (width > 767 && width < 886) {
        $('.card-title').removeClass('mt-5');
        $('.login-button').removeClass('col-5');
        $('.login-button').addClass('col-3');
    } else {
        $('.card-title').addClass('mt-5');
        $('.login-button').addClass('col-5');
        $('.login-button').removeClass('col-3');
        $('.login-button button').addClass('float-end');
    }



    $(window).resize(function () {
        width = $(window).width()

        if (width <= 575) {
            $('.card-title').removeClass('mt-5');
            $('.login-button').removeClass('col-4');
            $('.login-button').removeClass('col-3');
            $('.login-button button').removeClass('float-end');
        } else if (width < 767) {
            $('.card-title').removeClass('mt-5');
            $('.login-button').addClass('col-4');
            $('.login-button').removeClass('col-5');
        } else if (width > 767 && width < 886) {
            $('.card-title').removeClass('mt-5');
            $('.login-button').removeClass('col-5');
            $('.login-button').addClass('col-3');
        } else {
            $('.card-title').addClass('mt-5');
            $('.login-button').addClass('col-5');
            $('.login-button').removeClass('col-3');
            $('.login-button button').addClass('float-end');
        }
    })

})

