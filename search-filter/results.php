<?php

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

if ( $query->have_posts() ) {
    ?>
    <?php
    while ( $query->have_posts() ) {
			$query->the_post();
			if ( wp_get_post_parent_id( get_the_ID() ) ) {
					continue;
			}
			?>
			<div class="product-card">
					<div class="product-featured-image">
						<a href="<?php echo get_permalink(); ?>">
						<?php $prod_photo_id = get_field('product_listing_photo', get_the_ID()); ?>
						<?php if($prod_photo_id): ?>
							<?php $prod_photo_photo = wp_get_attachment_image_src( $prod_photo_id, 'full' ); ?>
							<?php $prod_photo_alt = get_post_meta($prod_photo_id, '_wp_attachment_image_alt', true); ?>
							<img class="prod-image" src="<?php echo $prod_photo_photo[0]; ?>" alt="<?php echo $prod_photo_alt; ?>">
						<?php endif; ?>
						</a>
					</div>
					<div class="product-title">
						<h3>
						<a href="<?php echo get_permalink(); ?>">
							<?php echo get_the_title(); ?><img class="right-arrow" src="<?php echo \Roots\asset('images/icon-blue-arrow-right.svg')->uri(); ?>" alt="right arrow" width="7" height="16">
						</a>
						</h3>
					</div>
					<div class="product-excerpt">
						<?php $prod_excerpt = get_field('product_excerpt', get_the_ID()); ?>
						<?php echo wp_trim_words( $prod_excerpt, 12, '...' ); ?>
					</div>
			</div>
		<?php
	}
	?>
	<?php
} else {
	?>
	<div class='search-filter-results-list' data-search-filter-action='infinite-scroll-end'>
		<span>End of Results</span>
	</div>
	<?php
}
?>