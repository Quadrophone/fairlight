<?php
/**
 * @package Fairlight
 */
get_header(); ?>
<?php get_template_part( 'category-header' ); ?>

<div class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="small-12 large-6 columns small-centered articles">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php
					$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );
					?>

					<div class="article">
						<div class="small-12 columns large-2">
							<div class="article-img"><a href="<?php echo get_permalink(); ?>">
								<?php
					$attachment_id = get_field('header_image');
					$size = "thumbnail";
					$image = wp_get_attachment_image_src( $attachment_id, $size );
					?>
								<img src="<?php echo $image[0]; ?>">
							</a>
						</div>
					</div>
					<div class="small-12 columns large-10 post-excerpt">
						<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p><?php the_excerpt(); ?></p>
						<h5>Posted by <?php the_author(); ?> on <?php the_date(); ?></h5>
					</div>
				</div>

			<?php endwhile; ?>

			<?php fairlight_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
	</div>
</main><!-- #main -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
