<?php 
  $text_above_title = get_field('text_above_title');
  $title = get_field('title');
  $text = get_field('text');
  $image = get_field('image');
  $image_text = get_field('image_text');
?>

<section class="section-about-me">
  <div class="container">
    <div class="about-me-column about-me-column--left">
      <?php if( $text_above_title ): ?>
        <p class="about-me-column__text-above-title">
            <?php echo esc_html($text_above_title); ?>
        </p>
      <?php endif; ?>

      <?php if( $title ): ?> 
        <h1 class="about-me-column__title">
          <?php echo esc_html($title); ?>
        </h1>
      <?php endif; ?>
    </div>

    <div class="about-me-column about-me-column--right">
      <?php if( $text ): ?> 
        <div class="about-me-column__text">
          <?php echo wp_kses_post($text); ?>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <div class="about-me-image">
    <img class="about-me-image__image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">

    <?php if( $image_text ): ?> 
      <div class="about-me-image__content">
        <?php echo wp_kses_post($image_text); ?>
      </div>
    <?php endif; ?>
  </div>
</section>
