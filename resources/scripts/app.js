/*! purgecss start ignore */
// Import Bootstrap
import 'bootstrap';
import domReady from '@roots/sage/client/dom-ready';
import 'slick-carousel/slick/slick.min.js';

/*! purgecss end ignore */

/**
 * Application entrypoint
 */
domReady(async () => {
  // Make videos load faster
  function facade() {
    var vidDefer = document.getElementsByTagName('iframe');
    for (var i = 0; i < vidDefer.length; i++) {
      if (vidDefer[i].getAttribute('data-src')) {
        vidDefer[i].setAttribute('src', vidDefer[i].getAttribute('data-src'));
      }
    }
  }
  // window.onload = facade();
  jQuery('.video-trigger').on('click', function() {
    facade();
  });

  // Pause Video
  jQuery('.video-modal').on('hidden.bs.modal', function () {
    jQuery('.video-modal iframe').attr('src', '');
  });

  // Product FAQ Accordion
  var acc = document.getElementsByClassName('accordion');
  var i;

  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener('click', function () {
      this.classList.toggle('active');
      this.closest('.faq-item').classList.toggle('active');
      var panel = this.nextElementSibling;
      if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + 'px';
      }
    });
  }

  // Initialize Slick Carousel
  jQuery('.home-ext-prod-list').slick({
    dots: false,
    arrows: true,
    infinite: true,
    speed: 500,
    swipe: true,
    touchMove: true,
    slidesToShow: 4,
    slidesToScroll: 4,
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 1100,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
        },
      },
      {
        breakpoint: 850,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 650,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  jQuery('.home-int-prod-list').slick({
    dots: false,
    arrows: true,
    infinite: true,
    speed: 500,
    swipe: true,
    touchMove: true,
    slidesToShow: 4,
    slidesToScroll: 4,
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 1100,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
        },
      },
      {
        breakpoint: 850,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 650,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
import.meta.webpackHot?.accept(console.error);
