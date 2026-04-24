$(document).ready(function() {

  // side menu popout
  // apply transition to main, on body breaks sticky header
  $("#side-menu-open").sidr({
    name: "sidr",
    side: "right",
    displace: true,
    onOpen: function() {
      $(".header__burger-container").addClass("header__burger-container--active");
      $(".site-overlay").addClass("site-overlay--active");
      $("main").addClass("menu-open");
    },
    onClose: function() {
      $(".header__burger-container").removeClass("header__burger-container--active");
      $(".site-overlay").removeClass("site-overlay--active");
      $("main").removeClass("menu-open");
    },
  });

  $(".site-overlay").on("click", function() {
    $.sidr("close", "sidr");
  })

  // banner slider with slick plugin
  $(".banner-slider__track").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 4000,
    dots: true,
    infinite: true,
    mobileFirst: true,
    pauseOnHover: true,
    arrows: false,
  });

  $(".partners__wrapper").slick({
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2500,
    dots: false,
    infinite: true,
    variableWidth: true,
    arrows: false,
    pauseOnHover: true,
    speed: 200,
  });

  $(".clients__slick-container").slick({
    infinite: true,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2500,
    speed: 250,
    variableWidth: true,
    arrows: false,
    pauseOnHover: true,
    
    swipe: false,
    draggable: false,
    touchMove: false,
  });

  // sticky header logic
  const $header = $(".header");
  let headerHeight = $header.outerHeight();
  let lastScrollTop = 0;
  // let isSticky = false;

  $(window).on("resize", function() {
    headerHeight = $header.outerHeight();
    $header.css("top", `-${headerHeight}px`);
  })
  $header.css("top", `-${headerHeight}px`);

  $(window).on("scroll", function() {
    let scrolltop = $(window).scrollTop();
    let scrollingDown = scrolltop > lastScrollTop;

    // if (scrolltop > headerHeight) {
    //   if (scrollingDown) {
    //     $header.removeClass("is-visible");
    //   } else {
    //     $header.addClass("is-visible");
    //   }
    // } else if (scrolltop <= headerHeight) {
    //   $header.removeClass("is-visible");
    // }

    if (scrolltop <= 0) {
      $header.addClass("at-top").removeClass("is-visible");
      // no idea why this works but it does - prevent jitter at top
      $header.removeClass("at-top");
    } else if (scrolltop > headerHeight) {
      $header.removeClass("at-top");

      if (scrollingDown && scrolltop > headerHeight) {
        $header.removeClass("is-visible");
      } else {
        $header.addClass("is-visible");
      }
    }

    lastScrollTop = scrolltop;
  })

})