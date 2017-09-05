<article <?php post_class(); ?>>
  <a href="<?php the_permalink(); ?>">
    <?php get_template_part('templates/entry-meta'); ?>
    <h2 class="entry-title"><?php the_title(); ?></h2>
  <div class="entry-summary">
    <!-- <?php the_excerpt(); ?> -->
    <?php get_template_part('templates/context-meta'); ?>
  </div>
  </a>
</article>