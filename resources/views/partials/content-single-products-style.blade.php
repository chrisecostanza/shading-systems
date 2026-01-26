@php $prod_cats = get_the_terms( $post->ID , 'product-category' ) @endphp
@if ( $prod_cats )
  <section id="product-style-breadcrumbs">
    <div class="container">
      <p class="product-style-breadcrumb">
        @foreach ( $prod_cats as $prod_cat ) <a href="/product-category/{{ $prod_cat->slug }}">{{ $prod_cat->name }}</a> @endforeach<span style="padding: 0 10px;">/</span>
        @php $style_parent = get_field('product_style_parent') @endphp
        @if( $style_parent )
          <a href="/products/{{ esc_html( $style_parent->post_name ) }}">{{ esc_html( $style_parent->post_title ) }}</a>
        @endif
        <span style="padding: 0 10px;">/</span>{{ the_field('product_style_name') }}
      </p>
    </div>
  </section>
@endif

<section id="product-style-hero">
  <div class="container">
    <div class="product-style-hero-grid">
      <div class="product-style-hero-left">
        @if ( get_field('product_style_photo') )
          <div class="product-style-hero-photo">
            @php $product_photo_id = get_field('product_style_photo') @endphp
            @php $product_photo = wp_get_attachment_image_src( $product_photo_id, 'full' ) @endphp
            @php $product_photo_alt = get_post_meta($product_photo_id, '_wp_attachment_image_alt', true) @endphp
            <img src="@php echo $product_photo[0] @endphp" alt="@php echo $product_photo_alt @endphp">
          </div>
        @endif
      </div>
      <div class="product-style-hero-right">
        <p class="product-style-hero-parent">{{ esc_html( $style_parent->post_title ) }}</p>
        <h1>{{ the_field('product_style_name') }}</h1>
        <p>{{ the_field('product_style_description') }}</p>
        <p class="product-style-hero-price">{{ the_field('product_style_price') }}</p>
        <div class="btn-group">
          @if ( get_field('product_style_brochure') )
            <a href='{{ the_field('product_style_brochure') }}' class="btn btn-blue" target="_blank" rel="noopener">View Brochure</a>
          @endif
          <a href='/contact/' class="btn">Get A Quote</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="product-style-specs">
  <div class="container">
    <h2>Specifications</h2>
    @php if ( have_rows('product_style_spec_images') ) : @endphp
      <div class="product-style-spec-grid">
      @php while ( have_rows('product_style_spec_images') ) : the_row() @endphp
        @php $spec_photo_id = get_sub_field('product_style_spec_image') @endphp
        @php $spec_photo_photo = wp_get_attachment_image_src( $spec_photo_id, 'full' ) @endphp
        @php $spec_photo_alt = get_post_meta($spec_photo_id, '_wp_attachment_image_alt', true) @endphp
        <a href="@php echo $spec_photo_photo[0] @endphp" target="_blank" rel="noopener">
          <img src="@php echo $spec_photo_photo[0] @endphp" alt="@php echo $spec_photo_alt @endphp" width="100%" height="auto">
        </a>
      @php endwhile @endphp
      </div>
    @php endif @endphp
    <p>{{ the_field('product_style_spec_paragraph') }}</p>
    @php $spec_graph_id = get_field('product_style_spec_graph') @endphp
    @php $spec_graph_photo = wp_get_attachment_image_src( $spec_graph_id, 'full' ) @endphp
    @php $spec_graph_alt = get_post_meta($spec_graph_id, '_wp_attachment_image_alt', true) @endphp
    <a href="@php echo $spec_graph_photo[0] @endphp" target="_blank" rel="noopener">
      <img src="@php echo $spec_graph_photo[0] @endphp" alt="@php echo $spec_graph_alt @endphp" width="100%" height="auto">
    </a>
  </div>
</section>

<section id="product-style-parameters">
  <div class="container">
    <h2>Operation Parameters</h2>
    <p>{{ the_field('product_style_parameter_paragraph') }}</p>
    <div class="nav nav-tabs" id="parametersTabs" role="tablist">
      <div class="nav-item" role="presentation">
        <div class="nav-link active" id="sun-tab" data-bs-toggle="tab" data-bs-target="#sun-tab-pane" type="button" role="tab" aria-controls="sun-tab-pane" aria-selected="true">
          <img src="@asset('images/icon-sun.svg')" alt="Sun icon" width="158" height="158">
        </div>
      </div>
      <div class="nav-item" role="presentation">
        <div class="nav-link" id="wind-tab" data-bs-toggle="tab" data-bs-target="#wind-tab-pane" type="button" role="tab" aria-controls="wind-tab-pane" aria-selected="true">
          <img src="@asset('images/icon-wind.svg')" alt="wind icon" width="158" height="158">
        </div>
      </div>
      <div class="nav-item" role="presentation">
        <div class="nav-link" id="snow-tab" data-bs-toggle="tab" data-bs-target="#snow-tab-pane" type="button" role="tab" aria-controls="snow-tab-pane" aria-selected="true">
          <img src="@asset('images/icon-snow.svg')" alt="snow icon" width="158" height="158">
        </div>
      </div>
      <div class="nav-item" role="presentation">
        <div class="nav-link" id="rain-tab" data-bs-toggle="tab" data-bs-target="#rain-tab-pane" type="button" role="tab" aria-controls="rain-tab-pane" aria-selected="true">
          <img src="@asset('images/icon-rain.svg')" alt="rain icon" width="158" height="158">
        </div>
      </div>
      <div class="nav-item" role="presentation">
        <div class="nav-link" id="obstruction-tab" data-bs-toggle="tab" data-bs-target="#obstruction-tab-pane" type="button" role="tab" aria-controls="obstruction-tab-pane" aria-selected="true">
          <img src="@asset('images/icon-obstruction.svg')" alt="obstruction icon" width="158" height="158">
        </div>
      </div>
      <div class="nav-item" role="presentation">
        <div class="nav-link" id="temperature-tab" data-bs-toggle="tab" data-bs-target="#temperature-tab-pane" type="button" role="tab" aria-controls="temperature-tab-pane" aria-selected="true">
          <img src="@asset('images/icon-temperature.svg')" alt="temperature icon" width="158" height="158">
        </div>
      </div>
      <div class="nav-item" role="presentation">
        <div class="nav-link" id="hail-tab" data-bs-toggle="tab" data-bs-target="#hail-tab-pane" type="button" role="tab" aria-controls="hail-tab-pane" aria-selected="true">
          <img src="@asset('images/icon-hail.svg')" alt="hail icon" width="158" height="158">
        </div>
      </div>
    </div>
    <div class="tab-content" id="parametersTabsContent">
      <div class="tab-pane fade show active" id="sun-tab-pane" role="tabpanel" aria-labelledby="sun-tab" tabindex="0">
        {{ the_field('product_style_parameter_sun_details') }}
      </div>
      <div class="tab-pane fade" id="wind-tab-pane" role="tabpanel" aria-labelledby="wind-tab" tabindex="0">
        {{ the_field('product_style_parameter_wind_details') }}
      </div>
      <div class="tab-pane fade" id="snow-tab-pane" role="tabpanel" aria-labelledby="snow-tab" tabindex="0">
        {{ the_field('product_style_parameter_snow_details') }}
      </div>
      <div class="tab-pane fade" id="rain-tab-pane" role="tabpanel" aria-labelledby="rain-tab" tabindex="0">
        {{ the_field('product_style_parameter_rain_details') }}
      </div>
      <div class="tab-pane fade" id="obstruction-tab-pane" role="tabpanel" aria-labelledby="obstruction-tab" tabindex="0">
        {{ the_field('product_style_parameter_obstruction_details') }}
      </div>
      <div class="tab-pane fade" id="temperature-tab-pane" role="tabpanel" aria-labelledby="temperature-tab" tabindex="0">
        {{ the_field('product_style_parameter_temperature_details') }}
      </div>
      <div class="tab-pane fade" id="hail-tab-pane" role="tabpanel" aria-labelledby="hail-tab" tabindex="0">
        {{ the_field('product_style_parameter_hail_details') }}
      </div>
    </div>
  </div>
</section>

<section id="product-style-fabrics">
  <div class="container">
    @php if ( have_rows('fabric_options') ) : @endphp
      @php while ( have_rows('fabric_options') ) : the_row() @endphp
      <div class="product-style-fabric-grid">
        <div class="product-style-fabric-left">
          @if ( get_sub_field('fabric_photo') )
            <div class="product-style-hero-photo">
              @php $product_photo_id = get_sub_field('fabric_photo') @endphp
              @php $product_photo = wp_get_attachment_image_src( $product_photo_id, 'full' ) @endphp
              @php $product_photo_alt = get_post_meta($product_photo_id, '_wp_attachment_image_alt', true) @endphp
              <img src="@php echo $product_photo[0] @endphp" alt="@php echo $product_photo_alt @endphp">
            </div>
          @endif
        </div>
        <div class="product-style-fabric-right">
          <h2>{{ the_sub_field('fabric_title') }}</h2>
          <p>{{ the_sub_field('fabric_paragraph') }}</p>
          @if ( get_sub_field('fabric_pdf') )
            <a href='{{ the_sub_field('fabric_pdf') }}' class="btn" target="_blank" rel="noopener">{{ the_sub_field('fabric_btn_text') }}</a>
          @endif
        </div>
      </div>
      @php endwhile @endphp
    @php endif @endphp
  </div>
</section>

<section id="product-style-tech">
  <div class="container">
    <h2>Technical information</h2>
    <p>{{ the_field('product_style_tech_paragraph') }}</p>

    @php if ( have_rows('product_style_tech_downloads') ) : @endphp
      <div class="product-style-tech-grid">
      @php while ( have_rows('product_style_tech_downloads') ) : the_row() @endphp
        <div class="product-style-tech-grid-item">
          @if ( get_sub_field('tech_file_type') == 'CAD Files' )
            <img src="@asset('images/icon-cad.svg')" alt="CAD Logo" width="100">
          @elseif ( get_sub_field('tech_file_type') == 'Sketchup File Type' )
            <img src="@asset('images/icon-skp.svg')" alt="Sketchup Logo" width="100">
          @elseif ( get_sub_field('tech_file_type') == 'Product Brochure' )
            <img src="@asset('images/icon-pdf.svg')" alt="PDF Logo" width="100">
          @endif
          <div class="product-style-tech-file-info">
            @php
              $file_url = get_sub_field('tech_file_upload');
              if ($file_url) {
                $filename = pathinfo(basename($file_url), PATHINFO_FILENAME);
                $clean_filename = str_replace(['_', '-'], ' ', $filename);
                echo "<p>$clean_filename</p>";
              }
            @endphp
            <p>{{ the_sub_field('tech_file_type') }}</p>
          </div>
          <a href='{{ the_sub_field('tech_file_upload') }}' class="btn" download>Download</a>
        </div>
      @php endwhile @endphp
      </div>
    @php endif @endphp
  </div>
</section>

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
