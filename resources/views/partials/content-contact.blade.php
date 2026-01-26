@include('partials.page-header')

<div id="contact-page">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-6 col-left">
        <h2>{{ the_field('forms_column_h2') }}</h2>
        <div class="form-tab-buttons">
          <a href="#" class="btn tab-btn tab-1 active">{{ the_field('tab_1_text') }}</a><a href="#" class="btn tab-btn tab-2">{{ the_field('tab_2_text') }}</a>
          {{-- <a href="#" class="btn tab-btn tab-3">{{ the_field('tab_3_text') }}</a> --}}
        </div>
        <div class="tab-content tab-1-content">
          @php $form_1 = get_field('form_1_id') @endphp
          @php echo do_shortcode('[forminator_form id="' . $form_1 . '"]') @endphp
        </div>
        <div class="tab-content tab-2-content" style="display:none;">
          @php $form_2 = get_field('form_2_id') @endphp
          @php echo do_shortcode('[forminator_form id="' . $form_2 . '"]') @endphp
        </div>
        {{-- <div class="tab-content tab-3-content" style="display:none;">
          @php $form_3 = get_field('form_3_id') @endphp
          @php echo do_shortcode('[forminator_form id="' . $form_3 . '"]') @endphp
        </div> --}}
      </div>
      <div class="col-12 col-lg-6 col-right">
        <div class="contact-request-service-content">
          <p>{{ the_field('offices_column_request_service') }}</p>
          <a href="{{ the_field('offices_column_request_service_btn_url') }}" class="btn">{{ the_field('offices_column_request_service_btn_text') }}</a>
        </div>
        <h2>{{ the_field('offices_column_h2') }}</h2>
        <div class="locations-list">
          @php $args = array(
            'posts_per_page' => -1,
            'post_type' => 'locations',
            'post_status' => 'publish',
          );
          $location_list = new WP_Query( $args );
          if ( $location_list->have_posts() ) : @endphp
            @php while ( $location_list->have_posts() ) : $location_list->the_post() @endphp
              <div class="location-content">
                <h3>{{ the_field('office_city') }}</h3>
                <p class="office-address">
                  {{ the_field('office_address') }}<br />
                  {{ the_field('office_city') }}, {{ the_field('office_state') }} {{ the_field('office_zipcode') }}
                </p>
                <p style="margin-bottom: 20px;">Denver office open by appointment only.</p>
                <p class="office-phone">
                  <strong>Office:</strong> <a href="tel:{{ the_field('office_phone') }}">{{ the_field('office_phone') }}</a><br />
                  <strong>Mobile:</strong> <a href="tel:{{ the_field('office_cell') }}">{{ the_field('office_cell') }}</a>
                </p>
                <div class="office-notes">{{ the_field('office_notes') }}</div>
                {{-- <a href="{{ the_permalink() }}" class="btn btn-yellow">More Office Details</a> --}}
              </div>
            @php endwhile @endphp
          @php else : @endphp
            <p>Ooops, no location here!</p>
          @php endif @endphp
          @php wp_reset_postdata() @endphp
        </div>
      </div>
    </div>
  </div>
</div>
