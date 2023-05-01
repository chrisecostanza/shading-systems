{{--
  Template Name: Patient Resources Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.content-patient-resources')
  @endwhile
@endsection
