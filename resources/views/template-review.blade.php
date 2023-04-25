{{--
  Template Name: Review Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.content-review')
  @endwhile
@endsection
