<?php
    $footer_logo = get_field( 'footer_logo', 'option' );
    $footer_location_title = get_field( 'footer_location_title', 'option' );
    $footer_location_text = get_field( 'footer_location_text', 'option' );
    $footer_contact_text = get_field( 'footer_contact_text', 'option' );
    $footer_main_menu_title = get_field( 'footer_main_menu_title', 'option' );
    $footer_info_menu_title = get_field( 'footer_info_menu_title', 'option' );
    $footer_designed_by_text = get_field( 'footer_designed_by_text', 'option' );
    $footer_copyrights = get_field( 'footer_copyrights', 'option' );
?>
    
    <footer class="footer">
        <div class="container">
            <div class="footer-wrapper">
                <?php if( $footer_logo ):?>
                    <div class="footer-logo">
                        <img class="footer-logo__logo" src="<?php echo esc_url($footer_logo['url']); ?>" alt="Footer logo" width="232" height="43">
                    </div>
                <?php endif; ?>
                <div class="footer-content">
                    <div class="footer-details">
                        <?php if( $footer_location_title ): ?>
                            <h3 class="footer-details__title">
                                <?php echo esc_html($footer_location_title); ?>
                            </h3>
                        <?php endif; ?>

                        <?php if( $footer_location_text ): ?>
                            <div class="footer-details__text">
                                <?php echo wp_kses_post($footer_location_text); ?>
                            </div>
                        <?php endif; ?>

                        <?php if( $footer_contact_text ): ?>
                            <div class="footer-details__text footer-details__text--bottom">
                                <?php echo wp_kses_post($footer_contact_text); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="footer-nav">
                        <div class="footer-menu">
                            <?php if( $footer_main_menu_title ): ?>
                                <h3 class="footer-menu__title">
                                    <?php echo esc_html($footer_main_menu_title); ?>
                                </h3>
                            <?php endif; ?>

                            <?php wp_nav_menu( array( 'theme_location' => 'footer_menu' ) ); ?>
                        </div>

                        <div class="footer-menu">
                            <?php if( $footer_info_menu_title ): ?>
                                <h3 class="footer-menu__title">
                                    <?php echo esc_html($footer_info_menu_title); ?>
                                </h3>
                            <?php endif; ?>

                            <?php wp_nav_menu( array( 'theme_location' => 'footer_info_menu' ) ); ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php if( have_rows('footer_contact', 'option') ): ?>
                <div class="footer-contact">
                    <?php while( have_rows('footer_contact', 'option') ): the_row(); 
                        $text_above_title = get_sub_field('text_above_title');
                        $title = get_sub_field('title');
                        $shortcode = get_sub_field('shortcode');
                    ?>
                        <?php if( $text_above_title ): ?>
                            <p class="footer-contact__text-above-title">
                                <?php echo esc_html($text_above_title); ?>
                            </p>
                        <?php endif; ?>

                        <?php if( $title ): ?>
                            <h2 class="footer-contact__title">
                                <?php echo esc_html($title); ?>
                            </h2>
                        <?php endif; ?>

                        <?php if( $shortcode ): ?>
                            <div class="contact-form">
                                <?php echo do_shortcode($shortcode); ?>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
            
       

            <div class="footer-bottom">
                <?php if( have_rows('footer_socials', 'option') ): ?>
                    <div class="footer-socials">
                        <?php while( have_rows('footer_socials', 'option') ): the_row();
                            $icon = get_sub_field('icon');
                            $link = get_sub_field('link');
                        ?>
                            <a class="footer-socials-item" href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>">
                                <img class="footer-socials-item__icon" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>">
                            </a>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

                <?php if( $footer_designed_by_text ): ?>
                    <div class="footer-bottom__text">
                        <?php echo wp_kses_post($footer_designed_by_text); ?>
                    </div>
                <?php endif; ?>

                <?php if( $footer_copyrights ): ?>
                    <div class="footer-bottom__text">
                        <?php echo wp_kses_post($footer_copyrights); ?>
                    </div>
                <?php endif; ?>
            </div> 
            
        </div>
    </footer>
</div>
<?php
    wp_footer();
?>
</body>
</html>