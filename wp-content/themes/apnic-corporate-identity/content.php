<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post">
			<?php _e( 'Featured post', 'twentytwelve' ); ?>
		</div>
		<?php endif; ?>
		<header class="entry-header">
			<?php if ( is_single() ) : ?>


			<h1 class="entry-title"><?php the_title(); ?></h1>
<div id="social_media_widgets"><div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div><a href="https://twitter.com/share" class="twitter-share-button">Tweet</a></div>
			<?php else : ?>
			<h4 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h4>
			<?php endif; // is_single() ?>
                        <p class="meta-author-and-date">By <?php the_author_posts_link(); ?> on <?php echo mysql2date('j M Y', $post->post_date) ?></p>
		</header><!-- .entry-header -->

		<?php if ( is_search() || is_home() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php if ( ! post_password_required() && ! is_attachment() ) :
                         ?>
                            <?php 
                                if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {
                                    the_post_thumbnail('featuredImageSmall'); 
                                } else {
                             ?>
<img width="100" height="75" alt="<?php the_title(); ?>" class="attachment-featuredImageSmall wp-post-image" src="/wp-content/uploads/2014/05/ripples-206x75.jpg">
                             <?php
                                } 
                            ?>
                        <?php
			endif; ?>

			<?php the_excerpt(); ?><p class="excerpt-read-more"><a href="<?php the_permalink(); ?>" rel="bookmark">Read More</a></p>
			
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
                            <?php 
                                if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) && (!is_home())  ) {
                                    the_post_thumbnail('featuredImageLarge'); 
                                }
                            ?>
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

	</article><!-- #post -->
