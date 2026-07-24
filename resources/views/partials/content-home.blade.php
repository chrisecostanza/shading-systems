<section id="home-hero">
  <div class="container-fluid home-hero-grid">
    <div class="row">
      <div class="col-12 col-lg-6 home-hero-left">
        <div class="home-hero-left-content">
          <h1>{{ the_field('page_title') }}</h1>
          <p>{{ the_field('hero_paragraph') }}</p>
          <a href="#" class="btn btn-blue video-trigger" data-bs-toggle="modal" data-bs-target="#ss-video">Watch Video</a>
        </div>

        <!-- Modal -->
        <div class="modal fade video-modal" id="ss-video" tabindex="-1" aria-labelledby="ssVideoLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="ssVideoLabel">{{ the_field('ss_video_title') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="ratio ratio-16x9">
                  {{-- <iframe data-src="https://www.youtube.com/embed/{{ the_field('ss_video_id') }}" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;" allowfullscreen></iframe> --}}
                  <iframe data-src="https://player.vimeo.com/video/{{ the_field('ss_video_id') }}?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" src="" frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media" title="Shading Systems - Expanding Our Vision"></iframe>
                  <script src="https://player.vimeo.com/api/player.js"></script>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6 home-hero-right">
        @php $hero_photo_id = get_field('hero_image') @endphp
        @php $hero_photo = wp_get_attachment_image_src( $hero_photo_id, 'full' ) @endphp
        @php $hero_photo_alt = get_post_meta($hero_photo_id, '_wp_attachment_image_alt', true) @endphp
        <img src="@php echo $hero_photo[0] @endphp" alt="@php echo $hero_photo_alt @endphp" width="100%" height="auto">
      </div>
    </div>
  </div>
</section>

<section id="home-weather">
  <div class="container">
    @php echo do_shortcode('[location-weather id="4447"]') @endphp
  </div>
</section>

<section id="home-outdoor-systems">
  <div class="container">
    <div class="home-outdoor-systems-grid">
      <div>
        <h2>{{ str_replace('-', '‑', get_field('outdoor_systems_h2')) }}</h2>
      </div>
      <div>
        {!! the_field('outdoor_systems_paragraph') !!}
        <a href="{{ the_field('outdoor_systems_button_url') }}" class="btn">{{ the_field('outdoor_systems_button_text') }}</a>
      </div>
    </div>

    <div>
      @php $outdoor_photo_id = get_field('outdoor_systems_photo') @endphp
      @php $outdoor_photo = wp_get_attachment_image_src( $outdoor_photo_id, 'full' ) @endphp
      @php $outdoor_photo_alt = get_post_meta($outdoor_photo_id, '_wp_attachment_image_alt', true) @endphp
      <img src="@php echo $outdoor_photo[0] @endphp" alt="@php echo $outdoor_photo_alt @endphp" width="100%" height="auto">
    </div>
    @php if ( have_rows('outdoor_systems_stats') ) : @endphp
      <div class="outdoor-stat-grid">
      @php while ( have_rows('outdoor_systems_stats') ) : the_row() @endphp
        <p>
          <span class="outdoor-stat">{{ the_sub_field('outdoor_systems_stat') }}</span>
          <span class="outdoor-stat-label">{{ the_sub_field('outdoor_systems_stat_label') }}</span>
        </p>
      @php endwhile @endphp
      </div>
    @php endif @endphp
  </div>
</section>

<section id="home-outdoor-shade">
  <div class="container">
    <h2>{{ the_field('outdoor_shade_h2') }}</h2>
    <div class="home-outdoor-shade-grid">
      @php if ( have_rows('outdoor_shade_types') ) : @endphp
        @php while ( have_rows('outdoor_shade_types') ) : the_row() @endphp
          <div class="home-outdoor-shade-card">
            <div>
              @php $shade_icon_id = get_sub_field('outdoor_shade_type_icon') @endphp
              @php $shade_icon = wp_get_attachment_image_src( $shade_icon_id, 'full' ) @endphp
              @php $shade_icon_alt = get_post_meta($shade_icon_id, '_wp_attachment_image_alt', true) @endphp
              <img class="home-outdoor-shade-icon" src="@php echo $shade_icon[0] @endphp" alt="@php echo $shade_icon_alt @endphp" width="50" height="auto">
            </div>
            <div>
              <h3>{{ the_sub_field('outdoor_shade_type_title') }}</h3>
              <p>{{ the_sub_field('outdoor_shade_type_description') }}</p>
              <a href="{{ the_sub_field('outdoor_shade_type_button_url') }}" class="link-btn">
                {{ the_sub_field('outdoor_shade_type_button_text') }}<img class="right-arrow" src="@asset('images/icon-blue-arrow-right.svg')" alt="right arrow" width="7" height="16">
              </a>
            </div>
          </div>
        @php endwhile @endphp
      @php endif @endphp
    </div>

    <div class="home-outdoor-shade-content">
      {{ the_field('outdoor_shade_paragraph') }}
      <a href="{{ the_field('outdoor_shade_button_url') }}" class="btn btn-blue">{{ the_field('outdoor_shade_button_text') }}</a>
    </div>
  </div>
</section>

<section id="home-brands">
  <div class="container">
    <h3>{{ the_field('brands_section_h2') }}</h3>
    @php if ( have_rows('brands_section_logos') ) : @endphp
      <div class="home-brands-grid">
      @php while ( have_rows('brands_section_logos') ) : the_row() @endphp
        <div>
          @php $brand_logo_id = get_sub_field('brand_logo') @endphp
          @php $brand_logo = wp_get_attachment_image_src( $brand_logo_id, 'full' ) @endphp
          @php $brand_logo_alt = get_post_meta($brand_logo_id, '_wp_attachment_image_alt', true) @endphp
          @php $brand_url = get_sub_field('brand_url') @endphp
          @if ($brand_url)
            <a href="{{ $brand_url }}">
              <img src="@php echo $brand_logo[0] @endphp" alt="@php echo $brand_logo_alt @endphp" width="auto" height="auto">
            </a>
          @else
            <img src="@php echo $brand_logo[0] @endphp" alt="@php echo $brand_logo_alt @endphp" width="auto" height="auto">
          @endif
        </div>
      @php endwhile @endphp
      </div>
    @php endif @endphp
  </div>
</section>

<section id="home-projects">
  <div class="container home-projects-grid">
    <div class="home-projects-left">
      <h2>{{ the_field('home_projects_h2') }}</h2>
      <p>{{ the_field('home_projects_paragraph') }}</p>
      <a href='{{ the_field('home_projects_button_url') }}'' class="btn">{{ the_field('home_projects_button_text') }}</a>
    </div>
    <div class="home-projects-right">
      <div>
        @php $home_project_id = get_field('home_projects_photo') @endphp
        @php $home_project_photo = wp_get_attachment_image_src( $home_project_id, 'full' ) @endphp
        @php $home_project_photo_alt = get_post_meta($home_project_id, '_wp_attachment_image_alt', true) @endphp
        <img src="@php echo $home_project_photo[0] @endphp" alt="@php echo $home_project_photo_alt @endphp" width="100%" height="auto">
      </div>
    </div>
  </div>
</section>

<section id="home-services">
  <div class="container">
    <div class="home-services-grid">
      <div>
        <h2>{{ get_field('home_services_h2') }}</h2>
      </div>
      <div>
        {!! the_field('home_services_paragraph') !!}
      </div>
    </div>

    @php if ( have_rows('home_services_cards') ) : @endphp
      <div class="home-service-cards">
      @php while ( have_rows('home_services_cards') ) : the_row() @endphp
        @php $services_photo_id = get_sub_field('home_services_photo') @endphp
        @php $services_photo = wp_get_attachment_image_src( $services_photo_id, 'full' ) @endphp
        @php $services_photo_alt = get_post_meta($services_photo_id, '_wp_attachment_image_alt', true) @endphp
        <div>
          <img class="home-service-photo" src="@php echo $services_photo[0] @endphp" alt="@php echo $services_photo_alt @endphp" width="100%" height="auto">
          <h3>{{ the_sub_field('home_services_title') }}</h3>
          <p>{{ the_sub_field('home_services_description') }}</p>
          <a href="{{ the_sub_field('home_services_button_url') }}" class="link-btn">
            {{ the_sub_field('home_services_button_text') }}<img class="right-arrow" src="@asset('images/icon-blue-arrow-right.svg')" alt="right arrow" width="7" height="16">
          </a>
        </div>
      @php endwhile @endphp
      </div>
    @php endif @endphp
  </div>
</section>

<section id="home-indoor-shade">
  <div class="container home-indoor-shade-grid">
    <div class="home-indoor-shade-left">
      <div>
        @php $home_project_id = get_field('home_indoor_shade_photo') @endphp
        @php $home_project_photo = wp_get_attachment_image_src( $home_project_id, 'full' ) @endphp
        @php $home_project_photo_alt = get_post_meta($home_project_id, '_wp_attachment_image_alt', true) @endphp
        <img src="@php echo $home_project_photo[0] @endphp" alt="@php echo $home_project_photo_alt @endphp" width="100%" height="auto">
      </div>
    </div>
    <div class="home-indoor-shade-right">
      <h2>{{ the_field('home_indoor_shade_h2') }}</h2>
      <p>{{ the_field('home_indoor_shade_paragraph') }}</p>
      <a href='{{ the_field('home_indoor_shade_button_url') }}'' class="btn">{{ the_field('home_indoor_shade_button_text') }}</a>
    </div>
  </div>
</section>

<section id="home-testimonials">
  <div class="container">
    <h2>{{ the_field('testimonials_h2') }}</h2>
    @php if ( have_rows('testimonial_list') ) : @endphp
      <div class="home-testimonials-carousel">
      @php while ( have_rows('testimonial_list') ) : the_row() @endphp
        <div class="home-testimonial-card">
          <div class="home-testimonial-card-content">
            <div class="home-testimonial-card-content-top">
              <div>
                <p class="testimonial-author">{{ the_sub_field('testimonial_author') }}</p>
                <p class="testimonial-job">{{ the_sub_field('testimonial_job_title') }}</p>
              </div>
              <img src="@asset('images/five-yellow-review-stars.svg')" alt="five yellow review stars" width="auto" height="20">
            </div>
            <p class="testimonial-content">"{{ the_sub_field('testimonial_content') }}"</p>
          </div>
        </div>
      @php endwhile @endphp
      </div>
    @php endif @endphp
  </div>
</section>
