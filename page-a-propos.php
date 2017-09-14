<div class="apropos">
<?php
/* Template Name: A propos */
 ?>
    <?php get_template_part('templates/page', 'header'); ?>
    <div class="introduction">
        <?php if(get_field('apropos_introduction')){
            echo get_field('apropos_introduction');
        } ?>
    </div>
    <div class="deuxcolonnes">
        <?php if(get_field('apropos_structure_col1')){
            echo get_field('apropos_structure_col1');
        } ?>
    </div>
    <div class="deuxcolonnes">
        <?php if(get_field('apropos_structure_col2')){
            echo get_field('apropos_structure_col2');
        } ?>
    </div>
    <div class="conclusion">
        <?php if(get_field('apropos_developpement')){
            echo get_field('apropos_developpement');
        } ?>
    </div>
    <div class="troiscolonnes">
        <?php if(get_field('apropos_membres_col1')){
            echo get_field('apropos_membres_col1');
        } ?>
    </div>
    <div class="troiscolonnes">
        <?php if(get_field('apropos_membres_col2')){
            echo get_field('apropos_membres_col2');
        } ?>
    </div>
    <div class="troiscolonnes">
        <?php if(get_field('apropos_membres_col3')){
            echo get_field('apropos_membres_col3');
        } ?>
    </div>
    <?php get_template_part('templates/content', 'page'); ?>
</div>
