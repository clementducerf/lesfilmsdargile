<div class="contact">
    <?php
    /* Template Name: Contact */
    while (have_posts()) : the_post(); ?>
<?php get_template_part('templates/page', 'header'); ?>
<div class="troiscolonnes">
    <?php if(get_field('contact_colonne1')){
        echo get_field('contact_colonne1');
    } ?>
</div>
<div class="troiscolonnes">
    <?php if(get_field('contact_colonne2')){
        echo get_field('contact_colonne2');
    } ?>
</div>
<div class="troiscolonnes">
    <?php if(get_field('contact_colonne3')){
        echo get_field('contact_colonne3');
    } ?>
</div>
<?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
</div>