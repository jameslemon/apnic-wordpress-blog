<!-- ########## BEGIN: FILMSTRIP ########## -->
<div id="pinned" class="row">
    <div class="col-md-offset-4 col-md-8">
        <div id="pinned-inner">
<?php
    $filmstrip_args = array(
        'posts_per_page' => '2',
        'post__not_in' => $GLOBALS['homepage_featured_posts_ids'],
        'meta_query' => array(
            array(
                'key' => 'homepage-feature-level2',
                'value' => '1',
                'compare' => '==',
            )
        )
    );

    $my_query = new WP_Query($filmstrip_args);
    if( $my_query->have_posts() ) : 
        while( $my_query->have_posts() ) : $my_query->the_post() 

?>
                <div class="col-md-6 pinned-post">
                    <div class="pinned-post-inner">
<?php 
            $GLOBALS['homepage_featured_posts_ids'][] = get_the_ID();
            if ( has_post_thumbnail() ) {
?>
                <a href="<?php the_permalink(); ?>" class="thumbnail-link-co-hover" data-target="#thumbnail-link-co-hover-sidekick-<?php echo get_the_ID(); ?>"><?php the_post_thumbnail('featuredImageMedium'); ?></a>
<?php
            }else{
?>
                    <img width="80" height="60" alt="<?php the_title(); ?>" class="attachment-featuredImageSmall wp-post-image" src="/wp-content/uploads/2014/05/ripples-80x60.jpg">
<?php 
            }
?>
                        <h2 title="<?php the_title_attribute();?>"><a id="thumbnail-link-co-hover-sidekick-<?php echo get_the_ID(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div><!-- /.filmstrip-item-text -->
                </div><!-- /.filmstrip-item -->
<?php 
        endwhile;
    endif; 
    wp_reset_postdata();
?>
        </div><!-- /#filmstrip -->
    </div><!-- /#filmstrip -->
</div><!-- /#filmstrip -->

<!-- ########## END: FILMSTRIP ########## -->
