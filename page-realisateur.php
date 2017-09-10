<div class="realisateurs">
    <?php /* Template Name: Realisateurs */

    //print_r($_GET);  // for all GET variables
    $real = "";
    if($_GET['realisateur']){
        $real = $_GET['realisateur'];
    }
    else{
        echo "<p>Aucun film trouvé</p>";
    }

    // custom query based on post category
    $args = array(
        'category_name' => 'films-courts',
        'post_type' => 'post',
        'orderby' => 'meta_value_num',
        'meta_key' => 'date',
        'order' => 'DESC'
    );

    $args = array(
        'numberposts'	=> -1,
        'post_type'		=> 'post',
        'meta_key'		=> 'auteur',
        'meta_value'	=> $real,
    );

    wp_reset_query();

    $query = new WP_Query($args);

    // next is only here to sort the post in the right order:

    if ($query->have_posts()): while ($query->have_posts()) : $query->the_post();

// First render the post that are not in the current using the meta
        if(get_post_meta(get_the_ID(), 'date', true) == 'Prochainement'){
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
        if(get_post_meta(get_the_ID(), 'date', true) != 'Prochainement'){
            get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format());
        }
        ?>
    <?php endwhile; ?>
    <?php endif; ?>





</div>
