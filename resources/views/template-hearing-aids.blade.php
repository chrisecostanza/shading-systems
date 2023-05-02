{{--
  Template Name: Hearing Aids Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.content-hearing-aids')
  @endwhile
@endsection
