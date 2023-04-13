{{--
  Template Name: Why Choose HHBC Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.content-why-choose-hhbc')
  @endwhile
@endsection
