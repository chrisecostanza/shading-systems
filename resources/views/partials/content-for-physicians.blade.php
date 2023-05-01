<div class="page-header">
  <img class="page-header-img" src={{ the_field('page_title_bg') }} alt="for physicians photo">
  <h1>{!! $title !!}</h1>
</div>

<section id="physicians-paragraph">
  <div class="container thin-container">
    <div class="row">
      <div class="col-12">
        {{ the_content() }}
      </div>
    </div>
  </div>
</section>

<div id="hearing-care">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-12 col-md-6 col-left">
        <div class="content-container">
          {{ the_field('hearing_care_content') }}
        </div>
      </div>
      <div class="col-12 col-md-6 col-right">
        @php $hearing_photo_id = get_field('hearing_care_photo') @endphp
        @php $hearing_photo = wp_get_attachment_image_src( $hearing_photo_id, 'full' ) @endphp
        @php $hearing_photo_alt = get_post_meta($hearing_photo_id, '_wp_attachment_image_alt', true) @endphp
        <img src="@php echo $hearing_photo[0] @endphp" alt="@php echo $hearing_photo_alt @endphp">
      </div>
    </div>
  </div>
</div>

<div id="diagnostic-section">
  <div class="container text-center">
    <h2>{{ the_field('diagnostics_h2') }}</h2>
    {{ the_field('diagnostics_content') }}
  </div>
</div>

<div id="partnering-section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-12 col-md-6 col-left">
        @php $partnering_photo_id = get_field('partnering_photo') @endphp
        @php $partnering_photo = wp_get_attachment_image_src( $partnering_photo_id, 'full' ) @endphp
        @php $partnering_photo_alt = get_post_meta($partnering_photo_id, '_wp_attachment_image_alt', true) @endphp
        <img src="@php echo $partnering_photo[0] @endphp" alt="@php echo $partnering_photo_alt @endphp">
      </div>
      <div class="col-12 col-md-6 col-right">
        <div class="content-container">
          {{ the_field('partnering_content') }}
        </div>
      </div>
    </div>
  </div>
</div>


@include('partials.contact-form')
