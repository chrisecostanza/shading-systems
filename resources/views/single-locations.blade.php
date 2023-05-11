@extends('layouts.app')

@section('content')
  <section id="location-section">
    <div class="container">
      @while(have_posts()) @php(the_post())
        @includeFirst(['partials.content-single-' . get_post_type(), 'partials.content-single'])
      @endwhile
    </div>
  </section>
@endsection
