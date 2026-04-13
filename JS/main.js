$(document).ready(function() {

  // side menu popout
  $("#side-menu-open").sidr({
    name: "sidr",
    side: "right",
    displace: true,
    onOpen: function() {
      $(".header__burger-container").addClass("header__burger-container--active");
      $(".site-overlay").addClass("site-overlay--active");
      $("body").addClass("menu-open");
    },
    onClose: function() {
      $(".header__burger-container").removeClass("header__burger-container--active");
      $(".site-overlay").removeClass("site-overlay--active");
      $("body").removeClass("menu-open");
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

  // sticky header logic
  // fires a lot - debounce
  const $header = $(".header");
  const headerHeight = $header.outerHeight();
  let lastScrollTop = 0;
  let isSticky = false;

  $(window).on("scroll", function() {
    let scrolltop = $(window).scrollTop();
    let scrollingDown = scrolltop > lastScrollTop;

    if (scrolltop <=  headerHeight) {
      if (isSticky && scrolltop === 0) {
        $header.removeClass("is-hidden");
        $header.unstick();
        isSticky = false;
      }
      lastScrollTop = scrolltop;
      return;
    }
    
    $header.toggleClass("is-hidden", scrollingDown);

    if (scrollingDown) {
      if (isSticky) {
        setTimeout(() => {
          $header.unstick();
          isSticky = false;
        }, 300)
      }
    } else {
      if (!isSticky) {
        $header.sticky({topSpacing: 0, zIndex: 100});
        isSticky = true;
      }
    }
    lastScrollTop = scrolltop;
  })

})