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
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="project-grid">
            @while(have_posts()) @php(the_post())
              @includeFirst(['partials.content-' . get_post_type(), 'partials.content-projects'])
            @endwhile
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
