$('.testimonials-slider').slick({
    dots: false,
    infinite: true,
    arrows: false,
    speed: 300,
    autoplay: true,
    slidesToShow: 2,
    slidesToScroll: 1,
    responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,

            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});


// start offcanvas for header
function close_offcanvas() {
    // darken_screen(false);
    document.querySelector('.mobile-offcanvas.show').classList.remove('show');
    document.body.classList.remove('offcanvas-active');
}

function show_offcanvas(offcanvas_id) {
    // darken_screen(true);
    document.getElementById(offcanvas_id).classList.add('show');
    document.body.classList.add('offcanvas-active');
}

document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('[data-trigger]').forEach(function(everyelement) {

        let offcanvas_id = everyelement.getAttribute('data-trigger');

        everyelement.addEventListener('click', function(e) {
            e.preventDefault();
            show_offcanvas(offcanvas_id);

        });
    });

    document.querySelectorAll('.btn-close').forEach(function(everybutton) {

        everybutton.addEventListener('click', function(e) {
            e.preventDefault();
            close_offcanvas();
        });
    });

    // document.querySelector('.screen-darken').addEventListener('click', function(event){
    //     close_offcanvas();
    // });

});
// DOMContentLoaded  end

// end offcanvas for header

// change header view on scroll start

$(document).ready(function() {
    $('.login-icon').hide();
    if (window.matchMedia('(max-width: 991px)').matches) {
        $('.login-icon').hide();
        $('.login-icon').show();
        $('.hide_content_onscroll_1').hide();
        $('.hide_content_onscroll').hide();
        $('.login-icon').hide();
    }
    if (window.matchMedia('(min-width: 991px)').matches) {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 50) {
                $('.login-icon').show();
                $('.hide_content_onscroll_1').hide();
                $('.hide_content_onscroll').hide();
                $('.navbar-nav').addClass('navigation_transform');
                $('.header_social_icons').addClass('d-none');
                $('#navbar_main').addClass('position-absolute w-100');
                $('.header_hr').addClass('d-lg-none');
                $('.main_header').addClass('py-2');
                $('.main_header').removeClass('py-1');
            } else {
                $('.login-icon').hide();
                $('.hide_content_onscroll_1').show();
                $('.hide_content_onscroll').show();
                $('.navbar-nav').removeClass('navigation_transform');
                $('.header_social_icons').removeClass('d-none');
                $('#navbar_main').removeClass('position-absolute w-100');
                $('.header_hr').removeClass('d-lg-none');
                $('.main_header').addClass('py-1');
                $('.main_header').removeClass('py-2');
            }
        });

    };
});

// change header view on scroll end

AOS.init({
    duration: 1200,
})