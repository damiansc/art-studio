<?php 

// Declaring WooCommerce support in themes
function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
    add_theme_support( 'woocommerce-block-theme' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

// Usuń przycisk "Dodaj do koszyka" na stronie sklepu

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );


// Zmiana ilości produktów na stronie sklepu

add_filter( 'loop_shop_per_page', 'change_products_number_per_page', 20 );
function change_products_number_per_page( $cols ) {
    return 4; // tutaj wpisz swoją ilość, np. 24 produkty na stronę
}

// Zmiana separatora w breadcrumbs WooCommerce

add_filter( 'woocommerce_breadcrumb_defaults', 'change_breadcrumbs_separator' );
function change_breadcrumbs_separator( $defaults ) {
    $defaults['delimiter'] = '<svg width="6" height="9" viewBox="0 0 6 9" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M1 0.5L5 4.5L1 8.5" stroke="#667085" stroke-linecap="round" stroke-linejoin="round"/> </svg>';
    return $defaults;
}

// Pokaż strzałki w paginacji

remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
add_action( 'woocommerce_after_shop_loop', 'custom_woocommerce_pagination', 10 );

function custom_woocommerce_pagination() {
    global $wp_query;

    if ( $wp_query->max_num_pages <= 1 ) {
        return;
    }

    $current = max( 1, get_query_var( 'paged' ) );
    $max     = $wp_query->max_num_pages;

    // Generujemy linki numerów jako <li>
    $links = paginate_links( array(
        'total'     => $max,
        'current'   => $current,
        'end_size'  => 2,
        'mid_size'  => 1,
        'type'      => 'array',
        'prev_next' => false,
    ) );

    if ( empty( $links ) ) {
        return;
    }

    echo '<nav class="woocommerce-pagination">';
    echo '<ul class="page-numbers">';

    // ← Poprzednia
    if ( $current > 1 ) {
        echo '<li><a class="prev page-numbers" href="' . esc_url( get_pagenum_link( $current - 1 ) ) . '"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.4302 5.92993L20.5002 11.9999L14.4302 18.0699" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M3.5 12H20.33" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a></li>';
    } else {
        echo '<li><span class="prev page-numbers disabled"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.4302 5.92993L20.5002 11.9999L14.4302 18.0699" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M3.5 12H20.33" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span></li>';
    }

    // Numery stron
    foreach ( $links as $link ) {
        echo '<li>' . $link . '</li>';
    }

    // Następna →
    if ( $current < $max ) {
        echo '<li><a class="next page-numbers" href="' . esc_url( get_pagenum_link( $current + 1 ) ) . '"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.4302 5.92993L20.5002 11.9999L14.4302 18.0699" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M3.5 12H20.33" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a></li>';
    } else {
        echo '<li><span class="next page-numbers disabled"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.4302 5.92993L20.5002 11.9999L14.4302 18.0699" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M3.5 12H20.33" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span></li>';
    }

    echo '</ul>';
    echo '</nav>';
}


// Całkowicie usuń metadane (SKU, kategorie, tagi)
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

// Dodaj informację o dostępności produktu na stronie produktu
add_action( 'woocommerce_single_product_summary', 'my_custom_stock_status_above_cart', 29 );

function my_custom_stock_status_above_cart() {
    global $product;

    if ( $product->is_in_stock() ) {
        echo '<p class="stock available"> 
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18.87 19.29C15.08 22.88 8.92996 22.88 5.12996 19.29C1.01996 15.4 0.94995 8.92008 4.92995 4.95008C8.82995 1.04008 15.17 1.04008 19.07 4.95008C23.04 8.92008 22.97 15.4 18.87 19.29Z" stroke="#806044" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M7.75 12L10.58 14.83L16.25 9.17004" stroke="#806044" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        Produkt dostępny
        </p>';
    } else {
        echo '<p class="stock unavailable">Produkt niedostępny!</p>';
    }
}

// Change add to cart button text

// add_filter('woocommerce_product_add_to_cart_text', 'custom_cart_button_text');

// function custom_cart_button_text() {
//     return 'Do koszyka';
// }



// Usunięcie tabów z produktu
// add_filter( 'woocommerce_product_tabs', '__return_empty_array', 98 );


// Dodanie klasy slidera na stronie produktu
// add_filter( 'woocommerce_post_class', 'add_splide_slide_class_to_related_only', 10, 2 );
// function add_splide_slide_class_to_related_only( $classes, $product ) {
//     global $is_related_slider;

//     if ( ! empty( $is_related_slider ) ) {
//         $classes[] = 'splide__slide';
//     }

//     return $classes;
// }
