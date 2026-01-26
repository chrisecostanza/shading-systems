@include('partials.page-header')

<section id="branding-change-hero">
  <div class="branding-change-hero-photo">
    @php $branding_hero_id = get_field('branding_beforeafter_photo') @endphp
    @php $branding_hero_photo = wp_get_attachment_image_src( $branding_hero_id, 'full' ) @endphp
    @php $branding_hero_photo_alt = get_post_meta($branding_hero_id, '_wp_attachment_image_alt', true) @endphp
    <img src="@php echo $branding_hero_photo[0] @endphp" alt="@php echo $branding_hero_photo_alt @endphp" width="100%" height="auto">
  </div>
  <div class="branding-change-hero-overlay"></div>
  <div class="branding-change-hero-grid">
    <div class="branding-change-hero-container">
      <div class="branding-change-hero-content">
        <p>Before</p>
        <img src="@asset('images/before-TDSC-logo.svg')" alt="The Denver Shading Company Logo" width="425">
      </div>
    </div>
    <div class="branding-change-hero-container">
      <div class="branding-change-hero-content">
        <p>After</p>
        <img src="@asset('images/after-SS-logo.svg')" alt="Shading Systems Logo" width="425">
      </div>
    </div>
  </div>
</section>

<section id="branding-change-announcement">
  <div class="container">
    <p>{{ the_field('branding_beforeafter_announcement_bar') }}</p>
  </div>
</section>

<section id="branding-new-name">
  <div class="container">
    <h2>{{ the_field('branding_new_name_h2') }}</h2>
    <img src="@asset('images/after-SS-logo.svg')" alt="Shading Systems Logo" width="450">
    <div>
      {{ the_field('branding_new_name_description') }}
    </div>
    <a href="{{ the_field('branding_new_name_btn_url') }}" class="btn">{{ the_field('branding_new_name_btn_text') }}</a>
  </div>
</section>

<section id="branding-same-team">
  <div class="container">
    <h2>{{ the_field('branding_same_team_h2') }}</h2>
    @php if ( have_rows('branding_same_team_cards') ) : @endphp
      <div class="branding-same-team-grid">
        @php while ( have_rows('branding_same_team_cards') ) : the_row() @endphp
          <div class="branding-same-team-grid-item">
            @php $same_photo_id = get_sub_field('same_photo') @endphp
            @php $same_photo_photo = wp_get_attachment_image_src( $same_photo_id, 'full' ) @endphp
            @php $same_photo_alt = get_post_meta($same_photo_id, '_wp_attachment_image_alt', true) @endphp
            <img src="@php echo $same_photo_photo[0] @endphp" alt="@php echo $same_photo_alt @endphp">

            <div class="branding-same-team-title">
              <h3>{{ the_sub_field('same_title') }}</h3>
            </div>
          </div>
        @php endwhile @endphp
      </div>
    @php endif @endphp

    <div>
      {{ the_field('branding_same_team_paragraph') }}
    </div>
    <a href="{{ the_field('branding_same_team_btn_url') }}" class="btn btn-blue">{{ the_field('branding_same_team_btn_text') }}</a>
  </div>
</section>

<section id="branding-expertise">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-6 col-left">
        @php $expertise_id = get_field('expertise_photo') @endphp
        @php $expertise_photo = wp_get_attachment_image_src( $expertise_id, 'full' ) @endphp
        @php $expertise_photo_alt = get_post_meta($expertise_id, '_wp_attachment_image_alt', true) @endphp
        <img src="@php echo $expertise_photo[0] @endphp" alt="@php echo $expertise_photo_alt @endphp" width="100%" height="auto">
      </div>
      <div class="col-12 col-lg-6 col-right">
        <h2>{{ the_field('expertise_h2') }}</h2>
        <div class="expertise-paragraph">{{ the_field('expertise_paragraph') }}</div>
        <a href="{{ the_field('expertise_btn_url') }}" class="btn">{{ the_field('expertise_btn_text') }}</a>
      </div>
    </div>
  </div>
</section>
