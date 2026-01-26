@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (! have_posts())
    <x-alert type="warning">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>

    {!! get_search_form(false) !!}
  @endif

  <section id="product-archive-section">
    <div class="fluid-container archive-product-hero">
      @php $archive_prod_id = get_field('all_products_hero_photo', 'options') @endphp
      @php $archive_prod_photo = wp_get_attachment_image_src( $archive_prod_id, 'full' ) @endphp
      @php $archive_prod_alt = get_post_meta($archive_prod_id, '_wp_attachment_image_alt', true) @endphp
      <img class="archive-prod-featured-image" src="@php echo $archive_prod_photo[0] @endphp" alt="@php echo $archive_prod_alt @endphp">
      <h2 class="container">{{ the_field('all_products_subtitle', 'options') }}</h2>
    </div>
    <div class="container">
      <p class="archive-prod-intro">{{ the_field('all_products_intro_paragraph', 'options') }}</p>
      <div class="product-grid">
        @while(have_posts()) @php(the_post())
          @includeFirst(['partials.content-' . get_post_type(), 'partials.content-products'])
        @endwhile
      </div>
    </div>
  </section>
@endsection
