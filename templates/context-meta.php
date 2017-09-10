<p><?php
    $voyelles = "AEIOU";
    $firstletter = substr(get_post_meta(get_the_ID(), 'auteur', true), 0, 1);
    if(strpos($voyelles, $firstletter) === false){
        echo "de ";
    }
    else{
        echo "d'";
    }
    echo get_post_meta(get_the_ID(), 'auteur', true);
    ?></p>
<p><?= get_post_meta(get_the_ID(), 'type', true); ?></p>
<p><?= get_post_meta(get_the_ID(), 'format', true); ?></p>
<p><?= get_post_meta(get_the_ID(), 'status', true); ?></p>