@include('partials.page-header')

<section id="service-request-hero">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-6 col-left">
        @php $request_hero_id = get_field('service_request_hero_photo') @endphp
        @php $request_hero_photo = wp_get_attachment_image_src( $request_hero_id, 'full' ) @endphp
        @php $request_hero_photo_alt = get_post_meta($request_hero_id, '_wp_attachment_image_alt', true) @endphp
        <img src="@php echo $request_hero_photo[0] @endphp" alt="@php echo $request_hero_photo_alt @endphp" width="100%" height="auto">
      </div>
      <div class="col-12 col-lg-6 col-right">
        <h2>{{ the_field('service_request_hero_h2') }}</h2>
        <div class="service-request-paragraph">{{ the_field('service_request_hero_paragraph') }}</div>
        <a href="{{ the_field('service_request_hero_btn_url') }}" class="btn">{{ the_field('service_request_hero_btn_text') }}</a>
      </div>
    </div>
  </div>
</section>

<section id="service-request-guides">
  <div class="container">
    <div class="row">
      <div class="service-request-guides-opening">
        <h2>{{ the_field('service_request_guides_h2') }}</h2>
        <div>{{ the_field('service_request_guides_paragraph') }}</div>
      </div>
      @php if ( have_rows('service_request_maintenance_guides') ) : @endphp
        <div class="service-request-guides-grid">
        @php $tabCount = 1 @endphp
        @php while ( have_rows('service_request_maintenance_guides') ) : the_row() @endphp
          @php $ingredient_img_id = get_sub_field('guide_icon') @endphp
          @php $ingredient_img = wp_get_attachment_image_src( $ingredient_img_id, 'full' ) @endphp
          @php $ingredient_img_alt = get_post_meta($ingredient_img_id, '_wp_attachment_image_alt', true) @endphp
          <div style="padding-left: 4px; padding-right: 4px;">
            <div class="service-request-guides-grid-item tab-btn tab-{{ $tabCount }} @if( $tabCount === 1) active @endif">
              <img src="@php echo $ingredient_img[0] @endphp" alt="@php echo $ingredient_img_alt @endphp" class="" width="65" height="auto">
              <p>{{ the_sub_field('guide_name') }}</p>
            </div>
          </div>
          @php $tabCount++ @endphp
        @php endwhile @endphp
        </div>
      @php endif @endphp

      <?php reset_rows(); ?>
      <?php wp_reset_query(); ?>

      @php if ( have_rows('service_request_maintenance_guides') ) : @endphp
        @php $tabCount = 1 @endphp
        @php while ( have_rows('service_request_maintenance_guides') ) : the_row() @endphp
          <div class="tab-content tab-{{ $tabCount }}-content" @if( $tabCount > 1) style="display:none;" @endif>
            @if ( have_rows('guide_pdfs') )
              @php while ( have_rows('guide_pdfs') ) : the_row() @endphp
                <div class="service-request-guides-download">
                  <p>{{ basename(get_sub_field('guide_pdf')) }}</p>
                  <a href="{{ the_sub_field('guide_pdf') }}" class="btn">Download</a>
                </div>
              @php endwhile @endphp
            @endif

            @if ( have_rows('guide_faqs') )
              @php while ( have_rows('guide_faqs') ) : the_row() @endphp
                <div class="faq-item">
                  <div class="faq-content">
                    <div class="faq-question accordion-trigger">
                      <h3 class="accordion">{{ the_sub_field('guide_faq_question') }}</h3>
                    </div>
                    <div class="faq-panel hidden">
                      {{ the_sub_field('guide_faq_answer') }}
                    </div>
                  </div>
                  <div class="faq-screw-head accordion-trigger">
                    <img class="faq-plus" src="@asset('images/icon-faq-blue-arrow.svg')" alt="down arrow" width="22" height="10">
                    <img class="faq-minus hidden" src="@asset('images/icon-faq-blue-arrow.svg')" alt="up arrow" width="22" height="10">
                  </div>
                </div>
              @php endwhile @endphp
            @endif
          </div>
          @php $tabCount++ @endphp
        @php endwhile @endphp
      @php endif @endphp
    </div>
  </div>
</section>

<section id="service-request-maintenance">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-6 col-left">
        @php $request_maintenance_id = get_field('service_request_maintenance_photo') @endphp
        @php $request_maintenance_photo = wp_get_attachment_image_src( $request_maintenance_id, 'full' ) @endphp
        @php $request_maintenance_photo_alt = get_post_meta($request_maintenance_id, '_wp_attachment_image_alt', true) @endphp
        <img src="@php echo $request_maintenance_photo[0] @endphp" alt="@php echo $request_maintenance_photo_alt @endphp" width="100%" height="auto">
      </div>
      <div class="col-12 col-lg-6 col-right">
        <h2>{{ the_field('service_request_maintenance_h2') }}</h2>
        <div class="service-request-paragraph">{{ the_field('service_request_maintenance_paragraph') }}</div>
        <a href="{{ the_field('service_request_maintenance_btn_url') }}" class="btn">{{ the_field('service_request_maintenance_btn_text') }}</a>
      </div>
    </div>
  </div>
</section>

<section id="service-request-form">
  <div class="container">
    <div class="row">
      <div class="service-request-form-container">
        <h2>Service Request Form</h2>
        <div>
          @php $request_form = get_field('service_request_form_id') @endphp
          @php echo do_shortcode('[forminator_form id="' . $request_form . '"]') @endphp
        </div>
      </div>
    </div>
  </div>
</section>
