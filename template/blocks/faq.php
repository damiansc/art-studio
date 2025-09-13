<?php 
  $title = get_field('title');
  $contact_text = get_field('contact_text');
  $contact_button = get_field('contact_button');
?>

<section class="section-faq">
  <div class="container">
    <?php if( $title ): ?> 
      <h1 class="section-faq__title">
        <?php echo esc_html($title); ?>
      </h1>
    <?php endif; ?>

    <?php if( have_rows('faq') ): ?>
      <div class="faq-wrapper">
        <?php while( have_rows('faq') ): the_row(); 
          $question = get_sub_field('question');
          $answer = get_sub_field('answer');
        ?>
          <div class="faq-item">
            <?php if( $question ): ?> 
              <h2 class="faq-item__question">
                <?php echo esc_html($question); ?>
              </h2>
            <?php endif; ?>

            <?php if( $answer ): ?> 
              <div class="faq-item__answer">
                <?php echo wp_kses_post($answer); ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>

    <?php if( $contact_text ): ?> 
      <div class="section-faq__contact-text">
        <?php echo wp_kses_post($contact_text); ?>
      </div>
    <?php endif; ?>

    <?php if( $contact_button ): ?>
      <a class="btn btn--brown section-faq__contact-btn" href="<?php echo esc_url($contact_button['url']); ?>" target="<?php echo esc_attr($contact_button['target']); ?>">
        <?php echo esc_html($contact_button['title']); ?>
      </a>
    <?php endif; ?>
  </div>
</section>
