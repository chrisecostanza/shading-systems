@include('partials.page-header')

<div id="perfect-fit">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-12 col-md-5 col-left">
        <img src="@asset('images/why-choose-perfect-fit-photo.jpg')" alt="Ryan Hill fitting hearing aid">
      </div>
      <div class="col-12 col-md-7 col-right">
        <div class="content-container">
          <h2>{{ the_field('perfect_fit_h2') }}</h2>
          {{ the_field('perfect_fit_content') }}
        </div>
      </div>
    </div>
  </div>
</div>

<div id="what-we-offer">
  <div class="container text-center">
    <h2>{{ the_field('what_we_offer_h2') }}</h2>
    {{ the_field('what_we_offer_content') }}
  </div>
</div>

<div id="hearing-tech-brands">
  <div class="brands-title">
    <h2>{{ the_field('our_process_h2') }}</h2>
  </div>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-12 col-md-6 left-col">
        <h3>{{ the_field('initial_visit_h3') }}</h3>
        {{ the_field('initial_visit_content') }}
        <h3>{{ the_field('fittings_h3') }}</h3>
        {{ the_field('fittings_content') }}
      </div>
      <div class="col-12 col-md-6 right-col">
        <h3>{{ the_field('ongoing_h3') }}</h3>
        {{ the_field('ongoing_content') }}
        <div>
          <a href={{ the_field('our_process_button_1_url') }} class="btn btn-dark-blue">{{ the_field('our_process_button_1_text') }}</a><br />
          <a href={{ the_field('our_process_button_2_url') }} class="btn btn-blue">{{ the_field('our_process_button_2_text') }}</a>
        </div>
      </div>
    </div>
  </div>
</div>

@include('partials.contact-form')
