<div class="posts">
  <?php while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>
      <div class="col1">
        <p><b><?= get_post_meta(get_the_ID(), 'date', true); ?></b></p>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <p class="author"><?php
          $voyelles = "AEIOU";
          $firstletter = substr(get_post_meta(get_the_ID(), 'auteur', true), 0, 1);
          $pageurl = get_permalink(get_page_by_title('realisateurs'));

          if(strpos($voyelles, $firstletter) === false){
            echo "de ";
          }
          else{
            echo "d'";
          }
          echo "<a href='".$pageurl."?realisateur=".htmlspecialchars(get_post_meta(get_the_ID(), 'auteur', true))."'>".get_post_meta(get_the_ID(), 'auteur', true)."</a>";
          ?></p>
        <?php if(get_post_meta(get_the_ID(), 'type', true)): ?><p><p><?= get_post_meta(get_the_ID(), 'type', true); ?></p><?php endif; ?>
        <?php if(get_post_meta(get_the_ID(), 'format', true)): ?><p><?= get_post_meta(get_the_ID(), 'format', true); ?></p><?php endif; ?>
        <?php if(
        (get_post_meta(get_the_ID(), 'type', true) || get_post_meta(get_the_ID(), 'format', true)) && (get_post_meta(get_the_ID(), 'soutiens', true) || get_post_meta(get_the_ID(), 'festivals', true))
        ): ?><br/><?php endif; ?>
        <?php if(get_post_meta(get_the_ID(), 'distribution', true)): ?><p>Distribution&#8239;: <b><?= get_post_meta(get_the_ID(), 'distribution', true); ?></b></p><?php endif; ?>
        <?php if(get_post_meta(get_the_ID(), 'soutiens', true)): ?><p>Soutiens&#8239;: <b><?= get_post_meta(get_the_ID(), 'soutiens', true); ?></b></p><?php endif; ?>
        <?php if(get_post_meta(get_the_ID(), 'festivals', true)): ?><p>Festivals&#8239;: <b><?= get_post_meta(get_the_ID(), 'festivals', true); ?></b></p><?php endif; ?>
        <br/>
        <?php if(get_post_meta(get_the_ID(), 'acteurs', true)): ?><p>Avec&#8239;: <b><?= get_post_meta(get_the_ID(), 'acteurs', true); ?></b></p><?php endif; ?>
        <?php if(get_post_meta(get_the_ID(), 'scenario', true)): ?><p>Scénario&#8239;: <b><?= get_post_meta(get_the_ID(), 'scenario', true); ?></b></p><?php endif; ?>
        <?php if(get_post_meta(get_the_ID(), 'production', true)): ?><p>Production&#8239;: <b><?= get_post_meta(get_the_ID(), 'production', true); ?></b></p><?php endif; ?>
        <?php if(get_post_meta(get_the_ID(), 'directiondeproduction', true)): ?><p>Direction de production&#8239;: <b><?= get_post_meta(get_the_ID(), 'directiondeproduction', true); ?></b></p><?php endif; ?>
        <?php if(get_post_meta(get_the_ID(), 'image', true)): ?><p>Image&#8239;: <b><?= get_post_meta(get_the_ID(), 'image', true); ?></b></p><?php endif; ?>
        <?php if(get_post_meta(get_the_ID(), 'son', true)): ?><p>Son&#8239;: <b><?= get_post_meta(get_the_ID(), 'son', true); ?></b></p><?php endif; ?>
        <?php if(get_post_meta(get_the_ID(), 'decors', true)): ?><p>Décors&#8239;: <b><?= get_post_meta(get_the_ID(), 'decors', true); ?></b></p><?php endif; ?>
        <?php if(get_post_meta(get_the_ID(), 'costumes', true)): ?><p>Costumes&#8239;: <b><?= get_post_meta(get_the_ID(), 'costumes', true); ?></b></p><?php endif; ?>
        <?php if(get_post_meta(get_the_ID(), 'montage', true)): ?><p>Montage&#8239;: <b><?= get_post_meta(get_the_ID(), 'montage', true); ?></b></p><?php endif; ?>
      </div>
      <div class="col2">
        <div class="photo" style="
            background: url(<?php if ( has_post_thumbnail() ) {echo get_the_post_thumbnail_url();} ?>) no-repeat center;
            -webkit-background-size: cover; /* pour anciens Chrome et Safari */
            background-size: cover; /* version standardisée */
            background-position: center top;
            ">
        </div>

        <div class="caroussel">
          <?php echo do_shortcode('[meta_gallery_carousel slide_to_show="1" slide_to_scroll="1" autoplay="true" autoplay_speed="3000" speed="300" arrows="false" dots="false" show_title="false" show_caption="false"]'); ?>
        </div>

        <div class="entry-content">
          <?php
          //the_content();
          echo  get_content_without_tag( apply_filters( 'the_content', get_the_content() ), 'div' );
          //echo get_content_without_tag( apply_filters( 'the_content', $var, 'p');
          ?>
        </div>

        <div class="links"><?php if(get_field('liens')){
            echo get_field('liens');
          } ?></div>
      </div>
      <div class="col2-mobile">

      </div>
      <hr>
      <div class="movies">
        <?php comments_template('/templates/index-like.php'); ?>
      </div>
      <footer>
        <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
      </footer>
      <?php comments_template('/templates/comments.php'); ?>
    </article>
  <?php endwhile; ?>
</div>