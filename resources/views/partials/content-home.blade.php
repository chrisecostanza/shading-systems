<div id="home-hero" style="background-image: url({{ the_field('hero_image') }})">
  <div class="container">
    <h1>{{ the_field('hero_h1') }}</h1>
    <a href={{ the_field('hero_button_1_url') }} class="btn btn-dark-blue contact-btn">{{ the_field('hero_button_1_text') }}</a>
    <div class="dropdown location-dropdown">
      <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ the_field('hero_button_2_text') }}</a>
      <ul class="dropdown-menu">
        @php if ( have_rows('location_button_list', 'option') ) : @endphp
          @php while ( have_rows('location_button_list', 'option') ) : the_row() @endphp
            <li>
              <a href={{ the_sub_field('office_url', 'option') }} class="dropdown-item">{{ the_sub_field('office_name', 'option') }}</a>
            </li>
          @php endwhile @endphp
        @php endif @endphp
      </ul>
    </div>
  </div>
</div>

<div id="home-why-statement">
  <div class="container">
    <div class="p-large">{{ the_field('home_why_paragraph') }}</div>
  </div>
</div>

<div id="home-iceberg">
  <div class="container">
    <div class="hhbc-video-placeholder">
      <a href="#" class="video-trigger" data-bs-toggle="modal" data-bs-target="#hhbc-video">
        <img src="@asset('images/hill-hear-better-video-placeholder.jpg')" alt="Hill Hear Better Clinic Video">
      </a>
    </div>

    <!-- Modal -->
    <div class="modal fade video-modal" id="hhbc-video" tabindex="-1" aria-labelledby="hhbcVideoLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="hhbcVideoLabel">{{ the_field('hhbc_video_title') }}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="ratio ratio-16x9">
              <iframe data-src="https://www.youtube.com/embed/{{ the_field('hhbc_video_id') }}" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="iceberg-stats">
      <div class="hearing-stat">{{ the_field('home_stat_1') }}</div>
      <img src="@asset('images/iceberg-graphic.svg')" alt="Iceberg Graphic">
      <div class="hearing-stat">{{ the_field('home_stat_2') }}</div>
    </div>

    <div class="iceberg-contact">
      <p>{{ the_field('home_stat_paragraph') }}</p>
      <a href={{ the_field('home_stat_button_url') }} class="btn btn-white">{{ the_field('home_stat_button_text') }}</a>
    </div>
  </div>
</div>

<div id="home-brain">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 brain-section">
        <img class="question-mark" src="@asset('images/icon-question-mark.svg')" alt="Brain Graphic" width="60" height="60">
        <div class="brain-question">{{ the_field('brain_question') }}</div>
        <img class="brain-graphic" src="@asset('images/brain-graphic.png')" alt="Brain Graphic">
      </div>
      <div class="col-12 col-md-6 cognitive-section">
        <h2>{{ the_field('brain_h2') }}</h2>
        {{ the_field('brain_paragraph') }}
        <div class="dropdown location-dropdown">
          <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ the_field('hero_button_2_text') }}</a>
          <ul class="dropdown-menu">
            @php if ( have_rows('location_button_list', 'option') ) : @endphp
              @php while ( have_rows('location_button_list', 'option') ) : the_row() @endphp
                <li>
                  <a href={{ the_sub_field('office_url', 'option') }} class="dropdown-item">{{ the_sub_field('office_name', 'option') }}</a>
                </li>
              @php endwhile @endphp
            @php endif @endphp
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="home-reviews">
  <div class="container">
    <h2>Listen To Our Clients</h2>
    <div class="google-reviews">
      @php echo do_shortcode( '[grw id="128"]' ) @endphp
    </div>
  </div>
</div>

@include('partials.contact-form')

<div id="home-blog">
  <div class="container">
    <h2>Hearing Matters</h2>
    <div class="home-blog-list">
      @php $args = array(
        'posts_per_page' => 3,
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
                  {{ the_title() }}
                </a>
              </h3>
              <time datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time>
              <div class="home-excerpt">
                {{ wp_trim_words( get_the_content(), 12, '...' ) }}
              </div>
              <a href={{ get_permalink() }} class="btn btn-dark-blue btn-small">Read Article</a>
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