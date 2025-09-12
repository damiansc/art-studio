<?php get_header(); ?>

<div class="page-content">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

            <?php the_content('',true); ?>

        <?php endwhile; ?>
    <?php endif; ?>
</div>


<?php get_footer(); ?>