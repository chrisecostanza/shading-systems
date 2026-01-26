@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (! have_posts())
    <x-alert type="warning">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>

    {!! get_search_form(false) !!}
  @endif

  <section id="product-tax-section">
    <div class="fluid-container tax-product-hero">
      @php $tax_prod_term = get_queried_object() @endphp
      @php $tax_prod_subtitle = get_field('product_category_subtitle', $tax_prod_term) @endphp
      @php $tax_prod_intro = get_field('product_category_intro_paragraph', $tax_prod_term) @endphp
      @php $tax_prod_id = get_field('product_category_photo', $tax_prod_term) @endphp
      @php $tax_prod_photo = wp_get_attachment_image_src( $tax_prod_id, 'full' ) @endphp
      @php $tax_prod_alt = get_post_meta($tax_prod_id, '_wp_attachment_image_alt', true) @endphp
      <img class="tax-prod-featured-image" src="@php echo $tax_prod_photo[0] @endphp" alt="@php echo $tax_prod_alt @endphp">
      <h2 class="container">{{ $tax_prod_subtitle }}</h2>
    </div>
    <div class="container">
      <p class="tax-prod-intro">{{ $tax_prod_intro }}</p>

      <div class="product-grid">
        @while(have_posts()) @php(the_post())
          @includeFirst(['partials.content-' . get_post_type(), 'partials.content-products'])
        @endwhile
      </div>
    </div>
  </section>
@endsection
