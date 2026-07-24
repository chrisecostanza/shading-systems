@extends('layouts.app')

@section('content')
<div class="page-header">
  {{-- @if ( get_field('page_title_bg') )
    <img class="page-header-img" src={{ the_field('page_title_bg') }} alt="patient resources photo">
  @endif --}}
  <h1>{{ the_title() }}</h1>
</div>

<section id="single-blog-breadcrumbs">
  <div class="container">
    <p class="blog-breadcrumb">
      <a href="/blog/">All Blog Posts</a><span style="padding: 0 10px;">/</span>{{ the_title() }}
    </p>
  </div>
</section>

<section id="blog-single-section">
  <div class="container very-thin-container">
    <div class="row">
      <div class="col-12">
        @while(have_posts()) @php(the_post())
          @includeFirst(['partials.content-single-' . get_post_type(), 'partials.content-single'])
        @endwhile
      </div>
    </div>
  </div>
</section>
@endsection
