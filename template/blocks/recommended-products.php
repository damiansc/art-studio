<?php 
  $text_above_title = get_field('text_above_title');
  $title = get_field('title');
  $text = get_field('text');
  $recommended_products = get_field('recommended_products');
?>

<section class="section-recommended-products">
  <div class="container">
    <div class="rp-header">
      <div class="rp-header-column">
        <?php if( $text_above_title ): ?>
          <p class="rp-header-column__text-above-title">
              <?php echo esc_html($text_above_title); ?>
          </p>
        <?php endif; ?>

        <?php if( $title ): ?> 
          <h2 class="rp-header-column__title">
            <?php echo esc_html($title); ?>
          </h2>
        <?php endif; ?>
      </div>

      <div class="rp-header-column">
        <?php if( $text ): ?> 
          <div class="rp-header-column__text">
            <?php echo wp_kses_post($text); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <?php if( have_rows('recommended_products') ): ?>
      <div class="recommended-products recommended-products-splide splide">
        <div class="splide__arrows">
          <button class="splide__arrow splide__arrow--prev">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M14.4302 5.92993L20.5002 11.9999L14.4302 18.0699" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M3.5 12H20.33" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>
          <button class="splide__arrow splide__arrow--next">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M14.4302 5.92993L20.5002 11.9999L14.4302 18.0699" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M3.5 12H20.33" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>
        </div>

        <div class="splide__track">
          <div class="splide__list">
            <?php foreach( $recommended_products as $product ): 
              $get_product = wc_get_product($product->ID);
              $link = get_permalink( $product->ID );
              $image = get_the_post_thumbnail_url($product->ID);
              $title = get_the_title( $product->ID );
              $price = $get_product->get_price_html(); 
            ?>
              <div class="splide__slide">
                <a class="recommended-products-item" href="<?php echo esc_url($link); ?>">
                  <div class="recommended-products-item__image">
                    <img src="<?php echo esc_url($image); ?>" alt="Obrazek - <?php echo esc_html($title); ?>">
                  </div>

                  <?php if( $title ): ?>
                    <h3 class="recommended-products-item__title">
                      <?php echo esc_html($title); ?>
                    </h3>
                  <?php endif; ?>

                  <?php if( $price ): ?>
                    <h3 class="recommended-products-item__price">
                      <?php echo wp_kses_post($price); ?>
                    </h3>
                  <?php endif; ?>
                </a>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="splide-pagination-wrapper">
          <ul class="splide__pagination"></ul>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>
