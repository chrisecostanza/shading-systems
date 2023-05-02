@if ( is_post_type_archive('team-members') )
  <div class="page-header">
    @if ( get_field('team_page_title_bg', 'options') )
      @php $page_title_photo_id = get_field('team_page_title_bg', 'options') @endphp
      @php $page_title_photo = wp_get_attachment_image_src( $page_title_photo_id, 'full' ) @endphp
      @php $page_title_photo_alt = get_post_meta($page_title_photo_id, '_wp_attachment_image_alt', true) @endphp
      <img class="page-header-img" src="@php echo $page_title_photo[0] @endphp" alt="@php echo $page_title_photo_alt @endphp">
    @endif
    <h1>{{ the_field('team_page_title', 'options') }}</h1>
  </div>
@elseif ( is_home() )
  <div class="page-header">
    @if ( get_field('blog_archive_page_title_bg', 'options') )
      @php $page_title_photo_id = get_field('blog_archive_page_title_bg', 'options') @endphp
      @php $page_title_photo = wp_get_attachment_image_src( $page_title_photo_id, 'full' ) @endphp
      @php $page_title_photo_alt = get_post_meta($page_title_photo_id, '_wp_attachment_image_alt', true) @endphp
      <img class="page-header-img" src="@php echo $page_title_photo[0] @endphp" alt="@php echo $page_title_photo_alt @endphp">
    @endif
    <h1>Hearing Matters Blog</h1>
  </div>
@else
  <div class="page-header">
    @if ( get_field('page_title_bg') )
      @php $page_title_photo_id = get_field('page_title_bg') @endphp
      @php $page_title_photo = wp_get_attachment_image_src( $page_title_photo_id, 'full' ) @endphp
      @php $page_title_photo_alt = get_post_meta($page_title_photo_id, '_wp_attachment_image_alt', true) @endphp
      <img class="page-header-img" src="@php echo $page_title_photo[0] @endphp" alt="@php echo $page_title_photo_alt @endphp">
    @endif
    <h1>{!! $title !!}</h1>
  </div>
@endif
