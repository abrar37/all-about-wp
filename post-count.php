// Get count of posts in a category by its term id in any CPT

function get_posts_count_by_term_id($term_id, $post_type, $taxonomy){
	$args = array(
		'post_type' => $post_type,
		'tax_query' => array(
			array(
				'taxonomy' => $taxonomy,
				'field' => 'term_id',
				'terms' => $term_id
			)
		)
	);
    $category_query = new WP_Query($args);
    $post_count = $category_query->found_posts;
    wp_reset_postdata();
    return $post_count;
}