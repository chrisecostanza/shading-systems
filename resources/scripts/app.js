/*! purgecss start ignore */
// Import Bootstrap
import 'bootstrap';
import 'slick-carousel/slick/slick.min.js';
import 'bs5-lightbox/dist/index.bundle.min.js';
import domReady from '@roots/sage/client/dom-ready';

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
  jQuery('.video-trigger').on('click', function () {
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

  jQuery('.single-project-gallery-photos').slick({
    dots: false,
    arrows: true,
    infinite: true,
    speed: 500,
    swipe: true,
    touchMove: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
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

  jQuery('.single-similar-products').slick({
    dots: false,
    arrows: true,
    infinite: true,
    speed: 500,
    swipe: true,
    touchMove: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
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

  jQuery('.version-content-slider').slick({
    dots: false,
    arrows: true,
    infinite: true,
    speed: 500,
    swipe: true,
    touchMove: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    adaptiveHeight: true,
  });

  jQuery('.about-card-carousel-slider').slick({
    dots: false,
    arrows: true,
    infinite: true,
    speed: 500,
    swipe: true,
    touchMove: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    adaptiveHeight: true,
  });

  jQuery('.area-solutions-carousel-slider').slick({
    dots: false,
    arrows: true,
    infinite: true,
    speed: 500,
    swipe: true,
    touchMove: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    adaptiveHeight: true,
  });

  jQuery('.area-card-carousel-slider').slick({
    dots: false,
    arrows: true,
    infinite: true,
    speed: 500,
    swipe: true,
    touchMove: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    adaptiveHeight: true,
  });

  jQuery('.service-request-guides-grid').slick({
    dots: false,
    arrows: true,
    infinite: true,
    speed: 500,
    swipe: true,
    touchMove: true,
    slidesToShow: 5,
    slidesToScroll: 1,
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 650,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 450,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  var lastId,
    topMenu = $('.single-menu-links'),
    topMenuHeight = topMenu.outerHeight() + 140,
    // All list items
    menuItems = topMenu.find('a'),
    // Anchors corresponding to menu items
    scrollItems = menuItems.map(function () {
      var item = $($(this).attr('href'));
      if (item.length) {
        return item;
      }
    });

  // Bind click handler to menu items
  // so we can get a fancy scroll animation
  menuItems.click(function (e) {
    var href = $(this).attr('href'),
      offsetTop = href === '#' ? 0 : $(href).offset().top - topMenuHeight + 1;
    $('html, body').stop().animate(
      {
        scrollTop: offsetTop,
      },
      140,
    );
    e.preventDefault();
  });

  // Bind to scroll
  $(window).scroll(function () {
    // Get container scroll position
    var fromTop = $(this).scrollTop() + topMenuHeight;
    // Get id of current scroll item
    var cur = scrollItems.map(function () {
      if ($(this).offset().top < fromTop) return this;
    });
    // Get the id of the current element
    cur = cur[cur.length - 1];
    var id = cur && cur.length ? cur[0].id : '';

    if (lastId !== id) {
      lastId = id;
      // Set/remove active class
      menuItems
        .parent()
        .removeClass('active-section')
        .end()
        .filter('[href="#' + id + '"]')
        .parent()
        .addClass('active-section');
    }
  });

  // tab functionality for the form switcher
  jQuery('.tab-btn').click(function (t) {
    t.preventDefault();
    // Remove active class from all tabs
    jQuery('.tab-btn').removeClass('active');
    // Add active class to the clicked tab
    jQuery(this).addClass('active');
    // Get the class of the clicked button
    var tabClass = jQuery(this)
      .attr('class')
      .split(' ')
      .find((c) => c.startsWith('tab-') && !c.includes('btn'));
    // Fading in/out content areas
    jQuery('.tab-content')
      .stop(true, true)
      .fadeOut(200, function () {
        jQuery('.' + tabClass + '-content')
          .stop(true, true)
          .fadeIn(200);
      });
  });

  jQuery('.project-filter-col h3, .product-filter-col h3').on(
    'click',
    function () {
      jQuery('.searchandfilter').toggleClass('active');
      jQuery(this).toggleClass('rotate');
    },
  );

  // FAQ Accordion
  const faqItems = document.querySelectorAll('.faq-item');

  faqItems.forEach((item) => {
    const triggers = item.querySelectorAll('.accordion-trigger');
    const panel = item.querySelector('.faq-panel');
    const plusIcon = item.querySelector('.faq-plus');
    const minusIcon = item.querySelector('.faq-minus');

    const toggleAccordion = () => {
      const isOpen = !panel.classList.contains('hidden');

      panel.classList.toggle('hidden');
      plusIcon.classList.toggle('hidden', !isOpen);
      minusIcon.classList.toggle('hidden', isOpen);
    };

    triggers.forEach((trigger) => {
      trigger.addEventListener('click', toggleAccordion);
    });
  });

  // Hotspots
  const popups = document.querySelectorAll('.hotspot-popup');
  const markers = document.querySelectorAll('a.marker');

  popups.forEach((popup) => {
    popup.addEventListener('click', (e) => {
      e.stopPropagation();
    });
  });

  markers.forEach((marker) => {
    marker.addEventListener('click', (e) => {
      e.preventDefault();
      e.stopPropagation();

      const popup = marker.nextElementSibling;
      if (popup && popup.classList.contains('hotspot-popup')) {
        const isOpening = !popup.classList.contains('open');

        // Close all other popups
        popups.forEach((p) => p.classList.remove('open'));

        // Toggle the current popup
        if (isOpening) {
          popup.classList.add('open');
        }
      }
    });
  });

  document.addEventListener('click', () => {
    popups.forEach((popup) => {
      popup.classList.remove('open');
    });
  });

  popups.forEach((popup) => {
    const w = window.innerWidth;
    const rect = popup.getBoundingClientRect();
    const edge = rect.left + rect.width;

    if (w < edge) {
      popup.classList.add('edge');
    }
  });

  /**
   * Search & Filter Pro UI enhancements
   */
  const sAndFForm = document.querySelector('.searchandfilter');
  if (sAndFForm) {
    const selectedFiltersContainer =
      document.querySelector('.selected-filters');
    const clearAllButton = document.querySelector('.clear-all-filters');

    const updateSelectedFilters = () => {
      // Clear current selected filters display
      selectedFiltersContainer.innerHTML = '';
      if (clearAllButton) {
        selectedFiltersContainer.appendChild(clearAllButton); // Keep button in the container
      }

      const checkedInputs = sAndFForm.querySelectorAll('input:checked');
      let hasActiveFilters = false;

      checkedInputs.forEach((input) => {
        // Ignore the submit button if it's an input
        if (input.type === 'submit') {
          return;
        }

        hasActiveFilters = true;
        const label = document.querySelector(`label[for="${input.id}"]`);
        const filterName = label ? label.innerText.trim() : 'Filter';

        const filterTag = document.createElement('a');
        filterTag.className = 'selected-filter-item';
        filterTag.innerText = filterName;
        filterTag.href = '#'; // Prevent page jump

        const removeSpan = document.createElement('span');
        removeSpan.className = 'remove-filter';
        removeSpan.innerHTML = ' &times;'; // Use times symbol for 'x'
        filterTag.appendChild(removeSpan);

        filterTag.addEventListener('click', (e) => {
          e.preventDefault();
          input.checked = false;
          // S&F listens for a 'change' event to update results
          input.dispatchEvent(new Event('change', {bubbles: true}));
        });

        selectedFiltersContainer.insertBefore(filterTag, clearAllButton);
      });

      // Show or hide the "Clear All" button
      if (clearAllButton) {
        clearAllButton.style.display = hasActiveFilters
          ? 'inline-block'
          : 'none';
      }

      // Add margin to the container if there are active filters
      if (hasActiveFilters) {
        selectedFiltersContainer.style.marginBottom = '10px';
      } else {
        selectedFiltersContainer.style.marginBottom = '0';
      }
    };

    // Use a MutationObserver to detect when S&F has updated the results via AJAX
    const observer = new MutationObserver((mutations) => {
      for (const mutation of mutations) {
        // The 'sf-busy' class is toggled during AJAX updates
        if (
          mutation.attributeName === 'class' &&
          !sAndFForm.classList.contains('sf-busy')
        ) {
          updateSelectedFilters();
          break;
        }
      }
    });

    // Initial call and event listener setup
    updateSelectedFilters();
    sAndFForm.addEventListener('change', updateSelectedFilters);
    observer.observe(sAndFForm, {attributes: true});
  }

  // Add tooltips to filter headers
  // Use setTimeout to ensure the Search & Filter form has fully rendered
  setTimeout(() => {
    // Define tooltip content for each filter

    const tooltipContent = {
      'Application Area':
        'Project scope, intended setting, and mounting method.',
      // 'Mounting Type': 'Mounting Type filter tooltip.',
      'Usage Types':
        'Identifies the core benefit or primary functional purpose.',
      Orientation:
        'Specifies the operating direction. (i.e. Horizontal: overhead; moves in and out. Vertical: side-mounted; moves up and down.)',
    };

    const filterHeaders = document.querySelectorAll(
      '[data-sf-field-type="taxonomy"] h4',
    );

    filterHeaders.forEach(function (header) {
      // Check if tooltip already exists to prevent duplicates
      if (header.querySelector('.filter-tooltip-container')) {
        return;
      }

      // Get the header text to match with tooltip content
      const headerText = header.textContent.trim();
      const tooltipText = tooltipContent[headerText];

      // Only add tooltip if we have content defined for this header
      if (!tooltipText) {
        return;
      }

      // Create tooltip container
      const tooltipContainer = document.createElement('span');
      tooltipContainer.className = 'filter-tooltip-container';

      // Create tooltip icon
      const tooltipIcon = document.createElement('img');
      tooltipIcon.src =
        '/wp-content/themes/shading-systems/resources/images/icon-info-black.svg';
      tooltipIcon.alt = 'Information';
      tooltipIcon.className = 'filter-tooltip-icon';

      // Create tooltip text element
      const tooltipTextElement = document.createElement('span');
      tooltipTextElement.className = 'filter-tooltip-text';
      tooltipTextElement.textContent = tooltipText;

      // Append elements
      tooltipContainer.appendChild(tooltipIcon);
      tooltipContainer.appendChild(tooltipTextElement);
      header.appendChild(tooltipContainer);
    });
  }, 100);
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
import.meta.webpackHot?.accept(console.error);
