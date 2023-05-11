<h2>{{ the_title() }}</h2>

@if ( get_field('product_faqs') )
  <div id="product-faqs">
    <div class="container very-thin-container text-center">
      <h2>{{ the_field('faq_h2') }}</h2>
      <p class="faq-paragraph">{{ the_field('faq_paragraph') }}</p>
      <div class="faq-list">
        @php if ( have_rows('page_faqs') ) : @endphp
          @php while ( have_rows('page_faqs') ) : the_row() @endphp
            <div class="faq-item">
              <h3 class="accordion">{{ the_sub_field('faq_question')}}<img src="@asset('/images/icon-arrow-down-blue.svg')" alt="down arrow" width="26" height="13"></h3>
              <div class="faq-panel">
                @if ( get_sub_field('faq_answer') )
                  {{ the_sub_field('faq_answer')}}
                @endif
              </div>
            </div>
          @php endwhile @endphp
        @php endif @endphp
      </div>
    </div>
  </div>
@endif
