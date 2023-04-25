@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (! have_posts())
    <x-alert type="warning">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>

    {!! get_search_form(false) !!}
  @endif

  <div class="container">
    <div class="team-opening">
      {{ the_field('team_page_paragraph', 'options') }}
    </div>
  </div>

  <div class="container">
    <div class="team-grid">
      @while(have_posts()) @php(the_post())
        @includeFirst(['partials.content-' . get_post_type(), 'partials.content-team'])
      @endwhile
    </div>
  </div>

  @include('partials.contact-form')

@endsection
