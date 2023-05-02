<article {{ post_class() }}>
  <div class="blog-article-content">
    @php if ( has_post_thumbnail() ) : @endphp
      @php $featuredImage = get_the_post_thumbnail_url(get_the_ID(), 'large') @endphp
      @php $alt_text = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) @endphp
      <a href="{{ the_permalink() }}">
        <img src="{{ $featuredImage }}" alt="{{ $alt_text }}" />
      </a>
    @php endif @endphp

    <h2>
      <a href="{{ get_permalink() }}">
        {{ the_title() }}
      </a>
    </h2>
  </div>
</article>
