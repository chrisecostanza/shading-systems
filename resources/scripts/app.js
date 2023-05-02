/*! purgecss start ignore */
// Import Bootstrap
import 'bootstrap';
import domReady from '@roots/sage/client/dom-ready';
// Import Slick
import 'slick-carousel';
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

  // Page FAQ Accordion
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
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
import.meta.webpackHot?.accept(console.error);
