@include('partials.page-header')

<div class="office-contact-content">
  <h2>Contact Us</h2>
  <p class="office-address">
    {{ the_field('office_address') }}<br />
    {{ the_field('office_city') }}, {{ the_field('office_state') }} {{ the_field('office_zipcode') }}
  </p>
  <p class="office-phone">
    <strong>Office:</strong> <a href="tel:{{ the_field('office_phone') }}">{{ the_field('office_phone') }}</a>
  </p>
  <p class="office-phone">
    <strong>Mobile:</strong> <a href="tel:{{ the_field('office_cell') }}">{{ the_field('office_cell') }}</a>
  </p>
  <p class="office-notes">{{ the_field('office_notes') }}</p>
  <a href="/contact/" class="btn">Tell Us About Your Project</a>
</div>

<div id="office-map-embed">
  <div class="container">
    <div class="map-container">
      {{ the_field('office_map_embed') }}
    </div>
  </div>
</div>
