@extends('layouts.app')

@section('content')
  <div id="single-project-section">
    @while(have_posts()) @php(the_post())
      @includeFirst(['partials.content-single-' . get_post_type(), 'partials.content-single-projects'])
    @endwhile
  </div>
@endsection
