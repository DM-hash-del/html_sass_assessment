$(document).ready(function () {
  // side menu popout
  // apply transition to main, on body breaks sticky header
  $("#side-menu-open").sidr({
    name: "sidr",
    side: "right",
    displace: true,
    onOpen: function () {
      $(".header__burger-container").addClass(
        "header__burger-container--active",
      );
      $(".site-overlay").addClass("site-overlay--active");
      $("main").addClass("menu-open");
    },
    onClose: function () {
      $(".header__burger-container").removeClass(
        "header__burger-container--active",
      );
      $(".site-overlay").removeClass("site-overlay--active");
      $("main").removeClass("menu-open");
    },
  });

  $(".site-overlay").on("click", function () {
    $.sidr("close", "sidr");
  });

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

  $(window).on("resize", function () {
    headerHeight = $header.outerHeight();
    $header.css("top", `-${headerHeight}px`);
  });
  $header.css("top", `-${headerHeight}px`);

  $(window).on("scroll", function () {
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
  });

  // contact form validation
  const $contactForm = $(".contact-form form");
  if ($contactForm.length) {
    const emailRegex =
      /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@(([[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,}))$/;

    $contactForm.on("submit", function (e) {
      let isValid = true;
      const invalidEls = [];

      const $name = $("#name");
      const $email = $("#email");
      const $telephone = $("#telephone");
      const $message = $("#message");

      const nameVal = $.trim($name.val());
      if (!nameVal) {
        isValid = false;
        $name.css("border-color", "red");
        invalidEls.push($name[0]);
      } else {
        $name.css("border-color", "");
      }

      const emailVal = $.trim($email.val());
      if (!emailVal || !emailRegex.test(emailVal.toLowerCase())) {
        isValid = false;
        $email.css("border-color", "red");
        invalidEls.push($email[0]);
      } else {
        $email.css("border-color", "");
      }

      const telVal = $.trim($telephone.val());
      if (!telVal) {
        isValid = false;
        $telephone.css("border-color", "red");
        invalidEls.push($telephone[0]);
      } else {
        $telephone.css("border-color", "");
      }

      const msgVal = $.trim($message.val());
      if (!msgVal) {
        isValid = false;
        $message.css("border-color", "red");
        invalidEls.push($message[0]);
      } else {
        $message.css("border-color", "");
      }

      if (!isValid) {
        e.preventDefault();
        if (invalidEls.length) {
          invalidEls[0].focus();
        }
      }
    });

    // clear invalid style on input
    $(".contact-form").on("input", "input, textarea", function () {
      const $el = $(this);
      const id = $el.attr("id");
      const val = $.trim($el.val());
      if (id === "email") {
        if (val && emailRegex.test(val.toLowerCase())) {
          $el.css("border-color", "");
        }
      } else {
        if (val) {
          $el.css("border-color", "");
        }
      }
    });
  }
});
