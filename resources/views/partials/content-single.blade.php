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
        <img src="@asset('images/sharing-icon-facebook.svg')" width="30" height="30" alt="Facebook Logo" />
      </a>
      <a target="_blank" rel="noopener noreferrer" href='https://twitter.com/share?text={{ the_title() }}&url={{ the_permalink() }}'>
        <img src="@asset('images/sharing-icon-x.svg')" width="30" height="30" alt="Twitter Logo" />
      </a>
      <a target="_blank" rel="noopener noreferrer" href='https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(get_permalink()) }}'>
        <img src="@asset('images/sharing-icon-linkedin.svg')" width="30" height="30" alt="LinkedIn Logo" />
      </a>
      <a target="_blank" rel="noopener noreferrer" href='mailto:?subject=Check out this Shading Systems Article&body=Check out this Shading Systems Article - {{ the_permalink() }}' title="Share Shading Systems Articles by Email">
        <img src="@asset('images/sharing-icon-email.svg')" width="30" height="30" alt="Envelope Icon" />
      </a>
      <a target="_blank" rel="noopener noreferrer" href='#' onclick="navigator.clipboard.writeText('{{ the_permalink() }}'); alert('Link copied to clipboard!'); return false;" title="Copy Link to Clipboard">
        <img src="@asset('images/sharing-icon-link.svg')" width="30" height="30" alt="Link Icon" />
      </a>
    </div>
  </div>
  {{-- <div class="next-post-container">
    {{ previous_post_link('%link', 'Link To Next Post') }}<img src="@asset('images/icon-arrow-right.svg')" width="15" height="17" alt="Right Arrow" />
  </div> --}}
</article>
