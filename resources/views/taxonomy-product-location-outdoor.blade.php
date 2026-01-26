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
      @php $tax_prod_subtitle = get_field('product_location_subtitle', $tax_prod_term) @endphp
      @php $tax_prod_intro = get_field('product_location_intro_paragraph', $tax_prod_term) @endphp
      @php $tax_prod_id = get_field('product_location_photo', $tax_prod_term) @endphp
      @php $tax_prod_photo = wp_get_attachment_image_src( $tax_prod_id, 'full' ) @endphp
      @php $tax_prod_alt = get_post_meta($tax_prod_id, '_wp_attachment_image_alt', true) @endphp
      <img class="tax-prod-featured-image" src="@php echo $tax_prod_photo[0] @endphp" alt="@php echo $tax_prod_alt @endphp">
      {{-- <h2 class="container">{{ $tax_prod_subtitle }}New Outdoor Page</h2> --}}

      <div class="outdoor-product-hotspots">
        @php if ( have_rows('outdoor_hotspots', 'options') ) : @endphp
          <div class="outdoor-product-hotspots-container">
          @php $hotspotCount = 0 @endphp
          @php while ( have_rows('outdoor_hotspots', 'options') ) : the_row() @endphp
            <div class="hotspot-item hotspot-item{{$hotspotCount}}" style="top: @php the_sub_field('outdoor_product_marker_top', 'options') @endphp; left: @php the_sub_field('outdoor_product_marker_left', 'options') @endphp;">
              <a class="marker marker{{$hotspotCount}}" href="#marker{{$hotspotCount}}">
                <img src="@asset('images/hotspot-circle.svg')" alt="hotspot circle">
              </a>
              
              @php $hotspot_position = get_sub_field('outdoor_product_popup_position', 'options') @endphp
              <div id="marker{{$hotspotCount}}" class="hotspot-popup {{ $hotspot_position }}">
                @php $hotspot_id = get_sub_field('outdoor_product_image', 'options') @endphp
                @php $hotspot_photo = wp_get_attachment_image_src( $hotspot_id, 'full' ) @endphp
                @php $hotspot_alt = get_post_meta($hotspot_id, '_wp_attachment_image_alt', true) @endphp
                <img class="hotspot-image" src="@php echo $hotspot_photo[0] @endphp" alt="@php echo $hotspot_alt @endphp">
                <h3 class="popup-title">{{ the_sub_field('outdoor_product_title', 'options') }}</h3>
                @if( get_sub_field('outdoor_product_excerpt', 'options') )
                  <p>{{ the_sub_field('outdoor_product_excerpt', 'options') }}</p>
                @endif
                @if( get_sub_field('outdoor_product_btn_url', 'options') )
                  <a class="popup-link" href="{{ the_sub_field('outdoor_product_btn_url', 'options') }}">Learn More</a>
                @endif
              </div>
            </div>
            @php $hotspotCount++ @endphp
          @php endwhile @endphp
          </div>
        @php endif @endphp
      </div>
    </div>
  </section>

  <section id="product-tax-intro-section">
    <div class="thin-container text-center">
      <h2>{{ $tax_prod_subtitle }}</h2>
      <p class="tax-prod-intro">{{ $tax_prod_intro }}</p>
    </div>
  </section>
      
  @if ( get_field('product_location_project_filter', $tax_prod_term) )
    <div class="product-tax-cta-container">
      <div class="container">
        <div class="product-tax-cta-grid">
          <h3>Explore Our Outdoor Projects</h3>
          @php $model_filter = get_field('product_location_project_filter', $tax_prod_term) @endphp
          @if( $model_filter )
            <a href="/project-location/{{ esc_html( $model_filter->slug ) }}" class="btn">View Projects</a>
          @endif
        </div>
      </div>
    </div>
  @endif
      
  <section id="product-grid-container">
    <div class="container">
      <div id="product-grid">

        <div class="product-filter-col">
          <h3>Outdoor Products <img src="@asset('images/icon-down-arrow-circle.svg')" alt="down arrow"></h3>
          @php echo do_shortcode('[searchandfilter id="4586"]') @endphp
        </div>
        <div class="product-results-col">
          <div class="selected-filters"></div>
          @php echo do_shortcode('[searchandfilter id="4586" show="results"]'); @endphp
        </div>
      </div>
    </div>
  </section>
@endsection
