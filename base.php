<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('Vous utilisez un navigateur <strong>périmé</strong>. Pensez <a href="http://browsehappy.com/">à le mettre à jour</a> pour améliorer votre expérience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header');
      get_template_part('templates/nav');
    ?>
    <div class="wrap container" role="document">
      <div class="content row">
        <main class="main <?php if(is_home()){ echo "home"; } ?>">
          <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->
      </div><!-- /.content -->
    </div><!-- /.wrap -->
    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>
  </body>
</html>
