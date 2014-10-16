<div id="hero" class="row">
<?php
    /* ********** Hompeage Feature ********** */
    $args = array(
        'posts_per_page' => '1',
        'meta_query' => array(
            array(
                'key' => 'homepage-feature',
                'value' => '1',
                'compare' => '==',
            )
        )
    );
    $my_homepage_features = new WP_Query($args);
    if( $my_homepage_features->have_posts() ) : 
?>
<?php
            while( $my_homepage_features->have_posts() ) : $my_homepage_features->the_post() 

?>
    <div class="col-md-4" id="hero-title">
        <h1 title="<?php the_title_attribute();?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <p>By <?php the_author_posts_link(); ?> on <?php echo mysql2date('j M Y', $post->post_date) ?></p>
        <?php 

            $GLOBALS['homepage_featured_posts_ids'][] = get_the_ID();
            $my_awesome_excerpt = get_the_content(); 
            $my_awesome_excerpt = apply_filters('the_content', $my_awesome_excerpt);
            $my_awesome_excerpt = str_replace('\]\]\>', ']]&gt;', $my_awesome_excerpt);
            $my_awesome_excerpt = preg_replace('@<script[^>]*?>.*?</script>@si', '', $my_awesome_excerpt)    ;
            $my_awesome_excerpt = strip_tags($my_awesome_excerpt, '');
            $excerpt_length = 40;
            $words = explode(' ', $my_awesome_excerpt, $excerpt_length + 1);
                if (count($words)> $excerpt_length) {
                    array_pop($words);
                    array_push($words, '...');
                    $my_awesome_excerpt = implode(' ', $words);
                }
        ?>

    </div>
    <div class="col-md-8" id="hero-desc"><?php if ( has_post_thumbnail() ) { the_post_thumbnail('featuredImageLarge'); } ?>
        <p class="ellipsis" data-ellipsis-rows="3"><?php echo $my_awesome_excerpt; ?></p>
</div>
<?php 
    endwhile;
?>
<?php
    endif; 
?>
<?php
    wp_reset_postdata();
    /* ********** Homepage Feature ends ********** */
?>

</div>

