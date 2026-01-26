@include('partials.page-header')

@if ( get_field('single_project_gallery') )
  <section id="single-project-gallery">
    <div class="container">
      <h2>Project Gallery</h2>
      @php $project_gallery = get_field('single_project_gallery') @endphp
      @if( $project_gallery )
        <div class="project-gallery">
          @foreach( $project_gallery as $gallery_photo )
            <a href="{{ esc_url($gallery_photo['url']) }}" class="foobox" rel="project-gallery" data-caption-title="{{ esc_attr($gallery_photo['alt']) }}">
              <img src="{{ esc_url($gallery_photo['url']) }}" alt="{{ esc_attr($gallery_photo['alt']) }}" />
            </a>
          @endforeach
        </div>
      @endif
      <div class="project-gallery-excerpt">{{ the_field('single_project_gallery_excerpt') }}</div>
      <div class="project-gallery-view-all">
        <a href="/projects/">View All Projects</a>
      </div>
    </div>
  </section>
@endif

@include('partials.new-project-cta')
