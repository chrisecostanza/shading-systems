@if ( is_post_type_archive('team-members') )
  <div class="page-header">
    <img class="page-header-img" src={{ the_field('team_page_title_bg', 'options') }} alt="team member photo">
    <h1>{{ the_field('team_page_title', 'options') }}</h1>
  </div>
@else
  <div class="page-header">
    <h1>{!! $title !!}</h1>
  </div>
@endif
