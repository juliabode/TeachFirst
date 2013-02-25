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

}
add_action( 'init', 'create_post_type' );
