<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Fairlight
 */

get_header(); ?>
<?php get_template_part( 'post-header' ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<div class="post large-6 small-12 small-centered row">
		<?php while ( have_posts() ) : the_post(); ?>
<div class="now-reading">
<h2><?php echo the_title(); ?></h2>
<div class="progress"></div>
</div>
			<?php get_template_part( 'content', 'single' ); ?>
<div class="sharing">
<h4>Share this article</h4>
<ul class="small-block-grid-5">
<li><a href="http://www.facebook.com/sharer/sharer.php?<?php the_permalink(); ?>"><i class="fi-social-facebook"></i></a></li>
<li><a href="https://twitter.com/home?status=<?php the_permalink(); ?>"><i class="fi-social-twitter"></i></a></li>
<li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fi-social-google-plus"></i></a></li>
<li><a href="http://www.reddit.com/submit?url=<?php the_permalink(); ?>"><i class="fi-social-reddit"></i></a></li>
<li><a href="http://www.tumblr.com/share/link?url=<?php the_permalink();?>"><i class="fi-social-tumblr"></i></a></li>

</ul>


</div>
			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>
</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>


