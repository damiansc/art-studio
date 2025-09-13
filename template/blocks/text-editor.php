<?php 
  $editor = get_field('editor');
?>

<section class="section-text-editor">
  <div class="container">
    <div class="section-text-editor__wrapper">
      <?php echo wp_kses_post($editor); ?>
    </div>
  </div>
</section>
