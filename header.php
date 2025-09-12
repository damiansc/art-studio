<!doctype html>
<html class="front-html" <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="format-detection" content="telephone=no">
        <!-- <link rel="shortcut icon" type="image/ico" href="https://visafly.com/favicon.ico"> -->
        <title><?php wp_title( '' ); ?> <?php echo wp_title( '', false ) ? ' :' : ''; ?> <?php bloginfo( 'name' ); ?></title>
        <?php wp_head(); ?>
    </head>

<body <?php body_class(); ?>>
<div class="glpage">
    <?php
        $header_logo = get_field( 'header_logo', 'option' );
        $header_account_link = get_field( 'header_account_link', 'option' );
        $header_basket_link = get_field( 'header_basket_link', 'option' );
        $header_search_link = get_field( 'header_search_link', 'option' );
    ?>
    
    <header class="header">
        <div class="container">
            <a href="<?php bloginfo('url');?>" class="header__logo-link">
                <?php if( $header_logo ): ?>
                    <img class="header__logo" src="<?php echo esc_url($header_logo['url']); ?>" alt="Header logo" width="203" height="37">
                <?php endif; ?>
            </a>

            <?php wp_nav_menu( array( 'theme_location' => 'header_menu' ) ); ?>

            <ul class="header-icons-menu">
                <?php if( $header_search_link ): ?>
                    <li class="header-icons-menu__item header-icons-menu__item--search">
                        <a class="header-icons-menu__link" href="<?php echo esc_url($header_search_link['url']); ?>" target="<?php echo esc_attr($header_search_link['target']); ?>">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.5 21C6.25329 21 2 16.7467 2 11.5C2 6.25329 6.25329 2 11.5 2C16.7467 2 21 6.25329 21 11.5C21 16.7467 16.7467 21 11.5 21Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M22 22L18.5 18.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if( $header_account_link ): ?>
                    <li class="header-icons-menu__item header-icons-menu__item--account">
                        <a class="header-icons-menu__link" href="<?php echo esc_url($header_account_link['url']); ?>" target="<?php echo esc_attr($header_account_link['target']); ?>">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 21.9999L2.26912 21.5525C6.8028 14.0153 17.8126 14.265 22 21.9999V21.9999" stroke="black" stroke-width="1.5" stroke-linecap="round"/>
                                <circle cx="12" cy="8" r="5.25" stroke="black" stroke-width="1.5"/>
                            </svg>
                        </a>
                    </li>
                <?php endif; ?>
               
                <li class="header-icons-menu__item header-icons-menu__item--basket">
                    <?php echo do_shortcode('[xoo_wsc_cart]'); ?>
                    <div class="xoo-wsc-cart-trigger">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <mask id="path-1-inside-1_37_224" fill="white">
                            <path d="M2 7.9375C2 7.41973 2.41973 7 2.9375 7H21.0625C21.5803 7 22 7.41973 22 7.9375V12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12V7.9375Z"/>
                            </mask>
                            <path d="M2.9375 7V8.5H21.0625V7V5.5H2.9375V7ZM22 7.9375H20.5V12H22H23.5V7.9375H22ZM2 12H3.5V7.9375H2H0.5V12H2ZM12 22V20.5C7.30558 20.5 3.5 16.6944 3.5 12H2H0.5C0.5 18.3513 5.64873 23.5 12 23.5V22ZM22 12H20.5C20.5 16.6944 16.6944 20.5 12 20.5V22V23.5C18.3513 23.5 23.5 18.3513 23.5 12H22ZM21.0625 7V8.5C20.7518 8.5 20.5 8.24816 20.5 7.9375H22H23.5C23.5 6.59131 22.4087 5.5 21.0625 5.5V7ZM2.9375 7V5.5C1.59131 5.5 0.5 6.59131 0.5 7.9375H2H3.5C3.5 8.24816 3.24816 8.5 2.9375 8.5V7Z" fill="black" mask="url(#path-1-inside-1_37_224)"/>
                            <path d="M7 11V7C7 4.23858 9.23858 2 12 2V2C14.7614 2 17 4.23858 17 7V7.5" stroke="black" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </div>
                </li>
            </ul>
        
            <div class="hamburger-menu">
                <input id="menu-toggle" type="checkbox" />
                
                <label aria-label="menu toggle" class="hamburger-menu__btn" for="menu-toggle">
                    <span></span>
                </label>

                <div class="mobile-menu">
                    <div class="mobile-menu-wrapper">
                        <ul class="header-icons-menu">
                            <?php if( $header_search_link ): ?>
                                <li class="header-icons-menu__item header-icons-menu__item--search">
                                    <a class="header-icons-menu__link" href="<?php echo esc_url($header_search_link['url']); ?>" target="<?php echo esc_attr($header_search_link['target']); ?>">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.5 21C6.25329 21 2 16.7467 2 11.5C2 6.25329 6.25329 2 11.5 2C16.7467 2 21 6.25329 21 11.5C21 16.7467 16.7467 21 11.5 21Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M22 22L18.5 18.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if( $header_account_link ): ?>
                                <li class="header-icons-menu__item header-icons-menu__item--account">
                                    <a class="header-icons-menu__link" href="<?php echo esc_url($header_account_link['url']); ?>" target="<?php echo esc_attr($header_account_link['target']); ?>">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 21.9999L2.26912 21.5525C6.8028 14.0153 17.8126 14.265 22 21.9999V21.9999" stroke="black" stroke-width="1.5" stroke-linecap="round"/>
                                            <circle cx="12" cy="8" r="5.25" stroke="black" stroke-width="1.5"/>
                                        </svg>
                                    </a>
                                </li>
                            <?php endif; ?>
                        
                            <li class="header-icons-menu__item header-icons-menu__item--basket">
                                <?php echo do_shortcode('[xoo_wsc_cart]'); ?>
                                <div class="xoo-wsc-cart-trigger">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <mask id="path-1-inside-1_37_224" fill="white">
                                        <path d="M2 7.9375C2 7.41973 2.41973 7 2.9375 7H21.0625C21.5803 7 22 7.41973 22 7.9375V12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12V7.9375Z"/>
                                        </mask>
                                        <path d="M2.9375 7V8.5H21.0625V7V5.5H2.9375V7ZM22 7.9375H20.5V12H22H23.5V7.9375H22ZM2 12H3.5V7.9375H2H0.5V12H2ZM12 22V20.5C7.30558 20.5 3.5 16.6944 3.5 12H2H0.5C0.5 18.3513 5.64873 23.5 12 23.5V22ZM22 12H20.5C20.5 16.6944 16.6944 20.5 12 20.5V22V23.5C18.3513 23.5 23.5 18.3513 23.5 12H22ZM21.0625 7V8.5C20.7518 8.5 20.5 8.24816 20.5 7.9375H22H23.5C23.5 6.59131 22.4087 5.5 21.0625 5.5V7ZM2.9375 7V5.5C1.59131 5.5 0.5 6.59131 0.5 7.9375H2H3.5C3.5 8.24816 3.24816 8.5 2.9375 8.5V7Z" fill="black" mask="url(#path-1-inside-1_37_224)"/>
                                        <path d="M7 11V7C7 4.23858 9.23858 2 12 2V2C14.7614 2 17 4.23858 17 7V7.5" stroke="black" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                </div>
                            </li>
                        </ul>
                        <?php wp_nav_menu( array( 'theme_location' => 'header_menu' ) ); ?>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="body-cover"></div>



        
