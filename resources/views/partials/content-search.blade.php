<section id="product-style-hero">
  <div class="container">
    <div class="product-style-hero-grid">
      <div class="product-style-hero-left">
        @if ( get_field('product_style_photo') )
          <div class="product-style-hero-photo">
            @php $product_photo_id = get_field('product_style_photo') @endphp
            @php $product_photo = wp_get_attachment_image_src( $product_photo_id, 'full' ) @endphp
            @php $product_photo_alt = get_post_meta($product_photo_id, '_wp_attachment_image_alt', true) @endphp
            <a href="{{ get_permalink() }}"><img src="@php echo $product_photo[0] @endphp" alt="@php echo $product_photo_alt @endphp"></a>
          </div>
        @endif
        @if (has_post_thumbnail())
          <div class="search-result-image">
            <a href="{{ get_permalink() }}">
              {!! get_the_post_thumbnail(null, 'medium', ['class' => 'img-fluid']) !!}
            </a>
          </div>
        @endif
      </div>
      <div class="product-style-hero-right">
        <a href="{{ get_permalink() }}"><h2>{!! get_the_title() !!}</h2></a>
        <p>
            {{ the_field('product_style_description') }}
            @php
              $excerpt = get_the_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 30, '...');
            @endphp
             {{ $excerpt }}
        </p>
      </div>
    </div>
  </div>
</section>