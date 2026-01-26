@extends('layouts.app')

@section('content')
  <div id="single-product-section">
    @while(have_posts()) @php(the_post())
      @if ( get_field('product_style_name') )
        @includeFirst(['partials.content-single-products-style'])
      @else
        @includeFirst(['partials.content-single-' . get_post_type(), 'partials.content-single-products'])
      @endif
    @endwhile
  </div>
@endsection
