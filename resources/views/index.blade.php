@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (! have_posts())
    <x-alert type="warning">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>

    {!! get_search_form(false) !!}
  @endif

  <section id="blog-paragraph">
    <div class="container thin-container">
      <div class="row">
        <div class="col-12">
          {{ the_field('blog_archive_paragraph', 'options') }}
        </div>
      </div>
    </div>
  </section>

  <section id="blog-grid-section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="blog-grid">
            @while(have_posts()) @php(the_post())
              @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
            @endwhile
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- {!! get_the_posts_navigation() !!} --}}
  <div class="pagination">
    <?php echo the_posts_pagination( array(
      'mid_size'  => 2,
      'prev_text' => __( 'Previous', 'textdomain' ),
      'next_text' => __( 'Next', 'textdomain' ),
    ) ) ?>
  </div>
@endsection
