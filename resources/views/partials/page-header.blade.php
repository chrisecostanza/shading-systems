<div class="page-header">
  @if ( get_post_type() == 'page' )
    <h1>{{ the_field('page_title') }}</h1>
  @elseif ( is_singular( 'products' ) )
    <h1>{{ the_field('product_name') }}</h1>
  @elseif ( is_post_type_archive( 'products' ) )
    <h1 class="all">{{ the_field('all_products_h1', 'option') }}</h1>
  @elseif ( has_term( 'indoor', 'product-location' ) )
    @php $indoor_term = get_queried_object() @endphp
    @php $indoor_h1 = get_field('product_location_h1', $indoor_term) @endphp
    <h1 class="indoor">{{ $indoor_h1 }}</h1>
  @elseif ( has_term( 'outdoor', 'product-location' ) )
    @php $outdoor_term = get_queried_object() @endphp
    @php $outdoor_h1 = get_field('product_location_h1', $outdoor_term) @endphp
    <h1 class="outdoor">{{ $outdoor_h1 }}</h1>
  @elseif ( is_singular( 'projects' ) )
    <h1>{{ the_field('project_name') }}</h1>
  @elseif ( is_post_type_archive( 'projects' ) )
    <h1>{{ the_field('all_projects_h1', 'options') }}</h1>
  @elseif ( has_term( 'indoor', 'project-types' ) )
    @php $indoor_term = get_queried_object() @endphp
    @php $indoor_h1 = get_field('project_type_h1', $indoor_term) @endphp
    <h1>{{ $indoor_h1 }}</h1>
  @elseif ( has_term( 'outdoor', 'project-types' ) )
    @php $outdoor_term = get_queried_object() @endphp
    @php $outdoor_h1 = get_field('project_type_h1', $outdoor_term) @endphp
    <h1>{{ $outdoor_h1 }}</h1>
  @else
    <h1>{!! $title !!}</h1>
  @endif
</div>
