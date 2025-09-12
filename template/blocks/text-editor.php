<?php 
  $editor = get_field('editor');
?>

<section class="section-text-editor">
  <div class="container">
    <?php echo wp_kses_post($editor); ?>
  </div>
</section>
