<div class="page-header">
  @if ( get_post_type() == 'page' )
    <h1>{{ the_field('page_title') }}</h1>
  @else
    <h1>{!! $title !!}</h1>
  @endif
</div>
