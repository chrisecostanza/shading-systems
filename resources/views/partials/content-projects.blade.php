<div class="project-card">
  <div class="project-featured-image">
    <a href="{{ the_permalink() }}">
      @php $project_photo_id = get_field('project_listing_photo') @endphp
      @php $project_photo_photo = wp_get_attachment_image_src( $project_photo_id, 'full' ) @endphp
      @php $project_photo_alt = get_post_meta($project_photo_id, '_wp_attachment_image_alt', true) @endphp
      <img class="prod-image" src="@php echo $project_photo_photo[0] @endphp" alt="@php echo $project_photo_alt @endphp">
    </a>
  </div>
  <div class="project-title">
    <h3>
      <a href={{ get_permalink() }}>
        {{ the_title() }}<img class="right-arrow" src="@asset('images/icon-blue-arrow-right.svg')" alt="right arrow" width="7" height="16">
      </a>
    </h3>
  </div>
  <div class="project-excerpt">
    @php $project_excerpt = get_field('project_excerpt') @endphp
    {{ wp_trim_words( $project_excerpt, 9, '...' ) }}
  </div>
</div>
