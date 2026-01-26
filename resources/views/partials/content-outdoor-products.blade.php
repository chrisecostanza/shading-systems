<div class="product-card">
  <div class="product-featured-image">
    <a href="{{ get_permalink() }}">
      @php $prod_photo_id = get_field('product_listing_photo', get_the_ID()) @endphp
      @if($prod_photo_id)
        @php $prod_photo_photo = wp_get_attachment_image_src( $prod_photo_id, 'full' ) @endphp
        @php $prod_photo_alt = get_post_meta($prod_photo_id, '_wp_attachment_image_alt', true) @endphp
        <img class="prod-image" src="@php echo $prod_photo_photo[0] @endphp" alt="@php echo $prod_photo_alt @endphp">
      @endif
    </a>
  </div>
  <div class="product-title">
    <h3>
      <a href="{{ get_permalink() }}">
        {{ get_the_title() }}<img class="right-arrow" src="@asset('images/icon-blue-arrow-right.svg')" alt="right arrow" width="7" height="16">
      </a>
    </h3>
  </div>
  <div class="product-excerpt">
    @php $prod_excerpt = get_field('product_excerpt', get_the_ID()) @endphp
    {{ wp_trim_words( $prod_excerpt, 12, '...' ) }}
  </div>
</div>
