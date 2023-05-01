<div class="page-header">
  @if ( get_field('page_title_bg') )
    <img class="page-header-img" src={{ the_field('page_title_bg') }} alt="patient resources photo">
  @endif
  <h1>{!! $title !!}</h1>
</div>

<section id="patients-paragraph">
  <div class="container thin-container">
    <div class="row">
      <div class="col-12">
        {{ the_content() }}
      </div>
    </div>
  </div>
</section>

<div id="patient-videos">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 col-left">
        <h2>Select A Video</h2>
        <div class="patient-video-list">
          <ul class="nav nav-tabs flex-column client-results-content d-none d-md-block" role="tablist">
            @php if ( have_rows('patient_videos') ) : @endphp
              @php $vidTitleCount = 0 @endphp
              @php while ( have_rows('patient_videos') ) : the_row() @endphp
                @php $vidTitleCount++ @endphp
                <li class="nav-item">
                  <button class="nav-link {{ $vidTitleCount == 1 ? "active" : "" }}" id="tabs-{{ $vidTitleCount }}-tab" data-toggle="tab" role="tab" data-bs-toggle="tab" data-bs-target="#tabs-{{ $vidTitleCount }}">{{ the_sub_field('video_title') }}</button>
                </li>
              @php endwhile @endphp
            @php endif @endphp
          </ul>
        </div>
        {{ the_field('additional_help_content') }}
      </div>
      <div class="col-12 col-md-6 col-right">
        @php if ( have_rows('patient_videos') ) : @endphp
          @php $vidCount = 0 @endphp
          <div class="patient-video-container tab-content" id="nav-tabContent">
            @php while ( have_rows('patient_videos') ) : the_row() @endphp
              @php $vidCount++ @endphp
              <div class="tab-pane fade {{ $vidCount == 1 ? "show active" : "" }}" id="tabs-{{ $vidCount }}" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="ratio ratio-16x9">
                  <iframe src="https://www.youtube.com/embed/{{ the_sub_field('video_id') }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;" allowfullscreen></iframe>
                </div>
                <h3>{{ the_sub_field('video_title') }}</h3>
                @if ( get_sub_field('video_length'))
                  <p class="video-time">Video Length: {{ the_sub_field('video_length') }}</p>
                @endif
              </div>
            @php endwhile @endphp
          </div>
        @php endif @endphp
      </div>
    </div>
  </div>
</div>

@include('partials.contact-form')
