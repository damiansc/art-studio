<?php 

function theme_enqueue_styles() {
	wp_enqueue_style(
		'theme-main-style', 
		get_stylesheet_uri()
	);

	wp_enqueue_style( 
		'theme-style',
		get_parent_theme_file_uri( 'css/style.min.css' )
	);

	wp_enqueue_style( 
		'splide-style',
		get_parent_theme_file_uri( 'css/splide-core.min.css' )
	);
};


function theme_enqueue_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('theme-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), '', true);
	wp_enqueue_script( 'splide-scripts', get_template_directory_uri() . '/assets/js/splide.min.js', array('theme-scripts'), '', true );
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');


function remove_jquery_migrate( $scripts ) {
	if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
			$script = $scripts->registered['jquery'];
			if ( $script->deps ) {
					$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
			}
	}
}
add_action( 'wp_default_scripts', 'remove_jquery_migrate' );