$(function () {
    let width = $(window).width()

    if (width < 576) {
        $('.card-title').removeClass('mt-5');
        $('.login-button').removeClass('col-5');
        $('.login-button button').removeClass('float-end');
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

        if (width < 576) {
            $('.card-title').removeClass('mt-5');
            $('.login-button').removeClass('col-5');
            $('.login-button button').removeClass('float-end');
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


//     // Medium - Large
//     if (width < 992) {
//         $('.body-akun').addClass('p-1');
//         $('.body-akun').removeClass('p-3');
//         $('.body-akun').removeClass('p-5');
//     } else if (width < 1030) {
//         $('.body-akun').addClass('p-3');
//         $('.body-akun').removeClass('p-5');
//     } else {
//         $('.body-akun').addClass('p-5');
//     }

//     if (width >= 885) {
//         $('.login-form').removeClass('mx-sm-0');
//     } else {
//         $('.login-form').addClass('mx-sm-0');
//     }

//     if (width < 885 && width > 767) {
//         $('.login-form').addClass('mx-4');
//         $('.login-form').removeClass('mx-5');
//         $('.login-form div input, .check').removeClass('mx-4');
//         $('.check').addClass('mx-0');
//         $('.remember').addClass('col-5');
//         $('.remember').removeClass('col-sm-6');
//         $('.remember').removeClass('col-7');
//     } else {
//         $('.remember').removeClass('col-5');
//         $('.remember').addClass('col-sm-6');
//         $('.remember').addClass('col-7');
//     }

//     $(window).resize(function () {
//         width = $(window).width()


//         if (width < 992) {
//             $('.body-akun').addClass('p-1');
//             $('.body-akun').removeClass('p-3');
//             $('.body-akun').removeClass('p-5');
//         } else if (width < 1030) {
//             $('.body-akun').addClass('p-3');
//             $('.body-akun').removeClass('p-5');
//         } else {
//             $('.body-akun').removeClass('p-1');
//             $('.body-akun').removeClass('p-3');
//             $('.body-akun').addClass('p-5');
//         }


//         if (width < 885 && width > 767) {
//             $('.login-form').addClass('mx-4');
//             $('.login-form').removeClass('mx-5');
//             $('.login-form div input, .check').removeClass('mx-4');
//             $('.check').addClass('mx-0');
//             $('.remember').addClass('col-5');
//             $('.remember').removeClass('col-sm-6');
//             $('.remember').removeClass('col-7');
//         } else if (width <= 767) {
//             $('.remember').removeClass('col-5');
//             $('.remember').addClass('col-sm-6');
//             $('.remember').addClass('col-7');
//         } else {
//             $('.login-form').addClass('mx-4');
//             $('.login-form').removeClass('mx-5');
//         }

//     });

// });