<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]> <html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]> <html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]> <html class="ie ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 10 ]> <html class="ie ie10" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 11 ]> <html class="ie ie11" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gt IE 11)|!(IE)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php wp_title( '|', true, 'right' ); ?></title>

        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

        <link rel="shortcut icon" href="/favicon.ico">

        <script src='https://code.jquery.com/jquery-1.10.1.min.js'></script>
<?php wp_head(); ?>
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!-- IE Support -->
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
        <script src="<?php echo get_stylesheet_directory_uri() ?>/js/html5shiv.min.js"></script>
        <script src="<?php echo get_stylesheet_directory_uri() ?>/js/respond.min.js"></script>

<![endif]-->
<?php include_once("analyticstracking.php") ?>
<?php include_once("translatemeta.php") ?>
</head>

<body <?php body_class('theme-blog'); ?>>
<?php get_template_part('social');?>
    <div class="container">
<?php get_template_part('banner');?>
<!-- Site Top Level Nav -->

<?php get_template_part('nav');?>

    </div><!-- /.container -->

<div id="page" class="hfeed site container">
	<div id="main" class="row">
