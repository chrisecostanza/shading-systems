<div class="page-header">
  <img class="page-header-img" src={{ the_field('page_title_bg') }} alt="why choose us photo">
  <h1>{!! $title !!}</h1>
</div>

<div id="contact-page">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 col-left">
        <h2>Contact Our Audiologists</h2>
        <p class="contact-paragraph">For general inquiries please use our contact form.</p>

        @php $args = array(
          'posts_per_page' => -1,
          'post_type' => 'offices',
          'post_status' => 'publish',
          'orderby' => 'menu_order',
        );
        $office_locations = new WP_Query( $args );
        if ( $office_locations->have_posts() ) : @endphp
          @php while ( $office_locations->have_posts() ) : $office_locations->the_post() @endphp
            <div class="office-contact-details">
              <h3>{{ the_field('office_title') }}</h3>
              <p class="office-address">
                {{ the_field('office_address') }}<br />
                {{ the_field('office_city') }}, {{ the_field('office_state') }} {{ the_field('office_zipcode') }}<br />
                <b>Phone: <a href='tel:{{ the_field('office_phone') }}'>{{ the_field('office_phone') }}</a></b><br />
                {{-- <b>Text: <a href='tel:{{ the_field('office_phone') }}'>{{ the_field('office_text') }}</a></b> --}}
              </p>
              <a href={{ get_permalink() }} class="office-link">More office details</a>
            </div>
          @php endwhile @endphp
        @php else : @endphp
          <p>Ooops, no offices here!</p>
        @php endif @endphp
        @php wp_reset_postdata() @endphp
      </div>
      <div class="col-12 col-md-6 col-right">
        <div class="contact-form-container">
          <form accept-charset="UTF-8" action="https://jpo906.infusionsoft.com/app/form/process/5284120bc3b80bbe6d08d16e7de865b9" class="infusion-form" id="inf_form_5284120bc3b80bbe6d08d16e7de865b9" method="POST">
            <input name="inf_form_xid" type="hidden" value="5284120bc3b80bbe6d08d16e7de865b9" />
            <input name="inf_form_name" type="hidden" value="Form - Contact Us - Cincinnati" />
            <input name="infusionsoft_version" type="hidden" value="1.70.0.474484" />
            <div class="infusion-field">
              <label for="inf_field_FirstName">First Name *</label>
              <input id="inf_field_FirstName" name="inf_field_FirstName" placeholder="" type="text" />
            </div>
            <div class="infusion-field">
              <label for="inf_field_LastName">Last Name *</label>
              <input id="inf_field_LastName" name="inf_field_LastName" placeholder="" type="text" />
            </div>
            <div class="infusion-field">
              <label for="inf_field_Email">Email *</label>
              <input id="inf_field_Email" name="inf_field_Email" placeholder="" type="text" />
            </div>
            <div class="infusion-field">
              <label for="inf_field_Phone1">Phone *</label>
              <input id="inf_field_Phone1" name="inf_field_Phone1" placeholder="" type="text" />
            </div>
            <div class="infusion-field form-textarea">
              <label for="inf_custom_Howcanwehelpyou">How can we help you?</label>
              <textarea cols="24" id="inf_custom_Howcanwehelpyou" name="inf_custom_Howcanwehelpyou" placeholder="" rows="5"></textarea>
            </div>
            <div class="infusion-submit">
              <button class="infusion-recaptcha btn btn-white" id="recaptcha_5284120bc3b80bbe6d08d16e7de865b9" type="submit">Submit</button>
            </div>
          </form>
          <script type="text/javascript" src="https://jpo906.infusionsoft.app/app/webTracking/getTrackingCode"></script>
          <script type="text/javascript" src="https://jpo906.infusionsoft.com/resources/external/recaptcha/production/recaptcha.js?b=1.70.0.474484"></script>
          <script src="https://www.google.com/recaptcha/api.js?onload=onloadInfusionRecaptchaCallback&render=explicit" async="async" defer="defer"></script>
          <script type="text/javascript" src="https://jpo906.infusionsoft.com/app/timezone/timezoneInputJs?xid=f845c8cb9a25e68cfa55a191608f90ba"></script>
          <script type="text/javascript" src="https://jpo906.infusionsoft.app/app/webform/overwriteRefererJs"></script>
        </div>
      </div>
    </div>
  </div>
</div>
