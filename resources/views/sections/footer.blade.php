<footer>
  <div class="container footer-container">
    <div class="footer-col-1">
      <a class="navbar-brand" href="{{ home_url('/') }}">
        <img src="@asset('images/hillhearbetter-logo.svg')" alt="Hill Hear Better Clinic Logo" width="220" height="83">
      </a>
      <h5>Your Hearing Matters</h5>
      <div class="footer-social">
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
    <div class="footer-col-2">
      <h5>Email Newsletter</h5>
      <div class="newsletter-signup">
        <!-- Begin MailChimp Signup Form -->
        <div id="mc_embed_signup" style="text-align: left;">
          <form action="https://hillhearbetter.us13.list-manage.com/subscribe/post?u=ac0ada180906ec475d55e146a&amp;id=e169e0bdee" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate customize-unpreviewable" target="_blank" novalidate="">
            <div id="mc_embed_signup_scroll">
            <label for="mce-EMAIL">Email Address</label>
            <input type="email" value="" name="EMAIL" class="email form-control" id="mce-EMAIL" placeholder="" required="">
            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
            <div style="position: absolute; left: -5000px;" aria-hidden="true">
              <input type="text" name="b_ac0ada180906ec475d55e146a_e169e0bdee" tabindex="-1" value="">
            </div>
            <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-small btn-dark-blue"></div>
            </div>
          </form>
        </div>
        <!--End mc_embed_signup-->
      </div>
    </div>
    <div class="footer-col-3">
      <h5>Locations</h5>
      @php
        wp_nav_menu( array(
          'depth' => 1,
          'menu' => 6,
          'container_class' => 'footer-nav-bar',
          'menu_class' => 'footer-nav',
        ) );
      @endphp
    </div>
    <div class="footer-col-4">
      @php if ( have_rows('footer_logos', 'option') ) : @endphp
        @php while ( have_rows('footer_logos', 'option') ) : the_row() @endphp
          @if ( get_sub_field('logo_url', 'option') )
            <a href={{ the_sub_field('logo_url', 'option') }} target="_blank" rel="noopener">
              <img src={{ the_sub_field('logo_image', 'option') }} width="200" height="41" alt="Excellence In Audiology Logo">
            </a>
          @else
            <img src={{ the_sub_field('logo_image', 'option') }} width="200" height="41" alt="Excellence In Audiology Logo">
          @endif
        @php endwhile @endphp
      @php endif @endphp
    </div>
  </div>

  <div class="container footer-copyright">
    <div class="copyright">
      <p>© {{ date('Y') }} {{ the_field('copyright_text', 'option') }}</p>
      <p>
        <a href="/privacy-policy/">Privacy Policy</a> - Designed & Developed by <a href="https://punchbugmarketing.com" target="_blank" rel="noreferrer">Punch Bug Marketing</a>
      </p>
    </div>
  </div>
</footer>
