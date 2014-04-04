<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Fairlight
 */
?>
<div class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="small-12 large-6 columns small-centered articles">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'fairlight' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article>
</div>
</main>
</div>
