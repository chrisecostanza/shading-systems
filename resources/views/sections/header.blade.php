<header width="100%" class="banner sticky-time">
  <div class="fluid-container">
    <nav class="navbar navbar-expand-lg">
      <a class="navbar-brand" href="{{ home_url('/') }}">
        <img src="@asset('images/hillhearbetter-logo.svg')" alt="Hill Hear Better Clinic Logo" width="220" height="83">
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="modal" data-bs-target="#mobile-nav"
        aria-controls="navbarToggler" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
        </span>
      </button>

      <div id="navbarToggler" class="navbar-right collapse navbar-collapse">
        <div class="nav-utility-container">
          <a href="/tinnitus-quiz/" class="btn btn-small">Take Our Tinnitus Quiz</a>
          <a href="tel:{{ the_field('phone_number', 'options') }}" class="nav-phone-link">{{ the_field('phone_number', 'options') }}</a>
          <a href="/contact/" class="btn btn-small btn-dark-blue">Contact</a>
        </div>

        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu([
            'theme_location' => 'primary_navigation',
            'depth' => 4,
            'container_class' => 'collapse navbar-collapse',
            'container_id' => 'navbarToggler',
            'menu_class' => 'navbar-nav',
            'walker' => new \App\wp_bootstrap5_navwalker()
          ]) !!}
        @endif
      </div>
      
    </nav>
  </div>
</header>

<div class="modal fade hide" id="mobile-nav" tabindex="-1" role="dialog" aria-labelledby="mobile-nav" aria-hidden="true">
  <div class="modal-dialog modal-dialog-slideout modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><img src="@asset('images/icon-mobile-close.svg')" alt="Close Menu" width="24" height="24"></span>
        </button>
      </div>

      <div class="modal-body">
        <a class="navbar-brand-mobile" href="{{ home_url('/') }}">
          <img src="@asset('images/hillhearbetter-logo.svg')" alt="Hill Hear Better Clinic Logo" width="220" height="83">
        </a>

        @php
        wp_nav_menu( array(
          'theme_location' => 'primary_navigation',
          'depth' => 2,
          'container' => 'div',
          'container_class' => 'navbar-collapse collapse show nav-mobile-container',
          'menu_class' => 'nav navbar-nav',
          'walker' => new \App\wp_bootstrap5_navwalker()
        ) );
        @endphp

        <div class="bottom-bar-mobile">
          <div class="mobile-utility-container">
            <a href="tel:{{ the_field('phone_number', 'options') }}" class="nav-phone-link">{{ the_field('phone_number', 'options') }}</a>
            <a href="/contact/" class="btn btn-small btn-dark-blue">Contact</a>
            <a href="/tinnitus-quiz/" class="btn btn-small">Take Our Tinnitus Quiz</a>
          </div>
          <div class="mobile-social">
            <a href="{{ the_field('facebook_url', 'option') }}" target="_blank" rel="noopener">
              <img src="@asset('images/icon-facebook-blue.svg')" width="27" height="27" alt="Facebook Logo">
            </a>
            <a href="{{ the_field('twitter_url', 'option') }}" target="_blank" rel="noopener">
              <img src="@asset('images/icon-twitter-blue.svg')" width="27" height="27" alt="Instagram Logo">
            </a>
            <a href="{{ the_field('linkedin_url', 'option') }}" target="_blank" rel="noopener">
              <img src="@asset('images/icon-linkedin-blue.svg')" width="27" height="27" alt="Linkedin Logo">
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
