<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

/**
 * Modify the main query on product archives to only show parent products.
 *
 * @param \WP_Query $query
 */
add_action('pre_get_posts', function (\WP_Query $query) {
    // Return early if in admin, not the main query, or not a product-related archive.
    if (is_admin() || ! $query->is_main_query()) {
        return;
    }

    // Apply to product post type archive and any product taxonomy archives.
    if ($query->is_post_type_archive('product') || $query->is_tax(get_object_taxonomies('product'))) {
        // Set post_parent to 0 to retrieve only top-level posts.
        $query->set('post_parent', 0);
    }
});
