<?php
/**
 * The home template file
 *
 * Puts together the home page.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header('home'); ?>
	<div id="primary" class="site-content col-md-9">
<?php if ( is_home() && ! is_paged() ) : ?>
        <?php get_template_part('hero');?>
        <?php get_template_part('sidekicks');?>
<?php endif; ?>
        <div class="row">
		<div id="content" role="main" class="col-md-8 col-md-offset-4">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content-stub', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php twentytwelve_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">

			<?php if ( current_user_can( 'edit_posts' ) ) :
				// Show a different message to a logged-in user who can add posts.
			?>
				<header class="entry-header">
					<h2 class="entry-title"><?php _e( 'No posts to display', 'twentytwelve' ); ?></h2>
				</header>

				<div class="entry-content">
					<p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'twentytwelve' ), admin_url( 'post-new.php' ) ); ?></p>
				</div><!-- .entry-content -->

			<?php else :
				// Show the default message to everyone else.
			?>
				<header class="entry-header">
					<h2 class="entry-title"><?php _e( 'Nothing Found', 'twentytwelve' ); ?></h2>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'twentytwelve' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			<?php endif; // end current_user_can() check ?>

			</article><!-- #post-0 -->

		<?php endif; // end have_posts() check ?>

		</div><!-- #content -->
	</div><!-- #primary -->
	</div><!-- #primary -->

        <?php get_sidebar(); ?>
<?php get_footer(); ?>
