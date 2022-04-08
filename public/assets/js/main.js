$(window).on('scroll', function() {
    if ($(window).scrollTop() > 200) {
        $('.back-to-top').fadeIn("fast");
        $('.whatsapp').fadeIn("fast");
        $('.phone-btn').fadeIn("fast");
    } else {
        $('.back-to-top').fadeOut("fast");
        $('.whatsapp').fadeOut("fast");
        $('.phone-btn').fadeOut("fast");
    }
    
    if ($(window).scrollTop() > 10) {
        $('header').addClass('show');
    } else {
        $('header').removeClass('show');
    }
});

$('.back-to-top').on('click', function(e) {
    $('html, body').animate({
        scrollTop: $('body').offset().top,
        scrollTop: $('html').offset().top
    }, 500)
});

$('#firstDate').datetimepicker({
    
    format:'Y/m/d',
   
});


$(".js-example-basic-single").select2(
    {
        minimumResultsForSearch: -1,
        placeholder:"Seçin"
    }
);


$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 30,
    nav: false,
    dots: false,
    items: 4,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: false,
    responsive: {
        0: {
            items: 2
        },
        575: {
            items: 3
        },
        767: {
            items: 3
        },
        991: {
            items: 5
        }
    }
});

$('#menu-btn').click(function(){
    $(this).toggleClass('open');
    $('.header-menu').toggleClass('show');
});

$('.dropdown>.fa-angle-down').on('click', function() {
    if ($('.dropdown').hasClass('submenu-show')) {
        $('.dropdown').removeClass('submenu-show');
    } else {
        $('.dropdown').addClass('submenu-show');
    }
});


// $(window).on('scroll', function() {
//     if ($(window).scrollTop() > 100) {
//         $('header').addClass('sticky');
//     } else {
//         $('header').removeClass('sticky');
//     }
// });


AOS.init();