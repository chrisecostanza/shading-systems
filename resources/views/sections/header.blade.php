<header width="100%" class="banner sticky-time">
  <div class="fluid-container">
    <nav class="navbar navbar-expand-lg">
      <a class="navbar-brand" href="{{ home_url('/') }}">
        <img src="@asset('images/shading-systems-logo.svg')" alt="Shading Systems Logo" width="188" height="64">
      </a>

      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu([
          'theme_location' => 'primary_navigation',
          'depth' => 4,
          'container_class' => 'collapse navbar-collapse',
          'menu_class' => 'navbar-nav',
          'walker' => new \App\wp_bootstrap5_navwalker()
        ]) !!}
      @endif

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
          <a href="#">
            <img src="@asset('images/icon-phone-black.svg')" alt="Phone Icon" width="30" height="30">
          </a>
          <a href="#">
            <img src="@asset('images/icon-email-black.svg')" alt="Email Icon" width="30" height="30">
          </a>
          <a href="#">
            <img src="@asset('images/icon-location-black.svg')" alt="Location Icon" width="30" height="30">
          </a>
        </div>
      </div>
      
    </nav>
  </div>
</header>

<div class="modal fade hide" id="mobile-nav" tabindex="-1" role="dialog" aria-labelledby="mobile-nav" aria-hidden="true">
  <div class="modal-dialog modal-dialog-slideout modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <a class="navbar-brand-mobile" href="{{ home_url('/') }}">
          <img src="@asset('images/shading-systems-logo.svg')" alt="Shading Systems Logo" width="188" height="64">
        </a>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><img src="@asset('images/icon-mobile-close.svg')" alt="Close Menu" width="24" height="24"></span>
        </button>
      </div>

      <div class="modal-body">
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
          <div class="mobile-contacts">
            <a href="#">
              <img src="@asset('images/icon-phone-black.svg')" alt="Phone Icon" width="30" height="30">
            </a>
            <a href="#">
              <img src="@asset('images/icon-email-black.svg')" alt="Email Icon" width="30" height="30">
            </a>
            <a href="#">
              <img src="@asset('images/icon-location-black.svg')" alt="Location Icon" width="30" height="30">
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
