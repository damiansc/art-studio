<?php 

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );


function add_nav_menus() {
  register_nav_menus( array(
      'header_menu'=>'Header Menu',
      'footer_menu'=> 'Footer Main Menu',
      'footer_info_menu'=> 'Footer Info Menu',
  ));
}

add_action('init', 'add_nav_menus');


// Allow SVG Upload
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

  global $wp_version;
  if ( $wp_version !== '4.7.1' ) {
     return $data;
  }

  $filetype = wp_check_filetype( $filename, $mimes );

  return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
  ];

}, 10, 4 );

function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );

// Turn on reusable block in Admin
function ad21_reusable_blocks_admin_menu() {
  add_menu_page( 'Reusable Blocks', 'Reusable Blocks', 'edit_posts', 'edit.php?post_type=wp_block', '', 'dashicons-editor-table', 22 );
}
add_action( 'admin_menu', 'ad21_reusable_blocks_admin_menu' );


// Remove P tag on CF7
add_filter('wpcf7_autop_or_not', '__return_false');


// Add post thumbnails support
add_theme_support( 'post-thumbnails' );

function mytheme_register_sidebar() {
    register_sidebar([
        'name'          => 'Sklep – Sidebar',
        'id'            => 'shop-sidebar',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);
}
add_action( 'widgets_init', 'mytheme_register_sidebar' );