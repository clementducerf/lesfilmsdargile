<div class="contact">
    <?php
    /* Template Name: Contact */
    while (have_posts()) : the_post(); ?>
<?php get_template_part('templates/page', 'header'); ?>
<div class="deuxcolonnes">
    <p>
        <b>&#99;&#111;&#110;&#116;&#97;&#99;&#116;@&#108;&#101;&#115;&#102;&#105;&#108;&#109;&#115;&#100;&#97;&#114;&#103;&#105;&#108;&#101;.&#102;&#114;</b><br/><br/>
        <a href="tel:0951980413">09 51 98 04 13</a><br/><br/>
        adresse des bureaux<br/>
        <b>Les films d'Argile<br/>
        45 rue de Tolbiac<br/>
        75013 Paris</b><br/><br/>
        adresse du siège social<br/>
        <b>Les films d'Argile<br/>
        Maison des Vendanges,<br/>
        1 rue du Merle<br/>
        71250 Cluny</b>
        <br/><br/>
        <a href="https://www.facebook.com/Les-Films-dArgile-373675522719895/" target="_blank">facebook</a>
    </p>
</div>
<div class="deuxcolonnes">
    <p>
        colophon<br/><br/>
        Le site à été decidé à deux mains par l’atelier <a href="http://pierrefeuilleciseau.fr" target="_blank">Pierre Feuille Ciseau</a>, en <em>Jannon Sans</em> et développé par <a href="http://www.clementducerf.com" target="_blank">Clément Ducerf</a> en 2017.
    </p>
</div>
<?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
</div>

