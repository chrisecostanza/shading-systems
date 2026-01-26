<section id="new-project-cta">
  <div class="container">
    <div class="cta-container">
      <img src="@asset('images/cta-sun-shade-icon.svg')" alt="Sun & Shade Icon" width="80" height="105">
      <div class="cta-text">
        <h2>{{ the_field('cta_title', 'options') }}</h2>
        <p>{{ the_field('cta_content', 'options') }}</p>
        <a href="{{ the_field('cta_btn_url', 'options') }}" class="btn btn-cta">{{ the_field('cta_btn_text', 'options') }}</a>
      </div>
    </div>
  </div>
</section>