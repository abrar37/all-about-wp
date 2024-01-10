// Custom Link on Elementor blog loop grid

function ed_blog_link($atts) {
    $atts = shortcode_atts(
        array(
            'post_id' => get_the_ID(), 
            'external_link' => 'external_blog_link',
        ),
        $atts,
        'custom_post_link'
    );

    // Get the custom link from the external_blog_link field
    $custom_link = get_post_meta($atts['post_id'], $atts['external_link'], true);
    // Use the custom link if available, otherwise use the post link
    $link = $custom_link ? esc_url($custom_link) : get_permalink($atts['post_id']);
    return $link;
}
add_shortcode('ed_blog_link', 'ed_blog_link');


