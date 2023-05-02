@include('partials.page-header')

<section id="opening-paragraph">
  <div class="container thin-container">
    <div class="row">
      <div class="col-12">
        {{ the_content() }}
      </div>
    </div>
  </div>
</section>

<div id="hearing-consultation">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-12 col-lg-5 col-left">
        @php $consultation_photo_id = get_field('consultation_photo') @endphp
        @php $consultation_photo = wp_get_attachment_image_src( $consultation_photo_id, 'full' ) @endphp
        @php $consultation_photo_alt = get_post_meta($consultation_photo_id, '_wp_attachment_image_alt', true) @endphp
        <img src="@php echo $consultation_photo[0] @endphp" alt="@php echo $consultation_photo_alt @endphp">
      </div>
      <div class="col-12 col-lg-7 col-right">
        <div class="content-container">
          <h2>{{ the_field('consultation_h2') }}</h2>
          {{ the_field('consultation_content') }}
        </div>
      </div>
    </div>
  </div>
</div>

<div id="hearing-aid-styles">
  <div class="container text-center">
    <h2>{{ the_field('hearing_styles_h2') }}</h2>
    {{ the_field('hearing_styles_content') }}
    <div class="hearing-aid-grid">
      @php if ( have_rows('hearing_styles_grid') ) : @endphp
        @php while ( have_rows('hearing_styles_grid') ) : the_row() @endphp
          <img src={{ the_sub_field('hearing_aid_photo') }} alt="{{ the_sub_field('hearing_aid_title') }} - {{ the_sub_field('hearing_aid_description') }}" title="{{ the_sub_field('hearing_aid_title') }} - {{ the_sub_field('hearing_aid_description') }}">
        @php endwhile @endphp
      @php endif @endphp
    </div>
  </div>
</div>

<div id="performance-level">
  <div class="container">
    <div class="performance-container">
      <div class="content-container">
        <h2>{{ the_field('hearing_performance_h2') }}</h2>
        {{ the_field('hearing_performance_content') }}
      </div>
      <div class="photo-container">
        @php $performance_photo_id = get_field('hearing_performance_photo') @endphp
        @php $performance_photo = wp_get_attachment_image_src( $performance_photo_id, 'full' ) @endphp
        @php $performance_photo_alt = get_post_meta($performance_photo_id, '_wp_attachment_image_alt', true) @endphp
        <img src="@php echo $performance_photo[0] @endphp" alt="@php echo $performance_photo_alt @endphp">
      </div>
    </div>
  </div>
</div>

<div id="hearing-aid-manufacturers">
  <div class="container text-center">
    <h2>{{ the_field('manufacturers_h2') }}</h2>
    {{ the_field('manufacturers_content') }}
    <div class="manufacturers-grid">
      @php if ( have_rows('manufacturers_photos') ) : @endphp
        @php while ( have_rows('manufacturers_photos') ) : the_row() @endphp
          <img src={{ the_sub_field('manufacturers_photo') }} alt="{{ the_sub_field('manufacturers_photo_alt') }}">
        @php endwhile @endphp
      @php endif @endphp
    </div>
  </div>
</div>

@include('partials.contact-form')
