@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (! have_posts())
    <x-alert type="warning">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>

    {!! get_search_form(false) !!}
  @endif

  <section id="project-archive-section">
    <div class="container" id="all-projects">
      <div class="project-grid">
        <div class="project-filter-col">
          <h3>Project Filters <img src="@asset('images/icon-down-arrow-circle.svg')" alt="down arrow"></h3>
          @php echo do_shortcode('[searchandfilter id="1972"]') @endphp
        </div>
        <div class="project-results-col">
          @while(have_posts()) @php(the_post())
            @includeFirst(['partials.content-' . get_post_type(), 'partials.content-projects'])
          @endwhile
        </div>
      </div>
    </div>
  </section>
@endsection
