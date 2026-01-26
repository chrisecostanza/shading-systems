@include('partials.page-header')

<section id="area-hero-section">
  <div class="fluid-container area-hero">
    @php $area_hero_id = get_field('area_hero_photo') @endphp
    @php $area_hero_photo = wp_get_attachment_image_src( $area_hero_id, 'full' ) @endphp
    @php $area_hero_alt = get_post_meta($area_hero_id, '_wp_attachment_image_alt', true) @endphp
    <img src="@php echo $area_hero_photo[0] @endphp" alt="@php echo $area_hero_alt @endphp">
    <h2 class="container">{{ the_field('area_hero_h2') }}</h2>
  </div>
</section>

<section id="area-solutions-section">
  <div class="container">
    <h2>{{ the_field('area_solutions_h2') }}</h2>
    @php if ( have_rows('area_solutions_photos') ) : @endphp
      <div class="area-solutions-carousel-slider">
        @php while ( have_rows('area_solutions_photos') ) : the_row() @endphp
          @php $solutions_photo_id = get_sub_field('area_solution_photo') @endphp
          @php $solutions_photo_photo = wp_get_attachment_image_src( $solutions_photo_id, 'full' ) @endphp
          @php $solutions_photo_alt = get_post_meta($solutions_photo_id, '_wp_attachment_image_alt', true) @endphp
          <img class="area-solutions-photo" src="@php echo $solutions_photo_photo[0] @endphp" alt="@php echo $solutions_photo_alt @endphp">
        @php endwhile @endphp
      </div>
    @php endif @endphp
    <div class="area-solutions-description">{{ the_field('area_solutions_description') }}</div>
    <a href="{{ the_field('area_solutions_btn_url') }}" class="btn btn-blue">{{ the_field('area_solutions_btn_text') }}</a>
  </div>
</section>

<section id="area-card-section">
  <div class="container">
    @php if ( have_rows('area_content_card') ) : @endphp
    <div class="area-carousel-grid">
      @php while ( have_rows('area_content_card') ) : the_row() @endphp
        <div class="area-carousel-content">
            
          @php if ( have_rows('area_card_carousel') ) : @endphp
            <div class="area-card-carousel-slider">
              @php while ( have_rows('area_card_carousel') ) : the_row() @endphp
                @php $card_photo_id = get_sub_field('area_card_photo') @endphp
                @php $card_photo_photo = wp_get_attachment_image_src( $card_photo_id, 'full' ) @endphp
                @php $card_photo_alt = get_post_meta($card_photo_id, '_wp_attachment_image_alt', true) @endphp
                <img class="area-card-photo" src="@php echo $card_photo_photo[0] @endphp" alt="@php echo $card_photo_alt @endphp">
              @php endwhile @endphp
            </div>
          @php endif @endphp

          @if ( get_sub_field('area_card_title') )  
            <h3>{{ the_sub_field('area_card_title') }}</h3>
          @endif

          @if ( get_sub_field('area_card_paragraph') )
            <div class="area-card-description">
              {{ the_sub_field('area_card_paragraph') }}
            </div>
          @endif

          @if ( get_sub_field('area_card_btn_text') )
            <a href="{{ the_sub_field('area_card_btn_url') }}" class="btn">{{ the_sub_field('area_card_btn_text') }}</a>
          @endif
        </div>
      @php endwhile @endphp
    </div>
    @php endif @endphp
  </div>
</section>

@include('partials.new-project-cta')