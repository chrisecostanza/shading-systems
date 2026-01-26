<div id="utility-bar">
  <a href="/service-request/">Service Request</a>
</div>
<header width="100%" class="banner sticky-time">
  <div class="fluid-container">
    <nav class="navbar navbar-expand-lg">
      <a class="navbar-brand" href="{{ home_url('/') }}">
        {{-- <img src="@asset('images/denver-shade-logo.svg')" alt="The Denver Shade Company Logo" width="250" height="28"> --}}
        {{-- <img src="@asset('images/shading-systems-logo.svg')" alt="Shading Systems Logo" width="188" height="64"> --}}
        <img src="@asset('images/shading-systems-horizontal-logo.svg')" alt="Shading Systems Logo" width="255" height="53">
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
          @if ( get_field('general_phone_number', 'options') )
            <a href="tel:{{ the_field('general_phone_number', 'options') }}">
              <img src="@asset('images/icon-phone-black.svg')" alt="Phone Icon" width="30" height="30">
            </a>
          @endif
          @if ( get_field('general_email', 'options') )
            <a href="{{ the_field('general_email', 'options') }}">
              <img src="@asset('images/icon-email-black.svg')" alt="Email Icon" width="30" height="30">
            </a>
          @endif
          @if ( get_field('main_office_google_map_url', 'options') )
            <a href="{{ the_field('main_office_google_map_url', 'options') }}" target="_blank" rel="noopener">
              <img src="@asset('images/icon-location-black.svg')" alt="Location Icon" width="30" height="30">
            </a>
          @endif
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
          <img src="@asset('images/denver-shade-logo.svg')" alt="The Denver Shade Company Logo" width="225" height="25">
          {{-- <img src="@asset('images/shading-systems-logo.svg')" alt="Shading Systems Logo" width="188" height="64"> --}}
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

        <div class="nav-mobile-container">
          <ul class="utility-nav-mobile nav navbar-nav">
            <li class="menu-item nav-item"><a href="/service-request/" class="nav-link">Service Request</a></li>
          </ul>
        </div>

        <div class="bottom-bar-mobile">
          <div class="mobile-contacts">
            @if ( get_field('general_phone_number', 'options') )
              <a href="tel:{{ the_field('general_phone_number', 'options') }}">
                <img src="@asset('images/icon-phone-black.svg')" alt="Phone Icon" width="30" height="30">
              </a>
            @endif
            @if ( get_field('general_email', 'options') )
              <a href="mailto:{{ the_field('general_email', 'options') }}">
                <img src="@asset('images/icon-email-black.svg')" alt="Email Icon" width="30" height="30">
              </a>
            @endif
            @if ( get_field('main_office_google_map_url', 'options') )
              <a href="{{ the_field('main_office_google_map_url', 'options') }}" target="_blank" rel="noopener">
                <img src="@asset('images/icon-location-black.svg')" alt="Location Icon" width="30" height="30">
              </a>
            @endif
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
