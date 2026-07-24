<footer>
  <div class="container footer-container">
    <div class="footer-column-1 footer-menus">
      <div>
        <h4>Products</h4>
        {!! wp_nav_menu([
          'menu' => 116,
          'depth' => 1,
          'menu_class' => 'footer-menu',
          'walker' => new \App\wp_bootstrap5_navwalker()
        ]) !!}
      </div>
      <div>
        <h4>Inspiration</h4>
        {!! wp_nav_menu([
          'menu' => 117,
          'depth' => 1,
          'menu_class' => 'footer-menu',
          'walker' => new \App\wp_bootstrap5_navwalker()
        ]) !!}
      </div>
      <div>
        <h4>More</h4>
        {!! wp_nav_menu([
          'menu' => 118,
          'depth' => 1,
          'menu_class' => 'footer-menu',
          'walker' => new \App\wp_bootstrap5_navwalker()
        ]) !!}
      </div>
    </div>
    <div class="footer-column-2">
      @php $args = array(
        'posts_per_page' => 1,
        'post_type' => 'locations',
        'post_status' => 'publish',
      );
      $location_one = new WP_Query( $args );
      if ( $location_one->have_posts() ) : @endphp
        @php while ( $location_one->have_posts() ) : $location_one->the_post() @endphp
          <div class="footer-office">
            <h4>Office</h4>
            <p class="office-address">
              {!! str_replace(',', '<br>', get_field('office_address')) !!}<br />
              {{ the_field('office_city') }}, {{ the_field('office_state') }} {{ the_field('office_zipcode') }}
            </p>
            <p class="office-phone">
              Office: <a href="tel:{{ the_field('office_phone') }}">{{ the_field('office_phone') }}</a>
            </p>
            <p class="office-phone">
              Mobile: <a href="tel:{{ the_field('office_cell') }}">{{ the_field('office_cell') }}</a>
            </p>
          </div>
        @php endwhile @endphp
      @php else : @endphp
        <p>Ooops, no location here!</p>
      @php endif @endphp
      @php wp_reset_postdata() @endphp

      <div class="footer-social">
        <a href="{{ the_field('facebook_url', 'option') }}" target="_blank" rel="noopener">
          <img src="@asset('images/facebook-icon-white.svg')" width="40" height="40" alt="Facebook Logo">
        </a>
        <a href="{{ the_field('instagram_url', 'option') }}" target="_blank" rel="noopener">
          <img src="@asset('images/instagram-icon-white.svg')" width="40" height="40" alt="Instagram Logo">
        </a>
        <a href="{{ the_field('youtube_url', 'option') }}" target="_blank" rel="noopener">
          <img src="@asset('images/youtube-icon-white.svg')" width="40" height="40" alt="Youtube Logo">
        </a>
        <a href="{{ the_field('pinterest_url', 'option') }}" target="_blank" rel="noopener">
          <img src="@asset('images/pinterest-icon-white.svg')" width="40" height="40" alt="Pinterest Logo">
        </a>
        <a href="{{ the_field('vimeo_url', 'option') }}" target="_blank" rel="noopener">
          <img src="@asset('images/vimeo-icon-white.svg')" width="40" height="40" alt="Vimeo Logo">
        </a>
      </div>
    </div>
  </div>

  <div class="container footer-copyright">
    <div class="copyright">
      <p>© Copyright {{ date('Y') }} - {{ the_field('copyright', 'option') }}</p>
      <p>
        <a href="/privacy-policy/">Privacy Policy</a> - <a href="https://punchbugmarketing.com" target="_blank" rel="noreferrer">Punch Bug Marketing</a>
      </p>
    </div>
  </div>
</footer>
