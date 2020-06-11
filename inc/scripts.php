<?php
/**
 * Enqueue scripts and styles.
 */
function bellaworks_scripts() {
	wp_enqueue_style( 'bellaworks-style', get_stylesheet_uri() );

	wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', false, '3.4.1', false);
		wp_enqueue_script('jquery');

		// other scripts...
		wp_register_script(
			'imagesloaded',
			get_bloginfo('template_directory') . '/assets/js/imagesloaded.js',
			array('jquery') );
		wp_enqueue_script('imagesloaded');

		// other scripts...
		wp_register_script(
			'script',
			get_bloginfo('template_directory') . '/assets/js/script.js',
			array('jquery') );
		wp_enqueue_script('script');
		
		
		// other scripts...
		wp_register_script(
			'plugins',
			get_bloginfo('template_directory') . '/assets/js/plugins.js',
			array('jquery') );
		wp_enqueue_script('plugins');

	

	wp_enqueue_script( 
			'bellaworks-blocks', 
			get_template_directory_uri() . '/assets/js/vendors.js', 
			array(), '20120206', 
			true 
		);
	

	wp_enqueue_script( 
			'bellaworks-custom', 
			get_template_directory_uri() . '/assets/js/custom.js', 
			array(), '20120206', 
			true 
		);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bellaworks_scripts' );