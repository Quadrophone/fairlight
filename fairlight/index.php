<?php
/**
 * @package Fairlight
 */

get_header(); ?>
<?php get_template_part( 'main-header' ); ?>


<div class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="small-12 large-6 columns small-centered articles">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php
					$attachment_id = get_field('header_image');
					$size = "thumbnail";
					$image = wp_get_attachment_image_src( $attachment_id, $size );
					?>
					<div class="article">
						<div class="small-12 columns large-2 text-center">
							<div class="article-img "><a href="<?php echo get_permalink(); ?>">
								<img src="<?php echo $image[0]; ?>"></a></div>
							</div>
							<div class="small-12 columns large-10 post-excerpt">
								<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
								<p><?php the_excerpt(20); ?></p>
								<h5>Posted in <?php the_category(); ?> on <?php the_time("d.m.Y") ?></h5>
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


	<?php get_footer(); ?>
