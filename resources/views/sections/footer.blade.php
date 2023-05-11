<footer>
  <div class="container footer-logo">
    <a class="navbar-brand" href="{{ home_url('/') }}">
      <img src="@asset('images/shading-systems-footer-logo.svg')" alt="Shading Systems Logo" width="308" height="64">
    </a>
  </div>
  <div class="container footer-container">
    @php $args = array(
      'posts_per_page' => 1,
      'post_type' => 'locations',
      'post_status' => 'publish',
    );
    $location_one = new WP_Query( $args );
    if ( $location_one->have_posts() ) : @endphp
      @php while ( $location_one->have_posts() ) : $location_one->the_post() @endphp
        <div class="footer-col-1">
        <h5>{{ the_field('office_city') }}</h5>
        <p class="office-address">
          {{ the_field('office_address') }}<br />
          {{ the_field('office_city') }}, {{ the_field('office_state') }} {{ the_field('office_zipcode') }}
        </p>
        <p class="office-phone">
          <strong>Office:</strong> <a href="tel:{{ the_field('office_phone') }}">{{ the_field('office_phone') }}</a>
        </p>
        <p class="office-phone">
          <strong>Mobile:</strong> <a href="tel:{{ the_field('office_cell') }}">{{ the_field('office_cell') }}</a>
        </p>
        </div>
      @php endwhile @endphp
    @php else : @endphp
      <p>Ooops, no location here!</p>
    @php endif @endphp
    @php wp_reset_postdata() @endphp
    <div class="footer-col-2">
      <h5>Connect With Us</h5>
      <div class="footer-social">
        <a href="{{ the_field('facebook_url', 'option') }}" target="_blank" rel="noopener">
          <img src="@asset('images/icon-facebook-white.svg')" width="30" height="30" alt="Facebook Logo">
        </a>
        <a href="{{ the_field('instagram_url', 'option') }}" target="_blank" rel="noopener">
          <img src="@asset('images/icon-instagram-white.svg')" width="30" height="30" alt="Instagram Logo">
        </a>
      </div>
    </div>
    @php $args = array(
      'posts_per_page' => 1,
      'offset' => 1,
      'post_type' => 'locations',
      'post_status' => 'publish',
    );
    $location_one = new WP_Query( $args );
    if ( $location_one->have_posts() ) : @endphp
      @php while ( $location_one->have_posts() ) : $location_one->the_post() @endphp
        <div class="footer-col-3">
        <h5>{{ the_field('office_city') }}</h5>
        <p class="office-address">
          {{ the_field('office_address') }}<br />
          {{ the_field('office_city') }}, {{ the_field('office_state') }} {{ the_field('office_zipcode') }}
        </p>
        <p class="office-phone">
          <strong>Office:</strong> <a href="tel:{{ the_field('office_phone') }}">{{ the_field('office_phone') }}</a>
        </p>
        <p class="office-phone">
          <strong>Mobile:</strong> <a href="tel:{{ the_field('office_cell') }}">{{ the_field('office_cell') }}</a>
        </p>
        </div>
      @php endwhile @endphp
    @php else : @endphp
      {{-- <p>Ooops, no location here!</p> --}}
    @php endif @endphp
    @php wp_reset_postdata() @endphp
    {{-- <div class="footer-col-3">
      <h5>Las Vegas</h5>
      <p class="office-address">123 Street Address<br />
      Las Vegas, NV 12345</p>
      <p class="office-phone"><strong>Office:</strong> <a href="tel:303-517-1994">303-517-1994</a></p>
      <p class="office-phone"><strong>Mobile:</strong> <a href="tel:303-517-5868">303-517-5868</a></p>
    </div> --}}
  </div>
  <div class="container footer-copyright">
    <div class="copyright">
      <p>© Copyright {{ date('Y') }} - {{ the_field('copyright', 'option') }}</p>
      <p>
        <a href="/privacy-policy/">Privacy Policy</a> - Designed & Developed by <a href="https://punchbugmarketing.com" target="_blank" rel="noreferrer">Punch Bug Marketing</a>
      </p>
    </div>
  </div>
</footer>
