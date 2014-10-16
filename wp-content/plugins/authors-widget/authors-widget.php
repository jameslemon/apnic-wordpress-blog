<?php
/*
Plugin Name: List Authors Widget
Description: Enables a widget which lists the authors on a blog.
Author: Frankie Roberto
Author URI: http://www.frankieroberto.com
Version: 0.1
*/

class AuthorsWidget extends WP_Widget {

	function AuthorsWidget() {
		$widget_ops = array('classname' => 'authors_widget', 'description' => __('Display a list of authors'));
		$this->WP_Widget('authors', __('Authors'), $widget_ops, $control_ops);

	}

	function widget( $args, $instance ) {
		global $wpdb;

		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);

		/* $authors = $wpdb->get_results("SELECT ID from $wpdb->users;"); */
		/* $authors = $wpdb->get_results("SELECT ID from $wpdb->users ORDER BY display_name;"); */
               $authors = $wpdb->get_results("SELECT u.ID, u.display_name FROM wp_users AS u LEFT JOIN wp_usermeta AS um1 ON u.ID = um1.user_id WHERE um1.meta_key = 'pin-author' AND um1.meta_value = '1' ORDER BY u.display_name ASC LIMIT 3;");

		echo $before_widget;
		echo $before_title;
		echo $title;

		echo $after_title;?>

			<ul>
				<?php foreach ($authors as $author) :
					$author = get_userdata( $author->ID );
					$num_posts = get_usernumposts($author->ID);
					if ($num_posts > 0) :
				 ?>
				<li class="author-pinned"><a href="<?php echo get_author_posts_url($author->ID); ?>"><?php echo $author->display_name;?></a></li>
				<?php endif; endforeach; ?>
                <?php 
                   $all_authors = $wpdb->get_results("SELECT u.ID, p.post_author, u.display_name FROM wp_posts AS p LEFT JOIN wp_users AS u ON p.post_author = u.ID WHERE p.post_status = 'publish' AND u.ID != '0' GROUP BY post_author ORDER BY u.display_name ASC;");
                ?>

				<?php foreach ($all_authors as $all_author) :
					$all_author = get_userdata( $all_author->ID );
					$num_posts = get_usernumposts($all_author->ID);
					if ($num_posts > 0) :
				 ?>
				<li class="author-all"><a href="<?php echo get_author_posts_url($all_author->ID); ?>"><?php echo $all_author->display_name;?></a></li>

				<?php endif; endforeach; ?>
                                <li id="author-all-li"><a href="#" id="author-all-a">More</a></li>

			</ul>

		<?php
		echo $after_widget;
                ?>
<script>
try{
var $authors_widget = window.$authors_widget = $('.authors_widget');
if($authors_widget.length > 0){
    $('.author-all',$authors_widget).hide();
  
    $('#author-all-a',$authors_widget).click(function(e){
        e.preventDefault();
        var $all = $('.author-all',$authors_widget);
        var $pinned = $('.author-pinned',$authors_widget);

      if($all.first().is(':visible')){
          $all.hide();
          $pinned.show();
          $('#author-all-a').text('More').removeClass('less');

      }
      else{
          $all.show();
          $pinned.hide();
          $('#author-all-a').text('Less').addClass('less');
      }
    });

}
}catch(e){console.log('Problem adding author widget toggle:');console.log(e.message);}
</script>
        <?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

	function form( $instance ) {
		$title = strip_tags($instance['title']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
<?php
	}
}

add_action('widgets_init', create_function('', 'return register_widget("AuthorsWidget");'));


?>