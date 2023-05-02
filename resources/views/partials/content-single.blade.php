<article @php(post_class())>
  <time class="date-published" datetime="{{ get_post_time('c', true) }}">
    Published on {{ get_the_date() }}
  </time>

  <div class="blog-post-content">
    @php(the_content())
  </div>

  <div class="sharing-icons-container">
    <p>Share This Post</p>
    <div class="sharing-icons">
      <a target="_blank" rel="noopener noreferrer" href='https://www.facebook.com/sharer.php?u={{ the_permalink() }}'>
        <img src="@asset('images/icon-facebook-blue.svg')" width="27" height="27" alt="Facebook Logo" />
      </a>
      <a target="_blank" rel="noopener noreferrer" href='https://twitter.com/share?text={{ the_title() }}&url={{ the_permalink() }}'>
        <img src="@asset('images/icon-twitter-blue.svg')" width="27" height="27" alt="Twitter Logo" />
      </a>
      <a target="_blank" rel="noopener noreferrer" href='mailto:?subject=Check out this Hill Hear Better Article&body=Check out this Hill Hear Better Article - {{ the_permalink() }}' title="Share Hill Hear Better Articles by Email">
        <img src="@asset('images/icon-email-blue.svg')" width="27" height="27" alt="Envelope Icon" />
      </a>
    </div>
  </div>
  <div class="next-post-container">
    {{ previous_post_link('%link', 'Link To Next Post') }}<img src="@asset('images/icon-arrow-right.svg')" width="15" height="17" alt="Right Arrow" />
  </div>
  
</article>
