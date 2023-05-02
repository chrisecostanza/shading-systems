{{-- <div class="page-header">
  @if ( get_field('member_page_title_bg') )
    <img class="page-header-img" src={{ the_field('member_page_title_bg') }} alt="{{ the_field('member_first_name') }} {{ the_field('member_last_name') }} photo">
  @endif
  <h1>{{ the_field('member_first_name') }} {{ the_field('member_last_name') }}</h1>
</div> --}}
<div class="page-header">
  @if ( get_field('member_page_title_bg') )
    @php $page_title_photo_id = get_field('member_page_title_bg') @endphp
    @php $page_title_photo = wp_get_attachment_image_src( $page_title_photo_id, 'full' ) @endphp
    @php $page_title_photo_alt = get_post_meta($page_title_photo_id, '_wp_attachment_image_alt', true) @endphp
    <img class="page-header-img" src="@php echo $page_title_photo[0] @endphp" alt="@php echo $page_title_photo_alt @endphp">
  @endif
  <h1>{{ the_field('member_first_name') }} {{ the_field('member_last_name') }}</h1>
</div>

<div id="team-member-single">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-4 col-left">
        <img class="team-member-img" src={{ the_field('member_photo_large') }} alt='{{ the_field('member_first_name') }} {{ the_field('member_last_name') }}'>
        @if ( get_field('member_title') )
          <h2>{{ the_field('member_title') }}</h2>
        @endif
        @if ( get_field('member_degrees') )
          <p>{{ the_field('member_degrees') }}</p>
        @endif
      </div>
      <div class="col-12 col-md-8 col-right">
        @if ( get_field('member_video_id') )
          <a href="#" class="video-trigger btn btn-dark-blue" data-bs-toggle="modal" data-bs-target="#member-video">Watch {{ the_field('member_first_name') }}'s Video</a>

          <!-- Modal -->
          <div class="modal fade video-modal" id="member-video" tabindex="-1" aria-labelledby="memberVideoLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="memberVideoLabel">{{ the_field('member_first_name') }} {{ the_field('member_last_name') }}</h2>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="ratio ratio-16x9">
                    <iframe data-src="https://www.youtube.com/embed/{{ the_field('member_video_id') }}" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;" allowfullscreen></iframe>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endif
        {{ the_field('member_bio') }}

        @if ( get_field('member_certifications') )
          <h2>Certifications</h2>
        @endif
        @php if ( have_rows('member_certifications') ) : @endphp
          @php while ( have_rows('member_certifications') ) : the_row() @endphp
            @if ( get_sub_field('certification_name') )
              <p class="cert-title">{{ the_sub_field('certification_name') }}</p>
            @endif
            @if ( get_sub_field('member_logo') )
              @php $member_logo_id = get_sub_field('member_logo') @endphp
              @php $member_logo = wp_get_attachment_image_src( $member_logo_id, 'full' ) @endphp
              @php $member_logo_alt = get_post_meta($member_logo_id, '_wp_attachment_image_alt', true) @endphp
              <img class="cert-logo" src="@php echo $member_logo[0] @endphp" alt="@php echo $member_logo_alt @endphp">
            @endif
          @php endwhile @endphp
        @php endif @endphp
      </div>
    </div>
  </div>
</div>

@include('partials.contact-form')
