@include('partials.page-header')

  <section id="single-product-hero">
    @if ( get_field('product_hero_photo') )
      <div class="product-hero-photo">
        @php $product_photo_id = get_field('product_hero_photo') @endphp
        @php $product_photo = wp_get_attachment_image_src( $product_photo_id, 'full' ) @endphp
        @php $product_photo_alt = get_post_meta($product_photo_id, '_wp_attachment_image_alt', true) @endphp
        <img class="product-image" src="@php echo $product_photo[0] @endphp" alt="@php echo $product_photo_alt @endphp">
      </div>
    @endif
    {{-- @if ( get_field('product_video_placeholder') )
      <div class="product-hero-video">
        @php $video_photo_id = get_field('product_video_placeholder') @endphp
        @php $video_photo = wp_get_attachment_image_src( $video_photo_id, 'full' ) @endphp
        @php $video_photo_alt = get_post_meta($video_photo_id, '_wp_attachment_image_alt', true) @endphp
        <img class="product-image" src="@php echo $video_photo[0] @endphp" alt="@php echo $video_photo_alt @endphp">
        <a href="#" class="video-trigger" data-bs-toggle="modal" data-bs-target="#product-video">
          <img class="product-play-btn" src="@asset('images/icon-video-play-btn-white.svg')" alt="play button" width="73" height="71">
        </a>
      </div>

      <!-- Modal -->
      <div class="modal fade video-modal" id="product-video" tabindex="-1" aria-labelledby="productVideoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="ratio ratio-16x9">
                <iframe data-src="https://www.youtube.com/embed/{{ the_field('product_video_id') }}" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endif --}}
  </section>

{{-- <section id="single-product-menu">
  <div class="container">
    <div class="single-menu-links">
      <ul>
        @if ( get_field('product_overview_paragraph') )
          <li><a href="#single-product-overview" class="single-menu-link">Overview</a></li>
        @endif
        @if ( get_field('product_features_list') )
          <li><a href="#single-product-features" class="single-menu-link">Features</a></li>
        @endif
        @if ( get_field('color_configurator_content') )
          <li><a href="#single-product-colors" class="single-menu-link">Colors</a></li>
        @endif
        @if ( get_field('product_information_list') )
          <li><a href="#single-product-info" class="single-menu-link">Info</a></li>
        @endif
        @if ( get_field('product_downloads_buttons') )
          <li><a href="#single-product-downloads" class="single-menu-link">Downloads</a></li>
        @endif
        @if ( get_field('product_faqs_list') )
          <li><a href="#product-faqs" class="single-menu-link">FAQ's</a></li>
        @endif
        @if ( get_field('product_accessories_list') )
          <li><a href="#single-product-accessories" class="single-menu-link">Accessories</a></li>
        @endif
        @if ( get_field('similar_products') )
          <li><a href="#single-similar-products" class="single-menu-link">Additional</a></li>
        @endif
      </ul>
    </div>
  </div>
</section> --}}

@php $prod_cats = get_the_terms( $post->ID , 'product-category' ) @endphp
@if ( $prod_cats )
  <section id="single-product-breadcrumbs">
    <div class="container">
      <p class="product-breadcrumb">
        @foreach ( $prod_cats as $prod_cat ) <a href="/product-category/{{ $prod_cat->slug }}">{{ $prod_cat->name }}</a> @endforeach<span style="padding: 0 10px;">/</span>{{ the_field('product_name') }}
      </p>
    </div>
  </section>
@endif

<section id="single-product-weather">
  <div class="container">
    @php echo do_shortcode('[location-weather id="4447"]') @endphp
  </div>
</section>

@if ( get_field('product_model_details') )
  <section id="single-product-model-details">
    <div class="fluid-container">
        @php if ( have_rows('product_model_details') ) : @endphp
          @php while ( have_rows('product_model_details') ) : the_row() @endphp
            <div class="model-container">
              <div class="container">
                <h2>{{ the_sub_field('model_name') }}</h2>
                @if ( get_sub_field('model_video_id') )
                  <div class="vimeo-container">
                    <iframe 
                      src="https://player.vimeo.com/video/{{ the_sub_field('model_video_id') }}?autoplay=1&muted=1" 
                      frameborder="0" 
                      allow="autoplay; fullscreen; picture-in-picture" 
                      allowfullscreen>
                    </iframe>
                  </div>
                @else
                  @php $model_photo_id = get_sub_field('model_photo') @endphp
                  @php $model_photo_photo = wp_get_attachment_image_src( $model_photo_id, 'full' ) @endphp
                  @php $model_photo_alt = get_post_meta($model_photo_id, '_wp_attachment_image_alt', true) @endphp
                  <img src="@php echo $model_photo_photo[0] @endphp" alt="@php echo $model_photo_alt @endphp">
                @endif

                <div class="model-description">{{ the_sub_field('model_description') }}</div>
              </div>
            </div>

            @php if ( get_field('product_name') === 'Pergola By Design' ) : @endphp
              <div class="roof-options-container">
                <div class="container">
                  <div class="roof-options-content">
                      <h2>AVAILABLE ROOF OPTIONS</h2>
                      <img src="@asset('images/pergola-structure-roof-icons.svg')" alt="Roof Options Icon" width="435" height="50">
                      <a href="/product-category/pergola-roof/" class="btn">View Roofs</a>
                  </div>
                </div>
              </div>
            @php endif @endphp

            @php if ( has_term( 'pergola-structures', 'product-category' ) ) : @endphp
              <div class="accessories-container">
                <div class="container">
                  <div class="accessories-content">
                      <h2>AVAILABLE ACCESSORY OPTIONS</h2>
                      <img src="@asset('images/pergola-structure-accessory-icons.svg')" alt="Accessories Icon" width="470" height="50">
                      <a href="/product-category/accessories/" class="btn">View Accessories</a>
                  </div>
                </div>
              </div>
            @php endif @endphp

            @if ( get_sub_field('model_project_filter') )
              <div class="project-group-container">
                <div class="container">
                  <div class="project-group-grid">
                    <h3>Explore Our "Product Group" Projects</h3>
                    @php $model_filter = get_sub_field('model_project_filter') @endphp
                    @if( $model_filter )
                      <a href="/project-product/{{ esc_html( $model_filter->slug ) }}" class="btn">View Projects</a>
                    @endif
                  </div>
                </div>
              </div>
            @endif

            @php if ( have_rows('product_version_details') ) : @endphp
              <div class="version-container">
                <div class="container">
                  <div class="version-grid">
                    @php while ( have_rows('product_version_details') ) : the_row() @endphp
                      <div class="version-content">
                          
                        @php if ( have_rows('version_content_photos') ) : @endphp
                          <div class="version-content-slider">
                            @php while ( have_rows('version_content_photos') ) : the_row() @endphp
                              @php $version_photo_id = get_sub_field('version_content_photo') @endphp
                              @php $version_photo_photo = wp_get_attachment_image_src( $version_photo_id, 'full' ) @endphp
                              @php $version_photo_alt = get_post_meta($version_photo_id, '_wp_attachment_image_alt', true) @endphp
                              <img class="version-image" src="@php echo $version_photo_photo[0] @endphp" alt="@php echo $version_photo_alt @endphp">
                            @php endwhile @endphp
                          </div>
                        @php endif @endphp
                          
                        <h3>{{ the_sub_field('version_name') }}</h3>
                        <p class="version-description">{{ the_sub_field('version_description') }}</p>
                        
                        <div class="version-features">
                          @php if ( have_rows('version_feature_list') ) : @endphp
                            <div>
                              <ul>
                              @php while ( have_rows('version_feature_list') ) : the_row() @endphp
                                <li>{{ the_sub_field('version_feature_name') }}</li>
                              @php endwhile @endphp
                              </ul>
                            </div>
                          @php endif @endphp

                          @php $illustration_photo_id = get_sub_field('version_illustration') @endphp
                          @php $illustration_photo = wp_get_attachment_image_src( $illustration_photo_id, 'full' ) @endphp
                          @php $illustration_photo_alt = get_post_meta($illustration_photo_id, '_wp_attachment_image_alt', true) @endphp
                          <div class="version-illustration">
                            <img src="@php echo $illustration_photo[0] @endphp" alt="@php echo $illustration_photo_alt @endphp">
                          </div>
                        </div>

                        @php if ( get_sub_field('version_size_limitations_title') ) : @endphp
                          <div class="version-sizing">
                            <h4>{{ the_sub_field('version_size_limitations_title') }}</h4>
                            <p>{{ the_sub_field('version_size_limitations') }}</p>
                          </div>
                        @php endif @endphp

                        {{-- @php if ( have_rows('version_hardware_colors') ) : @endphp
                          <div class="version-hardware-colors">
                            <h4>Hardware Colors</h4>
                            <div class="color-squares">
                              @php while ( have_rows('version_hardware_colors') ) : the_row() @endphp
                                <div class="color-square" style="background-color: {{ the_sub_field('hardware_color') }};"></div>
                              @php endwhile @endphp
                            </div>
                          </div>
                        @php endif @endphp --}}
                        
                        {{-- @php if ( have_rows('version_hardware_fabrics') ) : @endphp
                          <div class="version-fabric-colors">
                            <h4>Fabric Colors</h4>
                            <div class="color-squares">
                              @php while ( have_rows('version_hardware_fabrics') ) : the_row() @endphp
                                <div class="color-square" style="background-color: {{ the_sub_field('hardware_fabric') }};"></div>
                              @php endwhile @endphp
                            </div>
                          </div>
                        @php endif @endphp --}}
                        
                        {{-- @php if ( get_sub_field('version_price_range') ) : @endphp
                          <div class="version-pricing">
                            <h4>Price Range</h4>
                            <p>{{ the_sub_field('version_price_range') }}</p>
                          </div>
                        @php endif @endphp --}}

                        @if ( get_sub_field('version_learn_more_btn') )
                          @php $learn_more = get_sub_field('version_learn_more_btn') @endphp
                          @if( $learn_more )
                            <div class="version-learn-more">
                              <a href="/products/{{ esc_html( $learn_more->post_name ) }}" class="btn">Learn More</a>
                            </div>
                          @endif
                        @endif
                      </div>
                    @php endwhile @endphp
                  </div>
                </div>
              </div>
            @php endif @endphp
          @php endwhile @endphp
        @php endif @endphp
      </div>
    </div>
  </section>
@endif

{{-- COLOR CONFIGURATOR BEGIN  --}}
{{-- @if ( get_field('color_configurator_content') )
  <section id="single-product-colors">
    <h2>Color Configurator</h2>
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-4">
        <div class="config-container">
            <p>{{ the_field('color_configurator_paragraph') }}</p>
            <h3>Product</h3>
            <div class="config-select">
              <select name="" id="product" onchange="displayColorSelections()">
              @php $productOptions = array() @endphp
                @php if ( have_rows('color_configurator_content') ) : @endphp
                  <option value="">Select A Product</option>
                  @php while ( have_rows('color_configurator_content') ) : the_row() @endphp
                        @php $productOption = array(get_sub_field('configurator_product_name')=>get_sub_field('configurator_product_details')) @endphp
                        @php $productOptions = array_merge($productOptions, $productOption) @endphp
                    <option value="{{ the_sub_field('configurator_product_name') }}">{{ the_sub_field('configurator_product_name') }}</option>
                  @php endwhile @endphp
                @php endif @endphp
              </select>
            </div>
            <div style="display:none" id="color-selection-block" class="configurator-color-option-list">
              <h3>Colors</h3>
                <select name="" id="color" onchange="updateColorPhoto()">
                <option value="">Select A Color</option>
                  @php foreach($productOptions as $productName => $productColors) : @endphp
                    <optgroup style="display:none" label="{{ $productName }} color options:" class="{{ $productName }}">
                      @php foreach($productColors as $productColor) : @endphp
                            @php $photoID = $productColor['configurator_photo'] @endphp
                        <option name="{{ $productColor['configurator_color'] }}" class="{{ $productName }}" 
                          value="@php echo esc_url(wp_get_attachment_image_url($photoID,'full')) @endphp">
                          {{ $productColor['configurator_color'] }}
                        </option>
                      @php endforeach @endphp
                    </optgroup>
                  @php endforeach @endphp
                </select>
              </div>
          </div>
        </div>
        <div class="col-12 col-md-8">
          <div class="config-photo-container">
              @php $default_id = get_field('color_configurator_default_photo') @endphp
              @php $default_photo = wp_get_attachment_image_src( $default_id, 'full' ) @endphp
              @php $default_alt = get_post_meta($default_id, '_wp_attachment_image_alt', true) @endphp
              <img class="color-image" id="color-image" src="@php echo $default_photo[0] @endphp" alt="@php echo $default_alt @endphp">
          </div>
        </div>
      </div>
    </div>
  </section>
@endif --}}


{{-- <script>
//UPDATE PHOTO BY COLOR SELECTION
function updateColorPhoto() {
  var productId = document.getElementById('product').value;
  var colorId = document.getElementById('color').value;
  console.log("productId: "+productId);
  if (productId && colorId) {
    console.log(" colorId: "+ colorId);
  }

  document.getElementById('color-image').src = colorId;
}

//HIDE COLOR OPTIONS UNTIL PRODUCT SELECTED
const productSelect = document.getElementById('product');
const colorSelect = document.getElementById('color');
const configuratorColorOptionList = document.querySelector('.configurator-color-option-list');

productSelect.addEventListener('change', function() {
  const selectedProduct = productSelect.options[productSelect.selectedIndex].value;

  configuratorColorOptionList.querySelectorAll('optgroup[class="' + selectedProduct + '"]').forEach((optgroup) => {
    optgroup.style.display = 'block';
  });

  configuratorColorOptionList.querySelectorAll('optgroup:not([class="' + selectedProduct + '"])').forEach((optgroup) => {
    optgroup.style.display = 'none';
  });
});

//DISPLAY COLOR SELECTION WHEN PRODUCT IS SELECTED
function displayColorSelections() {
  const productSelect = document.getElementById('product');
  const colorSelectionBlock = document.getElementById('color-selection-block');

  if (productSelect.value) {
    colorSelectionBlock.style.display = 'block';
    colorSelect.options.selectedIndex = 0;
  } else {
    colorSelectionBlock.style.display = 'none';
  }
}
</script> --}}
{{-- COLOR CONFIGURATOR END  --}}

@include('partials.new-project-cta')

@if ( get_field('similar_products') )
  <section id="single-similar-products">
    <div class="container">
      <h2>Similar Products</h2>
      <div class="single-similar-products">
        @php $similar_prods = get_field('similar_products') @endphp
        @foreach( $similar_prods as $similar_prod )
          @php $similar_name = get_field('product_name', $similar_prod->ID) @endphp
          @php $permalink = get_permalink( $similar_prod->ID ) @endphp
          <div>
            <div class="similar-prod-card-body">
              <a href="{{ esc_url( $permalink ) }}">
                @php $similar_prod_id = get_field('product_listing_photo', $similar_prod->ID) @endphp
                @php $similar_prod_photo = wp_get_attachment_image_src( $similar_prod_id, 'full' ) @endphp
                @php $similar_prod_alt = get_post_meta($similar_prod_id, '_wp_attachment_image_alt', true) @endphp
                <img class="prod-similar-image" src="@php echo $similar_prod_photo[0] @endphp" alt="@php echo $similar_prod_alt @endphp">
              </a>
              <a href="{{ esc_url( $permalink ) }}">
                <h3>{{ $similar_name }}<img src="@asset('images/icon-blue-arrow-right.svg')" alt="right arrow" width="7" height="16"></h3>
              </a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endif
