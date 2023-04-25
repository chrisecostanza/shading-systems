@include('partials.page-header')

<section id="review-paragraph">
  <div class="container thin-container">
    <div class="row">
      <div class="col-12">
        {{ the_content() }}
      </div>
    </div>
  </div>
</section>

<div id="review-options">
  <div class="container very-thin-container">
    <h2>Review Our Offices</h2>
    <div class="review-buttons">
      <a href="https://search.google.com/local/writereview?placeid=ChIJb14PsJ5MQIgRUyya8eOG0Kc" class="btn btn-dark-blue" target="_blank" rel="noopener">Review Cincinnati<br /> On Google</a>
      <a href="https://search.google.com/local/writereview?placeid=ChIJF1M9_3hUQIgR_lsoawQSmcY" class="btn btn-dark-blue" target="_blank" rel="noopener">Review Batesville<br /> On Google</a>
      <a href="https://search.google.com/local/writereview?placeid=ChIJa-1NGw2MaogR7XJ1JUpIAR4" class="btn btn-dark-blue" target="_blank" rel="noopener">Review Montgomery<br /> On Google</a>
    </div>
    <h2>Also Review Us At</h2>
    <div class="review-logos">
      <a href="https://www.facebook.com/pg/HillHearBetter/reviews/" target="_blank" rel="noopener">
        <img src="@asset('images/logo-facebook.png')" alt="Facebook Logo">
      </a>
      <a href="https://www.yelp.com/biz/hill-hear-better-cincinnati" target="_blank" rel="noopener">
        <img src="@asset('images/logo-yelp.png')" alt="Yelp Logo">
      </a>
    </div>
  </div>
</div>

<div id="client-reviews">
  <div class="container">
    <h2>Our Client's Reviews</h2>
    <div class="google-reviews">
      @php echo do_shortcode( '[grw id="128"]' ) @endphp
    </div>
  </div>
</div>

@include('partials.contact-form')
