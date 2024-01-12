// Elementor Loop grid filter

if (!is_admin()) {
    function wpb_search_filter($query) {
        if ($query->is_search) {
            $query->set('post_type', 'post');
        }
        return $query;
    }
    add_filter('pre_get_posts','wpb_search_filter');
}

//==============================

function my_query_by_post_types( $query ) {
	$query->set( 'post_type', 'case-study' );
}
add_action( 'elementor/query/cs_search_filter', 'my_query_by_post_types' );