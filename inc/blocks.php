<?php 

add_action('acf/init', 'my_acf_blocks_init');
function my_acf_blocks_init() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // Register a intro block.
        acf_register_block_type(array(
            'name'              => 'intro',
            'title'             => __('Intro'),
            'description'       => __('A custom intro block.'),
            'render_template'   => 'template/blocks/intro.php',
            'category'          => 'layout',
        ));

        // Register a text editor block.
        acf_register_block_type(array(
            'name'              => 'text-editor',
            'title'             => __('Edytor tekstu'),
            'description'       => __('A custom text editor block.'),
            'render_template'   => 'template/blocks/text-editor.php',
            'category'          => 'layout',
        ));

        // Register a recommended products block.
        acf_register_block_type(array(
            'name'              => 'recommended-products',
            'title'             => __('Polecane produkty'),
            'description'       => __('A custom recommended products block.'),
            'render_template'   => 'template/blocks/recommended-products.php',
            'category'          => 'layout',
        ));

        // Register a text image block.
        acf_register_block_type(array(
            'name'              => 'text-image',
            'title'             => __('Tekst z obrazkiem'),
            'description'       => __('A custom text image block.'),
            'render_template'   => 'template/blocks/text-image.php',
            'category'          => 'layout',
        ));
    }
}
