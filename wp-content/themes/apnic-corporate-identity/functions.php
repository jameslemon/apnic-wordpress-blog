<?php
    $GLOBALS['homepage_featured_posts_ids'] = array();
    
    function improved_trim_excerpt($text) {
        global $post;
        if ( '' == $text ) {
                $text = get_the_content('');
                $text = apply_filters('the_content', $text);
                $text = str_replace('\]\]\>', ']]&gt;', $text);
                $text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
                //$text = strip_tags($text, '<p><a><iframe>');
                $text = strip_tags($text, '<p><a>');
                //$excerpt_length = 80;
                $excerpt_length = 35;
                $words = explode(' ', $text, $excerpt_length + 1);
                if (count($words)> $excerpt_length) {
                        array_pop($words);
                        array_push($words, '...');
                        $text = implode(' ', $words);
                }
        }
        return $text;
    }


function the_post_thumbnail_caption() {
  global $post;

  $thumbnail_id    = get_post_thumbnail_id($post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
    echo '<div class="show-feature-image-description">'.$thumbnail_image[0]->post_content.'</div>';
  }
}

    function child_theme_setup() {
        add_image_size( 'featuredImageTiny', 100, 75, true );
        add_image_size( 'featuredImageSmall', 206, 75, true );
        add_image_size( 'featuredImageMedium', 256, 93, true );
        add_image_size( 'featuredImageLarge', 555, 202, true );

        remove_filter('get_the_excerpt', 'wp_trim_excerpt');
        add_filter('get_the_excerpt', 'improved_trim_excerpt');
    }
    add_action( 'after_setup_theme', 'child_theme_setup', 11 );

    function child_theme_dequeue_fonts(){
	    wp_dequeue_style( 'twentytwelve-fonts' );
    }
    function child_theme_dequeue_jquery(){
            wp_deregister_script('jquery');
    }
    //add_action( 'wp_enqueue_scripts', 'child_theme_dequeue_fonts', 11 );  
    add_action( 'wp_enqueue_scripts', 'child_theme_dequeue_jquery' );  
    add_action( 'wp_enqueue_scripts', 'child_theme_dequeue_fonts', 11);  

    function custom_excerpt_length( $length ) {
	//return 39;
	return 69;
    }
    add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

    function child_theme_custom_css(){
        echo "<!-- CSS Core -->\n";
        echo "<!-- Respond.js (for IE8) only works with local copy of CSS (bootstrap must be same domain) -->\n";
        echo "<!--[if lt IE 9]>\n";
        echo "    <link href='".get_stylesheet_directory_uri()."/css/bootstrap.min.css' rel='stylesheet'>\n";
        echo "    <link href='".get_stylesheet_directory_uri()."/css/custom.css' rel='stylesheet'>\n";
        echo "<![endif]-->\n";
        echo "    <link href='https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css' rel='stylesheet'>\n";
        echo "    <link rel='stylesheet' type='text/css' href='https://cloud.typography.com/6771312/722504/css/fonts.css' />\n";
        echo "    <link href='https://www.apnic.net/__data/assets/css_file/0011/69239/custom.css' rel='stylesheet'>\n";
        echo "    <link href='https://www.apnic.net/__data/assets/css_file/0016/72322/legacy.css' rel='stylesheet'>\n";
        echo "    <link href='".get_stylesheet_directory_uri()."/css/blog.css' rel='stylesheet'>\n";
    }
    //add_action('admin_head','child_theme_custom_css');
    add_action('wp_head','child_theme_custom_css');

    function child_theme_custom_js(){
        echo "<!-- JS Core -->\n";
        //echo "    <script src='https://code.jquery.com/jquery-1.10.1.min.js'></script>\n";
        echo "    <script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.6.0/underscore-min.js'></script>\n";
        //echo "    <script src='https://www.apnic.net/__data/assets/js_file/0011/71687/debug.js'></script>\n";
        echo "    <script src='https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js'></script>\n";
        echo "    <script src='" .get_stylesheet_directory_uri() ."/js/jquery.debouncedresize.min.js'></script>\n";
        echo "    <script src='" .get_stylesheet_directory_uri() ."/js/jquery.ellipsis.min.js'></script>\n";
        echo "    <script src='" .get_stylesheet_directory_uri() ."/js/scripts.js'></script>\n";
    }
    //add_action('admin_head','child_theme_custom_js');
    add_action('wp_head','child_theme_custom_js');

?>
