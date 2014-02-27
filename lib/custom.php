<?php

// Custom functions

function create_post_type() {
	register_post_type( 'tf_faq',
		array(
			'labels' => array(
				'name' => __( 'FAQ' ),
				'singular_name' => __( 'FAQ' )
			),
		'public' => true,
		'has_archive' => true,
    'menu_position' => 5,
		)
	);

	register_post_type( 'tf_members',
		array(
			'labels' => array(
				'name' => __( 'Porträts' ),
				'singular_name' => __( 'Porträt' )
			),
		'public' => true,
		'has_archive' => true,
    'menu_position' => 5,
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		)
	);

}
add_action( 'init', 'create_post_type' );

function create_taxonomy() {
  register_taxonomy( 'tf_membership', 'tf_members',
		array(
			'labels' => array(
				'name' => __( 'Zugehörigkeiten' ),
				'singular_name' => __( 'Zugehörigkeit' )
			),
    'hierarchical' => true,
		'public' => true,
		)
  );
  wp_insert_term( 'Team', 'tf_membership' );
  wp_insert_term( 'Fellow', 'tf_membership' );
}
add_action( 'init', 'create_taxonomy' );

function add_custom_class( $classes, $menu ) {
    $template_name = get_post_meta( $menu->object_id, '_wp_page_template', true );
    $field_value = get_field('team_or_fellow', $menu->object_id );

    if ( is_singular('tf_members') && has_term('Team', 'tf_membership') && $field_value == 'Team' && $template_name == 'page-members.php' ) {
        $classes[] = 'active';
    }
    if ( is_singular('tf_members') && has_term('Fellow', 'tf_membership') && $field_value == 'Fellow' && $template_name == 'page-members.php' ) {
        $classes[] = 'active';
    }
    if ( is_singular('tf_members') && has_term('Alumni', 'tf_membership') && $field_value == 'Alumni' && $template_name == 'page-members.php' ) {
        $classes[] = 'active';
    }
    if ( is_singular('post') && $template_name == 'page-blog.php' ) {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'add_custom_class', 10, 2 );

/**
* Creates sharethis shortcode
*/


if (function_exists('st_makeEntries')) :
	add_shortcode('sharethis', 'st_makeEntries');
endif;
add_filter('widget_text', 'do_shortcode');


/**
 * Customize Login Screen
 */

function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background: #d20a0a url(<?php echo get_bloginfo( 'template_directory' ) ?>/assets/img/TFD-logo-weiss.png) center center no-repeat;
            padding-bottom: 30px;
            width: auto;
        }
    </style>
    <?php

    echo my_favicon_url();
}
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_favicon_url() {
    return '<link rel="shortcut icon" href="' . get_template_directory_uri() . '/assets/img/favicon.ico' . '" />';
}

function my_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'TeachFirst Deutschland';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

/**
* Add Favicon in admin panel
*/

function add_admin_area_favicon() {
    echo my_favicon_url();
}

add_action('admin_head', 'add_admin_area_favicon');