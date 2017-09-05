<div class="filmslongs">
<?php /* Template Name: Films longs */

/*
$args = array(
    'post_type' => 'post',
    'meta_key' => 'format',
    'meta_value' => array('1h', '1h20', '1h30', 'long métrage', '59 minutes'),
    'order' => 'ASC'
);
*/

$args = array(
    'meta_query' => array(
        array(
            'key' => 'format',
            'value' => array('1h', '1h20', '1h30', 'long métrage', '59 minutes'),
        ),
    ),
    'post_type' => 'post',
    'orderby' => 'meta_value_num',
    'meta_key' => 'date',
    'order' => 'DESC'
);



wp_reset_query();
$query = new WP_Query($args);

 if ($query->have_posts()): while ($query->have_posts()) : $query->the_post();
     get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_query(); ?>
</div>
