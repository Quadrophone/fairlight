<?php if (has_post_thumbnail( $post->ID ) ): ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

<?php endif; ?>
<header class="small-12 columns site-header" style="background-image: url('<?php echo $image[0]; ?>')">
<div class="clouds"></div>
<div class="search-box">
<aside id="search" class="widget widget_search">
                <?php get_search_form(); ?>
            </aside>
</div>
            <a class="nav-menu">
            </a>
                  <h1><?php the_title(); ?></h1>
                <h2><?php the_field('sub_heading'); ?> </h2>

           
	</header><!-- #masthead -->

	<div id="content" class="site-content">
