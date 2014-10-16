<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
            <div class="col-md-4">
		<header class="entry-header">
			<?php if ( ! is_page_template( 'page-templates/front-page.php' ) ) : ?>
			<?php the_post_thumbnail(); ?>
			<?php endif; ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<p><span class="edit-link">', '</span></p>' ); ?>
                        <p id="back-to-home" class="hidden-print"><a href="//blog.apnic.net/"><span class="glyphicon glyphicon-chevron-left"></span> Blog home</a></p>
		</header>
            </div><!-- /.col-md-4-->
            <div class="col-md-8">
		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
    </div><!-- /.col-md-8-->
	</article><!-- #post -->
