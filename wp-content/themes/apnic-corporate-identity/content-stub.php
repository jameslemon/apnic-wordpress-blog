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
	<article id="post-<?php the_ID(); ?>" <?php post_class('post-stub'); ?>>
		<header class="entry-header">
                            <?php 
                                if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {
                              ?>
                            <a href="<?php the_permalink(); ?>" class="thumbnail-link-co-hover" data-target="#thumbnail-link-co-hover-<?php echo get_the_ID(); ?>"><?php the_post_thumbnail('featuredImageTiny'); ?></a>
                            <?php 
                                } else {
                             ?>
<a href="<?php the_permalink(); ?>" class="thumbnail-link-co-hover" data-target="#thumbnail-link-co-hover-<?php echo get_the_ID(); ?>"><img width="100" height="75" alt="<?php the_title(); ?>" class="attachment-featuredImageSmall wp-post-image" src="/wp-content/uploads/2014/05/ripples-100x75.jpg"></a>
                             <?php
                                } 
                            ?>

			<h3 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark" id="thumbnail-link-co-hover-<?php echo get_the_ID(); ?>"><?php the_title(); ?></a>
			</h3>
                        <p class="meta-author-and-date">By <?php the_author_posts_link(); ?> on <?php echo mysql2date('j M Y', $post->post_date) ?></p>
		</header><!-- .entry-header -->

		<div class="entry-summary">	
			<?php the_excerpt(); ?>
			
		</div><!-- .entry-summary -->

	</article><!-- #post -->
