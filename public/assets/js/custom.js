
$(window).scroll(function () {
  var scroll = $(window).scrollTop();

  if (scroll >= 100) {
    $("header").addClass("bg_header");
  } else {
    $("header").removeClass("bg_header");
  }
});

$(document).ready(function(){
  var url = window.location.pathname;
  var filename = url.substring(url.lastIndexOf('/')+1);
  if (filename == "") {
      filename = "index.php"
  }
  $(".nav-item .nav-link").removeClass("active");
  $(`.nav-item .nav-link[href="${filename}"]`).addClass("active")
})


AOS.init({

  once: true

});


// 

$('.main-img-slider').slick({
  dots: true,
  infinite: false,
  arrows:false,
  autoplay: true,
  autoplaySpeed: 800,
  speed: 300,
  slidesToShow: 1,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true
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
