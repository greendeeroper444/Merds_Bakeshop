
// SWIPER SLIDER
var TrandingSlider = new Swiper('.swiper-container', {
  effect: 'coverflow',
  grabCursor: true,
  centeredSlides: true,
  loop: true,
  slidesPerView: 'auto',
  coverflowEffect: {
    rotate: 0,
    stretch: 0,
    depth: 100,
    modifier: 1.7,
    // slideShadows: false,
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
});


$(document).ready(function() {
    $(".nav-link").click(function() {
        $(".nav-link").removeClass("active"); // Remove the "active" class from all links
        $(this).addClass("active"); // Add the "active" class to the clicked link
    });

    // Check the URL and add the "active" class to the corresponding link
    var currentUrl = window.location.href;
    $(".nav-link").each(function() {
        if (currentUrl.includes($(this).attr("href"))) {
            $(this).addClass("active");
            return false; // Exit the loop if a match is found
        }
    });
});
