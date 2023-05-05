<div id="home-hero" style="background-image: url({{ the_field('hero_image') }})">
  <div class="container">
    <h1>{{ the_field('hero_h1') }}</h1>
    <img src={{ the_field('hero_image') }} alt="????" width="100%">
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