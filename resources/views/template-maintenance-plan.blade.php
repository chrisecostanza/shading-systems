{{--
  Template Name: Maintenance Plan Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.content-maintenance-plan')
  @endwhile
@endsection
