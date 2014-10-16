<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<section id="primary" class="site-content col-md-9">
		<div id="content" role="main" class="row">

<div class="col-md-4">
			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search blog', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                    <p id="back-to-home" class="hidden-print"><a href="//blog.apnic.net/"><span class="glyphicon glyphicon-chevron-left"></span> Blog home</a></p>
			</header>
</div><!-- /.col-md-4-->
<div class="col-md-8">
		<?php if ( have_posts() ) : ?>
				<h2 class="page-title search-page-title"><?php printf( __( 'Results for "%s"', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' ); ?></h2>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content-stub', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php twentytwelve_content_nav( 'nav-below' ); ?>

		<?php else : ?>
				<h2 class="page-title search-page-title"><?php printf( __( 'Nothing found for "%s"', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' ); ?></h2>

			<article id="post-0" class="post no-results not-found">
				<div class="entry-content">
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentytwelve' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		<?php endif; ?>

                    <br/><p id="back-to-top" class="hidden-print"><a href="#top"><span class="glyphicon glyphicon-chevron-up"></span> Top</a></p>
</div>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
