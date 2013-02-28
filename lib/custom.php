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
