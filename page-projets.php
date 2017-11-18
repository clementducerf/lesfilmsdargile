<div class="projets">
    <?php /* Template Name: Projets */

    // custom query based on post category
    $args = array(
        'category_name' => 'projets',
        'post_type' => 'post',
        'orderby' => 'meta_value_num',
        'meta_key' => 'date',
        'order' => 'DESC'
    );

    wp_reset_query();

    $query = new WP_Query($args);

    // next is only here to sort the post in the right order:

    if ($query->have_posts()): while ($query->have_posts()) : $query->the_post();

        // First render the post that are not in the current using the meta
        if(get_post_meta(get_the_ID(), 'date', true) == 'En écriture'){
            get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format());
        }

        ?>
    <?php endwhile; ?>
    <?php endif; ?>

    <?php wp_reset_query(); ?>
    <?php

    $query = new WP_Query($args);

    if ($query->have_posts()): while ($query->have_posts()) : $query->the_post();

// then query the date specific posts
        if(get_post_meta(get_the_ID(), 'date', true) == 'En développement'){
            get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format());
        }
        ?>
    <?php endwhile; ?>
    <?php endif; ?>


    <?php wp_reset_query(); ?>
    <?php

    $query = new WP_Query($args);

    if ($query->have_posts()): while ($query->have_posts()) : $query->the_post();

// then query the date specific posts
        if(get_post_meta(get_the_ID(), 'date', true) != 'En développement' && get_post_meta(get_the_ID(), 'date', true) != 'En écriture'){
            get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format());
        }
        ?>
    <?php endwhile; ?>
    <?php endif; ?>
</div>
