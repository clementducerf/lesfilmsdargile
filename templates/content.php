<article <?php post_class('brick'); ?> data-img="<?php the_post_thumbnail_url() ?>">
  <a href="<?php the_permalink(); ?>">
    <img class="hoverimg" src="" alt="<?php the_title(); ?>">
    <?php get_template_part('templates/entry-meta'); ?>
    <h2 class="entry-title"><?php the_title(); ?></h2>
    <div class="entry-summary">
    <?php get_template_part('templates/context-meta'); ?>
    </div>
  </a>
</article>