<!-- Front page featured content -->

<div id="front-page-intro" class="clear">

<?php // Get the contents of the page named "Front page" and put them in the $page variable ?>
<?php $page = get_page_by_title( 'Front page' ); ?>
		
	<article id="intro-elements">
		<div class="entry-content">
			<?php echo apply_filters('the_content', $page->post_content); ?>
		</div><!-- .entry-content -->
	</article><!-- #intro-elements -->
</div><!-- #front-page-intro -->

<!-- END front page featured content -->
