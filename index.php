<?php get_template_part('templates/page', 'header'); ?>

<div id="introduction">
  <a href="#">
      <?php echo get_the_post_thumbnail(get_page_by_title('accueil'),'post-thumbnail', array('id'=>'accueil')) ?>
  </a>
</div>

<?php
  wp_reset_query();
  // custom query based on random order
  $args = array(
  'post_type' => 'post',
  'orderby' => 'rand');

   $query = new WP_Query($args);

if ($query->have_posts()): while ($query->have_posts()) : $query->the_post();

// First render the post that are not in the current using the meta

    get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format());

    ?>
<?php endwhile; ?>
<?php endif; ?>