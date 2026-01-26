{{--
  Template Name: Service Request Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.content-service-request')
  @endwhile
@endsection
