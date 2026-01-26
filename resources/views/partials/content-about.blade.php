@include('partials.page-header')

<section id="about-hero-section">
  <div class="fluid-container about-hero">
    @php $about_hero_id = get_field('about_hero_photo') @endphp
    @php $about_hero_photo = wp_get_attachment_image_src( $about_hero_id, 'full' ) @endphp
    @php $about_hero_alt = get_post_meta($about_hero_id, '_wp_attachment_image_alt', true) @endphp
    <img src="@php echo $about_hero_photo[0] @endphp" alt="@php echo $about_hero_alt @endphp">
    <h2 class="container">{{ the_field('about_hero_h2') }}</h2>
  </div>
</section>

<section id="about-message-section">
  <div class="container">
    <div class="about-message-grid">
      <div class="about-message-grid-item">
        @php $message_id = get_field('about_message_photo') @endphp
        @php $message_photo = wp_get_attachment_image_src( $message_id, 'full' ) @endphp
        @php $message_alt = get_post_meta($message_id, '_wp_attachment_image_alt', true) @endphp
        <img src="@php echo $message_photo[0] @endphp" alt="@php echo $message_alt @endphp">
        <div>{{ the_field('about_message_president') }}</div>
      </div>
      <div class="about-message-grid-item">
        <h2>{{ the_field('about_message_h2') }}</h2>
        <div>{{ the_field('about_message_description') }}</div>
      </div>
    </div>
  </div>
</section>

<section id="about-card-section">
  <div class="container">
    @php if ( have_rows('about_content_card') ) : @endphp
    <div class="about-carousel-grid">
      @php while ( have_rows('about_content_card') ) : the_row() @endphp
        <div class="about-carousel-content">
            
          @php if ( have_rows('about_card_carousel') ) : @endphp
            <div class="about-card-carousel-slider">
              @php while ( have_rows('about_card_carousel') ) : the_row() @endphp
                @php $card_photo_id = get_sub_field('about_card_photo') @endphp
                @php $card_photo_photo = wp_get_attachment_image_src( $card_photo_id, 'full' ) @endphp
                @php $card_photo_alt = get_post_meta($card_photo_id, '_wp_attachment_image_alt', true) @endphp
                <img class="about-card-photo" src="@php echo $card_photo_photo[0] @endphp" alt="@php echo $card_photo_alt @endphp">
              @php endwhile @endphp
            </div>
          @php endif @endphp

          @if ( get_sub_field('about_card_title') )  
            <h3>{{ the_sub_field('about_card_title') }}</h3>
          @endif

          @if ( get_sub_field('about_card_paragraph') )
            <div class="about-card-description">
              {{ the_sub_field('about_card_paragraph') }}
            </div>
          @endif

          @if ( get_sub_field('about_card_btn_text') )
            <a href="{{ the_sub_field('about_card_btn_url') }}" class="btn">{{ the_sub_field('about_card_btn_text') }}</a>
          @endif
        </div>
      @php endwhile @endphp
    </div>
    @php endif @endphp
  </div>
</section>

@include('partials.new-project-cta')

{{-- <section id="page-section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        {{ the_content() }}
      </div>
    </div>
  </div>
</section> --}}
