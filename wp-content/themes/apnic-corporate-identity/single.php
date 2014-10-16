<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
	<div id="primary" class="site-content col-md-9">
		<div id="content" role="main" class="row">

			<?php while ( have_posts() ) : the_post(); ?>

<div class="col-md-4">
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
                        <p class="meta-author-and-date">By <?php the_author_posts_link(); ?> on <?php echo mysql2date('j M Y', $post->post_date) ?></p>
<?php
    /* CATEGORIES */
    $categories = get_the_category();
    $separator = ', ';
    $output = '';
    if($categories){
        
?>
<p>Categor<?php if(count($categories) > 1){ ?>ies<?php }else{ ?>y<?php } ?>: 
<?php
        foreach($categories as $category) {
            $output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
        }
        echo trim($output, $separator);
    }

    /* TAGS */
    echo get_the_tag_list('<p>Tags: ',', ','</p>');

    /* COMMENTS */
    comments_number( '', '<p><a href="#comments">1 Comment</a></p>', '<p><a href="#comments">% Comments</a></p>' );
?>
<div id="social_media_widgets"><div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div><a href="https://twitter.com/share" class="twitter-share-button">Tweet</a></div>
                    <p id="back-to-home" class="hidden-print"><a href="//blog.apnic.net/"><span class="glyphicon glyphicon-chevron-left"></span> Blog home</a></p>
		</header><!-- .entry-header -->
<style>
.down-arrow{font-size:10px;}
</style>
</div><!-- /.col-md-4-->
<div class="col-md-8">

		<div class="entry-content">
                            <?php 
                                if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) && (!is_home())  ) {
                                    the_post_thumbnail('featuredImageLarge'); 
$key = 'show_feature_image_description';
$themeta = get_post_meta($post->ID, $key, TRUE);
if($themeta == '1') {
the_post_thumbnail_caption();
}
                                }
                            ?>
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
<hr/>
<p id="views-disclaimer">The views expressed by the authors of this blog are their own and do not necessarily reflect the views of APNIC. Please note a <a href="http://blog.apnic.net/?p=395">Code of Conduct</a> applies to this blog.</p>
		</div><!-- .entry-content -->
</div>
<div class="col-md-offset-4 col-md-8">


				<?php comments_template( '', true ); ?>
                    <p id="back-to-top" class="hidden-print"><a href="#top"><span class="glyphicon glyphicon-chevron-up"></span> Top</a></p>
</div>

			<?php endwhile; // end of the loop. ?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
