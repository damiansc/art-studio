<?php if( have_rows('slider') ): ?>
  <section class="section-intro intro-splide splide">
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
        <?php while( have_rows('slider') ): the_row();
            $text_above_title = get_sub_field('text_above_title');
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            $button = get_sub_field('button');
            $image = get_sub_field('image');
        ?>
          <div class="splide__slide">
            <div class="slide-content">
              <?php if( $text_above_title ): ?>
                <p class="slide-content__text-above-title">
                    <?php echo esc_html($text_above_title); ?>
                </p>
              <?php endif; ?>

              <?php if( $title ): ?> 
                <h1 class="slide-content__title">
                  <?php echo esc_html($title); ?>
                </h1>
              <?php endif; ?>

              <?php if( $text ): ?> 
                <div class="slide-content__description">
                  <?php echo wp_kses_post($text); ?>
                </div>
              <?php endif; ?>

              <?php if( $button ): ?>
                <a class="btn btn--white btn--big slide-content__btn" href="<?php echo esc_url($button['url']); ?>" target="<?php echo esc_attr($button['target']); ?>">
                  <?php echo $button['title']; ?>
                </a>
              <?php endif; ?>
            </div>

            <?php if( $image ): ?>
              <div class="slide-image">
                <img class="slide-image__image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
              </div>
            <?php endif; ?>
          </div>
        <?php endwhile; ?>
      </div>
      
      <div class="splide-pagination-wrapper">
        <ul class="splide__pagination"></ul>
      </div>
    </div>
  </section>
<?php endif; ?>
