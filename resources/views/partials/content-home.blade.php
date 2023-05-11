@include('partials.page-header')

<div id="home-hero">
  @php $hero_photo_id = get_field('hero_image') @endphp
  @php $hero_photo = wp_get_attachment_image_src( $hero_photo_id, 'full' ) @endphp
  @php $hero_photo_alt = get_post_meta($hero_photo_id, '_wp_attachment_image_alt', true) @endphp
  <img class="hero-image" src="@php echo $hero_photo[0] @endphp" alt="@php echo $hero_photo_alt @endphp" width="100%">
  <p>{{ the_field('hero_paragraph') }}</p>
</div>

<div id="home-contact-cta" class="container">
  <div class="home-contact-left">
    <h2>{{ the_field('home_contact_h2') }}</h2>
    <p>{{ the_field('home_contact_paragraph') }}</p>
    <a href='{{ the_field('home_contact_btn_url') }}'' class="btn">{{ the_field('home_contact_btn_text') }}</a>
  </div>
  <div class="home-contact-right">
    <div class="ss-video-placeholder">
      <a href="#" class="video-trigger" data-bs-toggle="modal" data-bs-target="#ss-video">
        @php $home_vid_placeholder_id = get_field('home_video_placeholder') @endphp
        @php $home_vid_placeholder_photo = wp_get_attachment_image_src( $home_vid_placeholder_id, 'full' ) @endphp
        @php $home_vid_placeholder_photo_alt = get_post_meta($home_vid_placeholder_id, '_wp_attachment_image_alt', true) @endphp
        <img class="hero-image" src="@php echo $home_vid_placeholder_photo[0] @endphp" alt="@php echo $home_vid_placeholder_photo_alt @endphp" width="100%">
        <img class="home-play-btn" src="@asset('images/icon-video-play-btn-black.svg')" alt="Play Button">
      </a>
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
              <iframe data-src="https://www.youtube.com/embed/{{ the_field('ss_video_id') }}" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="home-banner">
  <div class="container">
    <h3>We Turned The Whole Concept Of Automated Shades Inside Out</h3>
  </div>
</div>

<div id="home-exterior-products">
  <div class="container">
    <h2>Exterior Products</h2>
    <div class="home-ext-prod-list">
      @php $args = array(
        'posts_per_page' => -1,
        'post_type' => 'products',
        'post_status' => 'publish',
        'order' => 'ASC',
        'tax_query' => array(
          array(
            'taxonomy' => 'product-location',
            'field'    => 'slug',
            'terms'    => 'exterior',
          ),
        ),
      );
      $ext_products = new WP_Query( $args );
      if ( $ext_products->have_posts() ) : @endphp
        @php while ( $ext_products->have_posts() ) : $ext_products->the_post() @endphp
          <div class="ext-prod-card">
            <div class="ext-prod-card-body">
              <a href="{{ the_permalink() }}">
                @php $prod_photo_id = get_field('product_listing_photo') @endphp
                @php $prod_photo_photo = wp_get_attachment_image_src( $prod_photo_id, 'full' ) @endphp
                @php $prod_photo_alt = get_post_meta($prod_photo_id, '_wp_attachment_image_alt', true) @endphp
                <img class="ext-prod-featured-image" src="@php echo $prod_photo_photo[0] @endphp" alt="@php echo $prod_photo_alt @endphp">
              </a>
              <div class="ext-prod-title">
                <a href={{ get_permalink() }}>
                  {{ the_title() }}<img src="@asset('images/icon-blue-arrow-right.svg')" alt="right arrow" width="7" height="16">
                </a>
              </div>
              <div class="ext-prod-excerpt">
                @php $prod_excerpt = get_field('product_excerpt') @endphp
                {{ wp_trim_words( $prod_excerpt, 9, '...' ) }}
              </div>
            </div>
          </div>
        @php endwhile @endphp
      @php else : @endphp
        <p>Ooops, no exterior products here!</p>
      @php endif @endphp
      @php wp_reset_postdata() @endphp
    </div>
  </div>
</div>

<div id="home-interior-products">
  <div class="container">
    <h2>Interior Products</h2>
    <div class="home-int-prod-list">
      @php $args = array(
        'posts_per_page' => -1,
        'post_type' => 'products',
        'post_status' => 'publish',
        'order' => 'ASC',
        'tax_query' => array(
          array(
            'taxonomy' => 'product-location',
            'field'    => 'slug',
            'terms'    => 'interior',
          ),
        ),
      );
      $ext_products = new WP_Query( $args );
      if ( $ext_products->have_posts() ) : @endphp
        @php while ( $ext_products->have_posts() ) : $ext_products->the_post() @endphp
          <div class="int-prod-card">
            <div class="int-prod-card-body">
              <a href="{{ the_permalink() }}">
                @php $prod_photo_id = get_field('product_listing_photo') @endphp
                @php $prod_photo_photo = wp_get_attachment_image_src( $prod_photo_id, 'full' ) @endphp
                @php $prod_photo_alt = get_post_meta($prod_photo_id, '_wp_attachment_image_alt', true) @endphp
                <img class="int-prod-featured-image" src="@php echo $prod_photo_photo[0] @endphp" alt="@php echo $prod_photo_alt @endphp">
              </a>
              <div class="int-prod-title">
                <a href={{ get_permalink() }}>
                  {{ the_title() }}<img src="@asset('images/icon-blue-arrow-right.svg')" alt="right arrow" width="7" height="16">
                </a>
              </div>
              <div class="int-prod-excerpt">
                @php $prod_excerpt = get_field('product_excerpt') @endphp
                {{ wp_trim_words( $prod_excerpt, 9, '...' ) }}
              </div>
            </div>
          </div>
        @php endwhile @endphp
      @php else : @endphp
        <p>Ooops, no interior products here!</p>
      @php endif @endphp
      @php wp_reset_postdata() @endphp
    </div>
  </div>
</div>

<div id="home-outdoor-projects">
  @php $outdoor_proj_id = get_field('outdoors_photo') @endphp
  @php $outdoor_proj_photo = wp_get_attachment_image_src( $outdoor_proj_id, 'full' ) @endphp
  @php $outdoor_proj_alt = get_post_meta($outdoor_proj_id, '_wp_attachment_image_alt', true) @endphp
  <img class="int-prod-featured-image" src="@php echo $outdoor_proj_photo[0] @endphp" alt="@php echo $outdoor_proj_alt @endphp">
  <div class="container home-project-content">
    <h2>{{ the_field('outdoors_title') }}</h2>
    <a href="{{ the_field('outdoors_button_url') }}" class="btn btn-yellow">{{ the_field('outdoors_button_text') }}</a>
  </div>
</div>

<div id="home-indoor-projects">
  @php $indoor_proj_id = get_field('indoors_photo') @endphp
  @php $indoor_proj_photo = wp_get_attachment_image_src( $indoor_proj_id, 'full' ) @endphp
  @php $indoor_proj_alt = get_post_meta($indoor_proj_id, '_wp_attachment_image_alt', true) @endphp
  <img class="int-prod-featured-image" src="@php echo $indoor_proj_photo[0] @endphp" alt="@php echo $indoor_proj_alt @endphp">
  <div class="container home-project-content">
    <h2>{{ the_field('indoors_title') }}</h2>
    <a href="{{ the_field('indoors_button_url') }}" class="btn">{{ the_field('indoors_button_text') }}</a>
  </div>
</div>

<div id="home-testimonials">
  <div class="container">
    @php if ( have_rows('testimonial_list') ) : @endphp
      @php while ( have_rows('testimonial_list') ) : the_row() @endphp
        <p class="testimonial-content">"{{ the_sub_field('testimonial_content') }}"</p>
        <p class="testimonial-author">{{ the_sub_field('testimonial_author') }}</p>
      @php endwhile @endphp
    @php endif @endphp
  </div>
</div>

<div id="home-blog">
  <div class="container">
    <h2>Shades Of Perfection</h2>
    <div class="home-blog-list">
      @php $args = array(
        'posts_per_page' => 4,
        'post_type' => 'post',
        'post_status' => 'publish',
      );
      $blog_articles = new WP_Query( $args );
      if ( $blog_articles->have_posts() ) : @endphp
        @php while ( $blog_articles->have_posts() ) : $blog_articles->the_post() @endphp
          <div class="blog-card">
            @php if ( has_post_thumbnail() ) : @endphp
              <a href="{{ the_permalink() }}">
                @php the_post_thumbnail( 'post-thumbnail', ['class' => 'vehicle-photo'], 'large' ) @endphp
              </a>
            @php endif @endphp
            <div class="blog-card-body">
              <h3>
                <a href={{ get_permalink() }}>
                  {{ the_title() }}<img src="@asset('images/icon-blue-arrow-right.svg')" alt="right arrow" width="7" height="16">
                </a>
              </h3>
            </div>
          </div>
        @php endwhile @endphp
      @php else : @endphp
        <p>Ooops, no blog posts here!</p>
      @php endif @endphp
      @php wp_reset_postdata() @endphp
    </div>
  </div>
</div>
