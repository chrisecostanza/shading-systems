@include('partials.page-header')

<section id="maintenance-plan-hero">
  <div class="maintenance-plan-hero-photo">
    @php $maintenance_hero_id = get_field('maintenance_plan_hero_photo') @endphp
    @php $maintenance_hero_photo = wp_get_attachment_image_src( $maintenance_hero_id, 'full' ) @endphp
    @php $maintenance_hero_photo_alt = get_post_meta($maintenance_hero_id, '_wp_attachment_image_alt', true) @endphp
    <img src="@php echo $maintenance_hero_photo[0] @endphp" alt="@php echo $maintenance_hero_photo_alt @endphp" width="100%" height="auto">
  </div>
  <div class="maintenance-plan-hero-overlay"></div>
  <div class="maintenance-plan-hero-content">
    <div>
      <h2>{{ the_field('maintenance_plan_hero_h2') }}</h2>
      <div class="maintenance-plan-hero-paragraph">{{ the_field('maintenance_plan_hero_paragraph') }}</div>
    </div>
  </div>
</section>

<section id="maintenance-plan-breadcrumbs">
  <div class="container">
    <div class="breadcrumb-container">
      <p><a href="/service-request/">Service Request</a> <span>/</span> Maintenance Plan</p>
    </div>
  </div>
</section>

<section id="maintenance-plan-services">
  <div class="container">
    <h2>{{ the_field('maintenance_plan_h2') }}</h2>
    @php if ( have_rows('maintenance_plan_services') ) : @endphp
      <div class="maintenance-plan-services-grid">
      @php while ( have_rows('maintenance_plan_services') ) : the_row() @endphp
        @php $maintenance_id = get_sub_field('service_photo') @endphp
        @php $maintenance = wp_get_attachment_image_src( $maintenance_id, 'full' ) @endphp
        @php $maintenance_alt = get_post_meta($maintenance_id, '_wp_attachment_image_alt', true) @endphp
        <div class="maintenance-plan-services-grid-item">
          <img src="@php echo $maintenance[0] @endphp" alt="@php echo $maintenance_alt @endphp" class="" width="65" height="auto">
          <div class="maintenance-plan-service-name">
            <h3>{{ the_sub_field('service_name') }}</h3>
          </div>
        </div>
      @php endwhile @endphp
      </div>
    @php endif @endphp

    <div class="maintenance-plan-services-description">
      <div>{{ the_field('maintenance_plan_description') }}</div>
    </div>
    </div>
  </div>
</section>

<section id="maintenance-plan-priority">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 col-left">
        @php $priority_id = get_field('maintenance_plan_priority_photo') @endphp
        @php $priority_photo = wp_get_attachment_image_src( $priority_id, 'full' ) @endphp
        @php $priority_photo_alt = get_post_meta($priority_id, '_wp_attachment_image_alt', true) @endphp
        <img src="@php echo $priority_photo[0] @endphp" alt="@php echo $priority_photo_alt @endphp" width="100%" height="auto">
      </div>
      <div class="col-12 col-md-6 col-right">
        <h2>{{ the_field('maintenance_plan_priority_h2') }}</h2>
        <div class="maintenance-plan-paragraph">{{ the_field('maintenance_plan_priority_paragraph') }}</div>
        <a href="{{ the_field('maintenance_plan_priority_btn_url') }}" class="btn">{{ the_field('maintenance_plan_priority_btn_text') }}</a>
      </div>
    </div>
  </div>
</section>

@include('partials.new-project-cta')
