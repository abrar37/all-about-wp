<?php

//Elementor: Search Query for Blogs (With ot without taxonomy selected)
function search_query_by_post_type_and_taxonomy( $query ) {
	$tax_query = $query->get( 'tax_query' );
	if(isset($_GET['blog_categories'])){
		$blog_cat = $_GET['blog_categories'];
		// If there is no meta query when this filter runs, it should be initialized as an empty array.
		if ( ! $tax_query ) {
			$tax_query = [];
		}
		$tax_query = array(
			'relation' => 'OR', // Use AND for taking result on both condition true
			array(
				'taxonomy'         => 'blog_categories', // taxonomy slug
				'terms'            => [ $blog_cat ], // term ids
				'field'            => 'slug',
				'operator'         => 'IN', // Also support: AND, NOT IN, EXISTS, NOT EXISTS
				'include_children' => true,
			)
		);
		$query->set( 'tax_query', $tax_query );
	}
	$query->set( 'post_type', 'blog' );
}
add_action( 'elementor/query/blog_search_filter', 'search_query_by_post_type_and_taxonomy' );

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