$(function() {
  AOS.init();
    $(window).on('scroll', function() {
        if ($(window).scrollTop() > 100) {
            $('header').addClass('show')
        } else {
            $('header').removeClass('show')
        }
    });
    
    $('.home-btn').on('click', function(e) {
        $('html, body').animate({
            scrollTop: $('#services').offset().top
        }, 500)
    });

// news slider
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 2,
    spaceBetween: 30,
    slidesPerGroup: 1,
    loop: true,
    loopFillGroupWithBlank: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    breakpoints: {
        320: {
          slidesPerView: 1,
          spaceBetween: 10
        },
        767: {
          slidesPerView: 1,
          spaceBetween: 30
        },
        991: {
          slidesPerView: 2,
          spaceBetween: 30
        }
      }
  });

//   review slider
var swiper = new Swiper(".mySwiper-2", {
    slidesPerView: 3,
    spaceBetween: 30,
    slidesPerGroup: 1,
    loop: true,
    loopFillGroupWithBlank: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    breakpoints: {
        320: {
          slidesPerView: 1,
          spaceBetween: 10
        },
        767: {
          slidesPerView: 2,
          spaceBetween: 30
        },
        991: {
          slidesPerView: 3,
          spaceBetween: 30
        }
      }
});

//   partner slider
var swiper = new Swiper(".mySwiper-3", {
    slidesPerView: 4,
    spaceBetween: 30,
    slidesPerGroup: 1,
    loop: true,
    loopFillGroupWithBlank: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    breakpoints: {
        320: {
          slidesPerView: 1,
          spaceBetween: 10
        },
        375: {
          slidesPerView: 2,
          spaceBetween: 10
        },
        767: {
          slidesPerView: 3,
          spaceBetween: 30
        },
        991: {
          slidesPerView: 4,
          spaceBetween: 30
        }
      }
});

//   services slider
var swiper = new Swiper(".mySwiper-4", {
    slidesPerView: 2,
    spaceBetween: 30,
    slidesPerGroup: 1,
    loop: true,
    loopFillGroupWithBlank: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    breakpoints: {
        0: {
          slidesPerView: 1,
          spaceBetween: 10
        },
        475: {
          slidesPerView: 2,
          spaceBetween: 10
        },
        767: {
          slidesPerView: 2,
          spaceBetween: 10
        },
        991: {
          slidesPerView: 2,
          spaceBetween: 10
        },
        1200: {
          slidesPerView: 2,
          spaceBetween: 30
        },
      }
});

//   company year slider
var swiper = new Swiper(".mySwiper-5", {
    slidesPerView: 2,
    spaceBetween: 30,
    slidesPerGroup: 1,
    loop: true,
    loopFillGroupWithBlank: true,
    // autoplay: {
    //     delay: 2500,
    //     disableOnInteraction: false,
    // },
    breakpoints: {
      0: {
        slidesPerView: 1,
        spaceBetween: 30
      },
      475: {
        slidesPerView: 1,
        spaceBetween: 30
      },
      767: {
        slidesPerView: 2,
        spaceBetween: 20
      },
      991: {
        slidesPerView: 2,
        spaceBetween: 20
      },
      1200: {
        slidesPerView: 2,
        spaceBetween: 30
      },
    }
});



$('.contact-form select').niceSelect();
$('select').niceSelect();


});



let faq_link = document.querySelectorAll('#accordion .card a');
let faq_down = document.querySelectorAll('.fa-question');
let faq_up = document.querySelectorAll('.fa-minus');

for (let i = 0; i < faq_link.length; i++) {
    faq_link[i].addEventListener('click', function() {
        down_btn();
        if (faq_link[i].getAttribute('aria-expanded') === "false") {
            faq_down[i].style.display = 'none';
            faq_up[i].style.display = 'inline';
        };
    });
};

function down_btn() {
    for (let i = 0; i < faq_down.length; i++) {
        faq_down[i].style.display = 'inline';
        faq_up[i].style.display = 'none';
    };
};


$(".header-contact").on('click', function(){
  if($('.header-phone-container').hasClass('show')){
    $('.header-phone-container').removeClass('show');
  }else{
    $('.header-phone-container').addClass('show');
  }

});

$('.header-phone-container .fa-times').on('click', function(){
  $('.header-phone-container').removeClass('show');
});

$(".menu-btn").on('click', function(){
  if($('header').hasClass('menu-show')){
    $('header').removeClass('menu-show');
  }else{
    $('header').addClass('menu-show');
  }
});

$('.menu .fa-angle-down').on('click', function(){
  if( $('.sub-menu').hasClass('show')){
    $('.sub-menu').removeClass('show').fadeOut();
  }else{
    $('.sub-menu').addClass('show').fadeIn();
  }

});

$( window ).load(function() {
  $('.loader').fadeIn();
})
setTimeout(() => {
  $('.loader').fadeOut();
}, 2000);


// vacancy-modal
$('.vacancy-card .card-link').on('click',function(e){
  e.preventDefault();
  let url  = $(this).attr('href');
  
  fetch(url)
    .then(resp=>resp.text())
    .then(data=>{
      $('.vacancy-modal').html(data).show();
      $(document).on('click',function(e){
        if(e.target == $('.vacancy-modal')[0] || e.target == $('.vacancy-modal .fa-times')[0]){
          $('.vacancy-modal').hide();
        }
      })
    });
});
