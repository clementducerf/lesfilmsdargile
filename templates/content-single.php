<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <div class="col1">
      <p><b><?= get_post_meta(get_the_ID(), 'date', true); ?></b></p>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <p class="author"><?= get_post_meta(get_the_ID(), 'auteur', true); ?></p>
      <p><?= get_post_meta(get_the_ID(), 'type', true); ?></p>
      <p><?= get_post_meta(get_the_ID(), 'format', true); ?></p>
      <br/>
      <p>Soutiens&#8239;: <b><?= get_post_meta(get_the_ID(), 'soutiens', true); ?></b></p>
      <p>Festivals&#8239;: <b><?= get_post_meta(get_the_ID(), 'festivals', true); ?></b></p>
      <br/>
      <p>Avec&#8239;: <b><?= get_post_meta(get_the_ID(), 'acteurs', true); ?></b></p>
      <p>Scénario&#8239;: <b><?= get_post_meta(get_the_ID(), 'scenario', true); ?></b></p>
      <p>Production&#8239;: <b><?= get_post_meta(get_the_ID(), 'production', true); ?></b></p>
      <p>Image&#8239;: <b><?= get_post_meta(get_the_ID(), 'image', true); ?></b></p>
      <p>Son&#8239;: <b><?= get_post_meta(get_the_ID(), 'son', true); ?></b></p>
      <p>Décors&#8239;: <b><?= get_post_meta(get_the_ID(), 'decor', true); ?></b></p>
      <p>Costumes&#8239;: <b><?= get_post_meta(get_the_ID(), 'costumes', true); ?></b></p>
      <p>Montages&#8239;: <b><?= get_post_meta(get_the_ID(), 'montage', true); ?></b></p>
    </div>

    <div class="col2">
    </div>

    <div class="col3">
    </div>

    <div class="col4">

    </div>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <hr>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>


<script>
  $(document).ready(function() {
    console.log( "ready!" );

    $("p.author").html(function(){
      var text= $(this).text().trim().split(" ");
      var first = text.shift();
      return (text.length > 0 ? "<span class='book'>"+ first + "</span> " : first) + text.join(" ");
    });

  });
</script>
