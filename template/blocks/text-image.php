<?php 
  $image = get_field('image');
  $image_text = get_field('image_text');
  $text_above_title = get_field('text_above_title');
  $title = get_field('title');
  $text = get_field('text');
?>

<section class="section-text-image">
  <div class="text-image-column">
    <img class="text-image-column__image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">

    <?php if( $image_text ): ?> 
      <div class="text-image-column__content">
        <?php echo esc_html($image_text); ?>
      </div>
    <?php endif; ?>
  </div>

  <div class="text-image-content">
    <?php if( $text_above_title ): ?>
      <p class="text-image-content__text-above-title">
          <?php echo esc_html($text_above_title); ?>
      </p>
    <?php endif; ?>

    <?php if( $title ): ?> 
      <h2 class="text-image-content__title">
        <?php echo esc_html($title); ?>
      </h2>
    <?php endif; ?>

    <?php if( $text ): ?> 
      <div class="text-image-content__text">
        <?php echo wp_kses_post($text); ?>
      </div>
    <?php endif; ?>
  </div>
</section>
