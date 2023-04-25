<article @php(post_class())>
  <a href="{{ get_permalink() }}">
    <img class="team-member-img" src={{ the_field('member_photo_small') }} alt='{{ the_field('member_first_name') }} {{ the_field('member_last_name') }}'>
  </a>

  <h2 class="entry-title">
    <a href="{{ get_permalink() }}">
      {{ the_field('member_first_name') }} {{ the_field('member_last_name') }}
    </a>
  </h2>
  <p>{{ the_field('member_title') }}@if ( get_field('member_title') && get_field('member_degrees') ) - @endif{{ the_field('member_degrees') }}</p>
</article>
