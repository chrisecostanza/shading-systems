// Import Bootstrap
import 'bootstrap';
import domReady from '@roots/sage/client/dom-ready';

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
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
import.meta.webpackHot?.accept(console.error);
