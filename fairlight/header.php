<?php
/**
 * @package Fairlight
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<meta property="og:title" content="<?php echo the_title();?>" />
	<meta property="og:url" content="<?php echo the_permalink(); ?>" />
	<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>"/>
	<meta property="og:type" content="blog"/>
	<?php $attachment_id = get_field('header_image');
	$size = "medium";
	$image = wp_get_attachment_image_src( $attachment_id, $size );	?>
	<meta property="og:image" content="<?php echo $image[0]; ?>" />

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<?php do_action( 'before' ); ?>

	
